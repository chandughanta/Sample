<?php
$host="localhost";
$user="root";
$password="";
$db="mydb";
$bg=$_POST["bg"];
$distict=$_POST['district'];
$conn = new mysqli($host,$user,$password,$db)or die("failed");
$sql = "SELECT name,phone from helpers where address='$distict' and bloodgroup='$bg'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
     {
        echo "name: " . $row["name"]. " - phone: " . $row["phone"]. " "."<br>";
    }
} 
else 
{
    echo "0 results";
}
$conn->close();
?>
