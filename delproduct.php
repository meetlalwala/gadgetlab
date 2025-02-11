<?php
  $con = mysqli_connect('localhost', 'root', '', 'gadget_db');

  if(isset($_GET['pid']))
  {
    $pid=$_GET['pid'];
    $q="delete from product where pid='$pid'";
    $res=mysqli_query($con,$q);  

    if($res==0)
    {
        echo "Not Deleted...";
    }
    else{
        header("location:productlist.php");
    }
  }
 


?>