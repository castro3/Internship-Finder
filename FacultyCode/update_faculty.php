
<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 */
-->

<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_POST['Fid'])){

    $fid = isset($_POST['Fid']) ? $_POST['Fid'] : " ";
    $fphone = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : " ";
    $fname = isset($_POST['name']) ? $_POST['name'] : " ";
    $femail = isset($_POST['email']) ? $_POST['email'] : " ";
    $fdepartment = isset($_POST['department']) ? $_POST['department'] : " ";

    $query = "UPDATE Faculty SET Phone_number='$fphone', Name='$fname', Email='$femail', Department='$fdepartment' WHERE Faculty_id = $fid";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_faculty.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No faculty id received on request at update faculty";
  die();
}

?>
