<?php
function fetchDataBySemester($semester, $course)
{
    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "new";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM S4_CT WHERE semester = ? AND course = ? ORDER BY ID");
    $stmt->bind_param("ss", $semester, $course);
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Fetch the data as an associative array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();

    return $data;
}

if (isset($_POST['semester'])) {
    $semester = $_POST['semester'];
    $course = $_POST['course'];

    // Call the function to fetch data by semester
    $data = fetchDataBySemester($semester, $course);

    // Display the fetched data
    if (!empty($data)) {
        echo '<br>';
        echo '<div class="row">';
        echo '<div class="col-3 col-md-1 mb-3">';
        echo '<label for="student_id[]" class="form-label">Student ID</label>';
        echo '</div>';
        echo '<div class="col-5 col-md-3 mb-3">';
        echo '<label for="student_name[]" class="form-label">Student Name:</label>';
        echo '</div>';
        echo '<div class="col-3 mb-3">';
        echo '<label for="attendance[]" class="form-label">Attendance:</label>';
        echo '</div>';
        echo '</div>';

        foreach ($data as $row) {
            echo '<div class="row">';
            echo '<div class="col-3 col-md-2 mb-3">';
            echo '<input type="text" name="student_id[]" value="' . $row['ID'] . '" id="student_id[]" class="form-control" required>';
            echo '</div>';
            echo '<div class="col-5 col-md-3 mb-3">';
            echo '<input type="text" name="student_name[]" value="' . $row['name'] . '" id="student_name[]" class="form-control" required>';
            echo '</div>';
            echo '<div class="col-4 col-md-2 mb-3">';
            echo '<select name="attendance[]" id="attendance[]" class="form-select" required>';
            echo '<option value="1">Present</option>';
            echo '<option value="0">Absent</option>';
            echo '</select>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No records found for the entered semester and course.";
    }
}
?>
