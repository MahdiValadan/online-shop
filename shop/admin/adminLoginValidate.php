<?php
        // Create connection
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        echo "Connected successfully</br>";
    
        $id = htmlspecialchars($_POST['id']);
        $pass = htmlspecialchars($_POST['pass']);

        $check = "SELECT ID FROM admin WHERE ID='$id' AND Password=AES_ENCRYPT('$pass', 'secret')";
        $query = mysqli_query($conn, $check);
        if (!$query)
        {
            die('Error: ' . mysqli_error($conn));
        }
        if(mysqli_num_rows($query) > 0 ){ 
            echo 'valid';
            session_start();
            $_SESSION['admin'] = $id;
            header("Location: admin.php");
        }
        else{
            echo 'The id or password is incorrect!';
            $conn->close();
            header("Location: adminLogin.php?error=invalidID"); 
            exit;
        }
?>