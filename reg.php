<?php
$name=$_POST["name"];
$phone=$_POST["phone"];
$group=$_POST["group"];
$village=$_POST["village"];
$age=$_POST["age"];
$host="localhost";
$user="root";
$password="";
$db="mydb";
$conn=new mysqli($host,$user,$password,$db)or die("unable to connect");
$sql="INSERT INTO helpers (name,age,address,phone,bloodgroup) VALUES ('$name', '$age', '$village', '$phone', '$group')";
if($conn->query($sql) === TRUE){
	include "thanks.html";
}
else{
	echo 'not inserted';
}
$conn->close();
?>