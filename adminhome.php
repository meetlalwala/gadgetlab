<?php
require("adminnavbar.php");
require('connection.php');


$q="select count(*) as user from userdetails";
$q1="select sum(price) as total from orders";

$res=mysqli_query($conn,$q);
$res1=mysqli_query($conn,$q1);

$row=mysqli_fetch_assoc($res);
$row1=mysqli_fetch_assoc($res1);

?>

<style>
  h2{
    color: rgb(107, 103, 103);
  }
  th,td {
  border-bottom: 1px solid #ddd;
  color: black;
  padding: 20px;
}

table{
  height: 200px;
  width: 1000px;
  background-color: white;
  border-radius: 13px;
  /* backdrop-filter: blur(7px);
  border: 1px solid black;
  border-spacing: 0;
  border-collapse: separate; */
}

/* tr:hover {
  background-color: grey;
  border-radius: 10px;
}; */

  </style>
<section class="main">
    <div class="main-top">
      <h2 style="color: white;">Admin Panel</h2>
    </div>
    <div class="main-skills">
      <div class="card--main">
        <i class="fa-solid fa-users"></i>
        <h3>Users</h3>
        <p style="font-size: 15px;"><?php echo $row['user']?> </p>
      </div>
      <div class="card--main">
        <i class="fa-solid fa-list-check"></i>
        <h3>Categories</h3>
        <a class="btn" href="categorylist.php">Show More...</a>

      </div>
      <div class="card--main">
        <i class="fa-solid fa-car"></i>
        <h3>Products</h3>
        <a class="btn" href="productlist.php">Show More...</a>

      </div>
      <div class="card--main">
        <i class="fa-solid fa-sack-dollar"></i>
        <h3>Revenue</h3>
        <p style="font-size: 15px;"><?php echo $row1['total']?>  RS</p>
        

      </div>
    </div>
    
    <?php

$con=mysqli_connect('localhost','root','','gadget_db');

$qry="select * from orders";

$res=mysqli_query($con,$qry);

echo "<div class='container'>";
echo "<center>";
echo '<h3 class="mt-5" style="color: white;">Orders</h3>';
echo "<table class='mt-2 text-center'>";
echo '<tr>';
echo "<th>OrderID";
echo "<th>Username";
echo "<th>Amount";
echo "<th>PaymentID";
echo "</tr>";

while($row=mysqli_fetch_assoc($res))
{
    echo "<tr>";
    echo "<td>".$row['orderid'];
    echo "<td>".$row['username'];
    echo "<td>".$row['price'];
    echo "<td>".$row['paymentid'];
   echo "</tr>";

}

echo "</table>";
?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</body>
</html>