<?php
session_start();
if(!isset($_SESSION['user_id'])){
  echo "Error not logged on";
}

require '../includes/phpfunctions.php';

$conn = connectToDatabase();

$sql = "SELECT resume_id from permissions where user_id=" . $_SESSION['user_id'] . " AND permission = 1;";
$result = $conn->query($sql);
$resumes = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($resumes, $row["resume_id"]);
    }
    $arrlength = count($resumes);
    $sql = "SELECT resume_id, resume_name FROM resumes WHERE resume_id=" . $resumes[0];
    if($arrlength > 1){
      for($x = 1; $x < $arrlength; $x++) {
        $sql .= " OR resume_id=" . $resumes[$x];
      }
    }
    $sql .= ";";
    $results = $conn->query($sql);
    echo "<ul>";
	$counter = 0;
    while($row = $results->fetch_assoc()) {
      echo "<li>" . $row["resume_name"] . "&emsp;<button onclick='removeResume(" . $row["resume_id"] . ")'>Delete Resume</button></li>";
    }
    echo "</ul>";

} else {
    echo "You don't have a resume yet. Create one now?";
}
 ?>
