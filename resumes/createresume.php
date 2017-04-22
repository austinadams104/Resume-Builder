<?php
  function createDbEntry($username, $conn, $resume_name, $user_id){
    $randomCode = md5($username + microtime());
    $sql = "INSERT INTO resumes(resume_name, file_path) VALUES ('" . $resume_name . "', './" . $username . "/" . $randomCode . ".json');";

    $resume_id = 0;
    if ($conn->query($sql) === TRUE) {
      $resume_id = $conn->insert_id;
    } else {
      die("Error: " . $conn->error);
    }

    $sql = "INSERT INTO permissions(user_id, permission, resume_id) VALUES (" . $user_id . ", 1, " . $resume_id . ");";
    //We'll have to decide what permissions we should use
    if ($conn->query($sql) === FALSE) {
      die("Error: " . $conn->error);
    } else{
      echo "Record successfully inserted<br>Test it out<br>";
    }
  }
 ?>
