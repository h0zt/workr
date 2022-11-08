<?php
    $servername ="localhost";
    $username ="root";
    $password ="";

    $connect = new PDO("mysql:host=$servername;dbname=db_rockss", $username, $password);
    //COUNT SELECTION FOR THE REPORT
    $identification =$_GET['id'];
    $query="SELECT * FROM attendance 
        WHERE identification=$identification ORDER BY id";
    $statement =$connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $data = array();
    foreach($result as $row){
        $data[] = array(
            'id'=>$row['id'],
            'title'=>$row['title'],
            'start'=>$row['start_event'],
            'end'=>$row['end_event']
        );
    }

    echo json_encode($data);
?>