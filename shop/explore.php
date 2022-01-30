<?php 
    //Search
    if (isset($_GET["s"])) {
        $value = $_GET["s"];
        
        $title = $value;

        $valueSub = substr($value,0,-1);

        $sql = "SELECT * FROM product WHERE Model LIKE '%$value%' OR Brand Like '%$value%' OR Category Like '%$value%' OR CONCAT(Brand,' ',Model,' ', Category) Like '%$value%' OR Model LIKE '%$valueSub%' OR Brand Like '%$valueSub%' OR Category Like '%$valueSub%' OR CONCAT(Brand,' ',Model,' ', Category) Like '%$valueSub%'";

    }
    elseif (isset($_GET["items"])) {
        $items = $_GET["items"];
        $title = $items;
        if ($items === 'all') {
            $sql = "SELECT * FROM product";
        }
        elseif ($items === 'accessory') {
            $sql = "SELECT * FROM product WHERE Category<>'Laptop' AND Category<>'Console' AND Category<>'Cell phone'";
        }
        else{
            $sql = "SELECT * FROM product WHERE Category='$items'";
        }
    } 
    else{
        $sql = "SELECT * FROM product";
    }
    function showItems($sql){   
        
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $query = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn));
        $num_rows = mysqli_num_rows($query);

        if ($num_rows === 0) {
            echo"
                <div class='not-found'>Nothing Found</div>
            ";
        }
        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['ID'];
            $model = $row['Model'];
            $brand = $row["Brand"];
            $category = $row["Category"];
            $price = $row["Price"];
            $img = $row['Image'];
            echo"
                <a class='explore-pro flex-col' href='product.php?id=$id'>
                    <div class='explore-pro-img' style='background-image: url(\"./uploads/products_img/$img\")'></div>
                    <h3 class='center'>$brand $model</h3>
                    <h2 class='center'>$price$</h2>
                </a>
            ";
        }
    }
?>

<html lang="en">
<head>
    <?php require("head.php");?>
    <title>Explore | <?=$title?></title>
</head>
<body class='flex-col'>
    <?php require("navbar.php");?>
    <div class='flex-row explore-pro-cont'>
        <?php showItems($sql)?>
    </div>
    <?php require("footer.php");?>
</body>
</html>