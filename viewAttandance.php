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
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item ms-auto ms-lg-1 me-5">
            <a class="nav-link" href="index.php">All Students</a>
          </li>
          <li class="nav-item ms-auto ms-lg-1 me-5">
            <a class="nav-link" href="AddStudent.html">Add Student</a>
          </li>
          <li class="nav-item ms-auto ms-lg-1 me-5">
            <a class="nav-link" href="addAttendance.php">Add Attendance</a>
          </li>
          <li class="nav-item ms-auto ms-lg-1 me-5">
            <a class="nav-link active" href="viewAttendance.php">View Attendance</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h1>View Attandance</h1>
    <div id="see" class="row g-3">
      <div class="mb-3 mt-5 row">
        <label for="date" class="col-sm-1 col-form-label"><b>Date:</b> </label>
        <div class="col-sm-2">
          <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="col-sm-3">
          <button type="button" onclick="fetchData('date')" class="btn btn-secondary ">Load</button>
        </div>
      </div>
      <div class="mb-3  row">
        <label for="date" class="col-sm-1 col-form-label"><b>ID:</b> </label>
        <div class="col-sm-2">
          <input type="text" name="id" id="id" class="form-control" required>
        </div>
        <div class="col-sm-3">
          <button type="button" onclick="fetchData('id')" class="btn btn-secondary ">Load</button>
        </div>
      </div>
    </div>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th id='A'>ID</th>
          <th>Attendance</th>
        </tr>
      </thead>
      <tbody id="studentData">

      </tbody>
    </table>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
  <script>
    function fetchData(data) {
      var title=document.getElementById('A');
      var val = document.getElementById(data).value;
      
      // Make an AJAX request to fetch data
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            document.getElementById('studentData').innerHTML = xhr.responseText;
            if(data==='id'){
              title.innerHTML='Date'
            }else{
              title.innerHTML='ID'
            }
          } else {
            alert('An error occurred while fetching data.');
          }
        }
      };

      xhr.open('POST', 'getAttendance.php');
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send(`${data}=` + val);
      console.log(`${data}=` + val);
    }
  </script>
</body>

</html>
