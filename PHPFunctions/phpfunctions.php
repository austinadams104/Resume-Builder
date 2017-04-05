<? php
  function sanitize($query){
    return mysql_real_escape_string($query);
  }
 ?>
