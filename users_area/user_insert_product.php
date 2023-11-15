<?php
include('../includes/connect.php');


session_start();
if (!isset($_SESSION['user_name'])) {
    
    header("Location: ../redirect.php");
    exit();
}

if (isset($_POST['insert_product'])) {
    //accessing
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_categories = $_POST['product_categories'];
    $available_quantity = $_POST['available_quantity'];
    $product_price = $_POST['product_price'];
    $phone_number = $_POST['phone_number'];
    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //accessing image temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //checking empty conditions
    if ($product_title == '' or $product_description == '' or $product_keywords == '' or $product_categories == '' or $available_quantity == '' or $product_price == '' or $phone_number == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '') {
        echo "<script>alert('please fill all the available feilds')</script>";
        exit();
    } else {
        //images product_images file ekata move karanawa
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        //insert query to insert products
        $insert_products = "insert into `products` (product_title,product_description,product_keywords,category_id,product_image1,product_image2,product_image3,available_quantity,product_price,phone_number,date)
                                            values('$product_title','$product_description','$product_keywords','$product_categories','$product_image1','$product_image2','$product_image3',$available_quantity,'$product_price','$phone_number',NOW())";
        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('successfully inserted the products')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-admin dashboard</title>

    <!-- bootstrapp CSS lik -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css part -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!--Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!--Title -->

            <!--Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>
            <!--Description -->

            <!--Keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keyword</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div>
            <!--keyword -->

            <!--Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select a category</option>
                    <?php
                    $select_query = "Select * from `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value=' $category_id'>$category_title</option>";
                    }

                    ?>

                </select>
            </div>
            <!--Categories -->

            <!--Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <!--Image 1  -->

            <!--Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <!--Image 2  -->

            <!--Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            <!--Image 3  -->


            <!--Avilabale quantity -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="available_quantity" class="form-label">Avilabale quantity</label>
                <input type="text" name="available_quantity" id="available_quantity" class="form-control" placeholder="Enter Avilabale quantity" autocomplete="off" required="required">
            </div>
            <!--Avilabale quantity -->

            <!--price for one-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">price for one</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter price for one" autocomplete="off" required="required">
            </div>
            <!--price for one -->

            <!--Telephone number-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="phone_number" class="form-label">Telephone number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Enter Telephone number" autocomplete="off" required="required">
            </div>
            <!--Telephone number-->

            <!--Submit button-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
            <!--Submit button-->

        </form>
    </div>

</body>

</html>