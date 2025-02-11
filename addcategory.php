
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
    $categoryname = mysqli_real_escape_string($con, $_POST['categoryname']);
    $cdesc = mysqli_real_escape_string($con, $_POST['cdesc']);
    $img = $_FILES['img']['name']; // Assuming you're handling image uploads
    $img_tmp = $_FILES['img']['tmp_name'];

    // Check if the category already exists
    $check_query = "SELECT * FROM category WHERE categoryname = '$categoryname'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $message = '<div style="color: red; font-weight: bold;">Category already exists!</div>';
    } else {
        // Move the uploaded image to a specific folder
        $target_dir = "uploads";
        $target_file = $target_dir . basename($img);
        move_uploaded_file($img_tmp, $target_file);

        // Insert the new category
        $query = "INSERT INTO category (categoryname, cdesc, img) VALUES ('$categoryname', '$cdesc', '$target_file')";
        if (mysqli_query($con, $query)) {
            $message = '<div style="color: green; font-weight: bold;">Category added successfully!</div>';
        } else {
            $message = '<div style="color: red; font-weight: bold;">Failed to add category. Please try again.</div>';
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
           
            height:530px;
            width: 900px;
            background-color: transparent;
            backdrop-filter: blur(5px); 
            border: 2px solid black;
            border-radius: 30px;
            position: absolute;
            top: 15%;
            left: 30%;
        }
        
    </style>
</head>

<body>


 <!-- Display message -->
 <?php if (!empty($message)): ?>
            <div class="alert alert-danger text-center mt-3" style="width: 600px; height : 60px; left : 23% ;"><?php echo $message; ?></div>
        <?php endif; ?>

        <div id="box" class="container justify-content-center align-content-center ">
           
            <h1 class="display-3 text-center">Add Category </h1>
            <div class="row justify-content-center align-content-center">
                <div class="col-lg-8 ">
                    <form action="#" method="post" enctype="multipart/form-data">
                       
                        <div class="input-group mt-3">
                            <input type="text" class="form-control" placeholder="categoryname" aria-label="Username" aria-describedby="basic-addon1" name="categoryname" required>
                        </div>
                        <span class="mb-3 text-danger">
                        </span>

                        <div class="form-floating mt-4">
                            <textarea id="query" class="form-control" style="height: 180px;" placeholder="enter query" name="cdesc" required></textarea>
                            <label for="query">Category Description</label>
                        </div>
                        <span class="mb-3 text-danger">
                        
                      </span>

                        <div class="input-group mt-3">

                            <input type="file" placeholder="e.g.mario" class="form-control" name="img" required>
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