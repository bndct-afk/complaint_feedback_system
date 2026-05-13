<?php
include '../config/database.php';
include '../includes/student_auth.php';
include '../includes/header.php';
include '../includes/navbar.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}
?>


<div class="container mt-5" style="max-width:700px;">

    <h2 class="mb-4">Submit Complaint</h2>

    <form
    name="complaintForm"
    action="../actions/add_complaint.php"
    method="POST"
    onsubmit="return validateComplaintForm()"
>

        <div class="mb-3">
            <label>Complaint Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Category</label>

            <select name="category_id" class="form-control" required>

                <option value="">Select Category</option>

                <?php

                $query = "SELECT * FROM categories";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($result)){
                ?>

                    <option value="<?php echo $row['category_id']; ?>">
                        <?php echo $row['category_name']; ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea
                name="description"
                class="form-control"
                rows="5"
                required
            ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Submit Complaint
        </button>

    </form>

</div>

<?php include '../includes/footer.php'; ?>
