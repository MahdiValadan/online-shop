<?php 
    require('./loginCheck.php')
?>
<?php 
    $user = $_SESSION["login"];
    $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
    $check = "SELECT * FROM cart WHERE User='$user'";
    $query0 = mysqli_query($conn, $check) or die('Error: ' . mysqli_error($conn)); 
    if (mysqli_num_rows($query0) === 0) {
        header('Location: shoppingCart.php');
    }
?>
<?php 
    if (isset($_GET["checkout"])) {
        $sql = "DELETE FROM cart WHERE user='$user'";
        $query = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn));
        mysqli_close($conn);
        header('Location: index.php');
    }
?>

<html lang="en">
<head>
    <?php require("head.php");?>
    <title>Checkout</title>
</head>
<body class='center checkout'>
    <div class='center'>
        <h1>Complete Checkout</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>">
            <input type="submit" value="Checkout" name="checkout">
            <a href="./shoppingCart.php">Cancel</a>
        </form>
    </div>
</body>
</html>