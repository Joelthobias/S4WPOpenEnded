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
$tableName = "S4_CT"; // Change this to your desired table name

// Create the table if it doesn't exist
// $query = "CREATE TABLE IF NOT EXISTS $tableName (
//     semester VARCHAR(35),
//     id int,
//     name VARCHAR(35),
//     course VARCHAR(35)
// )";

mysqli_query($conn, $query);
// Retrieve form data
$name = $_POST['name'];
$id = $_POST['id'];


// Prepare and execute the SQL query
$sql = "INSERT INTO S4_CT (name, ID) VALUES ('$name', '$id')";

if ($conn->query($sql) === TRUE) {
    header("Location: /");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>


