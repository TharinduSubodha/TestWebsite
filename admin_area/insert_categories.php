<?php
include('../includes/connect.php');

if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    // Check if a file is selected
    if (!empty($_FILES['cat_image']['name'])) {
        $file_name = $_FILES['cat_image']['name'];
        $file_tmp = $_FILES['cat_image']['tmp_name'];
        $file_type = $_FILES['cat_image']['type'];

        // Move the uploaded file to a directory (adjust the path accordingly)
        $target_directory = "./category_images/";
        $target_path = $target_directory . $file_name;

        // Check if the file is an image
        $allowed_types = array("image/jpeg", "image/png", "image/gif");
        if (in_array($file_type, $allowed_types)) {
            move_uploaded_file($file_tmp, $target_path);
        } else {
            echo "<script>alert('Invalid file type. Only JPEG, PNG, and GIF are allowed.')</script>";
            // You may redirect the user or handle the error in a different way
        }
    } else {
        // Default image if no file is selected
        $file_name = "default_image.jpg";
    }

    // Check if the category already exists in the database
    $select_query = "SELECT * FROM `categories` WHERE category_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('This category is already present in the database')</script>";
    } else {
        // Insert category information into the database
        $insert_query = "INSERT INTO `categories` (category_title, category_image) VALUES ('$category_title', '$file_name')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('Category has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error inserting category into the database')</script>";
        }
    }
}
?>

<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" enctype="multipart/form-data" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Insert Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-90 mb-3">
        <input type="file" class="form-control" name="cat_image" accept="image/jpeg, image/png, image/gif">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories" aria-label="Insert Categories" aria-describedby="basic-addon1">
    </div>
</form>