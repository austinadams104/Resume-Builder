<?php
session_start();
if(!isset($_SESSION['user_id'])){
  $_SESSION['message'] = "You are not logged in";
  header("Location: https://interactive-resume-builder.net/login.php");
}

require '../includes/phpfunctions.php';
require 'createresume.php';

$conn = connectToDatabase();

$json = $_POST['json'];
$resume_name = $_POST['resumename'];

$sql = "SELECT * FROM permissions WHERE user_id = $_SESSION;";
$result = $conn->query($sql);
$data = array(); // create a variable to hold the information
if ($result->num_rows > 0){
  while ($row = $result->fetch_assoc()){
          $data[] = $row['user_id']; // add the row in to the results (data) array
  }
} else{
  
}


$sql = "SELECT * FROM resumes where resume_name = $resumename AND ;";
$results = $conn->query($sql);

if($results->num_rows <= 0){
    createDbEntry($_SESSION['username'], $conn, $resume_name, $_SESSION['user_id']);
}
else if($results->num_rows == 1){
    $sql = "SELECT resume_id FROM resumes WHERE resume_name = $resume_name;";
    $result = $conn->query($sql);
    if($results->num_rows <= 0){
        die("An unknown error occurred");
    }
    else if($results->num_rows == 1){
      $row = $results->fetch_assoc();
      $_SESSION["user_id"] = $row["user_id"];
      $_SESSION["username"] = $row["username"];
      $_SESSION["first_name"] = $row["first_name"];
      $_SESSION["last_name"] = $row["last_name"];
    }
    $sql = "SELECT user_id, permission FROM permissions WHERE resume_id = 1;";
}


if (json_decode($json) != null) {
     $file = fopen("testfile.txt", "w");
     fwrite($file, $json);
     fclose($file);
} else{
  die("Some error occurred");
}

?>
