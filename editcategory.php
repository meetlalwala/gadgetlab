<!DOCTYPE html>
<html lang="en">
<head>
<?php
ob_start();
require("adminnavbar.php");
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
<?php

    $con=mysqli_connect('localhost','root','','gadget_db');

    $cid=$_GET['cid'];

    $qry="select * from category where cid=$cid";

    $res=mysqli_query($con,$qry);

    $row=mysqli_fetch_assoc($res);
?>



        <div id="box" class="container justify-content-center align-content-center ">
           
            
        
            <h2 class="display-3 text-center">Update Category </h2>
            <div class="row justify-content-center align-content-center mt-3">
                <div class="col-lg-8 ">
                    <form action="#" method="post" enctype="multipart/form-data">
                       
                        <div class="input-group">
                            
                           
                            <input type="text" class="form-control" placeholder="Category Name" aria-label="Username" aria-describedby="basic-addon1" name="categoryname" value="<?php echo $row['categoryname']?>">
                        </div>

                        <div class="form-floating mt-4">
                            <textarea id="query" class="form-control" style="height: 180px;" placeholder="enter query" name="cdesc" ><?php echo $row['cdesc']?></textarea>
                            <label for="query">Category Description</label>
                        </div>

                        <div class="input-group mt-3">
                            <input type="file" placeholder="e.g.mario" class="form-control" name="img">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-lg btn-primary mt-3" name="submit">Submit</button>
                            <button class="btn btn-lg btn-danger mt-3">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $con = mysqli_connect('localhost', 'root', '', 'gadget_db');

    $categoryname = $_POST['categoryname'];
    $cdesc = $_POST['cdesc'];

   
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        
        $target_dir = "imgs/phpimgs/";
        $img_name = basename($_FILES['img']['name']);
        $target_file = $target_dir . $img_name;

        
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
            
            $qry1 = "UPDATE category SET categoryname='$categoryname', cdesc='$cdesc', img='$target_file' WHERE cid='$cid'";
        } else {
            echo "Error uploading image.";
            exit;
        }
    } else {
        
        $qry1 = "UPDATE category SET categoryname='$categoryname', cdesc='$cdesc' WHERE cid='$cid'";
    }

    $res1 = mysqli_query($con, $qry1);

    if ($res1) {
        header("location:categorylist.php");
    } else {
        echo "Update error";
    }
}
ob_end_flush();
?>
