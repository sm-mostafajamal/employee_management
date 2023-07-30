<?php 
  include "connect.php";
  
  extract(json_decode($_POST['inputData'], true));

  $skills = join(',', $skills);
  $age = (int)$age;

  
  if(isset($_POST['inputData']) && $_FILES['image']) {

    if(!empty($_FILES['image']['name'])) {
      $img_name = $_FILES['image']['name'];
      $img_size = $_FILES['image']['size'];
      $img_tmp = $_FILES['image']['tmp_name'];
      $target_dir = "./uploads/$img_name";
      move_uploaded_file($img_tmp, $target_dir);
    }

    $sql = "INSERT INTO employee (img, name, age, gender, skills, description) VALUES ('$img_name', '$name', $age, '$gender', '$skills', '$desc')";
      
    if($conn -> query($sql) === TRUE) {
      echo "New Record Created Successfully";
      } else {
      echo "faild";
      }
  
    }

?>