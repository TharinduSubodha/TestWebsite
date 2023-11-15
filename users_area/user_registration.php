<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
  <!-- bootstrapp CSS lik -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container-flid my-3">
    <h2 class="text-center">New User Registration</h2>
    <diw class="row d-flex align-items-center justify-content-center  mt-5">
      <div class="col-lg-12 col-xl-6">
        <form action="" method="post" enctype="multipart/form-data">
          <!-- user name -->
          <div class="form-outline mb-4">
            <label for="user_username" class="form-lable">Username</label>
            <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
          </div>
          <!-- user email -->
          <div class="form-outline mb-4">
            <label for="user_email" class="form-lable">Email</label>
            <input type="email" id="user_email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name="user_email">
          </div>
          <!-- user password -->
          <div class="form-outline mb-4">
            <label for="user_password" class="form-lable">Password</label>
            <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
          </div>
          <!-- user confirm-password -->
          <div class="form-outline mb-4">
            <label for="conf_user_password" class="form-lable">Confirm Password</label>
            <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_user_password">
          </div>
          <!-- user address -->
          <div class="form-outline mb-4">
            <label for="user_address" class="form-lable">Address</label>
            <input type="text" id="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required="required" name="user_address">
          </div>
          <!-- user contact -->
          <div class="form-outline mb-4">
            <label for="user_contact" class="form-lable">Contact</label>
            <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact">
          </div>

          <div class="mt-4 pt-2">
            <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
            <p class="small fw-bold mt-2 pt-1 mb-0"> Alreaady have an account ? <a href="user_login.php" class="text-danger text-decoration-none"> Login </a></p>
          </div>

        </form>
      </div>

    </diw>
  </div>
</body>

</html>

<!-- php code -->
<?php

if(isset($_POST['user_register'])){
  $user_username=$_POST['user_username'];
  $user_email=$_POST['user_email'];
  $user_password=$_POST['user_password'];
  $hash_password =password_hash($user_password,PASSWORD_DEFAULT);
  $conf_user_password=$_POST['conf_user_password'];
  $user_address=$_POST['user_address'];
  $user_contact=$_POST['user_contact'];
  $user_ip=getIPAddress();

//SELECT QUERY
$select_query = "SELECT * FROM `user_table` WHERE user_name = '$user_username' OR user_email = '$user_email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);

if($rows_count>0){
  echo "<script> alert ('username and email already exist')</script>";
}

else if($user_password!= $conf_user_password){
  echo "<script> alert ('password does not match')</script>";
}


else{
  // insert query
$insert_query = "INSERT INTO `user_table` (user_name,	user_email,	user_password,	user_ip,	user_address,	user_mobile) values ('$user_username', '$user_email', '$user_password', '$user_ip','$user_address', '$user_contact')";

$sql_execute=mysqli_query($con,$insert_query);
}


// SELECTING CART ITEMS
$select_cart_items="SELECT * FROM  `cart_details` WHERE ip_address ='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
  $_SESSION['username']=$user_username;
  echo "<script> alert ('you have items in your cart')</script>";
  echo "<script> window.open('checkout.php', '_self')</script>";
}else{
  echo "<script> window.open('../index.php', '_self')</script>";

}








}
?>













