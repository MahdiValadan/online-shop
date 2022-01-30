<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Mahdi Valadan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../statics/icons/fav.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../statics/styles/styleAuth.css">
</head>
<body class="auth-body">
    <div>
        <h1>Login</h1>
        <form action="loginValidate.php" method="POST">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="pass" id="pass" placeholder="Password">
            <input type="submit" id="submit" value="Login">
        </form>
        <a href="signup.php">Create an account</a>
        <a href="../index.php">Back to shop</a>
    </div>
</body>
</html>
<?php 
    if(!empty($_GET['error'])) {
        $error = $_GET['error'];
        if ($error == "invalidUser")
            echo "
                <script>
                    setTimeout(function() {
                        alert('Email or Password is incorrect')
                    }, 100);
                </script>
            ";
    }
?> 

