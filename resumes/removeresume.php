<?php
  require '../includes/phpfunctions.php';
  $conn = connectToDatabase();
  if(!isset($_GET['id'])){
    die("An unknown error occurred. Seriously, no idea what went wrong.");
  }
	$sql = "select file_path from resumes where resume_id= " . $_GET['id'] . ";";
	$results=$conn->query($sql);
	$filepath = "";	

	if($results->num_rows > 0){
		$row = $results->fetch_assoc();
		$filepath = $row['file_path'];
	}
	if(unlink($filepath)){
		echo "Successfully deleted $filepath";
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
