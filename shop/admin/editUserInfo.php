<?php 
    require('./adminLoginCheck.php');
?>

<?php 
    $user = $_GET['email'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
?>

<html lang="en">
<head>
    <meta name="author" content="Mahdi Valadan">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdmin.css">
    <link rel="shortcut icon" href="../statics/icons/admin.png" type="image/x-icon">
    <title>Edit user info</title>
</head>
<body class='center' id='edit-user-info'>
        <h1>Edit user info</h1>
        <form action="editUserHandler.php" method="POST">
            <input type="hidden" name="old" value="<?=$user?>">
            <input type="text" name="fname" placeholder="first name" value="<?=$fname?>" required><br>
            <input type="text" name="lname" placeholder="last name" value="<?=$lname?>" required><br> 
            <input type="email" name="email" id="" placeholder="email" value="<?=$user?>" required><br>
            <input type="password" name="pass" placeholder="new password" required><br>
            <input type="submit" name="info" value="Submit"><br>
        </form>   
        <a href="./editUser.php">Cancel</button>
</body>
</html>
