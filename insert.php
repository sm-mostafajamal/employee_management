<?php 
  extract($_POST);
  $arr = json_decode($_POST['inputData']);

  if(isset($_POST['inputData']) && $_FILES['image']) {
    if(!empty($_FILES['image']['name'])) {
      $img_name = $_FILES['image']['name'];
      $img_size = $_FILES['image']['size'];
      $img_tmp = $_FILES['image']['tmp_name'];
      $target_dir = "./uploads/$img_name";
      move_uploaded_file($img_tmp, $target_dir);
    
    }

  }

?>