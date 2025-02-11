<?php
  $con = mysqli_connect('localhost', 'root', '', 'gadget_db');

  if(isset($_GET['pname']))
  {
    $pname=$_GET['pname'];
    $q="delete from order_details where pname='$pname'";
    $res=mysqli_query($con,$q);  

    if($res==0)
    {
        echo "Not Deleted...";
    }
    else{
        header("location:cart.php");
    }
  }
 


?>