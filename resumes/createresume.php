<?php
  function createDbEntry($username, $conn, $resume_name, $user_id, $randomCode){
    $sql = "INSERT INTO resumes(resume_name, file_path) VALUES ('" . $resume_name . "', '" . $randomCode . ".json');";
    $resume_id = 0;
    if ($conn->query($sql) === TRUE) {
      $resume_id = $conn->insert_id;
    } else {
      die("Error: " . $conn->error);
    }
    $sql = "INSERT INTO permissions(user_id, permission, resume_id) VALUES ($user_id, 1, $resume_id);";
    if ($conn->query($sql) === FALSE) {
      die("Error: " . $conn->error);
    } else{
      echo "Record successfully inserted";
    }
  }
 ?>
