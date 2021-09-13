<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_POST['Iid'])){

    $iid = isset($_POST['Iid']) ? $_POST['Iid'] : " ";
    $ipay = isset($_POST['pay']) ? $_POST['pay'] : " ";
    $itimeframe = isset($_POST['time_frame']) ? $_POST['time_frame'] : " ";
    $igpa = isset($_POST['gpa']) ? $_POST['gpa'] : " ";
    $imajor = isset($_POST['major']) ? $_POST['major'] : " ";
    $iclassification = isset($_POST['classification']) ? $_POST['classification'] : " ";
    $iexpertise = isset($_POST['expertise']) ? $_POST['expertise'] : " ";
    $ipositiontitle = isset($_POST['position_title']) ? $_POST['position_title'] : " ";

    $query = "UPDATE internship_position 
            SET Pay='$ipay', Time_Frame='$itimeframe', GPA='$igpa', Major='$imajor', Classification='$iclassification', Expertise='$iexpertise', Position_title='$ipositiontitle' 
            WHERE Internship_id=$iid";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_company_internships.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No company id received on request at update company";
  die();
}

?>