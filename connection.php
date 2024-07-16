<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sarubasant";

//create connection
$conn = new mysqli($servername,$username,$password,$dbname);

//check connection
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}
echo "Connected Successfully";

//$conn->close();
//echo "<br>connection closed"
 
?>