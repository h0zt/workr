<?php
header('Content-Type: application/json');

//require_once('db.php');
$conn =new mysqli('localhost','root','','db_rockss');

$sqlQuery = "SELECT
	COUNT(name) AS Total,
	DATE_FORMAT(date,'%b') as Months
	FROM customer
	GROUP by DATE_FORMAT(date,'%b')
	order by DATE_FORMAT(date,'%b')";

$result = mysqli_query($conn,$sqlQuery);

//$data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);

?>