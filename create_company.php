<!--
/**
 * CS 4342 Database Management
 * @author Instruction team with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file inserts a new record  into the table Student of your DB.
 */
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Create Company Account</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Company</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_company.php" method="post">
        <div class="form-group">
                <label for="id">ID</label>
                <input class="form-control" type="text" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email">
            </div> 
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input class="form-control" type="text" id="phone_number" name="phone_number">
            </div>
            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input class="form-control" type="text" id="zip_code" name="zip_code">
            </div>
            <div class="form-group">
                <label for="street_name">Street Name</label>
                <input class="form-control" type="text" id="street_name" name="street_name">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input class="form-control" type="text" id="state" name="state">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input class="form-control" type="text" id="city" name="city">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="company_login.php">Back to Company Login Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
    
    <?php
        session_start();
        require_once('config.php');
        if (isset($_POST['Submit'])){

    
            /**
             * Grab information from the form submission and store values into variables.
             */
            $cid = isset($_POST['id']) ? $_POST['id'] : " ";
            $cemail = isset($_POST['email']) ? $_POST['email'] : " ";
            $cphone = isset($_POST['phone_number']) ? $_POST['phone_number'] : " ";
            $cname = isset($_POST['name']) ? $_POST['name'] : " ";
            $czipcode = isset($_POST['zip_code']) ? $_POST['zip_code'] : " ";
            $cstreetname = isset($_POST['street_name']) ? $_POST['street_name'] : " ";
            $cstate = isset($_POST['state']) ? $_POST['state'] : " ";
            $ccity = isset($_POST['city']) ? $_POST['city'] : " ";
            
            //Insert into Company table;
            
            $queryCompany  = "INSERT INTO COMPANY VALUES ('".$cid."','".$cemail."', '".$cphone."', '".$cname."', '".$czipcode."', '".$cstreetname."', '".$cstate."', '".$ccity."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($queryCompany) === TRUE) {
            echo "<br> New record created successfully for student id ".$sid;
            } else {
                echo "<br> The record was not created, the query: <br>" . $queryCompany . "  <br> Generated the error <br>" . $conn->error;
            }

            $_SESSION['id'] = $input_id;
            $_SESSION['logged_in'] = true;

            // To redirect the page to the student menu right after the query is executed, use the following statement 
            header("Location: CompanyCode/company_menu.php");
}
?>


</body>

</html>