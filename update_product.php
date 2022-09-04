<?php
    $product_name=$_POST['product_name'];
    $price=$_POST['price'];
    $discount=$_POST['discount'];
    $conn=mysqli_connect("localhost","root","","amazon_clone");
    $query="select * from products";
    $c1=0;
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result))
    {
        while($rows=mysqli_fetch_assoc($result))
        {
            if($product_name==$rows['product_name'])
            {
                $c1+=1;
                break;
            }
        }
    }
    if($c1==0)
    {
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>product does not exist!</h1>";
    }
    else
    {
        $query2="update products set price='$price' where product_name='$product_name'";
        mysqli_query($conn,$query2);
        $query3="update products set discount='$discount' where product_name='$product_name'";
        mysqli_query($conn,$query3);
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>product updated sucessfully! go back</h1>";
    }
?>