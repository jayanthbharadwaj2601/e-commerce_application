<?php
    $product_name=$_POST['product_name'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $discount=$_POST['discount'];
    $image_url=$_POST['image_url'];
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
    if($c1>0)
    {
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>product already exists!try again</h1>";
    }
    else
    {
        $query2="insert into products values('$product_name','$category','$price','$discount','$image_url')";
        mysqli_query($conn,$query2);
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>product added sucessfully! go back</h1>";
    }
?>