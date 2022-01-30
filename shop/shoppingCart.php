<?php 
    require('./loginCheck.php')
?>

<?php 
    $user = $_SESSION["login"];
    if (isset($_GET["p"])) {
        $pid = $_GET["p"];
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $check = "SELECT * FROM cart WHERE User='$user' AND PID='$pid'";
        if (mysqli_num_rows(mysqli_query($conn,$check))) {
            echo"
                <script>setTimeout(function(){
                    alert('item is already in your cart');
                    window.location.replace('shoppingCart.php');
                },200)
                </script>
            ";
        }
        else{
            $sql = "INSERT cart(User, PID) VALUES ('$user','$pid')";
            $query = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn));
            header('Location: shoppingCart.php');
        }
        mysqli_close($conn);
    }

    if (isset($_GET["remove"])) {
        $sid = $_GET["remove"];
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "DELETE FROM cart WHERE SID='$sid'";
        $query = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn));
        mysqli_close($conn);
        header('Location: shoppingCart.php');
    }
?>

<?php 
    function showCart($user){
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "SELECT * FROM cart WHERE User='$user'";
        $query = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn)); 
        if (mysqli_num_rows($query) === 0) {
            echo"<h1 class='not-found'>Your Shopping Cart is Empty</h1>";
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
                                <a class='' href='./shoppingCart.php?remove=$sid' onclick='return confirm(\"are you sure?\")'><span class='material-icons-round'>
                                delete
                                </span></a>
                            </td>
                        </tr>
                    </table>
                ";
            }
            echo"<a href='./checkout.php' id='ch-btn' class='checkout-btn'>Proceed to Checkout</a>";
        }
         
    }
?>

<html lang="en">
<head>
    <?php require("head.php");?>
    <title>Shopping Cart</title>
</head>
<body class='flex-col cart'>
    <?php require("navbar.php");?>
    <?php showCart($user)?>
    <?php require("footer.php");?>
</body>
</html>
