<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file retrieves and displays the records of the table Student.
 */
-->


<?php
/*
* Reference for tables: https://getbootstrap.com/docs/4.5/content/tables/
*/

session_start();
require_once('../config.php');
require_once('../validate_session.php');
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php 
    $currentID = $_SESSION['id'];
    $sql = "SELECT * FROM faculty where Faculty_id=$currentID";
    if ($result = $conn->query($sql)) {
    ?>
        <table class="table">
            <?php
            while ($row = $result->fetch_row()) {
            ?>
                <tr>
                    <td> ID </td>
                    <td><?php printf("%s", $row[0]); ?></td>
                </tr>
                <tr>
                    <td> Phone Number </td>
                    <td><?php printf("%s", $row[1]); ?></td>
                </tr>
                <tr>
                    <td> Name </td>
                    <td><?php printf("%s", $row[2]); ?></td>
                </tr>
                <tr>
                    <td> Email </td>
                    <td><?php printf("%s", $row[3]); ?></td>
                </tr>
                <tr>
                    <td> Department </td>
                    <td><?php printf("%s", $row[4]); ?></td>
                </tr>
                <tr>
                    <td><a href="update_faculty_interface.php?Fid=<?php echo $row[0] ?>">Update</a></td>
                </tr>
            <?php
                }
            ?>
        </table>
    <?php
    }
    ?>
    <!-- Link to return to student_menu-->
    <a href="faculty_menu.php">Back to Faculty Menu</a><br>
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>