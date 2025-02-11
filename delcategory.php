<?php
  $con = mysqli_connect('localhost', 'root', '', 'gadget_db');

  if(isset($_GET['cid']))
  {
    $cid=$_GET['cid'];
    $q="delete from category where cid='$cid'";
    $res=mysqli_query($con,$q);  

    if($res==0)
    {
        echo "Not Deleted...";
    }
    else{
        header("location:categorylist.php");
    }
  }
 


?>