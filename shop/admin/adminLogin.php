<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <meta name="author" content="Mahdi Valadan">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../statics/icons/admin.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="styleAdmin.css" />
</head>

<body class="center">
    <div class="container-login">
        <h1>Admin Login</h1>
        <form action="adminLoginValidate.php" method="POST">
            <input type="text" name="id" id="id" placeholder="ID">
            <input type="password" name="pass" id="pass" placeholder="Password">
            <input id="login-submit" type="submit" value="Login">
        </form>
    </div>
    <?php 
        if(!empty($_GET['error'])) {
            $error = $_GET['error'];
            if ($error == "invalidID")
                echo "
                        <script>
                            setTimeout(function() {
                                alert('ID or Password is incorrect')
                            }, 100);
                        </script>
                    ";
        }
    ?> 
</body>

</html>

