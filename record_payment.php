<?php
require("connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);

    $query = "INSERT INTO orders (username, price, paymentid) VALUES ('$username', '$price', '$payment_id')";
    if (mysqli_query($conn, $query)) {
        $q="delete from order_details where username='$username'";
        $r=mysqli_query($conn,$q);
        if($r){
        echo "<script>
      // Display the custom alert
      function showAlert() {
        const alertMessage = 'Payment Successful Order Is Coming Soon !!!';
        alert(alertMessage); // Optional: Remove if you want to use a custom styled alert
      }
      showAlert();
        window.location.href = 'home.php';
    </script>
    ";
    }
    } else {
        // Show an error message
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Redirect to home page if the script is accessed incorrectly
    header("Location: home.php");
}
?>