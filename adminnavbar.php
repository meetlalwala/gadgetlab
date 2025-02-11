<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Gadget Lab Admin</title>
  <link rel="stylesheet" href="admin.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!--Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
span{
  color: white;
}
.sidebar a:hover{
  background: black;
}
  </style>

</head>
<body>
  <div class="container--main">
    <div class="sidebar">
      <ul>
        <li><a href="#" class="logo">
          <img src="imgs/logo-black.png" alt="">
          <span class="nav--item">DashBoard</span>
        </a></li>
        <li><a href="adminhome.php">
          <i class="fas fa-home" style="color: white;"></i>
          <span class="nav--item">Home</span>
        </a></li>
        
        <li><a href="categorylist.php">
          <i class="fas fa-tasks" style="color: white;"></i>
          <span class="nav--item">Category</span>
        </a></li>

        <li><a href="productlist.php">
          <i class="fas fa-chart-bar" style="color: white;"></i>
          <span class="nav--item">Products</span>
        </a></li>
         <!-- <li><a href="#">
          <i class="fas fa-cog"></i>
          <span class="nav--item">Settings</span>
        </a></li>  -->

        <li><a href="login.php" class="logout">
          <i class="fas fa-sign-out-alt" style="color: white;"></i>
          <span class="nav--item">Log out</span>
        </a></li>
      </ul>
    </div>