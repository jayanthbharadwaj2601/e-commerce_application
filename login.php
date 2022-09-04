<?php
    $username=$_POST["username"];
    $password=$_POST["password"];
    $conn=mysqli_connect("localhost","root","","amazon_clone");
    $query="select * from accounts";
    $c1=0;
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result))
    {
        while($rows=mysqli_fetch_assoc($result))
        {
            if($username==$rows['username'] && $password==$rows['password'])
            {
                $c1+=1;
                break;
            }
        }
    }
    if($c1==0)
    {
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>invalid username/password!</h1>";
    }
    else
    {
        // echo "<form action='status.php' method='POST'>";
        // echo"<input type='submit' name='submit' value='check_status $username'  style='color:white; background-color:black; width:90px;'";
        // echo "</form><br><br>";
        $conn=mysqli_connect("localhost","root","","amazon_clone");
        $query1="select * from orders";
        $result1=mysqli_query($conn,$query1);
        if(mysqli_num_rows($result1))
        {
            echo "<table align='center' border=5 style='font-family: Arial, Helvetica, sans-serif;'>";
        echo "<tr>";
        echo "<th>product_name","</th>";
        echo "<th>category","</th>";
        echo "<th>price","</th>";
        echo "<th>discount","</th>";
        echo "<th>quantity","</th>";
        echo "<th>total_price","</th>";
        echo "<th>status","</th>";
        echo "</tr>";
        while($row=mysqli_fetch_assoc($result1))
        {
            $a2=$row['product_name'];
            $a3=$row['Category'];
            $a4=$row['price'];
            $a5=$row['discount'];
            $a6=$row['quantity'];
            $a7=$row['total_price'];
            $a8=$row['status'];
            if($row['customer_id']==$username)
            {
                echo "<tr>";
                echo "<td name='product_name'>",$a2,"</td>";
                echo "<td name='Category'>",$a3,"</td>";
                echo "<td name ='price'>",$a4,"</td>";
                echo "<td name='discount'>",$a5,"</td>";
                echo "<td name='quantity'>",$a6,"</td>";
                echo "<td name='total_price'>",$a7,"</td>";
                echo "<td name='total_price'>",$a8,"</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        }
        echo "<hr>";
        $query="select * from products";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result))
        {
            while($rows=mysqli_fetch_assoc($result))
            {
                $o=$rows['image_url'];
                $p=$rows['product_name'];
                $q=$rows['Category'];
                $r=$rows['price'];
                $s=$rows['discount'];
                echo "<div align='center'>";
                echo '<form action="placeorder.php" method="POST" style:"font-family: Arial, Helvetica, sans-serif;">';
                echo "<img name='image_url' src='$o' width='150px'> &nbsp";
                echo "<p style='font-family: Arial, Helvetica, sans-serif;'>";
                echo '<b>product-name:</b>',$p,'<br> <br>','<b>Category:</b>',$q,'<br> <br>','<b>Price:</b>',$r,'<br> <br>','<b>Discount:</b>',$s,'<br>';
                echo "</p>";
                echo "<input type 'number' name='quantity' placeholder='enter quantity' required style='padding: 12px 20px;margin: 8px 0; box-sizing: border-box;'> <br><br>"; 
                echo "<input type='submit' name='submit' value='placeorder $username $p $q $r $s' style='color:white;background-color:black;width:75px; font-family: Arial, Helvetica, sans-serif;'>";
                echo "</form>";
                echo "</div>";
                echo "<hr>";
            }
        }
    }

?>