<?php

class db
{
    function openCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "newsdb";
        $con = new mysqli($dbhost, $dbuser, $dbpass, $db);

        return $con;
    }


    function deletenews($con, $id)
    {
        $result = $con->query("DELETE FROM  news WHERE id = '" . $id . "'");
        return $result;
    }
    
    
    
   function insertNews($con, $table, $title,$body,$image,$catagory)
    {
        $sql = "INSERT INTO " . $table . " (title,body,images,catagory) VALUES ('" . $title . "','" . $body . "','" . $image . "','" . $catagory . "')";
        if ($con->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function getsentnews($con)
    {
        $result = $con->query("SELECT * FROM news");
        return $result;
    }

    function closeCon($con)
    {
        $con->close();
    }
}