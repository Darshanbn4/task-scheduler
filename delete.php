<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "taskm"; // Change this to your database name

// Create a database connection
$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['task_no'])) {
    $task_no = $_GET['task_no'];

    // SQL query to delete the row with the specified empid
    $sql = "DELETE FROM `tasks` WHERE `task_no` = '$task_no'";

    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }

    // Redirect back to the page where the delete button was clicked
    header("Location: s.php"); // Change to your actual page URL
    exit;
} else {
    echo "Invalid tasno parameter.";
}

mysqli_close($con);
?>
