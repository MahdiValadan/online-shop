<?php 
    require('./adminLoginCheck.php');
?>

<?php 
    //DELETE
    if(isset($_GET["delete"])){
        $id = $_GET["delete"];
        $img = $_GET["deleteImg"];
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "DELETE FROM product WHERE ID='$id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "Record deleted successfully";
            $img_dir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."products_img".DIRECTORY_SEPARATOR;
            unlink("../uploads/products_img/".$img);
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        header('Location: ./editProduct.php');
        mysqli_close($conn);
    }

    //Edit
    if(isset($_POST["edit"])){

        $model = $_POST["model"];
        $brand = $_POST["brand"];
        $category = $_POST["categories"];
        $specs = $_POST["specs"];
        $price = $_POST["price"];
        $id = $_POST['id'];

        $target_dir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."products_img".DIRECTORY_SEPARATOR;
        $imageType = '.'.strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
        
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "UPDATE product SET Model='$model', Brand='$brand', Category='$category', Specs='$specs', Price='$price' WHERE ID='$id'";
        $query = mysqli_query($conn, $sql);
        if (!$query){
            die('Error: ' . mysqli_error($conn));
        }else{
                $imgName = $id.$imageType;
                $sql = "UPDATE product SET Image='$imgName' WHERE ID='$id'";
                $query = mysqli_query($conn, $sql);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$imgName);            
                header("Location: ./editProduct.php");
        }
        mysqli_close($conn);
    } 
    else {
        header("Location: ./editProduct.php");
        die();
    }
?>