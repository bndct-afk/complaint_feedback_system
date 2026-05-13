<?php

include '../config/database.php';

$id = $_GET['id'];

$sql = "DELETE FROM complaints WHERE complaint_id='$id'";

if(mysqli_query($conn, $sql)){

   header("Location: ../student/my_complaints.php");
exit();

} else {

    echo "Failed to delete complaint.";

}

?>