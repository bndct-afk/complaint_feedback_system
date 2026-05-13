<?php
include '../config/database.php';
include '../includes/admin_auth.php';
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/navbar.php'; ?>

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2>Manage Categories</h2>

        <form action="../actions/add_category.php" method="POST">

            <div class="mb-3">

                <input
                    type="text"
                    name="category_name"
                    class="form-control"
                    placeholder="Enter category"
                    required
                >

            </div>

            <button type="submit" class="btn btn-primary">
                Add Category
            </button>

        </form>

        <hr>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                </tr>
            </thead>

            <tbody>

            <?php

            $query = "SELECT * FROM categories";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($result)){
            ?>

                <tr>

                    <td>
                        <?php echo $row['category_id']; ?>
                    </td>

                    <td>
                        <?php echo $row['category_name']; ?>
                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

<?php include '../includes/footer.php'; ?>