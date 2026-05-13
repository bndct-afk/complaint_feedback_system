<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="#">
            Complaint System
        </a>

        <div>

            <?php if(isset($_SESSION['user_id'])){ ?>

                <span class="text-white me-3">
                    <?php echo $_SESSION['name']; ?>
                </span>

                <a href="../logout.php" class="btn btn-danger btn-sm">
                    Logout
                </a>

            <?php } ?>

        </div>

    </div>

</nav>