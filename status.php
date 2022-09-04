<?php
    $conn=mysqli_connect("localhost","root","","amazon_clone");
    $list=$_POST['submit'];
    $p=explode(' ',$list);
    $query="select * from orders";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result))
    {
        echo "<table border=1>";
        echo "<tr>";
        echo "<td>product_name","</td>";
        echo "<td>category","</td>";
        echo "<td>price","</td>";
        echo "<td>discount","</td>";
        echo "<td>quantity","</td>";
        echo "<td>total_price","</td>";
        echo "<td>status","</td>";
        echo "</tr>";
        while($row=mysqli_fetch_assoc($result))
        {
            $a2=$row['product_name'];
            $a3=$row['Category'];
            $a4=$row['price'];
            $a5=$row['discount'];
            $a6=$row['quantity'];
            $a7=$row['total_price'];
            $a8=$row['status'];
            if($row['customer_id']==$p[1])
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
    }
?>