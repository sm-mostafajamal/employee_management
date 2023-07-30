<?php 
  $conn = new mysqli("localhost", "root", "", "employee_mangement");

  if($conn -> connect_error){
    die("Connection failed: ". $conn -> connect_error);
  } 
  
?>