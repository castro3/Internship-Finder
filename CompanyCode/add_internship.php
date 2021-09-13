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
    <title>Add Internship</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Add Internship</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="add_internship.php" method="post">
        <div class="form-group">
                <label for="id">ID</label>
                <input class="form-control" type="text" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="pay">Pay</label>
                <input class="form-control" type="text" id="pay" name="pay">
            </div>
            <div class="form-group">
                <label for="time_frame">Time Frame</label>
                <input class="form-control" type="text" id="time_frame" name="time_frame">
            </div>
            <div class="form-group">
                <label for="gpa">GPA</label>
                <input class="form-control" type="text" id="gpa" name="gpa">
            </div>
            <div class="form-group">
                <label for="major">Major</label>
                <input class="form-control" type="text" id="major" name="major">
            </div>
            <div class="form-group">
                <label for="classification">Classification</label>
                <input class="form-control" type="text" id="classification" name="classification">
            </div>
            <div class="form-group">
                <label for="expertise">Expertise</label>
                <input class="form-control" type="text" id="expertise" name="expertise">
            </div>
            <div class="form-group">
                <label for="position_title">Position Title</label>
                <input class="form-control" type="text" id="position_title" name="position_title">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="view_company_internships.php">Back to Company Internships</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
    
    <?php
        session_start();
        require_once('../config.php');
        require_once('../validate_session.php');
        if (isset($_POST['Submit'])){
            /**
             * Grab information from the form submission and store values into variables.
             */
            $iid = isset($_POST['id']) ? $_POST['id'] : " ";
            $ipay = isset($_POST['pay']) ? $_POST['pay'] : " ";
            $itimeframe = isset($_POST['time_frame']) ? $_POST['time_frame'] : " ";
            $icompanyid = $_SESSION['id'];
            $istudentid = "0";
            $igpa = isset($_POST['gpa']) ? $_POST['gpa'] : " ";
            $imajor = isset($_POST['major']) ? $_POST['major'] : " ";
            $iclassification = isset($_POST['classification']) ? $_POST['classification'] : " ";
            $iexpertise = isset($_POST['expertise']) ? $_POST['expertise'] : " ";
            $ipositiontitle = isset($_POST['position_title']) ? $_POST['position_title'] : " ";
            
            
            //Insert into Internship_position table;
            $query = "INSERT INTO internship_position VALUES ('".$iid."', '".$ipay."', '".$itimeframe."', '".$icompanyid."', '".$istudentid."', '".$igpa."',
                     '".$imajor."', '".$iclassification."', '".$iexpertise."', '".$ipositiontitle."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($query) === TRUE) {
                
                header("Location: view_company_internships.php");
                echo "<br> New record created successfully for recommendation id ".$iid;
                } else {
                    echo "<br> The record was not created, the query: <br>" . $query . "  <br> Generated the error <br>" . $conn->error;
                }
            
} 
?>
    
</body>
    
</html>