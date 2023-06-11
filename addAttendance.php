<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance</title>
    <!-- Add Bootstrap 5 CSS link here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <style>
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="container-fluid mt-3 navbar navbar-light navbar-expand-lg">
        <div class="container-fluid ">
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ms-auto ms-lg-1 me-5">
                        <a class="nav-link " aria-current="page" href="index.php">All Students</a>
                    </li>
                    <li class="nav-item ms-auto ms-lg-1 me-5">
                        <a class="nav-link" href="AddStudent.html">Add Student</a>
                    </li>
                    <li class="nav-item ms-auto ms-lg-1 me-5">
                        <a class="nav-link active" href="addAttendance.php">Add Attendance</a>
                    </li>
                    <li class="nav-item ms-auto ms-lg-1 me-5">
                        <a class="nav-link " href="viewAttandance.php">View Attandance</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="mt-4">Student Attendance</h2>
        <form action="insert_attendance.php" method="POST" class="mt-4">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="hour" class="form-label">Select Hour:</label>
                    <select name="hour" id="hour" class="form-select" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>
            <br>
            <div id="see" class="row g-3">
                <div class="col-auto">
                    <label for="semester" class="form-label">Semester:</label>
                    <input type="text" readOnly value="4" name="semester" id="semester" class="form-control" required>
                </div>
                <div class="col-auto">
                    <label for="course" class="form-label">Department:</label>
                    <input type="text" readOnly value="Computer Engineering" name="course" id="course" class="form-control" required>
                </div>
                <div class="mt-4 col-auto">
                    <button type="button" onclick="fetchData()" class="mt-4 btn btn-secondary">Load</button>
                </div>
            </div>

            <br>
        
            <div id="studentData"></div>

            <input type="submit" value="Submit" class="btn btn-primary mt-4">
        </form>
    </div>

    <!-- Add Bootstrap 5 JS scripts if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function fetchData() {
            var semester = document.getElementById('semester').value;
            var course = document.getElementById('course').value;

            // Make an AJAX request to fetch data
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById('studentData').innerHTML = xhr.responseText;
                    } else {
                        alert('An error occurred while fetching data.');
                    }
                }
            };

            xhr.open('POST', 'getStudentAtt.php');
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('semester=' + encodeURIComponent(semester) + '&course=' + encodeURIComponent(course));
        }

    </script>
</body>
</html>

