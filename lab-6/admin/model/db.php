<?php
class db
{

    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "newsdb";
        $con = new mysqli($dbhost, $dbuser, $dbpass, $db);

        return $con;
    }
    function CheckUser($con, $table, $email, $password)
    {
        $status = "approved";
        $result = $con->query("SELECT * FROM " . $table . " WHERE email='" . $email . "' AND password='" . $password . "' ANd status = '" . $status . "'");
        return $result;
    }
    function CheckUserexais($con, $table, $email)
    {
        $result = $con->query("SELECT * FROM " . $table . " WHERE email='" . $email . "'");
        return $result;
    }

    function addAdmin($con, $table, $name, $email, $password, $gender, $dob, $type)
    {
        $status = "pending";
        $path = "../../resources/profile/default.png";

        $sql = "INSERT INTO " . $table . " 
        (name, email, password, gender, dob, status, image) VALUES 
        ('" . $name . "','" . $email . "','" . $password . "','" . $gender . "','" . $dob . "','" . $status . "','" . $path . "')";

        if ($con->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }


    // function ShowAll($con, $table)
    // {
    //     $result = $con->query("SELECT * FROM  $table");
    //     return $result;
    // }

    function getPendingSignupRequest($con, $table)
    {
        $result = $con->query("SELECT * FROM  $table where status = 'pending'");
        return $result;
    }

    
   

    
  function CloseCon($con)
    {
        $con->close();
    }



    //profile Page

    //function for get profile data
    function getprofiledata($con, $table, $email)
    {
        $result = $con->query("SELECT * FROM  $table where email = '" . $email . "'");
        return $result;
    }

  
    function getreport($con, $table)
    {
        $result = $con->query("SELECT * FROM  $table");
        return $result;
    }
    function deleteUser($con, $table, $email)
    {
        $result = $con->query("DELETE FROM  $table WHERE email = '" . $email . "'");
        return $result;
    }



   
    function updateAdminData($con, $table, $name, $email, $password, $gender, $dob, $profile)
    {
        $sql = "UPDATE $table set name = '" . $name . "', password='" . $password . "', gender='" . $gender . "', dob='" . $dob . "', image='" . $profile . "' where email = '" . $email . "'";

        $result = $con->query($sql);
    }
}
