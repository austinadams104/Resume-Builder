<? php
  require('../includes/phpfunctions.php');

  $conn = connectToDatabase();
  $sql = "SELECT user_id FROM user_accounts WHERE username='testuser';";
  $results = $conn->query($sql);
  echo $results;
 ?>
