
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

if (isset($_POST['Sid'])){

    $sid = isset($_POST['Sid']) ? $_POST['Sid'] : " ";
    $sname = isset($_POST['name']) ? $_POST['name'] : " ";
    $semail = isset($_POST['email']) ? $_POST['email'] : " ";
    $sgpa = isset($_POST['gpa']) ? $_POST['gpa'] : " ";
    $smajor = isset($_POST['major']) ? $_POST['major'] : " ";
    $sclassification = isset($_POST['classification']) ? $_POST['classification'] : " ";
    $sexpertise = isset($_POST['expertise']) ? $_POST['expertise'] : " ";

    $query = "UPDATE Student SET Name='$sname', Email='$semail',
              Student_Classification='$sclassification', Student_Major='$smajor',
              Student_GPA='$sgpa', Student_Expertise='$sexpertise' WHERE Student_id = $sid";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_students.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No student id received on request at update student";
  die();
}

?>
