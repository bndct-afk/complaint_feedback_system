<?php
include '../config/database.php';
include '../includes/student_auth.php';
include '../includes/header.php';
include '../includes/navbar.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>


<div class="container mt-5">

    <h2 class="mb-4">My Complaints</h2>

    <a href="submit_complaint.php" class="btn btn-primary mb-3">
        Submit New Complaint
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php

        $query = "
        SELECT complaints.*,
               categories.category_name
        FROM complaints
        JOIN categories
        ON complaints.category_id = categories.category_id
        WHERE student_id = '$user_id'
        ORDER BY complaints.created_at DESC
        ";

        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){
        ?>

            <tr>

                <td>
                    <?php echo $row['title']; ?>
                </td>

                <td>
                    <?php echo $row['category_name']; ?>
                </td>

                <td>
                    <?php echo $row['status']; ?>
                </td>

                <td>
                    <?php echo $row['created_at']; ?>
                </td>

                <td>

    <a
        href="../actions/delete_complaint.php?id=<?php echo $row['complaint_id']; ?>"
        class="btn btn-danger btn-sm"
        onclick="return confirm('Delete this complaint?')"
    >
        Delete
    </a>

</td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

<?php include '../includes/footer.php'; ?>
