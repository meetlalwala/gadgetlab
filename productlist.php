
<?php
require("adminnavbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Gadget Lab</title>
  <link rel="stylesheet" href="{{asset('sidebarstyle.css')}}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  body{
 background: url(imgs/back8.jpg);
 background-repeat: no-repeat;
 background-attachment: fixed;
 background-size: cover;
 background-position: center;
}
.sidebar
{
  
    background-color: transparent;
    backdrop-filter: blur(5px); 

}

.scrolling-wrapper {
    display: flex;
    overflow-x: auto;
    gap: -3rem;
    padding: 20px 0;
    scrollbar-width: none;
    margin-left: 10px;
  }

  
  .scrolling-wrapper::-webkit-scrollbar {
    display: none;
  }

  .card {
    flex: 0 0 auto; 
    width: 18rem;
    margin-top: 30px;
    border-radius: 20px;
  }

 </style>
<body>
 
    <div class="row">
    </div>

    <div class="container">

        <div class="mt-4" style="  position: absolute; left: 90%;"><a href="addproduct.php" class="btn btn-primary">Add Products</a></div>
        <div class="scrolling-wrapper mt-4 ms-4">
        
 
<?php
  $con = mysqli_connect('localhost', 'root', '', 'gadget_db');

  $q="select * from product";
  $res=mysqli_query($con,$q);

  while($row=mysqli_fetch_assoc($res))
  {
    
 
?>

            <div class="col-3 m-2 ms-2 ">
                <div class="card shadow-lg" style="width: 18rem;">
                    <img style="border-radius: 20px;" src="<?php echo $row['img']?>" class="card-img-top" alt="..." height="250" width="100">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['pname']?></h5>
                      <p class="card-text"><?php echo $row['price']?></p>
                      <p class="card-text"><?php echo $row['pdesc']?></p>
                    <?php  echo '<a href="editproduct.php ?pid='.$row['pid'].'" class="btn  btn-outline-primary me-3">Update</a>' ?>
                    <?php  echo '<a href="delproduct.php ?pid='.$row['pid'].'" class="btn  btn-outline-primary me-3">Delete</a>' ?>
                    </div>
                </div>
            </div>

       <?php
       }
       ?>
        </div>
    </div>
    
      
</body>
</html>