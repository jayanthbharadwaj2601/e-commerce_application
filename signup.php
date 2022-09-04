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
            if($username==$rows['username'])
            {
                $c1+=1;
                break;
            }
        }
    }
    if($c1==0)
    {
        $query2="insert into accounts values('$username','$password')";
        mysqli_query($conn,$query2);
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>account created sucessfully,go back!</h1>";
    }
    else
    {
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>username already exists,try again!</h1>";
    }
?>