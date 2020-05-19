<?php
// Get IDs
$category_id = $_POST['category_id'];

// Delete the category from the database
if($category_id != false)
require_once('database.php');
$query = "DELETE FROM categories
          WHERE categoryID = '$category_id'";
$db->exec($query);

// display the Category List page
include('category_list.php');
?>
