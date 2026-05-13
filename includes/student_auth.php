<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: ../login.php");
    exit();

}

if($_SESSION['role'] != 'student'){

    header("Location: ../admin/dashboard.php");
    exit();

}

?>