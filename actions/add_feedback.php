<?php

include '../config/database.php';
session_start();

$student_id = $_SESSION['user_id'];

$message = $_POST['message'];
$rating = $_POST['rating'];

$sql = "
INSERT INTO feedback
(student_id, message, rating)
VALUES
('$student_id', '$message', '$rating')
";

if(mysqli_query($conn, $sql)){

    header("Location: ../student/dashboard.php");
exit();

} else {

    echo "Failed to submit feedback.";

}

?>