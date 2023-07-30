<?php
include "connect.php";



$sql = "SELECT * FROM employee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  $table = "
      <table class='table'>
        <thead>
          <tr>
            <th>SL No.</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Skills</th>
            <th>Gender</th>
            <th>Operations</th>
          </tr>
        </thead>
        <tbody> 
        ";
  $table_end = "
        </tbody>
      </table>
    ";

  echo $table;
  $id = 1;
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
              <td>" . $id . "</td>
              <td><img src='./uploads/" . $row['img'] . "' class='table_img' alt='employee image'></td>
              <td>" . $row['name'] . "</td>
              <td>" . ucfirst($row['gender']) . "</td>
              <td class='td_skills'>" . $row['skills'] . "</td>
              <td style='width: 20%;'>
                  <a href='update_employee.php/" . $row['id'] . "'>
                    <button id='edit' onclick='updateUser(" . $row['id'] . ")' class='btn'>Edit</button>
                  </a>
                  <button id='delete' onclick='deleteUser(" . $row['id'] . ")' class='btn' style='color: red; border: 1px solid red;margin: 0;'>Delete</button>
              </td>
            </tr>";
    $id++;
  }
  echo $table_end;
}