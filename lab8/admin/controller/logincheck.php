<?php
include('../model/db.php');
session_start();

$error = "";
// store session data
if (isset($_POST['submit'])) {
  if (empty($_POST['email']) || empty($_POST['password'])) {
    $error = "fill up all fields";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = new db();
    $conobj = $connection->OpenCon();

    $userQuery = $connection->CheckUser($conobj, "admin", $email, $password);

    if ($userQuery->num_rows > 0) {

      $_SESSION['email'] = $_POST['email'];
      $_SESSION['password'] = $_POST['password'];
    } else {
      $error = "Email or Password is invalid";
    }
    $connection->CloseCon($conobj);
  } 
}
