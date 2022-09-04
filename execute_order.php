<?php
    $list=$_POST['submit'];
    $p=explode(' ',$list);
    $customer_id=$p[1];
    $product_name=$p[2];
    $category=$p[3];
    $price=$p[4];
    $discount=$p[5];
    $quantity=$p[6];
    $total_price=$p[7];
    $status=$p[8];
    if($status=="executed")
    {
        echo "order delivered already!";
    }
    else
    {
        $conn=mysqli_connect("localhost","root","","amazon_clone");
        $query="update orders set status='executed' where customer_id='$p[1]' and product_name='$p[2]' and Category='$p[3]' and price='$p[4]' and discount='$p[5]' and quantity='$p[6]'";
        mysqli_query($conn,$query);
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>order executed sucessfully! go back</h1>";
    }
?>