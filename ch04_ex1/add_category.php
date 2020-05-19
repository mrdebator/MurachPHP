<?php
$name = $_POST['categoryName'];
// Validate inputs
if ($name == null) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "INSERT INTO categories
                 (categoryName)
              VALUES
                 (:name)";
    $statement = $db->prepare($query);
    $statement -> bindValue (':name', $name);
    $statement -> execute();
    $statement -> closeCursor();
    // Display the Category List page
    include('category_list.php');
}
?>
