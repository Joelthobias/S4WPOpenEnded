<?php
          include './conn.php';
          // $sql = "SELECT ID, date, COUNT(*) AS total_attendance FROM Attendance GROUP BY ID, date";
          if (isset($_POST['date'])) {
            $date=$_POST['date'];
            $sql = "SELECT id,count(*) AS total_attendance FROM Attendance WHERE date = '$date' GROUP BY id";
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {
                // return $result->fetch_assoc();
                while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['total_attendance'] . "</td>";
                      echo "</tr>";
                    }
                
            } else {
                echo "No records found.";
            }
          }else if($_POST['id']){
            $id=$_POST['id'];
            $sql = "SELECT date,count(*) AS total_attendance FROM Attendance WHERE id='$id' GROUP BY date";
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {
                // return $result->fetch_assoc();
                while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row['date'] . "</td>";
                      echo "<td>" . $row['total_attendance'] . "</td>";
                      echo "</tr>";
                    }
                
            } else {
                echo "No records found.";
            }
          }

            // Close the database connection
            $conn->close();
        ?>
        SELECT date,count(hour) AS total_attendance FROM Attendance group by date;