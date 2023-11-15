<?php

$con = mysqli_connect('localhost', 'root', '', 'agromart');
if (!$con) {
    die(mysqil_error($con));
    //echo"connected";
}
// else{
//     die(mysqli_error($con));
// }

?>