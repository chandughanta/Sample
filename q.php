<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$bg=$_POST['bg'];
$add=$_POST['district'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
switch ($bg) {
	case 'O-':
		$sql="select name,phone,bloodgroup from helpers where address='$add' and bloodgroup in('O-')";
		break;
	case 'O+':
		$sql="select name,phone,bloodgroup from helpers where address='$add' and bloodgroup in('O-','O+')";
		break;
	case 'A-':
		$sql="select name,phone,bloodgroup from helpers where address='$add' and bloodgroup in('O-','A+')";
		break;
	case 'A+':
		$sql="select name,phone,bloodgroup from helpers where address='$add' and bloodgroup in('O-','O+','A-','A+')";
		break;
	case 'B-':
		$sql="select name,phone,bloodgroup from helpers where address='$add' and bloodgroup in('O-','B-')";
		break;
	case 'B+':
		$sql="select name,phone,bloodgroup from helpers where address='$add' and bloodgroup in('O-','O+','B-','B+')";
		break;
	case 'AB-':
		$sql="select name,phone,bloodgroup from helpers where address='$add' and bloodgroup in('O-','B-','A-','AB-')";
		break;
	case 'AB+':
		$sql="select name,phone,bloodgroup from helpers where address='$add'and bloodgroup in('O-','A-','B-','A+','B+','AB+','AB-','O+')";
		break;
	default:echo "error";
}
//$sql = "SELECT name,phone,bloodgroup FROM helpers where address='$add' and bloodgroup='$bg'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<h1 align='center' background-color='red'>";
	
    // output data of each row
    echo "<table border=5><tr><th>   NAME  </th><th>   PHONE   </th><th>   GROUP   </th></tr>";
    while($row = $result->fetch_assoc()) {
       echo "<tr><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["bloodgroup"]."</td></tr>";
    }
    echo "</h1>";

} else {
    echo "0 results";
}

$conn->close();
?>