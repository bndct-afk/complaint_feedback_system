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

    <div class="card shadow p-4">

        <h2 class="mb-4">Submit Feedback</h2>

        <form action="../actions/add_feedback.php" method="POST">

            <div class="mb-3">

                <label>Feedback Message</label>

                <textarea
                    name="message"
                    class="form-control"
                    rows="5"
                    required
                ></textarea>

            </div>

            <div class="mb-3">

                <label>Rating</label>

                <select
                    name="rating"
                    class="form-control"
                    required
                >

                    <option value="">Select Rating</option>

                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>

                </select>

            </div>

            <button type="submit" class="btn btn-primary">
                Submit Feedback
            </button>

        </form>

    </div>

</div>

<?php include '../includes/footer.php'; ?>
