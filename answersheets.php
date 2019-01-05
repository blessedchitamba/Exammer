<?php 
//insert.php
session_start();


/*
*Connect to db
*Store course code in session variable
*Pull out from answer sheets (name and num_questions) table all answer sheets with code = this.code
*/

// if user is not logged in
if( !$_SESSION['loggedInUser'] ) {
    
    // send them to the login page
    header("Location: index.php");
}

// connect to database
include('connection.php');

//query to fetch answer sheets
$query = "SELECT name, num_questions FROM answersheets WHERE course=".$_SESSION['selectedCourse'].;