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
    
    

    function getAprrovedadmin($con, $table,$data)
    {
        if($data){
            $result = $con->query("SELECT * FROM  $table where name like '%$data%' and status = 'approved'");

        }
        else{
            $result = $con->query("SELECT * FROM  $table where status = 'approved'");
        }
        return $result;
    }

   
    function CloseCon($con)
    {
        $con->close();
    }
    //profile Page

    //function for get profile data
    
}
