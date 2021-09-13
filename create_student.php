<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file creates the user for the DB, that can create students, e.g., the admin creating student records in the system.
 */



-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Student Account</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Student Account</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_student.php" method="post">
                <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="id">ID</label>
                <input class="form-control" type="text" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email">
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
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="student_login.php">Back to Student Login Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
        <!-- PhP code starts here -->
    <?php
        require_once('config.php');
        
        if (isset($_POST['Submit'])){

    
    /**
     * Grab information from the form submission and store values into variables.
     */
    $sid = isset($_POST['id']) ? $_POST['id'] : " ";
    $sname = isset($_POST['name']) ? $_POST['name'] : " ";
    $semail = isset($_POST['email']) ? $_POST['email'] : " ";
    $sgpa = isset($_POST['gpa']) ? $_POST['gpa'] : " ";
    $smajor = isset($_POST['major']) ? $_POST['major'] : " ";
    $sclassification = isset($_POST['classification']) ? $_POST['classification'] : " ";
    $sexpertise = isset($_POST['expertise']) ? $_POST['expertise'] : " ";

    //Insert into Student table;
    $queryUser  = "INSERT INTO STUDENT (Student_id, Name, Email,
                Student_Classification, Student_Major, Student_GPA,
                 Student_Expertise) VALUES ('".$sid."', '".$sname."', '".$semail."',
                 '".$sclassification."', '".$smajor."', '".$sgpa."', '".$sexpertise."');";
    if ($conn->query($queryUser) === TRUE) {
       echo "New user created successfully with the id: ".$sid."</p>";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }

    $_SESSION['id'] = $sid;
    $_SESSION['logged_in'] = true;
    // If you want to redirect without seeing messages printed, uncomment the following line:
    header("Location: studentsCode/student_menu.php");
}
?>


</body>

</html>