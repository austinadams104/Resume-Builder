<?php
  require '../includes/phpfunctions.php';
  $conn = connectToDatabase();
  if(!isset($_GET['id'])){
    die("An unknown error occurred. Seriously, no idea what went wrong.");
  }
  $sql = "delete from resumes where resume_id= " . $_GET['id']  . ";";
  if($conn->query($sql) === TRUE){
    echo "Success!";
  }
  else{
    echo "not success";
  }
	$sql = "delete from permissions where resume_id= " . $_GET['id'] . ";";
	
  if($conn->query($sql) === TRUE){
    echo "Success!";
  }
  else{
    echo "not success";
  }
 ?>
