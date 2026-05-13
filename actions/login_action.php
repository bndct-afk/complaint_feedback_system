<?php

include '../config/database.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $user = mysqli_fetch_assoc($result);

    if($password == $user['password']){

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] == 'admin'){
           header("Location: ../admin/dashboard.php");
exit();
        } else {
           header("Location: ../student/dashboard.php");
exit();
        }

    } else {
        echo "Invalid Password";
    }

} else {
    echo "User not found";
}

?>