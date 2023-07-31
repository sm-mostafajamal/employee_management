<?php
include "connect.php";


if (!empty($_POST['username'])) {
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $sql = "UPDATE `admin` SET `password`=$pass WHERE username='$username'";
  $conn->query($sql);

  if ($conn->affected_rows > 0) {
    echo "success";
  } else {
    echo "failed";
  }
} else if (!empty($_POST['new_password'])) {
  $old_pass = $_POST['old_password'];
  $new_pass = $_POST['new_password'];

  $sql = "UPDATE `admin` SET `password`=$new_pass WHERE password=$old_pass";
  $conn->query($sql);

  if ($conn->affected_rows > 0) {
    echo "success";
  } else {
    echo "failed";
  }
}
