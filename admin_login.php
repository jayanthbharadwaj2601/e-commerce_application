<?php
    $username=$_POST["username"];
    $password=$_POST["password"];
    if($username=="Admin@123" && $password=="HelloAdmin")
    {
        $conn=mysqli_connect("localhost","root","","amazon_clone");
        $query="select * from orders";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result))
        {
            echo "<table border=5 align='center' style='font-family: Arial, Helvetica, sans-serif;'>";
            echo "<tr>";
                echo "<th>customer_id","</th>";
                echo "<th>product_name","</th>";
                echo "<th>category","</th>";
                echo "<th>price","</th>";
                echo "<th>discount","</th>";
                echo "<th>quantity","</th>";
                echo "<th>total_price","</th>";
                echo "<th>status","</th>";
                echo "</tr>";
            while($row=mysqli_fetch_assoc($result))
            {
                $a1=$row['customer_id'];
                $a2=$row['product_name'];
                $a3=$row['Category'];
                $a4=$row['price'];
                $a5=$row['discount'];
                $a6=$row['quantity'];
                $a7=$row['total_price'];
                $a8=$row['status'];
                echo "<form action='execute_order.php' method='POST'>";
                echo "<tr>";
                echo "<td name='customer_id'>",$a1,"</td>";
                echo "<td name='product_name'>",$a2,"</td>";
                echo "<td name='Category'>",$a3,"</td>";
                echo "<td name ='price'>",$a4,"</td>";
                echo "<td name='discount'>",$a5,"</td>";
                echo "<td name='quantity'>",$a6,"</td>";
                echo "<td name='total_price'>",$a7,"</td>";
                echo "<td name='total_price'>",$a8,"</td>";
                echo "<td border='0'> <input type='submit'  name='submit'value='executeorder $a1 $a2 $a3 $a4 $a5 $a6 $a7 $a8' style='color:white;background-color:black;width:92px;'></td>";
                echo "</tr>";
                echo "</form>";
            }
            echo "</table>";
            echo "<hr>";
        }
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
        body
        {
            font-family: Arial, Helvetica, sans-serif;
        }
        .p1
        {
            padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
        }


/* CSS */
.button-1 {
  background-color: #EA4C89;
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 40px;
  line-height: 20px;
  list-style: none;
  margin: 0;
  outline: none;
  padding: 10px 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: color 100ms;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-1:hover,
.button-1:focus {
  background-color: #F082AC;
}
    </style>
        </head>
        <body>
            <div id="container" align="center">
            <h1>Add New Product</h1>
            <form action="add_product.php" method="POST">
                <input type="text" name="product_name" class="p1" placeholder="product name"><br> <br>
                <input type="text" name="category" class="p1" placeholder="category"><br> <br>
                <input type="number" name="price" class="p1" placeholder="price"><br> <br>
                <input type="number" name="discount" class="p1" placeholder="discount"><br> <br>
                <input type="text" name="image_url" class="p1" placeholder="image_url"><br><br>
                <input type="submit" name="submit" class="button-1" value="add">
            </form>
            <hr>
            <h1>Update price/discount of a product</h1>
            <form action="update_product.php" method="POST">
                <input type="text" name="product_name" class="p1" placeholder="product name"><br> <br>
                <input type="number" name="price" class="p1" placeholder="price"><br> <br>
                <input type="number" name="discount" class="p1" placeholder="discount"><br> <br>
                <input type="submit" name="submit" class="button-1" value="update">
            </form>
            </div>
        </body>';
    }
    else
    {
        echo "Invalid Credentials!";
    }
    
?>