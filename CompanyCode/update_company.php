
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

if (isset($_POST['Cid'])){

    $cid = isset($_POST['Cid']) ? $_POST['Cid'] : " ";
    $cemail = isset($_POST['email']) ? $_POST['email'] : " ";
    $cphone = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : " ";
    $cname = isset($_POST['name']) ? $_POST['name'] : " ";
    $czipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : " ";
    $cstreetname = isset($_POST['streetname']) ? $_POST['streetname'] : " ";
    $cstate = isset($_POST['state']) ? $_POST['state'] : " ";
    $ccity = isset($_POST['city']) ? $_POST['city'] : " ";

    $query = "UPDATE Company SET Email='$cemail', Phone_number='$cphone', Name='$cname', Zip_code='$czipcode',
             Street_name='$cstreetname', State='$cstate', City='$ccity' WHERE Company_id = $cid";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_companies.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No company id received on request at update company";
  die();
}

?>
