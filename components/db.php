<?php

function createDb(){
    // declaring all the imported user detail for entering into the database
    $servename = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DonationApp";

    // creating a connection to the MYSQL Database
    $con = mysqli_connect($servename, $username, $password);

    // checking if the connection is working or not
    if(!$con){
        die("Connection Failed: ".mysqli_connect_error());
    }

    // creating database for our project
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)) {
        $con = mysqli_connect($servename, $username, $password, $dbname);

        // specifying how the database table is to be created, ID with auto_increment, name and person name not null, deposit amount can be in decimals.
        $sql = "CREATE TABLE IF NOT EXISTS donations(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            person_name VARCHAR(25) NOT NULL,
            place_name VARCHAR(20) NOT NULL,
            amount_deposited FLOAT 
        );
        ";

        // check whether the table is created succesfully or not
        if(mysqli_query($con, $sql)){
            return $con;
        } else {
            echo "Cannot Create Table..!";
        }

    } else {

        // check if the database was created or not
        echo "Error while creating database ". mysqli_error($con);
    }

}

?>