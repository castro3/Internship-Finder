<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['Iid'])) {
    $iid = $_GET['Iid'];
    $sql = "SELECT * FROM internship_position where Internship_id = $iid";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No faculty id received on request at update_faculty_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Internship Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update Internship</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <!-- Displaying a form with the information of the user so values can be modified 
             Note that the ID is not shown to be modified, only other attributes. -->

        <form action="update_internship.php" method="post">
            <input type="hidden" name="Iid" id="Iid" value="<?php echo $row['Internship_id'] ?>">
            <div class="form-group">
                <label for="pay">Pay</label>
                <input class="form-control" type="text" id="pay" name="pay" value="<?php echo $row['Pay'] ?>">
            </div>
            <div class="form-group">
                <label for="time_frame">Time Frame</label>
                <input class="form-control" type="text" id="time_frame" name="time_frame" value="<?php echo $row['Time_Frame'] ?>">
            </div>
            <div class="form-group">
                <label for="gpa">GPA</label>
                <input class="form-control" type="text" id="gpa" name="gpa" value="<?php echo $row['GPA'] ?>">
            </div>
            <div class="form-group">
                <label for="major">Major</label>
                <input class="form-control" type="text" id="major" name="major" value="<?php echo $row['Major'] ?>">
            </div>
            <div class="form-group">
                <label for="classification">Classification</label>
                <input class="form-control" type="text" id="classification" name="classification" value="<?php echo $row['Classification'] ?>">
            </div>
            <div class="form-group">
                <label for="expertise">Expertise</label>
                <input class="form-control" type="text" id="expertise" name="expertise" value="<?php echo $row['Expertise'] ?>">
            </div>
            <div class="form-group">
                <label for="position_title">Position Title</label>
                <input class="form-control" type="text" id="position_title" name="position_title" value="<?php echo $row['Position_title'] ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Update">
            </div>
        </form>
        <div>
            <br>
            <a href="view_company_internships.php">Back to View Internships</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>