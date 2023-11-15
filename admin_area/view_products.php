
    <h3 class="text-center text-success">All products</h3>
<table class="table table-bordared mt-5">
<thead class="bg-info">
    <tr>
        <th>Prodcut ID</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class='text-light bg-secondary'>
<?php
$query = "SELECT * FROM products";
$result=mysqli_query( $con, $query );
$number=0;
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $number++;
  ?>
    <tr class="bg-secondary text-center">
        <td><?php echo $number; ?></td>
        <td><?php echo$product_title;?></td>
        <td><img src='./product_images/<?php echo$product_image1; ?>' class='product_image'/></td>
        <td><?php echo$product_price;?>/-</td>
        <td>1</td>
        <td class="bg-secondary"><a href='index.php?edit_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td class="bg-secondary"><a href='index.php?delete_product=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-trash'></i></td>
    </tr>
   
<?php
}
?>
    
    
    
</tbody>
</table>