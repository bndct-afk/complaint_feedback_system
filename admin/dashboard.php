<?php include '../includes/admin_auth.php';?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/navbar.php'; ?>
<?php include '../config/database.php'; ?>

<?php

$pending_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM complaints WHERE status='Pending'"
);

$ongoing_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM complaints WHERE status='Ongoing'"
);

$resolved_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM complaints WHERE status='Resolved'"
);

$pending = mysqli_fetch_assoc($pending_query)['total'];
$ongoing = mysqli_fetch_assoc($ongoing_query)['total'];
$resolved = mysqli_fetch_assoc($resolved_query)['total'];

?>

<div class="container mt-5">

    <h2>Admin Dashboard</h2>

    <p>Welcome Admin, <?php echo $_SESSION['name']; ?>!</p>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card text-center p-3">

                <h4>Pending</h4>

                <h2><?php echo $pending; ?></h2>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center p-3">

                <h4>Ongoing</h4>

                <h2><?php echo $ongoing; ?></h2>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center p-3">

                <h4>Resolved</h4>

                <h2><?php echo $resolved; ?></h2>

            </div>
        </div>

    </div>

    <div class="mt-5">

        <canvas id="complaintChart"></canvas>

    </div>

    <div class="mt-4">
<a href="complaints.php" class="btn btn-primary">
    Manage Complaints
</a>

<a href="feedbacks.php" class="btn btn-success">
    View Feedbacks
</a>

<a href="categories.php" class="btn btn-warning">
    Manage Categories
</a>

<a href="../logout.php" class="btn btn-danger">
    Logout
</a>
    </div>

</div>

<script>

document.addEventListener("DOMContentLoaded", function(){

    const ctx = document.getElementById('complaintChart');

    new Chart(ctx, {

        type: 'bar',

        data: {

            labels: ['Pending', 'Ongoing', 'Resolved'],

            datasets: [{

                label: 'Complaint Statistics',

                data: [
                    <?php echo $pending; ?>,
                    <?php echo $ongoing; ?>,
                    <?php echo $resolved; ?>
                ],

                borderWidth: 1

            }]
        },

        options: {
            responsive: true
        }

    });

});

</script>

<?php include '../includes/footer.php'; ?>