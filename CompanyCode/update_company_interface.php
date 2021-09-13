<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file provides an example of how to separate the interface for the user , e.g., PhP from from the program logic, e.g., PhP statements.
 */
-->


<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['Cid'])) {
    $cid = $_GET['Cid'];
    $sql = "SELECT * FROM Company where Company_id = $cid";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No company id received on request at update_company_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Company Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update Company</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <!-- Displaying a form with the information of the user so values can be modified 
             Note that the ID is not shown to be modified, only other attributes. -->

        <form action="update_company.php" method="post">
            <input type="hidden" name="Cid" id="Cid" value="<?php echo $row['Company_id'] ?>">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="<?php echo $row['Email'] ?>">
            </div>
            <div class="form-group">
                <label for="phonenumber">Phone Number</label>
                <input class="form-control" type="text" id="phonenumber" name="phonenumber" value="<?php echo $row['Phone_number'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['Name'] ?>">
            </div>
            <div class="form-group">
                <label for="zipcode">Zip Code</label>
                <input class="form-control" type="text" id="zipcode" name="zipcode" value="<?php echo $row['Zip_code'] ?>">
            </div>
            <div class="form-group">
                <label for="streetname">Street Name</label>
                <input class="form-control" type="text" id="streetname" name="streetname" value="<?php echo $row['Street_name'] ?>">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input class="form-control" type="text" id="state" name="state" value="<?php echo $row['State'] ?>">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input class="form-control" type="text" id="city" name="city" value="<?php echo $row['City'] ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Update">
            </div>
        </form>
        <div>
            <br>
            <a href="company_menu.php">Back to Company Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>