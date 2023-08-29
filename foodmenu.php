<head>
<link rel="stylesheet" href="tstyles.css">
<style>
table { background-color: #D6EEEE; table-layout: fixed; width: 120px; border: 1px solid red; } td { border: 1px solid blue; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; }
</style>
</head>
<?php
	// Connect to the MySQL database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	// Query the database for the table data
	//$sql = "SELECT * FROM myTable";
$sql = "SELECT DISTINCT name, price FROM myTable";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
  echo "<table class='my-table' style='border: 1px solid black; margin: 2 auto;'>";
  echo "<tr><th>Name</th><th>Price</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["price"] . "</td>" . '</tr>';
  }
  echo "</table>";
} else {
  echo "Menu not yet updated";
}
	// Close the database connection
	mysqli_close($conn);
	
?>