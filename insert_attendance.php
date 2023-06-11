<?php
// Establish a connection to MySQL
$host = "localhost";
$username = "root";
$password = "mysql";
$database = "new";

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$date = $_POST['date'];
$semester = $_POST['semester'];
$studentIds = $_POST['student_id'];
$attendances = $_POST['attendance'];
$hour=$_POST['hour'];
// Insert data into the table
$tableName = "Attendance"; // Change this to your desired table name

mysqli_query($conn, $query);

// Insert individual attendance records
for ($i = 0; $i < count($studentIds); $i++) {
    $studentId = mysqli_real_escape_string($conn, $studentIds[$i]);
    $attendance = mysqli_real_escape_string($conn, $attendances[$i]);
    // if()
    echo $query = "INSERT INTO $tableName (date,hour,ID,status)
              VALUES ('$date',$hour,$studentId,$attendance)";
    
    mysqli_query($conn, $query);
}
header("Location: /addAttendance.php");
// Close the database connection
mysqli_close($conn);


?>
