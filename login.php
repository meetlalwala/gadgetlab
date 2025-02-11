<?php
session_start();
require('connection.php'); // Include database connection

$messagelogin = ''; // Store error messages

if (isset($_POST['btnsubmit'])) {
    // Sanitize inputs to prevent SQL injection
    $usernamelogin = mysqli_real_escape_string($conn, $_POST['uname']);
    $passwordlogin = mysqli_real_escape_string($conn, $_POST['pwd']);

    // Query to fetch the user
    $querylogin = "SELECT * FROM userdetails WHERE username = '$usernamelogin'";
    $result = mysqli_query($conn, $querylogin);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check admin credentials first
        if ($usernamelogin === 'admin' && $passwordlogin === 'admin') {
            header("Location: adminhome.php");
            exit();
        } else {
            // Validate password
            if ($passwordlogin === $row['password']) {
                $_SESSION['username'] = $usernamelogin;
                header("Location: home.php");
                exit();
            } else {
                $messagelogin = '<div style="color: red; font-size: 15px; font-weight: bold; text-align: center; padding: 7px; margin: 10px; border: 2px solid red; border-radius: 5px; background-color: #ffe0e0;">
                    Invalid Credentials!
                  </div>';
            }
        }
    } else {
        $messagelogin = '<div style="color: red; font-size: 15px; font-weight: bold; text-align: center; padding: 7px; margin: 10px; border: 2px solid red; border-radius: 5px; background-color: #ffe0e0;">
            Invalid Credentials!
          </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" 
          integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>GADGET LAB - Login</title>

    <style>
        body {
            background: url(imgs/back1.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }

        .card {
            background-color: transparent;
            backdrop-filter: blur(5px);
            border: 2px solid black;
            border-radius: 30px;
            width: 500px;
            position: absolute;
            top: 11%;
            left: 55%;
            padding: 20px;
        }

        .btn {
            width: 50%;
            border-radius: 10px;
        }

        .card a {
            text-decoration: none;
            color: white;
            font-size: 16px;
        }

        .card a:hover {
            text-decoration: underline;
            color: white;
        }

        h3 {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="card text-center">
            <h3 class="card-header">Sign In Now</h3>

            <form method="POST" class="card-body">
                <div class="input-group mb-4 mt-3">
                    <span class="input-group-text"><i class="fa-solid fa-user fa-lg" style="color: #000000;"></i></span>
                    <input type="text" class="form-control" placeholder="Username" name="uname" required>
                </div>

                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="fa-solid fa-key fa-lg"></i></span>
                    <input type="password" class="form-control" placeholder="Password" name="pwd" required>
                </div>

                <button type="submit" name="btnsubmit" class="btn btn-dark mb-3">LOGIN</button>

                <!-- Error message -->
                <?php if (!empty($messagelogin)): ?>
                    <div class="mb-3"><?php echo $messagelogin; ?></div>
                <?php endif; ?>

                <div>
                    <a href="#">Forgot password?</a>
                </div>

                <!-- Social icons -->
                <div class="row justify-content-center mt-4">
                    <div class="col-md-3">
                        <a href="">
                            <i class="fa-brands fa-instagram fa-xl" style="color: #a03172;"></i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#"><i class="fa-brands fa-facebook fa-xl" style="color: #1d28c3;"></i></a>
                    </div>
                    <div class="col-md-3">
                        <a href="#"><i class="fa-brands fa-twitter fa-xl" style="color: #3776e1;"></i></a>
                    </div>
                </div>

                <p class="mt-4">Don't Have an Account? <a href="signup.php">Sign Up</a></p>
            </form>
        </div>
    </div>
</body>

</html>
