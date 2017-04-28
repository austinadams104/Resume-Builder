<?php
include '../includes/header2.php';
if(!isset($_POST['username']) || !isset($_POST['resume_id'])){
  die("An unknown error occurred!");
}
require '../includes/phpfunctions.php';
$conn = connectToDatabase();
$user_id = 0;
$sql = "SELECT user_id FROM user_accounts where username='" . $_POST['username'] . "';";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    // output data of each row
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
}
else{
  die("That user doesn't exist");
}
$sql = "INSERT INTO permissions(user_id, permission, resume_id) VALUES(" . $user_id. ", 2, " . $_POST['resume_id'] .  ");";
if($conn->query($sql)){
  echo "You have successfully shared your resume";
} else {
  echo "SQL syntax error";
}

include '.,/includes/footer.php';
?>
