<?php 
$input  =new Input();






class Database{
    public function connect(){
        $dbconnect = new PDO(
            "mysql:host=localhost;dbname=db_rockss",
             "root", ""
        );
        return $dbconnect; 
    }
}






use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class InPut{


    /**
     * @TESTED
     * inserts the details of guard who has been sent to firebase for the app display
     * after recruiting button in pressed.
     * ----
     */
    public function recruitGuard(
        $firstname,$lastname,$identification,$contact,
        $education,$certificate, $height,$information,$image,$tmp
            ){
        $path ="../uploads/".$image;
        $date = date('Y-m-d H:i:s');
        //query
        $query ="INSERT INTO guard( firstname, lastname,
            identification, contact, information, education, 
            certificate, height, image, date ) 
            VALUES ( '$firstname','$lastname', '$identification','$contact',
            '$information', '$education', '$certificate', '$height', '$image', '$date')
        ";
        //array for json returns
        $data = array();
        if(move_uploaded_file($tmp,$path)){
            $database = new Database();
            $dbconnect = $database->connect();
            if($dbconnect->exec($query)){
                $data[] = array('message'=>$firstname.' :successfully');
            }else{ $data[] = array('message'=>"failed"); }
        }
        echo json_encode($data);
    }


    /**
     * @TESTED
     * gets the inventories that the guard is given.
     * ----
     */
    public function submitInventory($inventory_id,$qty,$no,$guard_id){
        $date = date('Y-m-d H:i:s');
        $query ="INSERT INTO guard_on_inventory ( inventory_id, qty,no,submited ,guard_id) 
            VALUES ( '$inventory_id','$qty', '$no', '$date','$guard_id' ) ";
        $database = new Database();
        $dbconnect = $database->connect();
        $dbconnect->exec($query);
        header("location:../inventory_add.php?id=$guard_id");
    } 


    /**
     * @TESTED
     * update on trainings and Interviews
     * ----
     */
    public function setSchedule($id,$schedule,$date,$contact){
        $query ="UPDATE guard
            SET schedule='$schedule'
            WHERE id = $id ";
        $database = new Database();
        $dbconnect = $database->connect();
        if($dbconnect->exec($query)){
            require '../phpmailer/src/Exception.php';
            require '../phpmailer/src/PHPMailer.php';
            require '../phpmailer/src/SMTP.php';
            $mail = new PHPMailer(true);
            $mail->isSMTP() ;
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username ='bckyrd.io@gmail.com';//replace with your gmail account
            $mail->Password = 'euvytvijgcnlucwi';//replace this gmail app password
            $mail->SMTPSecure = 'ssl';//
            $mail->Port = '465';
            $mail->setFrom('bckyrd.io@gmail.com'); //replace with you
            $mail->addAddress($contact);
            $mail->isHTML(true);
            $mail->Subject = $schedule;// set to training or email base on schedule
            $mail->Body = 'Hi '.$contact.' you are invited to '.$schedule.' on '.$date;
            $mail->send();
            header("location: ../schedule_approval.php");
        }
    } 
   


    /**
     * @TESTED
     * gets inventories of guards that have been returned
     * ----
     */
    public function returnInventory($qty,$no,$guard_id,$inventory_id){
        $date = date('Y-m-d H:i:s');
        $query ="UPDATE guard_on_inventory
            SET qty_return='$qty' ,no_return = '$no', returned = '$date'
            WHERE inventory_id ='$inventory_id' 
            AND guard_id ='$guard_id' ";
        $database = new Database();
        $dbconnect = $database->connect();
        if($dbconnect->exec($query)){
            header("location: ../inventory_add.php?id=$guard_id&&inv=$inventory_id");
        }
    } 



    /**
     * @TESTED
     * insert salaries to the guards
     * ---
     */
    public function payGuardSalary($id,$total){
        $date = date('Y-m-d');
        $query ="INSERT INTO salaries( guard_id, month,total )
            VALUES ( '$id', '$date', '$total' )";
        $database = new Database();
        $dbconnect = $database->connect();
        $dbconnect->exec($query);
        header("location: ../guards_salaries.php");
    }



    /**
     * @TESTEings
     * get users identification from firebase
     * ---
     */
    public function identifyGuard($identification,$guard_id){
        $date = date('Y-m-d');
        $query ="INSERT INTO attendance( identification, title, start_event, end_event,guard_id )
                 VALUES ( '$identification', 'attended', '$date', '$date','$guard_id' ) ";
        $database = new Database();
        $dbconnect = $database->connect();
        $dbconnect->exec($query);
        echo "already upload";
    }


    /**
     * #TESTING
     * sends the firebase details of customers changes to the database
     * #fix inserts only if the client doesnt exist
     */
    public function insertClient(
        $name,$address,$contact){
        $date = date('Y-m-d');
        $query ="INSERT INTO customer( name, address ,contact, image, date ) 
            VALUES ( '$name','$address', '$contact', 'profile.png', '$date' ) ";
        $database = new Database();
        $dbconnect = $database->connect();
        $dbconnect->exec($query);
        echo "...data uploaded".$name;
    }


    /**
     * @TESTED
     * insert guard associating with their customers
     * ----
     */
    public function postGuard($guard_id,$customer_id){
        $date = date('Y-m-d H:i:s');
        $query ="INSERT INTO posting( guard_id, customer_id, date ) 
            VALUES ( '$guard_id','$customer_id', '$date' ) ";
        $database = new Database();
        $dbconnect = $database->connect();
        $data = array();//array for json returns
        if($dbconnect->exec($query)){
            //select data where id is provided
            $select = "SELECT * FROM guard WHERE id ='$guard_id' LIMIT 1 " ;
            $statement =$dbconnect->prepare($select);
            $statement->execute();
            $guards = $statement->fetchAll();
            foreach($guards as $guard){
                $data[] = array(
                    'firstname'=>$guard['firstname'],
                    'lastname'=>$guard['lastname'],
                    'contact'=>$guard['contact'],
                    'identification'=>$guard['identification'],
                    'id'=>$guard['id']
                );
            }
        }
        echo json_encode($data);
    }

}







class OutPut{


    /**
     * #TESTING
     * -----
     */
    public function guardSalaries(){   
        $query ="SELECT guard.id,guard.firstname,guard.lastname,
            salaries.total,count('attendance.id') AS dates,
            ROW_NUMBER() OVER() AS num
            FROM guard LEFT JOIN salaries ON(guard.id = salaries.guard_id),
            attendance
            WHERE guard.id = attendance.guard_id
            GROUP BY guard.firstname ";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }



    /**
     * #TESTING
     * -----
     */
    public function allScheduledGuards(){   
        $query ="SELECT *,   
            ROW_NUMBER() OVER() AS num FROM guard 
            WHERE schedule != 'training'
            GROUP BY firstname ORDER BY id ASC";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }


    /**
     * #TESTed ONLY GUARDS ENROLED IN TRAINING
     * **/
    public function allGuards(){   
        $query ="SELECT *,   
            ROW_NUMBER() OVER() AS num FROM
            guard WHERE schedule = 'training' ";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }



    /**
     * #TESTING
     * -----
     */
    public function allGuardPost(){
        $query ="SELECT  guard.id, identification,contact,firstname,lastname
            FROM `guard` LEFT JOIN posting ON(guard.id = posting.guard_id)
            WHERE posting.guard_id IS NULL ";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }


    /**
     * #TESTING
     * select only one guard getting => dairly attendance
     * ------
     */
    public function oneGuardProfile($guard_id){
        $query ="SELECT * FROM guard WHERE guard.id ='$guard_id' ";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetch();
    }


    /**
     * @TESTED
     * gets all the customers details that have been assigned to 
     * a particular guard
     */
    public function customerGuards($customer_id){
        $query ="SELECT guard.firstname, guard.lastname, guard.identification,guard.image 
            FROM `customer` 
            LEFT JOIN posting ON(customer.id = posting.customer_id)
            RIGHT JOIN guard ON(guard.id = posting.guard_id)
            WHERE customer.id = $customer_id";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }


    /**
     * @TESTED
     * get only guard that is selected with returned count of guards assigned
     * ------
     */
    public function oneCustomer($customer_id){
        $query ="SELECT name,address,contact,image,COUNT(posting.customer_id) AS guard_no
            FROM `customer` LEFT JOIN posting ON(customer.id = posting.customer_id)
            WHERE customer.id = $customer_id";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetch();
    }


    /**
     * #TESTING
     * all customers are being displayed
     * --------
     */
    public function allCustomers(){
        $database = new Database();
        $dbconnect = $database->connect();
        $query ="SELECT * FROM customer ORDER BY id";
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }
    

    /**
     * #TESTING
     *
     * fixing multiple snapshots that firebase is sending
     * ------
     */
    public function preventMultipleInsert($name){
        $query ="SELECT * FROM customer WHERE name= '$name' ";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $statement->rowCount();
    }


    /**
     * #TESTING
     *
     * fixing multiple snapshots for the same date on attendace
     * ------
     */
    public function preventMultipleAttendance($identification){
        echo $identification;
        $today = date('Y-m-d');
        $query ="SELECT * FROM attendance
            WHERE identification= '$identification'
            AND start_event = '$today' ";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $statement->rowCount();
    }


    /**
     * @TESTED
     * gets all the protective equipments that are not assigned to the guard
     * ----
     */
    public function inventory($guard_id){
        $query =" SELECT inventory.ppe, inventory.id 
            FROM `inventory` 
            LEFT JOIN guard_on_inventory ON(guard_on_inventory.inventory_id = inventory.id ) 
            RIGHT JOIN guard ON(guard.id) 
            WHERE guard_on_inventory.returned IS NOT NULL
            OR guard_on_inventory.inventory_id IS NULL
            AND guard.id = '$guard_id' ";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }


    /**
     * @TESTED
     * gets all the inventories given to the guard
     * ----
     */
    public function guardInventory($name){
        $query ="SELECT guard_on_inventory.id, guard_on_inventory.qty, guard_on_inventory.no,
            inventory.ppe, guard_on_inventory.inventory_id
            FROM guard_on_inventory,guard,inventory
            WHERE guard_on_inventory.guard_id = guard.id
            AND guard_on_inventory.inventory_id = inventory.id
            AND guard_on_inventory.returned IS NULL ";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }


    /**
     * @TESTED
     * able to view list of inventory pocesssed by guard
     * -------
     */
    public function guardInventoryView(){
        $query ="SELECT * FROM guard_on_inventory, inventory
            WHERE inventory.id = guard_on_inventory.inventory_id";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }


    /**
     * @TESTED
     * show just inventory list
     * -------
     */
    public function allInventory(){
        $query ="SELECT *, ROW_NUMBER() OVER() AS num 
            FROM inventory";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }





    /**
     * DASHBOARD COUNTS
     */
    public function countTable($table){
        $query ="SELECT * FROM  $table ";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $statement->rowCount();
    }



    /**
     * Attendance Report Printing
     */
    public function AttendanceReport(){
        $query="SELECT firstname, lastname ,guard.identification as identification,
            COUNT(attendance.identification) as count_no 
            FROM attendance,guard 
            WHERE attendance.identification = guard.identification
            GROUP BY attendance.identification";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }
   

     /**
     * Attendance Report Printing
     */
    public function RecruitmentReport(){
        $query="SELECT * FROM guard ";
        $database = new Database();
        $dbconnect = $database->connect();
        $statement =$dbconnect->prepare($query);
        $statement->execute();
        return $result = $statement->fetchAll();
    }
}






#-
if(isset($_POST['recruit'])){
    $input->recruitGuard(
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['identification'],
        $_POST['contact'],
        $_POST['education'],
        $_POST['certificate'],
        $_POST['height'],
        $_POST['information'],
        $_FILES['file']['name'],
        $_FILES['file']['tmp_name']
    );
}

#//
if(isset($_POST['submit'])){
    $input->submitInventory(
        $_POST['inventory_id'],
        $_POST['qty'],
        $_POST['no'],
        $_POST['guard_id']
    );
}

#//
if(isset($_POST['return'])){
    $input->returnInventory(
        $_POST['qty'],
        $_POST['no'],
        $_POST['guard_id'],
        $_POST['inventory_id'],
    );
}


if(isset($_POST['fingerprint'])){
    $output = new OutPut();
    $rowCount =$output->preventMultipleAttendance($_POST['identity']);
    //prevent inserts
    if($rowCount > 0){ 
        echo "guard attended today already exists ";
    }else{
        $input->identifyGuard($_POST['identity'],$_POST['id']);
    }
    
}

#-
if(isset($_POST['insertclient'])){
    $output = new OutPut();
    $rowCount =$output->preventMultipleInsert($_POST['name']);
    //prevent inserts
    if($rowCount > 0){
        echo "already existe";
    }else{
        $input->insertClient(
            $_POST['name'],
            $_POST['address'],
            $_POST['contact'],
        ); 
    }
}

#-
if(isset($_GET['postguard'])){
    $input->postGuard(
        $_GET['guard_id'],
        $_GET['customer_id']
    );
}


#-
if(isset($_POST['schedule'])){
    $input->setSchedule(
        $_POST['id'],
        $_POST['schedule'],
        $_POST['date'],
        $_POST['contact']
    );
}


#-
if(isset($_POST['total'])){
    $input->payGuardSalary(
        $_POST['id'],
        $_POST['total']
    );
}

?>