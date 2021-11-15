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

$sql = "SELECT name,phone FROM helpers where address='$add' and bloodgroup='$bg'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table border=1><tr><th>name</th><th>phone</th></tr>";
    while($row = $result->fetch_assoc()) {
       echo "<tr><td>".$row["phone"]."</td><td>".$row["name"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>