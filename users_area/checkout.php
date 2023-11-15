<?php
include('../includes/connect.php');
include('../functions/common_function.php');
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
</head>

<body>
  <!-- navbar-->
  <div class="container-fluid p-0">
    <!-- first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="./images/logo.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            </li>
            
            <?php
            if(isset($_SESSION['user_name'])){
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/profile.php'>My Account</a>
            </li>";
            }else{
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/user_registraion.php'>register</a>
            </li>";
            }
          ?>

            <li class="nav-item">
              <a class="nav-link" href="#">Cantact</a>
            </li>

          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>

    <!-- calling cart function -->

    <!-- second child  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Welcome guest</a>
        </li>

        <?php
          if(!isset(!$_SESSION['user_name'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user_login.php'>Login</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='logout.php'>Log Out</a>
          </li>";
          }
          ?>
      </ul>
    </nav>

    <!-- third child  -->
    <div class="bg-light">
      <h3 class="text-center">Hidden store</h3>
      <p class="text-center">Communication is the heart of e-commerce and community</p>
    </div>


    <!-- forth child  -->
    <div class="row px-3">
      <div class="col-md-12">
        <!-- products  -->
        <div class="row">

          <?php
          if (!isset($_SESSION['user_name'])) {   //change username to user_name
            include('user_login.php');
          }
          ?>

        </div>
        <!-- columnend  -->
      </div>
    </div>


    <!-- last child -->
    <!--include footer -->
    <?php include("../includes/footer.php") ?>

  </div>

  <!-- bootstrapp js lik -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</body>

</html>