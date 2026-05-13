<?php

include '../config/database.php';
include '../config/mail.php';
session_start();

$student_id = $_SESSION['user_id'];

$title = $_POST['title'];
$category_id = $_POST['category_id'];
$description = $_POST['description'];

$sql = "INSERT INTO complaints
(student_id, category_id, title, description)
VALUES
('$student_id', '$category_id', '$title', '$description')";

if(mysqli_query($conn, $sql)){

    $student_query = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE user_id='$student_id'"
    );

    $student = mysqli_fetch_assoc($student_query);

    $to = $student['email'];

    $subject = "Complaint Submitted";

    $message = "
        <h3>Complaint Submitted Successfully</h3>

        <p>Your complaint titled
        <b>$title</b>
        has been submitted.</p>
    ";

    sendEmail($to, $subject, $message);

    header("Location: ../student/my_complaints.php");
exit();
}
{

    echo "Failed to submit complaint.";
}

?>