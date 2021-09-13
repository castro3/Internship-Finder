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
    <title>Create Faculty</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Faculty</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_faculty.php" method="post">
        <div class="form-group">
                <label for="id">ID</label>
                <input class="form-control" type="text" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="phonenumber">Phone Number</label>
                <input class="form-control" type="text" id="phonenumber" name="phonenumber">
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
                <label for="department">Department</label>
                <input class="form-control" type="text" id="department" name="department">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="faculty_login.php">Back to Faculty Login Menu</a></br>
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
            $fid = isset($_POST['id']) ? $_POST['id'] : " ";
            $fphone = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : " ";
            $fname = isset($_POST['name']) ? $_POST['name'] : " ";
            $femail = isset($_POST['email']) ? $_POST['email'] : " ";
            $fdepartment = isset($_POST['department']) ? $_POST['department'] : " ";
            
            //Insert into faculty table;
            
            $queryFaculty  = "INSERT INTO FACULTY VALUES ('".$fid."', '".$fphone."', '".$fname."', '".$femail."','".$fdepartment."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($queryFaculty) === TRUE) {
            echo "<br> New record created successfully for faculty id ".$fid;
            } else {
                echo "<br> The record was not created, the query: <br>" . $queryFaculty. "  <br> Generated the error <br>" . $conn->error;
            }

            $_SESSION['id'] = $fid;
            $_SESSION['logged_in'] = true;

            // To redirect the page to the student menu right after the query is executed, use the following statement 
            header("Location: FacultyCode/faculty_menu.php");
}
?>


</body>

</html>