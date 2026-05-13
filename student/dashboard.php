<?php
include '../includes/student_auth.php';
include '../includes/navbar.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">

  <h2>Student Dashboard</h2>

<p>Welcome, <?php echo $_SESSION['name']; ?>!</p>

<a href="submit_complaint.php" class="btn btn-primary">
    Submit Complaint
</a>

<a href="my_complaints.php" class="btn btn-success">
    My Complaints
</a>

<a href="feedback.php" class="btn btn-warning">
    Submit Feedback
</a>

<a href="../logout.php" class="btn btn-danger">
    Logout
</a>

</div>

<?php include '../includes/footer.php'; ?>