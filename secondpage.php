<html>
<head>
 <link rel="stylesheet" href="tstyles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
<table border="5" align="center" class="menu">
<tr>
<th>
item</th><th>price</th><th>ADD</th>
</tr>
<tr>
<td>Meals</td>
<td>50</td>
<td><button onclick="addToDatabase(this.parentNode.parentNode)">ADD</button></td>
</tr>
<tr>
<td>Gobi</td>
<td>60</td>
<td><button onclick="addToDatabase(this.parentNode.parentNode)">ADD</button></td>
</tr>
<tr>
<td>chapathi(2)</td>
<td>30</td>
<td><button onclick="addToDatabase(this.parentNode.parentNode)">ADD</button></td>
</tr>
<tr>
<td>chicken curry</td>
<td>60</td>
<td><button onclick="addToDatabase(this.parentNode.parentNode)">ADD</button></td>
</tr>
<tr>
<td>Gobi rice</td>
<td>60</td>
<td><button onclick="addToDatabase(this.parentNode.parentNode)">ADD</button></td>
</tr>
<tr>
<td>egg rice</td>
<td>50</td>
<td><button onclick="addToDatabase(this.parentNode.parentNode)">ADD</button></td>
</tr>
<tr>
<td>double egg rice</td>
<td>60</td>
<td><button onclick="addToDatabase(this.parentNode.parentNode)">ADD</button></td>
</tr>
<tr>
<td>tea</td>
<td>10</td>
<td><button onclick="addToDatabase(this.parentNode.parentNode)">ADD</button></td>
</tr>
<tr>
<td>veg puff</td>
<td>15</td>
<td><button onclick="addToDatabase(this.parentNode.parentNode)">ADD</button></td>
</tr>
<tr>
<td>egg puff</td>
<td>20</td>
<td><button onclick="addToDatabase(this.parentNode.parentNode)">ADD</button></td>
</tr>
</table>
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
  echo "<tr><th>Name</th><th>Price</th><th>Delete</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["price"] . "</td>" . '<td><button class="delete-btn" data-id="' . $row["name"] . '">Delete</button></td></tr>';
  }
  echo "</table>";
} else {
  echo "0 results";
}
	// Close the database connection
	mysqli_close($conn);
	?>
<script>
function addToDatabase(row) {
  if (!row || !row.cells) {
    console.error("Invalid row:", row);
    return;
  }

  var cells = row.cells;
  var name = cells[0].innerHTML;
  var price = cells[1].innerHTML;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);

      // Call the second function here
      callSecondFunction();
    }
  };
  
  // Send the data to the PHP script
  xhttp.open("GET", "add_to_database.php?name=" + name + "&price=" + price , true);
  xhttp.send();
$.ajax({
    url: 'secondpage.php',
  });
      callSecondFunction();
}

function callSecondFunction() {
  $.ajax({
    url: 'secondpage.php',
  });
}


$(document).ready(function() {
  $('.delete-btn').click(function() {
    var name = $(this).data('id');
    $.ajax({
      url: 'delete.php',
      type: 'POST',
      data: { name: name },
      success: function(response) {
        // if the row is successfully deleted, remove it from the table
        if (response == 'success') {
          $('button[data-id="' + name + '"]').closest('tr').remove();
        }
      }
    });
  });
$('.delete-btn').click(function() {
    $.ajax({
      url: 'secondpage.php',
    });
  });
});

</script>
</body>
</html>
