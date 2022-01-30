<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "SELECT * FROM product WHERE ID='$id'";
        $query = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn));
        $row = mysqli_fetch_assoc($query);

        $model = $row['Model'];
        $brand = $row["Brand"];
        $category = $row["Category"];
        $specs = $row["Specs"];
        $price = $row["Price"];
        $img = $row['Image'];
    }
    else{
        header('Location: explore.php');
    }
    
    function showProduct($img, $brand, $model, $specs, $price, $id){        
        echo"
        <div class='product-container flex-row'>
                <div class='flex-col product-col-1'>
                    <h1>$model</h1>
                    <h2>Brand: $brand</h2>
                    <h3>Specs:</h3>
                    <textarea class='' readonly>$specs</textarea>
                </div>
                <div class='flex-col product-col-2'>
                    <img src='./uploads/products_img/$img' alt='image'>
                    <div class='center product-purchase'>
                        <h2 class='center'>$$price</h2>
                        <a href='./ShoppingCart.php?p=$id'>Add to Cart</a>
                    </div>
                </div>
            </div>
        ";
    }


?>

<html lang="en">
<head>
    <?php require("head.php");?>
    <title><?=$brand." ".$model?></title>
</head>
<body class='flex-col product'>
    <?php require("navbar.php");?>
    <?php showProduct($img, $brand, $model, $specs, $price, $id)?>
    <?php require("footer.php");?>
</body>
</html>