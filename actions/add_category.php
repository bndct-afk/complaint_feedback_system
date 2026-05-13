<?php

include '../config/database.php';

$category_name = $_POST['category_name'];

$sql = "
INSERT INTO categories(category_name)
VALUES('$category_name')
";

if(mysqli_query($conn, $sql)){

   header("Location: ../admin/categories.php");
exit();

} else {

    echo "Failed to add category.";

}

?>