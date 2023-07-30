<?php 
  include "connect.php";



  $sql = "SELECT * FROM employee";
  $result = $conn -> query($sql);

  if($result -> num_rows > 0) {
  
    $table = "
      <table class='table'>
        <thead>
          <tr>
            <th>SL No.</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Skills</th>
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
    while($row = $result -> fetch_assoc()) {
      echo "<tr>
              <td>".$id."</td>
              <td><img src='./uploads/".$row['img']."' class='table_img' alt='employee image'></td>
              <td>".$row['name']."</td>
              <td class='td_skills'>".$row['skills']."</td>
              <td>
                  <button class='btn'>Edit</button>
                  <button class='btn' style='color: red; border: 1px solid red;margin: 0;'>Delete</button>
              </td>
            </tr>";
      $id++;
    }
    echo $table_end;
  }

?>