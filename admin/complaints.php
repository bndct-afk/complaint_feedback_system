<?php
include '../config/database.php';
include '../includes/admin_auth.php';
include '../includes/navbar.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">

    <h2 class="mb-4">Manage Complaints</h2>

    <form method="GET" class="row mb-4">

    <div class="col-md-4">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search title..."
            value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"
        >
    </div>

    <div class="col-md-3">

        <select name="status" class="form-control">

            <option value="">All Status</option>

            <option value="Pending">Pending</option>

            <option value="Ongoing">Ongoing</option>

            <option value="Resolved">Resolved</option>

        </select>

    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">
            Filter
        </button>
    </div>

</form>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Student</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php

       $search = isset($_GET['search']) ? $_GET['search'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

$query = "
SELECT complaints.*,
       users.name,
       categories.category_name
FROM complaints

JOIN users
ON complaints.student_id = users.user_id

JOIN categories
ON complaints.category_id = categories.category_id

WHERE complaints.title LIKE '%$search%'
";

if($status != ''){
    $query .= " AND complaints.status = '$status'";
}

$query .= " ORDER BY complaints.created_at DESC";

        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){
        ?>

            <tr>

                <td>
                    <?php echo $row['name']; ?>
                </td>

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

                    <form
                        action="../actions/update_status.php"
                        method="POST"
                    >

                        <input
                            type="hidden"
                            name="complaint_id"
                            value="<?php echo $row['complaint_id']; ?>"
                        >

                        <select
                            name="status"
                            class="form-control mb-2"
                        >
                           <option value="Pending"
<?php if($status == 'Pending') echo 'selected'; ?>>
Pending
</option>

                           <option value="Ongoing"
<?php if($status == 'Ongoing') echo 'selected'; ?>>
Ongoing
</option>

                           <option value="Resolved"
<?php if($status == 'Resolved') echo 'selected'; ?>>
Resolved
</option>
                        </select>

                        <button
                            type="submit"
                            class="btn btn-success btn-sm"
                        >
                            Update
                        </button>

                    </form>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

<?php include '../includes/footer.php'; ?>