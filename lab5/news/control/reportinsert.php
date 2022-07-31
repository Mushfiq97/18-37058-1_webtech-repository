<?php
include('../model/db.php');

$validateTitle = "";
$validateBody = "";
$success = "";
$validateCatagory="";

$path = "../../resources/news/";
$image = "";
$random = rand();
$flag = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_REQUEST["title"];
    $body = $_REQUEST["body"];
    $catagory = $_REQUEST["catagory"];



    if (empty($title)) {
        $validateTitle = "you must enter your title";
        $flag = 0;
    }
    if(strlen($title)>500)
    {
        $validateTitle="Title is too large";
        $flag=0;
    }
    if (empty($body)) {
        $validateBody = "you must enter body";
        $flag = 0;
    }
    if(strlen($body)>5000)
    {
        $validateTitle="Body is too large";
        $flag=0;

    }

    if ($_FILES["image"]["size"] > 1000) {
        $image = $path . $random . basename($_FILES["image"]["name"]);
        if (file_exists($image)) {
            $random = rand();
            $image = $path . $random . basename($_FILES["image"]["name"]);
        } elseif (move_uploaded_file($_FILES["image"]["tmp_name"], "../../resources/news/" . $random . $_FILES["image"]["name"])) {
        
        }
    }

    if (empty($catagory)) {
        $validateCatagory = "Select your catagory";
        $flag = 0;
    } 





    if ($flag == 1) {
        $connection = new db();
        $conobj = $connection->openCon();
        $userQuery = $connection->insertNews($conobj, "news", $title, $body, $image, $catagory);
        if ($userQuery) {
            $success="successful!";
        }
        else{
            $success="data not inserted";
        }
    }
}
