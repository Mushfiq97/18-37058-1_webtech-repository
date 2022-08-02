<?php
require('../model/db.php');
if (isset($_POST['approve'])) {
    $connection = new db();
    $conobj = $connection->OpenCon();
    $userdata = $connection->update_user_status($conobj, $_POST["table"], $_POST["email"], "approved");
    $connection->CloseCon($conobj);
    header("Location: " . $_POST["redirect_path"] . "");
}
if (isset($_POST['reject'])) { 
    $connection = new db();
    $conobj = $connection->OpenCon();
    $userdata = $connection->update_user_status($conobj, $_POST["table"], $_POST["email"], "rejected");
    $connection->CloseCon($conobj);
    header("Location: " . $_POST["redirect_path"] . "");
}
//header("Location: ../view/reporterSignupRequest.php");
if (isset($_POST['delete'])) {
    $connection = new db();
    $conobj = $connection->OpenCon();
    $userdata = $connection->update_user_status($conobj, $_POST["table"], $_POST["email"], "deleted");
    $connection->CloseCon($conobj);
    header("Location: " . $_POST["redirect_path"] . "");
}

if (isset($_POST['disable'])) {
    $connection = new db();
    $conobj = $connection->OpenCon();
    $userdata = $connection->update_user_status($conobj, $_POST["table"], $_POST["email"], "disabled");
    $connection->CloseCon($conobj);
    header("Location: " . $_POST["redirect_path"] . "");
}
if (isset($_POST['remove'])) {
    $connection = new db();
    $conobj = $connection->OpenCon();
    $userdata = $connection->delete_news($conobj, $_POST["table"], $_POST["id"]);
    $connection->CloseCon($conobj);
    header("Location: " . $_POST["redirect_path"] . "");
}
if (isset($_POST['view'])) {

    header("Location: ../view/viewNews.php?id=".$_POST['id']);
}