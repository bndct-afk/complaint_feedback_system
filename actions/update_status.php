<?php

include '../config/database.php';
include '../config/mail.php';

$complaint_id = $_POST['complaint_id'];
$status = $_POST['status'];

$sql = "
UPDATE complaints
SET status = '$status'
WHERE complaint_id = '$complaint_id'
";

if(mysqli_query($conn, $sql)){

    $query = "
    SELECT complaints.title,
           users.email
    FROM complaints

    JOIN users
    ON complaints.student_id = users.user_id

    WHERE complaints.complaint_id = '$complaint_id'
    ";

    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($result);

    $to = $data['email'];

    $subject = "Complaint Status Updated";

    $message = "
        <h3>Complaint Status Updated</h3>

        <p>Your complaint:
        <b>{$data['title']}</b>
        is now marked as:
        <b>$status</b></p>
    ";

    sendEmail($to, $subject, $message);

    header("Location: ../admin/complaints.php");
exit();

} else {

    echo "Failed to update status.";

}

?>