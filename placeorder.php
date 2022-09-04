<?php
    $o=$_POST['submit'];
    $p=explode(' ',$o);
    $username=$p[1];
    $product_name=$p[2];
    $category=$p[3];
    $price=(float)$p[4];
    $discount=(float)$p[5];
    $quantity=(float)$_POST['quantity'];
    $total_price=(($price-($price*$discount/100))*$quantity);
    $conn=mysqli_connect("localhost","root","","amazon_clone");
    $query="insert into orders values ('$username','$product_name','$category','$price','$discount','$quantity','$total_price','pending')";
    mysqli_query($conn,$query);
    echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>order placed sucessfully</h1>";
?>