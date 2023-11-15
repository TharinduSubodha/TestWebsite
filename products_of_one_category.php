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
  
</head>

<div class="row px-3">
      <div class="col-md-10">
        <!-- products  -->
        <div class="row">

          <!-- fetching products  -->
          <?php
          //calling function
          
          get_uniq_categories_products();

          // $ip = getIPAddress();
          // echo 'User Real IP Address - ' . $ip;

          ?>


          <!-- row end  -->
        </div>
        <!-- columnend  -->
      </div>