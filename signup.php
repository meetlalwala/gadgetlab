<?php
require("connection.php");
$message = '';
$messageup = '';

if (isset($_POST['btnsubmit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $address = $_POST['address'];
    $cpassword = $_POST['conf_password'];

    // Check for empty fields
    if (empty($username) || empty($password) || empty($email) || empty($contact) || empty($address)) {
        $message = '<div style="color: red; text-align: center;">
                        Please enter the Credentials !!
                    </div>';
    } else {
        // Check if passwords match
        if ($password != $cpassword) {
            $messageup = '<div style="color: red; font-weight: bold; text-align: center;">
                            Passwords do not match !!
                          </div>';
        } else {

            // Prepare the SQL query to insert user data
            $query = "INSERT INTO `userdetails`(`username`, `password`, `email`, `contact`, `address`) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssss", $username, $password, $email, $contact, $address);

            if ($stmt->execute()) {
                // Redirect to login page on successful registration
                header("Location: login.php");
                exit();
            } else {
                $messageup = '<div style="color: red; font-size: 15px; font-weight: bold; text-align: center; padding: 7px; margin: 10px; border: 2px solid red; border-radius: 5px; background-color: #ffe0e0;">
                                Invalid Query !!
                              </div>';
            }
        }
    }
}
?>

<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">

    <title>GADGET LAB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
</head>

<style>
    .card {
        background-color: transparent;
        backdrop-filter: blur(5px);
        border: 2px solid black;
        border-radius: 30px;
        width: 600px;
        position: absolute;
        top: 11%;
        left: 55%;
        padding: 20px;

    }

    body {
        background: url(imgs/back1.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
    }
    #signupbox a {
            text-decoration: none;
            color: white;
            font-size: 16px;
        }
    #signupbox a:hover {
            text-decoration: underline;
            color: white;
            font-size: 16px;
        }
</style>




<body class=" bg-secondary">

    <div class="container my-5">
        <div class="row justify-content-center text-center">
            <div class="col-9">

                <form method="POST" enctype="multipart/form-data">

                    <div class="card">
                        <h1 class="card-header" style="font-family: 'Cormorant Garamond', serif; font-size: 35px;">Register Here</h1>
                        <div class="card-body">
                            <input type="text" name="username" value=""
                                class="form-control mb-2" placeholder="Enter Username" />
                            <span class="mb-3 text-danger"><?php echo $message ?></span>

                            <input type="password" name="password"
                                class="form-control mb-2" placeholder="Enter Password" />
                            <span class="mb-3 text-danger"><?php echo $message ?></span>
                            <span class="mb-3 text-danger"><?php echo $messageup ?>

                            <input type="password" name="conf_password"
                                class="form-control mb-2" placeholder="Enter Confirm Password" />
                            <span class="mb-3 text-danger"><?php echo $message ?>
                            <span class="mb-3 text-danger"><?php echo $messageup ?>
                            </span>

                            <input type="email" name="email" value=""
                                class="form-control mb-2" placeholder="Enter Email" />
                            <span class="mb-3 text-danger"><?php echo $message ?></span>


                            <input type="text" name="phone" value=""
                                class="form-control mb-2" placeholder="Enter Contact" />
                            <span class="mb-3 text-danger"><?php echo $message ?></span>

                            <textarea class="form-control mb-2" name="address" value="" placeholder="Enter Address" cols="5"></textarea>
                            <span class="mb-3 text-danger"><?php echo $message ?></span>


                            <button type="submit" name="btnsubmit" class="btn btn-dark mt-2">Sign Up</button>
                            <p class="mt-2 text-center text-dark " style="font-size: 17px;">Already Have Acoount!! <a class="ms-3"id="signupbox" href="login.php"> Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    -->
     
</body>

</html>