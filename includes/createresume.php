<?php
session_start();
if(!isset($_SESSION['user_id'])){
  $_SESSION['message'] = "You are not logged in";
  header("Location: http://interactive-resume-builder.net/login.php");
}
  require 'phpfunctions.php';

  $conn = connectToDatabase();

  $randomCode = md5($_SESSION['username'] + microtime());
  $resume_name = "test";


  $sql = "INSERT INTO resumes(resume_name, file_path) VALUES ('" . $resume_name . "', '" . $randomCode . ".js');";

  $sql = "select last_insert_id() from resumes;";
  $resume_id = 4;

  $sql = "INSERT INTO permissions(user_id, permission, resume_id) VALUES (" . $_SESSION[user_id] . ", 3, " . $resume_id . ");";
  //We'll have to decide what permissions we should use
 ?>
