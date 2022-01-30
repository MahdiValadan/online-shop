<?php 
    require('./adminLoginCheck.php');
?>

<?php 
    if(isset($_GET["edit"])){
        $id = $_GET["edit"];
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "SELECT * FROM product WHERE ID='$id'";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($query)){
            $model = $row['Model'];
            $brand = $row["Brand"];
            $category = $row["Category"];
            $specs = $row["Specs"];
            $price = $row["Price"];
            $img = $row['Image'];
        }
    }
?>
<html lang="en">
<head>
    <meta name="author" content="Mahdi Valadan">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styleAdmin.css">
    <link rel="shortcut icon" href="../statics/icons/admin.png" type="image/x-icon">
    <title>Edit Product Information</title>
</head>
<body class="center">
    <form action='editProductHandler.php' method='POST' enctype='multipart/form-data' class="center form-ap">
        <h1>Edit Product</h1>

        <input type="text" placeholder="Model" name="model" value="<?=$model?>" required>
        
        <input type="text" placeholder="Brand" name="brand" value="<?=$brand?>" required>
        
        <select name="categories" id="categories" value="<?=$category?>" required>
        <option value="" disabled selected>Select a Category</option>
        <?php 
            $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
            $sql = "SELECT name FROM category";
            $query = mysqli_query($conn, $sql);
            if (!$query){
                die('Error: ' . mysqli_error($conn));
            }
            while($row = mysqli_fetch_assoc($query)){
                $cat = $row['name'];
                echo "
                    <option value='$cat'>$cat</option>
                ";
            }
        ?>
        </select> 
        
        <textarea type="text" placeholder="Specs" name="specs" required><?=$specs?></textarea>
        
        <input type="number" name="price" id="price" placeholder="Price" name="price" value="<?=$price?>" required>

        <label for="image" id="label-img">Upload the product's image:</label>
        
        <input type="file" accept=".png, .jpg, .svg" name="image" id="image" required  
        oninvalid="this.setCustomValidity('Please Choose an image')" oninput="this.setCustomValidity('')">

        <input type="hidden" name="id" value="<?=$id?>">

        <input type="submit" name="edit" value="Edit">

        <a class="center" href="./editProduct.php">Cancel</a>

    </form>
</body>
</html>