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
    <title>Edit Users</title>
</head>
<body class="flex">
    <a id="back" href="./admin.php">&#60; Back to Admin Control Panel</a>
    <h1>Edit Users</h1>
    <a href="./addUser.php" class='add-user-link'>Add a new User</a>
    <?php 
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "SELECT * FROM user";
        $query = mysqli_query($conn, $sql);
        if (!$query){
            die('Error: ' . mysqli_error($conn));
        }
        while($row = mysqli_fetch_assoc($query)){
            $user = $row['Email'];
            $fname = $row['FirstName'];
            $lname = $row['LastName'];
            echo "
                <div class='user flex'>
                    <h2>$user</h2>
                    <a href='./editUserCart.php?email=$user'>edit user cart</a>
                    <a href='./editUserInfo.php?email=$user&fname=$fname&lname=$lname'>edit user info</a>
                    <a href='./editUserHandler.php?user=$user&action=delete' onclick='return confirm(\"are you sure?\")'>delete the user</a>
                </div>
            ";
        }
        echo"

        ";
    ?>
</body>
</html>