
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadget Lab</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-VK2zcvntEufaimc+efOYi622VN5ZacdnufnmX7zIhCPmjhKnOi9ZDMtg1/ug5l183f19gG1/cBstPO4D8N/Img==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <link rel="bootstrap.min.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet " href="style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
  <style>
    .nav-item{
    font-size: 21px;
  }
    </style>
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
       
  </div>
</div>
</div>
</div>


      
      </div>
    </div>
    
  </nav>


  <?php
  if(isset($_POST['submit']))
{
  $con=mysqli_connect('localhost','root','','gadget_db');
  $name=$_POST['name'];
  $email=$_POST['email'];
  $message=$_POST['message'];

  $q="insert into contactus values ('','$name','$email','$message')";

  $res=mysqli_query($con,$q);

  if($res)
  {
    $message = "Inserted Successfully";
  }
  else{
    echo "error to insert";
  }
}
?>
    <div class="container-fluid px-5 my-5">
        <div class="row justify-content-center">
        <?php if (!empty($message)): ?>
          <div class="text-center container justify-content-center align-content-center" style="background-color: #66ff66; height:40px; width:600px; border-radius: 7px; font-weight:bold;"><?php echo $message; ?></div>
        <?php endif; ?>
          <div class="col-xl-10">
            <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
              <div class="card-body p-0">
                <div class="row g-0">
                  <div class="col-sm-6 d-none d-sm-block bg-image"></div>
                  <div class="col-sm-6 p-4">
                    <div class="text-center">
                      <div class="h3 fw-light mb-3" style="font-weight: bolder;" ><h2>Contact Us</h2></div>
                      
                    </div>
      
                   
      
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post">
      
                      
                      <div class="form-floating mb-3">
                        <input class="form-control" name="name" id="name" type="text" placeholder="Name" data-sb-validations="required" />
                        <label for="name">Name</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                      </div>
      
                      
                      <div class="form-floating mb-3">
                        <input class="form-control" name="email" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                        <label for="emailAddress">Email Address</label>
                        <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                      </div>
      
                      
                      <div class="form-floating mb-3">
                        <textarea class="form-control" name="message" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
                        <label for="message">Message</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
                      </div>
      
                      
                      <!-- <div class="d-none" id="submitSuccessMessage">
                      
                        <div class="text-center mb-3">
                          <div class="fw-bolder">Form submission successful!</div>
                          <p>Thank you for getting in touch!</p>
                          <a href="/">GadgetLab <i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                      </div> -->
      
                      
                      <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                      </div>
      
                      
                      <div class="d-grid">
                        <button class="btn btn-primary btn-lg" id="submitButton" type="submit" name="submit">Submit</button>
                      </div>
                    </form>
                    
      
                  </div>
                </div>
      
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>



      



      <footer class="text-center text-lg-start bg-light text-muted">

    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

      <div class="me-5 d-none d-lg-block">
        <span></span>
      </div>

      <div>

        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>

        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>

      </div>

    </section>

    <section class="">
      <div class="container text-center text-md-start mt-5">

        <div class="row mt-3">

          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

            <h6 class="text-uppercase fw-bold mb-4">
              <img src="imgs/logonoback.png" style="height: 100px; width: auto;">
              <h2>GadgetLab</h2>
            </h6>
            <p>
              sdfghjklsdjdhbkdfv
              fakjfkjanklfwfakjbfkjawkfklawnkfaw
              fakijwfjabwfjawbk
            </p>
          </div>


          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset">Angular</a>
            </p>
            <p>
              <a href="#!" class="text-reset">React</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Vue</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Laravel</a>
            </p>
          </div>


          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>

          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Surat, Gujarat 395007, INDIA</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              GadgetLab@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> +91 1234567890</p>
            <p><i class="fas fa-print me-3"></i> +91 1231231231</p>
          </div>

        </div>

      </div>
    </section>

    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">GADGETLAB.com</a>
    </div>



  </footer>
        
</body>
</html>