<?php 
    require('./adminLoginCheck.php');
?>

<html lang="en">
<head>
    <meta name="author" content="Mahdi Valadan">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdmin.css">
    <link rel="shortcut icon" href="../statics/icons/admin.png" type="image/x-icon">
    <title>Edit Products</title>
</head>

<body class="flex">
    
    <a id="back" href="./admin.php">&#60; Back to Admin Control Panel</a>
    
    <h1>Edit Products</h1>

    <div class="edit-pr flex">
        
    <?php 
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "SELECT * FROM product";
        $query = mysqli_query($conn, $sql);
        if (!$query){
            die('Error: ' . mysqli_error($conn));
        }
        while($row = mysqli_fetch_assoc($query)){

            $id = $row['ID'];
            $model = $row['Model'];
            $brand = $row["Brand"];
            $category = $row["Category"];
            $specs = $row["Specs"];
            $price = $row["Price"];
            $img = $row['Image'];
            
            // $action = $_SERVER['PHP_SELF'];
            
            echo"
                <table>
                    <tr>
                        <th>ID</th>
                        <th class='th-model'>Model</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th class='th-specs'>Specs</th>
                        <th>image</th>
                    </tr>
                    <tr>
                        <td>$id</td>
                        <td>$model</td>
                        <td>$brand</td>
                        <td>$category</td>
                        <td>$price</td>
                        <td><textarea readonly>$specs</textarea></td>
                        <td><img src='../uploads/products_img/$img'></td>
                    </tr>
                </table>
                <div>
                    <a href='./editProductInfo.php?edit=$id'>Edit</a>
                    <a class='delete-btn' href='./editProductHandler.php?delete=$id&deleteImg=$img' onclick='return confirm(\"are you sure?\")'>Delete</a>
                </div>
            ";
        }
    ?>
    </div>
</body>
</html>