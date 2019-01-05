<?php 
//insert.php
session_start();

// if user is not logged in
if( !$_SESSION['loggedInUser'] ) {
    
    // send them to the login page
    header("Location: index.php");
}

// connect to database
include('connection.php');


if(isset($_POST['framework']))
{
   $framework = '';
   foreach($_POST['framework'] as $row)
   {
      $framework .= $row . ',';
   }

    $framework = substr($framework, 0, -1);

    //split the framework string into array
    $framework_arr = explode(',', $framework);

    //put the selected items into database
    $count = count($framework_arr);
    $index=0;
    while($index<$count){
	    //do your stuff here i.e. insert query
	    $query = "INSERT INTO does_course(user_id, code) VALUES('".$_SESSION['user_id']."', '".$framework_arr[$index]."' )";

		$result = mysqli_query( $conn, $query );  
		if( $result) {
	    		//redirect to success page
	    		$insert_alert="Courses added!";
    	} else {
    		 // something went wrong
            $insert_alert="One or more of the courses you selected is already in your list of courses.";
    	} 
	    $index++;
    }

}
?>