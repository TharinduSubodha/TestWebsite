<style>
.small-container{
  max-width: 100%;
  max-height: 100%;
  margin: auto;
  padding-left: 25px;
  padding-right: 25px;
}
.small-container h2{
  margin: 30px;
}

.row2{
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  justify-content: space-around;
}
.sub-title{
  margin: 0 auto 80px;
  line-height: 60px;
  color: #555;
}
.col-4{
  
  margin-bottom: 10px;
  transition:transform 0.25s;
}
.col-4 img{
  height: 100%;
  width: 100%;
}
.col-4 p{
  margin-top:10px;
  color: #555;
  text-align:center;
  font-size: large;
}
.col-4:hover{
  transform: translateY(-10px);
}

.col-4{
transition: 0.5s ease;
}

.col-4:hover{
-webkit-transform: scale(1.2);
-ms-transform: scale(1.2);
transform: scale(1.2);
transition: 0.5s ease;
}








 
</style>
</style>


<?php
// include connect file
// include('./includes/connect.php');

//getting  products
function getproducts()
{
  global $con;

  // condition to chack isset or not
  if (!isset($_GET['category'])) {

    $select_query = "Select * from `products` order by rand() limit 0,5";
    $result_query = mysqli_query($con, $select_query);
    //$row=mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $available_quantity = $row['available_quantity'];
      $product_price = $row['product_price'];
      $phone_number = $row['phone_number'];
      echo  "<div class='col-md-4 mb-2'>
                <div class='card' >
                  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'> $product_title</h5>
                    <p class='card-text'> $product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                  </div>
                </div>
              </div>";
    }
  }
}

// geting_all_products
function get_all_products()
{
  global $con;

  // condition to chack isset or not
  if (!isset($_GET['category'])) {

    $select_query = "Select * from `products` order by rand()";
    $result_query = mysqli_query($con, $select_query);
    //$row=mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $available_quantity = $row['available_quantity'];
      $product_price = $row['product_price'];
      $phone_number = $row['phone_number'];
      echo  "  <div class='col-md-4 mb-2'><div class='card' >
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'> $product_title</h5>
        <p class='card-text'> $product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
      </div>
    </div></div>";
    }
  }
}


// getting uniq categories
function get_uniq_categories_products()
{
  global $con;

  // condition to chack isset or not
  if (isset($_GET['category'])) {
    $category_id = $_GET['category'];

    $select_query = "Select * from `products` where category_id = $category_id";
    $result_query = mysqli_query($con, $select_query);

    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class = 'text-center text-danger' >No stock for this category</h2>";
    }

    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $available_quantity = $row['available_quantity'];
      $product_price = $row['product_price'];
      $phone_number = $row['phone_number'];
      echo  "  <div class='col-md-4 mb-2'><div class='card' >
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'> $product_title</h5>
        <p class='card-text'> $product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
      </div>
    </div></div>";
    }
  }
}

// displaying categories in the nav
function getcategories()
{
    global $con;
    $select_categories = "SELECT * FROM `categories`";
    $result_categories = mysqli_query($con, $select_categories);

    echo "<li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='#'  role='button' data-bs-toggle='dropdown' aria-expanded='false'>
              Select Category
            </a>
            <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li><a class='dropdown-item' href='products_of_one_category.php?category=$category_id'>$category_title</a></li>";
    }

    echo "</ul></li>";
}




// displaying categories 



function displayCategories()
{
    global $con;
    $select_categories = "SELECT * FROM `categories`";
    $result_categories = mysqli_query($con, $select_categories);

    $counter = 0; // To keep track of the number of categories displayed in a row

    echo "<div class='row'>"; // Start the first row

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        $category_image = $row_data['category_image']; // Assuming there's a column for category images in your database

        // Display the category with its respective image and title
        echo "<div class='small-container col-md-3'>
        <div class='row2 '>
        <div class='col-4'>
        <a href='products_of_one_category.php?category=$category_id'><img src='./admin_area/category_images/$category_image' alt='$category_title'></a>
        <p class='text-decoration-none' href='products_of_one_category.php?category=$category_id'>$category_title</p>
        </div>
        </div>
              
        </div>";

        $counter++;

        // If four categories have been displayed, start a new row
        if ($counter % 4 == 0) {
            echo "</div><div class='row'>"; // Start a new row
        }
    }

    echo "</div>"; // Close the last row
}


//searching products function
function search_product()
{
  global $con;

  // condition to chack isset or not
  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];
    $search_query = "Select * from `products` where product_keywords like '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);

    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class = 'text-center text-danger' >No result were found</h2>";
    }


    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $available_quantity = $row['available_quantity'];
      $product_price = $row['product_price'];
      $phone_number = $row['phone_number'];
      echo  "<div class='col-md-4 mb-2'>
              <div class='card' >
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                  <h5 class='card-title'> $product_title</h5>
                  <p class='card-text'> $product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
              </div>
            </div>";
    }
  }
}
//view details function
function view_details()
{
  global $con;

  // condition to chack isset or not
  if (isset($_GET['product_id'])) {
    if (!isset($_GET['category'])) {
      $product_id = $_GET['product_id'];
      $select_query = "Select * from `products` where product_id=$product_id";
      $result_query = mysqli_query($con, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $available_quantity = $row['available_quantity'];
        $product_price = $row['product_price'];
        $phone_number = $row['phone_number'];
        echo  "<div class='col-md-4 mb-2'>
                <div class='card' >
                  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'> $product_title</h5>
                    <p class='card-text'> $product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                  </div>
                </div>
              </div>

              <div class='col-md-8'>
                <div class='row'>
                  <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related Products</h4>
                  </div>
                  <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                  </div>
                  <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                  </div>
                </div>
              </div>";
      }
    }
  }
}

//get ip address function
function getIPAddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//cart function
function cart()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result_query = mysqli_query($con, $select_query);

    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows > 0) {
      echo "<script>alert('This item is already in crart')</script>";
      echo "<script>window.open('index.php','self')</script>";
    } else {
      $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values($get_product_id,'$get_ip_add',0)";
      $result_query = mysqli_query($con, $insert_query);
      echo "<script>alert('Item is added to cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

// functionn to get cart item function
function crat_item()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_add = getIPAddress();
    $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  } else {
    global $con;
    $get_ip_add = getIPAddress();
    $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  }

  echo $count_cart_items;
}

// total cart price function
function total_cart_price()
{
  global $con;
  $get_ip_add = getIPAddress();
  $total_price = 0;
  $cart_query = "SELECT * FROM `cart_details` where ip_address='$get_ip_add' ";
  $result = mysqli_query($con, $cart_query);
  while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_products = "Select * from `products` where product_id='$product_id'";
    $result_products = mysqli_query($con, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
      $product_price = array($row_product_price['product_price']);
      $product_values = array_sum($product_price);
      $total_price += $product_values;
    }
  }
  echo $total_price;
}


?>