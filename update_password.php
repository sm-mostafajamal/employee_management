<?php
include "connect.php";


if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $pass = $_POST['password'];

  $sql = "UPDATE admin SET username='$username', password='$pass' WHERE username='$username'";
  $result = $conn->query($sql);

  if ($result) {
    echo "Record Updated Successfully";
  } else {
    echo "Failed Update Record";
  }
}
