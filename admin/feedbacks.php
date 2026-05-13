<?php
include '../config/database.php';
include '../includes/admin_auth.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/navbar.php'; ?>

<div class="container mt-5">

    <h2 class="mb-4">Student Feedbacks</h2>

    <table class="table table-striped table-bordered">

        <thead>
            <tr>
                <th>Student</th>
                <th>Message</th>
                <th>Rating</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>

        <?php

        $query = "
        SELECT feedback.*,
               users.name
        FROM feedback

        JOIN users
        ON feedback.student_id = users.user_id

        ORDER BY feedback.created_at DESC
        ";

        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){
        ?>

            <tr>

                <td>
                    <?php echo $row['name']; ?>
                </td>

                <td>
                    <?php echo $row['message']; ?>
                </td>

                <td>
                    <?php echo $row['rating']; ?>/5
                </td>

                <td>
                    <?php echo $row['created_at']; ?>
                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

<?php include '../includes/footer.php'; ?>