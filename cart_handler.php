<?php
require("connection.php");
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
else{
    if(isset($_POST['cart'])){
        $username=$_SESSION['username'];
        $pname=$_POST['pname'];
        $price=$_POST['price'];
        $categoryname=$_POST['categoryname'];
        $img=$_POST['img'];
        echo $username;
        $query="INSERT INTO order_details(username, pname, price, categoryname, img) VALUES ('$username','$pname','$price','$categoryname','$img')";
        $result=mysqli_query($conn,$query);

        if ($result) {
            // Ensure cart_count is an integer
            if (!isset($_SESSION['cart_count']) || !is_int($_SESSION['cart_count'])) {
                $_SESSION['cart_count'] = 0; // Initialize as integer if unset or invalid
            }
            
            $_SESSION['cart_count']++; // Increment the count
            
            header("location:home.php");
        } else {
            echo "Failed to add item to cart.";
        }
    }
}
?>