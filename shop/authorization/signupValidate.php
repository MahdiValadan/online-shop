<?php 
    $user = 'root';
    $pass = '';
    $db = "shopdb";

    // Create connection
    $conn = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");
    echo "Connected successfully</br>";

    $first_name = htmlspecialchars($_POST['fname']);
    $last_name = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);

    //check if the email is duplicated
    $check = "SELECT * FROM user WHERE email = '$email'";
    $query = mysqli_query($conn, $check);
    if (!$query)
    {
        die('Error: ' . mysqli_error($conn));
    }
    if(mysqli_num_rows($query) > 0){
        echo "an user with this email already exists";
        $conn->close();
        header("Location: signup.php?error=duplicatedEmail"); 
        exit;
    }else{
        $sql = "INSERT INTO user (firstName, lastName, email, password) VALUES ('$first_name', '$last_name', '$email', AES_ENCRYPT('$pass', 'secret'))";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
          session_start();
          $_SESSION['login'] = $email;
          header("Location: ../index.php"); 
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>