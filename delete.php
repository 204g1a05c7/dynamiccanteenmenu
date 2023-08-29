<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'myDB');

// check if the ID parameter is set
if (isset($_POST['name'])) {
  // get the ID of the row to be deleted
  $id = mysqli_real_escape_string($conn, $_POST['name']);

  // delete the row from the database
  $query = "DELETE FROM myTable WHERE name = '$id'";
  mysqli_query($conn, $query);

  // check if the row is successfully deleted
  if (mysqli_affected_rows($conn) > 0) {
    echo 'success';
  } else {
    echo 'error';
  }
}

// close the database connection
mysqli_close($conn);
?>
