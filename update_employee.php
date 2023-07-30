<?php
include "connect.php";

$id = (int)trim(end(explode("/", $_SERVER["REQUEST_URI"])));
$sql = "SELECT * FROM employee WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $user_data = extract($result->fetch_assoc());
  print_r($name);
}
