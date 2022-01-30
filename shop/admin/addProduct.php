<?php 
    require('./adminLoginCheck.php');
?>

<html lang="en">
<head>
    <meta name="author" content="Mahdi Valadan">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../statics/icons/admin.png" type="image/x-icon">
    <link rel="stylesheet" href="styleAdmin.css">
    <title>Add a new Product</title>
</head>
<body class="center">
    <form action="addProductHandler.php" method="POST" enctype="multipart/form-data" class="center form-ap">
        <h1>Add a New Product</h1>
        <input type="text" placeholder="Model" name="model" required>
        <input type="text" placeholder="Brand" name="brand" required>
        <select name="categories" id="categories" required>
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
        <textarea type="text" placeholder="Specs" name="specs" required></textarea>
        <input type="number" name="price" id="price" placeholder="Price" name="price" required>
        <label for="image" id="label-img">Upload the product's image:</label>
        <input type="file" accept=".png, .jpg, .svg" name="image" id="image" required  
        oninvalid="this.setCustomValidity('Please Choose an image')"
        oninput="this.setCustomValidity('')"
        >
        <input type="submit" name="add" value="Add">
        <a class="center" href="./admin.php">Cancel</a>
    </form>
</body>
</html>