<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'project7';

    //Creating database connect
    $con = mysqli_connect($host,$user,$password,$database);

    //Checking Database Connection
    if(!$con) {
        die("Connection Failed: ". mysqli_connect_error());
    }else {
       // echo "Connected Succefully";
    }


?>