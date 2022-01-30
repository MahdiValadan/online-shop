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
    <title>Add a new User</title>
</head>
<body class="flex">
    <a id="back" href="./admin.php">&#60; Back to Admin Control Panel</a>
    <h1>Add a new User</h1>
    <div>
        <form class='center add-user-form' action="./editUserHandler.php" method="POST">
            <input type="text" name="fname" placeholder="First Name" required>
            <input type="text" name="lname" placeholder="Last Name" required>
            <input 
                type="email" name="email" id="email" placeholder="Email" required
            >
            <input 
                type="password" name="pass" id="pass" placeholder="Password" required
            >
            <input type="submit" id="submit" name="addUser" value="Add">
        </form>
    </div>
</body>
</html>
<?php 
    if(!empty($_GET['error'])) {
        $error = $_GET['error'];
        if ($error == "duplicatedEmail")
            echo "
                <script>
                    setTimeout(function(){alert('an account with this email already exists')},100)
                    document.getElementById('email').style.borderColor = 'red' 
                </script>
            ";
    }
?> 