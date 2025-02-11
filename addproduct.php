
<!DOCTYPE html>
<html lang="en">
<head>
   
<?php
ob_start();
require("adminnavbar.php");
?>


<?php
$con = mysqli_connect('localhost', 'root', '', 'gadget_db');

// Initialize an error message variable
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pname = mysqli_real_escape_string($con, $_POST['pname']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $categoryname = mysqli_real_escape_string($con, $_POST['categoryname']);
    $pdesc = mysqli_real_escape_string($con, $_POST['pdesc']);
    $img = $_FILES['img']['name']; // Assuming you're handling image uploads
    $img_tmp = $_FILES['img']['tmp_name'];

    // Check if the category already exists
    $check_query = "SELECT * FROM product WHERE pname = '$pname'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $message = '<div style="color: red; font-weight: bold;">Product already exists!</div>';
    } else {
        // Move the uploaded image to a specific folder
        $target_dir = "uploads";
        $target_file = $target_dir . basename($img);
        move_uploaded_file($img_tmp, $target_file);

        // Insert the new category
        $query = "INSERT INTO product VALUES ('', '$pname', '$price' ,  '$categoryname' , '$pdesc', '$target_file')";
        if (mysqli_query($con, $query)) {
            $message = '<div style="color: green; font-weight: bold;">Product added successfully!</div>';
        } else {
            $message = '<div style="color: red; font-weight: bold;">Failed to add Product. Please try again.</div>';
        }
    }
}
?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gadget Lab</title>

    <style>
        #box{
           
            height:630px;
            width: 900px;
            background-color: transparent;
            backdrop-filter: blur(5px); 
            border: 2px solid black;
            border-radius: 30px;
            position: absolute;
            top: 5%;
            left: 30%;
        }
        
        

    </style>
</head>

<body>
        

        <div id="box" class="container justify-content-center align-content-center ">
           
          <!-- Display message -->
          <?php if (!empty($message)): ?>
            <div class="text-center container justify-content-center align-content-center" style="background-color:  #ffb3b3; height:40px; width:600px; border-radius: 7px;"><?php echo $message; ?></div>
        <?php endif; ?>

            <h1 class="display-3 text-center">Add Product </h1>
            <div class="row justify-content-center align-content-center">
                <div class="col-lg-8 ">
                    <form action="#" method="post" enctype="multipart/form-data">
                       
                        
                        <div class="input-group mt-3">
                            <input type="text" class="form-control" placeholder="Product name" aria-label="Username" aria-describedby="basic-addon1" name="pname" required>
                        </div>
                        <span class="mb-3 text-danger">
                        </span>

                        <div class="input-group mt-3">
                            <input type="number" class="form-control" placeholder="Price" aria-label="Username" aria-describedby="basic-addon1" name="price"  required>
                        </div>
                        <span class="mb-3 text-danger">
                        </span>

 
                        <?php

                            $con=mysqli_connect('localhost','root','','gadget_db');

                            $qry="select * from category";

                            $res=mysqli_query($con,$qry);

                           
                        ?>

                        <div class="input-group mt-3">
                            <label class="mt-1 me-2" for="categoryname">Category:</label>
                            <select class="form-control" id="productCategory" name="categoryname" required>
                            <?php
                            while($row=mysqli_fetch_assoc($res))
                            {
                            ?>
                                <option value="<?php echo $row['categoryname']?>"><?php echo $row['categoryname']?></option>;
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        

                        <div class="form-floating mt-4">
                            <textarea id="query" class="form-control" style="height: 180px;" placeholder="enter query" name="pdesc"  required></textarea>
                            <label for="query">Product Description</label>
                        </div>
                        <span class="mb-3 text-danger">
                        
                      </span>


                        <div class="input-group mt-3">
                            <input type="file" placeholder="e.g.mario" class="form-control" name="img"  required>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-lg btn-primary mt-3" name="add">Add</button>
                            <button class="btn btn-lg btn-danger mt-3">Cancel</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
   


</body>
</html>



    