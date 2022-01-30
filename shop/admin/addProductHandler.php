<?php 
    require('./adminLoginCheck.php');
?>
<?php 
      if (isset($_POST['add'])) {
            
            $model = $_POST["model"];
            $brand = $_POST["brand"];
            $category = $_POST["categories"];
            $specs = $_POST["specs"];
            $price = $_POST["price"];

            $target_dir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."products_img".DIRECTORY_SEPARATOR;
            $imageType = '.'.strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
            
            $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
            $sql = "INSERT INTO product (Model, Brand, Category, Specs, Price) VALUES ('$model', '$brand', '$category', '$specs', '$price')";
            $query = mysqli_query($conn, $sql);
            if (!$query){
                die('Error: ' . mysqli_error($conn));
            }else{
                  $last_id = mysqli_insert_id($conn);
                  $imgName = $last_id.$imageType;
                  $sql = "UPDATE product SET Image='$imgName' WHERE ID='$last_id'";
                  $query = mysqli_query($conn, $sql);
                  move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$imgName);            
                  header("Location: ./admin.php");
            }
            mysqli_close($conn);
      } 
      else {
            header("Location: ./admin.php");
            die();
      }
?>