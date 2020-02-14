<?php

    session_start();


    const DB_HOST = "localhost";
    const DB_NAME = "manga++";
    const DB_USER = "root";
    const DB_PASS = "";
    
    

    //Return an mysql_result
    function q($sql){
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        return $mysqli->query($sql);
    }
    
    //return an array of arrays
    function qFetch($query){
        $rep=array();
        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $rep[]=$row;
        }
        return $rep;
    }