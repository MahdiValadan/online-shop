<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Mahdi Valadan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./statics/icons/fav.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../statics/styles/styleAuth.css">
</head>
<body class="auth-body">
    <div>
        <h1>Sign up</h1>
        <form action="./signupValidate.php" method="POST">
            <input type="text" name="fname" placeholder="First Name" pattern="^[a-zA-Z ][a-zA-Z ]+$" required>
            <input type="text" name="lname" placeholder="Last Name" pattern="^[a-zA-Z ][a-zA-Z ]+$" required>
            <input 
                type="email" name="email" id="email" placeholder="Email" required
                pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
            >
            <input 
                type="password" name="pass" id="pass" placeholder="Password" required
                pattern="^(?=.*[0-9])(?=.*[a-zA-z])[a-zA-Z0-9!@#$%^&*]{8,}$" 
                oninvalid="this.setCustomValidity('Password should be at least 8 character and contains both letters and numbers')"
                oninput="this.setCustomValidity('')"
            >
            <input type="submit" id="submit" value="Signup">
        </form>
        <a href="login.php">Already have an account?</a>
        <a href="../index.php">Back to shop</a>
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

