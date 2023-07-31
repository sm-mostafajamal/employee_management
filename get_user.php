<?php
include "connect.php";

if (isset($_POST["id"])) {
  $id = (int)$_POST["id"];

  $sql = "SELECT * FROM employee WHERE id=$id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
  }
}
