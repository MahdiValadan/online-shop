<?php 
    require('./adminLoginCheck.php');
?>
<?php 
    $user = $_GET['email'];
    function showCart($user){
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "SELECT * FROM cart WHERE User='$user'";
        $query = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn)); 
        if (mysqli_num_rows($query) === 0) {
            echo"<h2>User Shopping Cart is Empty</h2>";
        }
        else{
            while($row = mysqli_fetch_assoc($query)){
                $pid = $row['PID'];
                $sid = $row['SID'];
                $sql2 = "SELECT * FROM product WHERE ID = '$pid'";
    
                $query2 = mysqli_query($conn, $sql2) or die('Error: ' . mysqli_error($conn));
    
                $row2 = mysqli_fetch_assoc($query2);
                
                $id = $row2['ID'];
                $model = $row2['Model'];
                $brand = $row2["Brand"];
                $category = $row2["Category"];
                $specs = $row2["Specs"];
                $price = $row2["Price"];
                $img = $row2['Image'];
            
                echo"
                    <table>
                        <tr>
                            <th class='th-model'>Model</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th class='th-specs'>Specs</th>
                            <th>Image</th>
                            <th>Delete From Cart</th>
                        </tr>
                        <tr>
                            <td>$model</td>
                            <td>$brand</td>
                            <td>$category</td>
                            <td>$$price</td>
                            <td><textarea readonly>$specs</textarea></td>
                            <td><img src='../uploads/products_img/$img'></td>
                            <td>
                                <a class='' href='./editUserHandler.php?remove=$sid' onclick='return confirm(\"are you sure?\")'>delete</a>
                            </td>
                        </tr>
                    </table>
                ";
            }
        }
         
    }
?>
<html lang="en">
<head>
    <meta name="author" content="Mahdi Valadan">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdmin.css">
    <link rel="shortcut icon" href="../statics/icons/admin.png" type="image/x-icon">
    <title>Edit User Cart</title>
</head>
<body class='cart flex'>
    <a id="back" href="./admin.php">&#60; Back to Admin Control Panel</a>
    <h1>Edit <span style="font-style: italic;color: cyan;"><?=$user?></span> Shopping Cart</h1>
    <?php showCart($user)?>
</body>
</html>
