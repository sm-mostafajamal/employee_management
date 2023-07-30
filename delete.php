<?php
include "connect.php";;
if (isset($_POST['id'])) {

  $sql = "DELETE FROM employee WHERE id=" . (int)$_POST['id'] . "";
  if ($conn->query($sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}
