<?php
include_once('../model/db.php');
function updateAdmin($name, $email, $password, $gender, $dob,$profile)
{
    $connection = new db();
    $conobj = $connection->OpenCon();

    $insertStatus = $connection->updateAdminData($conobj, "admin", $name, $email, $password, $gender, $dob, $profile);
    return $insertStatus;
}

$validImage=""; 
$validateName = "";

$genderValidation = "";
$validPassword = "";
$valiDate = "";
$flag = 1;
$userAddingvalidation = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST["name"];
    $password = $_REQUEST["password"];
    $confirmPassword = $_REQUEST["confirmPassword"];
    $date = $_REQUEST["birthday"];

    if (empty($name) || strlen($name) < 5 || !preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $validateName = "you must enter your name";
        $flag = 0;
    } else {
        $validateName = "your name is " . $name;
    }
    if (!isset($_REQUEST["gender"])) {
        $genderValidation = "select your gender";
        $flag = 0;
    } else {
        $gender = $_REQUEST["gender"];
        $genderValidation = "your gender is " . $gender;
    }
    if (empty($password) || empty($confirmPassword)) {
        $validPassword = "enter valid password ";
        $flag = 0;
    } elseif ($password != $confirmPassword) {
        $validPassword = "password not match";
        $flag = 0;
    } elseif (strlen($password) < 8) {

        $validPassword = "password must contain at least 8 characters";
        $flag = 0;
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/", $password)) {

        $validPassword = "condition  not match";
        $flag = 0;
    } else {
        $validPassword = "password correct";
    }

    if (empty($date)) {

        $valiDate = "date field is required";
        $flag = 0;
    } else {
        $valiDate = "select date is " . $date;
    }

    $profile = $_POST["profilePicPath"];
    $random=uniqid();
    $path="../../resources/profile/";
    if ($_FILES["image"]["size"] > 1000) {
        $profile = $path . $random . basename($_FILES["image"]["name"]);
        if (file_exists($profile)) {
            $random = uniqid();
            $profile = $path . $random . basename($_FILES["image"]["name"]);
        }
        if (move_uploaded_file($_FILES["image"]["tmp_name"], "../../resources/profile/" . $random . $_FILES["image"]["name"])) {
            
        }
    }



    if ($flag == 1) {

        $email = $_POST["email"];
        $flag = updateAdmin($name, $email, $password, $gender, $date,$profile);
        if ($flag) {
            header("Location: ../view/profilesettings.php");
        } else {
            $userAddingvalidation = "something went wrong. try again later";
        }
    }
}
