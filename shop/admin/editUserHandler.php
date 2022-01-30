<?php 
    require('./adminLoginCheck.php');
?>
<?php 
    if (isset($_GET["action"])) {
        $user = $_GET["user"];
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "DELETE FROM user WHERE email='$user'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . mysqli_error($conn);
        }
        header('Location: ./edituser.php');
        mysqli_close($conn);
    }

    elseif (isset($_GET["remove"])) {
        $sid = $_GET["remove"];
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "DELETE FROM cart WHERE SID='$sid'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . mysqli_error($conn);
        }
        header('Location: ./edituser.php');
        mysqli_close($conn);
    }
    

    elseif (isset($_POST["info"])) {
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        echo "Connected successfully</br>";
    
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['pass']);
        $old = htmlspecialchars($_POST['old']);
        $sql = "UPDATE user SET FirstName='$fname', LastName='$lname', Email='$email', Password=AES_ENCRYPT('$pass', 'secret') WHERE Email='$old'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location: editUser.php"); 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    elseif (isset($_POST["addUser"])) {
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        echo "Connected successfully</br>";
    
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['pass']);
        
        $sql = "INSERT INTO user (firstName, lastName, email, password) VALUES ('$fname', '$lname', '$email', AES_ENCRYPT('$pass', 'secret'))";
        
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location: editUser.php"); 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

?>