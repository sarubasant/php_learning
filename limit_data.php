<html>
    <body>
        <?php
//Limit Data Selections From a MySQL Database
/*MySQL provides a LIMIT clause that is used to specify the number of records to return.

The LIMIT clause makes it easy to code multi page results or pagination with SQL, and is very useful on large tables. Returning a large number of records can impact on performance.

Assume we wish to select all records from 1 - 30 (inclusive) from a table called "Orders". The SQL query would then look like this:

$sql = "SELECT * FROM Orders LIMIT 30";
When the SQL query above is run, it will return the first 30 records.

What if we want to select records 16 - 25 (inclusive)?

Mysql also provides a way to handle this: by using OFFSET.

The SQL query below says "return only 10 records, start on record 16 (OFFSET 15)":

$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
You could also use a shorter syntax to achieve the same result:

$sql = "SELECT * FROM Orders LIMIT 15, 10";
Notice that the numbers are reversed when you use a comma.
*/
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sarubasant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//display record from 1-30
//$sql = "SELECT * FROM Myguests LIMIT 30";

//display records from 16-25
$sql = "SELECT * FROM Myguests LIMIT 10 OFFSET 15";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>