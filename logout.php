<?php
  session_start();
  session_unset();
  session_destroy();

  header("Location: https://interactive-resume-builder.net/index.php");
?>
