<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student List</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <nav class="container-fluid navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid ">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item ms-auto ms-lg-1 me-5">
            <a class="nav-link active" aria-current="page" href="index.php">All Students</a>
          </li>
          <li class="nav-item ms-auto ms-lg-1 me-5">
            <a class="nav-link" href="AddStudent.html">Add Student</a>
          </li>
          <li class="nav-item ms-auto ms-lg-1 me-5">
            <a class="nav-link" href="addAttendance.php">Add Attandance</a>
          </li>
          <li class="nav-item ms-auto ms-lg-1 me-5">
            <a class="nav-link " href="viewAttandance.php">View Attandance</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <h1>Student List</h1>
     <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th>Roll.No</th>
          <th>Name</th>
          <th>Department</th>
          <th>Semester</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include './viewAll.php';
        ?>
     </tbody>
    </table>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
