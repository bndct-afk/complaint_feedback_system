<?php
include 'config/database.php';
include 'includes/session.php';
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5" style="max-width:500px;">

    <h2 class="mb-4">Login</h2>

    <form action="actions/login_action.php" method="POST">

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Login
        </button>

    </form>

    <p class="mt-3">
        Don't have an account?
        <a href="register.php">Register Here</a>
    </p>

</div>

<?php include 'includes/footer.php'; ?>