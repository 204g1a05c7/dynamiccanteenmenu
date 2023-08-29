<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get data from query parameters
$name = $_GET['name'];
$price = $_GET['price'];

// Insert data into database
$sql = "INSERT INTO myTable (name, price) VALUES ('$name', '$price')";
if ($conn->query($sql) === TRUE) {
  echo "Record added to database successfully";
} else {
  echo "Error adding record to database: " . $conn->error;
}
mysqli_close($conn);
//$conn->close();
?>
