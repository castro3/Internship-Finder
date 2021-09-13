<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file deletes a record  from the table Student of your DB.
 */
-->


<?php 

session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['Fid'])){

    $fid = $_GET['Fid'];
    $query = "DELETE from Faculty where Faculty_id = $fid";

    if ($conn->query($query) === TRUE) {
        echo "Faculty deleted successfuly";
        header("Location: view_faculty.php");
     } else {
         echo "Error: " . $query . "<br>" . $conn->error;
     }
} else{
    echo "No Fid received";
    header("Location: view_faculty.php");
}

?>