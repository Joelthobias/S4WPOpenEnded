<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "new";

// Create a new MySQLi object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve all records from the "students" table
$sql = "SELECT * FROM S4_CT ORDER BY ID";
$result = $conn->query($sql);
  
if ($result->num_rows > 0) {
    // return $result->fetch_assoc();
    while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['ID'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['course'] . "</td>";
          echo "<td>" . $row['semester'] . "</td>";
          echo "</tr>";
        }
    
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>

