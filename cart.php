<?php
require("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gadget Lab</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-VK2zcvntEufaimc+efOYi622VN5ZacdnufnmX7zIhCPmjhKnOi9ZDMtg1/ug5l183f19gG1/cBstPO4D8N/Img==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <link rel="bootstrap.min.css">
   <link rel="stylesheet " href="{{asset('/style1.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
    <style>
        
        .cart-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .cart-item img {
            max-width: 300px;
            max-height: 260px;
            margin-right: 20px;
        }

        .total {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }

        .checkout-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            margin-top: 20px;
            cursor: pointer;
        }
        .nav-item{
    font-size: 21px;
  }
    </style>
</head>
<body>
</head>
<body>


  <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
    <div class="container-fluid">
      <h1><a class="navbar-brand ms-4" style="font-family: 'Cormorant Garamond', serif; font-size: 29px;" href="#">GADGETLAB</a></h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav m-auto">
          <li class="nav-item ms-2">
            <a class="nav-link active" href="home.php">Home
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link" href="contactus.php">Contact Us</a>
          </li>
        </ul>
         <form class="d-flex">
            <input class="form-control me-sm-2" type="search" placeholder="Search" >
          <button class="btn btn-secondary my-2 my-sm-0  me-5" type="submit"><i class="bi bi-search"></i></button>
        </form>
    
       

      

   <a href="login.php"> <i class="fa-regular fa-user me-4" style="color: #01060e; font-size: x-large;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></a>
    <a href="cart.php"><i class="fa-solid fa-cart-shopping me-3" style="color: #02060d; font-size: x-large;"></i></a> 
        <!-- Button trigger modal -->

<!-- Login page -->

  <!--END Login page -->
    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
  </div>
</div>
</div>
</div>


      
      </div>
    </div>
    
  </nav>




    <div class="container mt-4">
        <h1 styel="font-weight: bolder;" class="mb-4"><?php echo $_SESSION['username'];?>'s Cart</h1>
        <!-- @if($message=Session::get('success'))
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @endif -->
       
        <div class="row">
          <div class="col-md-7">

           <?php
          if(!isset($_SESSION['username'])){
              header("location:login.php");
          }
          else{
      
               $q="select * from order_details";
              $res=mysqli_query($conn,$q);

              while($row=mysqli_fetch_assoc($res))
              {   
              
           ?>
                <div class="cart-item" style=" border-radius: 20px; box-shadow: 0 0 5px;">
                    <div class="row">
                        <div class="col-5">
                    <img style="border-radius: 20px;" src="<?php echo $row['img']?>" alt="Product 1">
                        </div>
                        <div class="col-6 mt-5">
                    <h2><?php echo $row['pname']?></h2>
                    <p><?php echo $row['categoryname']?></p>
                    <p>Price: ₹<?php echo $row['price']?></p>
                    <?php echo '<a href="ord_del.php ?pname='.$row['pname'].'"class="btn btn-danger">Remove</a>'  ?>
                        </div>
                       
                    </div>
                    
                </div>
              <?php  
              }
            }
              ?>
               
               <!-- Add more cart items as needed -->
            </div>

            <?php 
            $user=$_SESSION['username'];
               $q1="select sum(price) as total from order_details where username='$user'";
               $res1=mysqli_query($conn,$q1);
               $row1=mysqli_fetch_assoc($res1);
            ?>

            <div class="col-md-3 ms-5">
                <div class="total">
                    Total : <?php echo  $row1['total']?>
                </div>
                <button class="btn-checkout btn btn-primary" style="width: 150px;" id="checkout-button">Checkout</button>


            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Popper.js and jQuery are required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            
    <script>
const checkoutButton = document.getElementById("checkout-button");
checkoutButton.addEventListener("click", () => {
    const grandTotal = <?php echo $row1['total'] ?? 0; ?>;
    const username = "<?php echo $_SESSION['username']; ?>";

    if (grandTotal <= 0) {
        alert("Cart is empty!");
        return;
    }

    const options = {
        key: "rzp_test_zHhNFsppG7bIjH",
        amount: (grandTotal * 100).toFixed(0), // Amount in paise
        currency: "INR",
        name: "Gadget Lab",
        description: "Order Payment",
        image: "imgs/delycious.png",
        handler: function (response) {
            const form = document.createElement("form");
            form.method = "POST";
            form.action = "record_payment.php";
            form.innerHTML = `
                <input type="hidden" name="username" value="${username}">
                <input type="hidden" name="price" value="${grandTotal.toFixed(2)}">
                <input type="hidden" name="payment_id" value="${response.razorpay_payment_id}">
            `;
            document.body.appendChild(form);
            form.submit();
        },
        prefill: {
            name: username,
            email: "user@example.com",
            contact: "9876543210",
        },
        theme: {
            color: "#F37254",
        },
    };

    const razorpay = new Razorpay(options);
    razorpay.open();
});

</script>


<!-- rzp_test_zHhNFsppG7bIjH -->
</body>
</html>
