<?php
session_start();
include "connect.php";

if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $pass = $_POST["password"];

  $sql = "SELECT * FROM admin WHERE username='$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $db_username = $user["username"];
    $db_pass = $user["password"];
    if ($db_username === $username && $db_pass === $pass) {
      $_SESSION['username'] = $username;
      echo "login";
    } else {
      echo "<span class='err'>Wrong Credentials!!!</span>";
    }
  }
}
