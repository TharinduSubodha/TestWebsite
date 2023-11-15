<?php
if(isset($_GET['edit_category'])){
    $edit_category = $_GET['edit_category'];
    $get_category = "SELECT * FROM categories WHERE category_id = $edit_category";
    $result = mysqli_query($con, $get_category);
    $row = mysqli_fetch_assoc($result);
    
    $category_title = $row["category_title"];
    $category_image = $row["category_image"];
}

if(isset($_POST['edit_cat'])){
    $cat_title = $_POST['category_title'];

    // Check if a file is selected
    if(isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
        $image_temp = $_FILES['category_image']['tmp_name'];
        $image_name = $_FILES['category_image']['name'];
        $image_path = "./category_images/" . $image_name; // Specify the path where you want to store the uploaded image

        // Move the uploaded file to the specified path
        move_uploaded_file($image_temp, $image_path);

        // Update the database with only the image filename
        $update_query = "UPDATE categories SET category_title='$cat_title', category_image='$image_name' WHERE category_id = $edit_category";
    } else {
        // If no file is selected, use the existing category_image
        $update_query = "UPDATE categories SET category_title='$cat_title' WHERE category_id = $edit_category";
    }

    $result_cat = mysqli_query($con, $update_query);
    if($result_cat){
        echo "<script>alert('Category is updated successfully')</script>";
        echo "<script>window.open('Category is updated successfully')</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category-title" class="form-label">Enter a new Category Title</label>
            <input type="text" name="category_title" id="category-title" class="form-control" required="required" value='<?php echo $category_title; ?>'>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category-image" class="form-label">Select a new Category Image</label>
            <input type="file" name="category_image" id="category-image" class="form-control">
        </div>
        <input type="submit" class="btn btn-info px-3 mb-3" value="Update Category" name="edit_cat">
    </form>
</div>
