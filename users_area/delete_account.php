
<h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="from-outline" mb-4>
            <input type="submit" class="form-contorl w-50" name="delete" value="Delete Account">
        </div>

        <div class="from-outline" mb-4">
            <input type="submit" class="form-contorl w-50" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>

    <?php
$username_session=$_SESSION['user_name'];
if(isset($_POST['delete'])){
    $delete_query="DELETE FROM user_table WHERE user_name = '$username_session'";
  $result=mysqli_query($con,$delete_query);
    if($result){
      session_destroy();
      echo "<script>alert ('Account Deleted Succesfully')</script>";
      echo "<script>window.open('../index.php','_self')</script>"; 
    }
}
if(isset($_POST['dont_delete'])){
  echo "<script>window.open('profile.php','_self')</script>";
}
?>
