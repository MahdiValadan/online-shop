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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"
      rel="stylesheet">
    <title>Admin</title>
</head>
<body>
    <section id="main" class="flex">
        <a href="./adminLogout.php" id="logout" title="Logout"><span class='material-icons-round'>logout</span></a>
        <h1>Admin</h1>
        <div class="flex">
            <a href="./editProduct.php" class="center">Edit Products</a>
            <a href="./addProduct.php" class="center">Add a New Product</a>
        </div>
        <div class='flex'>
            <a href="./editUser.php" class="center">Edit Users</a>
            <a href="./modifyCategory.php" class="center">Modify Categories</a>
        </div>
    </section>
</body>
</html>