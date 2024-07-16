<?php
//Create database
$sql = "CREATE DATABASE ".$dbname;
if ($conn->query($sql)== TRUE){
    echo "Database created successfully";
} else {
    echo "<br>Error creating database:".$conn->error;
}
?>