<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgroMart website</title>
  <!-- bootstrapp CSS lik -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-color: white;
    }


    .navbar .navbar-nav .nav-link:hover {
      background-color: #006400;
      color: white;
    }

    .navbar .navbar-nav .nav-link {
      padding: 0.6em;
      font-size: 1.2em;
      transition: all 0.5s;
    }

    .navbar .navbar-brand {
      padding: 0 0.6em;
      font-size: 1.5em;
      font-weight: bold;
    }

    @media only screen and (min-width: 992px) {
      .navbar {
        padding: 0;
      }

      .navbar .navbar-nav .nav-link {
        padding: 1em 0.7em;
      }

      .navbar .navbar-brand {
        padding: 0 0.8em;
      }
    }


    .mySlides {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .center {
      max-width: 80%;
      margin: auto;

    }

    .slider {
      margin-bottom: 40px;
    }

    .logo {
      width: 4%;
      height: 4%;
    }
  </style>
</head>

<body>
  <!-- navbar-->

  <div class="container-fluid p-2">
    <!-- first child-->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: green; ">
      <div class="container-fluid">
        <img src="./images/logo.png" alt="" class="logo ms-3 rounded-circle">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto  fs-5 ">
            <li class="nav-item ms-3 ">
              <a class="nav-link " aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all_products.php">Products</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" a href="./users_area/user_insert_product.php">Insert products</a>
            </li>
            <?php
            if (!isset($_SESSION['user_name'])) {
              echo "<li class='nav-item'>
  <a class='nav-link'  href='./users_area/user_login.php'>Login</a>
  </li>";
            } else {
              echo "<li class='nav-item'>
  <a class='nav-link'  href='./users_area/logout.php'>LogOut</a>
  </li>";
            }
            ?>

            <li class="nav-item">
              <?php getcategories(); ?>
            </li>

            <li class="nav-item ms-5">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php crat_item(); ?></sup> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Total Price: <?php total_cart_price(); ?>/-</a>
            </li>

          </ul>
          <form class="d-flex me-3" action="search_product.php" method="get">
            <input class="form-control me-2 px-2 py-2 fs-5" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-light fs-5" name="search_data_product">
          </form>
        </div>
    </nav>
    <!-- calling cart function -->
    <?php
    cart();
    ?>

    <!-- second child  -->
    <div class="center">


      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="welcomer">

              Welcome to AgroMart
            </h1>
          </div>
        </div>
      </div>

      <!-- second child part 2  -->




      <div class="slider">
        <img class="mySlides" src="./images/img1.jpg" style="width:100%;">
        <img class="mySlides" src="./images/img2.jpg" style="width:100%;">
        <img class="mySlides" src="./images/img2.jpg" style="width:100%">

      </div>

      <script>
        var myIndex = 0;
        carousel();

        function carousel() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          myIndex++;
          if (myIndex > x.length) {
            myIndex = 1
          }
          x[myIndex - 1].style.display = "block";
          setTimeout(carousel, 2000); // Change image every 2 seconds
        }
      </script>



      <div class="category-container">

        <?php displayCategories();
        get_uniq_categories_products(); ?>
      </div>






      <!-- forth child  -->
      <!-- products  -->
      <div class="category-container">


        <div class="category-container">

          <?php displayCategories();
          get_uniq_categories_products(); ?>
        </div>
      </div>
      <!-- columnend  -->


    </div>








    <!-- last child -->
    <!--include footer -->
    <?php include("./footer.php") ?>

  </div>
  </div>



  <!-- bootstrapp js lik -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</body>

</html>