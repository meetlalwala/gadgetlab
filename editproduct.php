
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

<?php

    $con=mysqli_connect('localhost','root','','gadget_db');

    $pid=$_GET['pid'];

    $qry="select * from product where pid=$pid";

    $res=mysqli_query($con,$qry);

    $row=mysqli_fetch_assoc($res);
?>


        <div id="box" class="container justify-content-center align-content-center ">
           
            <h1 class="display-3 text-center">Add Product </h1>
            <div class="row justify-content-center align-content-center">
                <div class="col-lg-8 ">
                    <form action="#" method="post" enctype="multipart/form-data">
                       
                        
                        <div class="input-group mt-3">
                            <input type="text" class="form-control" placeholder="Product name" aria-label="Username" aria-describedby="basic-addon1" name="pname" value="<?php echo $row['pname']?>">
                        </div>
                        <span class="mb-3 text-danger">
                        </span>

                        <div class="input-group mt-3">
                            <input type="number" class="form-control" placeholder="Price" aria-label="Username" aria-describedby="basic-addon1" name="price" value="<?php echo $row['price']?>">
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
                            while($row1=mysqli_fetch_assoc($res))
                            {
                            ?>
                                <option value="<?php echo $row1['categoryname']?>"><?php echo $row1['categoryname']?></option>;
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        

                        <div class="form-floating mt-4">
                            <textarea id="query" class="form-control" style="height: 180px;" placeholder="enter query" name="pdesc" ><?php echo $row['pdesc']?></textarea>
                            <label for="query">Product Description</label>
                        </div>
                        <span class="mb-3 text-danger">
                        
                      </span>


                        <div class="input-group mt-3">
                            <input type="file" placeholder="e.g.mario" class="form-control" name="img" value="<?php echo $row['img']?>">
                        </div>

                        <div class="text-center">
                            <button class="btn btn-lg btn-primary mt-3" name="submit">Submit</button>
                            <button class="btn btn-lg btn-danger mt-3">Cancel</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
   


        <?php

if (isset($_POST['submit'])) {
    $con = mysqli_connect('localhost', 'root', '', 'gadget_db');

    $pname=$_POST['pname'];
    $price=$_POST['price'];
    $categoryname = $_POST['categoryname'];
    $pdesc = $_POST['pdesc'];

   
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        
        $target_dir = "imgs/phpimgs/";
        $img_name = basename($_FILES['img']['name']);
        $target_file = $target_dir . $img_name;

        
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
            
            $qry1 = "UPDATE product SET pname='$pname', price='$price' , categoryname='$categoryname', pdesc='$pdesc', img='$target_file' WHERE pid='$pid'";
        } else {
            echo "Error uploading image.";
            exit;
        }
    } else {
        
        $qry1 = "UPDATE product SET pname='$pname' , price='$price' , categoryname='$categoryname', pdesc='$pdesc' WHERE pid='$pid'";
    }

    $res1 = mysqli_query($con, $qry1);

    if ($res1) {
        header("location:productlist.php");
    } else {
        echo "Update error";
    }
}
ob_end_flush();
?>


</body>
</html>



    