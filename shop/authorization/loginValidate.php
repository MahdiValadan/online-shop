<?php
        // Create connection
    $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
    echo "Connected successfully</br>";

    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);

    $check = "SELECT email, firstName, lastName FROM user WHERE email='$email' AND password= AES_ENCRYPT('$pass', 'secret') ";
    
    $query = mysqli_query($conn, $check);
    
    if (!$query)
    {
        die('Error: ' . mysqli_error($conn));
    }
    if(mysqli_num_rows($query) > 0 ){ 
        echo 'valid';
        session_start();
        $_SESSION['login'] = $email;
        header("Location: ../index.php");
    }
    else{
        echo 'The username or password are incorrect!';
        $conn->close();
        header("Location: login.php?error=invalidUser"); 
        exit;
    }
?>