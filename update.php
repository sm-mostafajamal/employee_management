<?php
include "connect.php";

if (!empty($_FILES['image']['name'])) {
  $img_name = $_FILES['image']['name'];
  $img_size = $_FILES['image']['size'];
  $img_tmp = $_FILES['image']['tmp_name'];
  $target_dir = "./uploads/$img_name";
  move_uploaded_file($img_tmp, $target_dir);
} else {
  $img_name = $_POST['image'];
}

if (isset($_POST['inputData'])) {
  extract(json_decode($_POST['inputData'], true));
  $skills = join(', ', $skills);

  $sql = "UPDATE employee SET img='$img_name', name='$name', age=$age, gender='$gender', skills='$skills', description='$desc' WHERE id=$id";
  $result = $conn->query($sql);

  if ($result) {
    echo "Record Updated Successfully";
  } else {
    echo "Failed Update Record";
  }
}
