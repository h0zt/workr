<?php
    $servername ="localhost";
    $username ="root";
    $password ="";

    $connect = new PDO("mysql:host=$servername;dbname=db_rockss",
        $username, $password);
    //COUNT SELECTION FOR THE REPORT
    $identification =$_POST['id'];
    $query="SELECT id,identification, COUNT(identification) as count_no 
        FROM attendance 
        WHERE identification='$identification' ORDER BY id";
    $statement =$connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $data = array();
    foreach($result as $row){
        $data[] = array(
            'id'=>$row['id'],
            'count'=>$row['count_no'],
        );
    }

    echo json_encode($data);
?>