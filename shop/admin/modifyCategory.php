<?php 
    require('./adminLoginCheck.php');
?>

<html lang="en">
<head>
    <meta name="author" content="Mahdi Valadan">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAdmin.css">
    <link rel="shortcut icon" href="../statics/icons/admin.png" type="image/x-icon">
    <title>Modify Categories</title>
</head>

<body class="flex">
    
    <a id="back" href="./admin.php">&#60; Back to Admin Control Panel</a>
    
    <h1>Add New Category</h1>
    
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" class="new-category">
        <input type="text" placeholder="Name" name="name" required>
        <input type="submit" value="Add" name="submit">
    </form>

    <div class="category-list">
        <h2>Categories</h2>
    <?php 
        $conn = new mysqli('localhost', 'root', '', 'shopdb') or die("unable to connect");
        $sql = "SELECT name FROM category";
        $query = mysqli_query($conn, $sql);
        if (!$query){
            die('Error: ' . mysqli_error($conn));
        }
        while($row = mysqli_fetch_assoc($query)){
            $name = $row['name'];
            $action = $_SERVER['PHP_SELF'];
            echo "
                <form action='$action' method='POST' class='mod-cat flex'>
                    <h3>$name</h3>
                    <input type=\"hidden\" name=\"value\" value='$name'>
                    <input type=\"submit\" value=\"Edit\" name=\"edit\">
                    <input type=\"submit\" value=\"Delete\" name=\"delete\" onclick='return confirm(\"are you sure?\")' class='mod-cat-delete-btn'>
                </form>
            ";
        }
    ?>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submit']) && isset($_POST["name"])){ 
        $input = $_POST['name'];
        $input = strtolower($input);
        $input = ucfirst($input);
        $sql = "INSERT INTO category(name) VALUES ('$input')";
        try{
            $query = mysqli_query($conn, $sql);
            echo"
                <script>
                    window.location.replace(\"./modifyCategory.php\");
                </script>
            ";
         }
         catch(Exception $e)
         {
            echo"
                <script>
                    alert('Duplicate entry is not allowed!!!')
                    window.location.replace(\"./modifyCategory.php\");
                </script>
            ";
            die();
         }
  
        mysqli_close($conn);
    } 
    
    //edit
    if(isset($_POST['edit'])){ 
        $value = $_POST["value"];
        $action = $_SERVER['PHP_SELF'];
        echo "
            <form action='$action' method='POST' class='edit-cat center'>
                <input type=\"hidden\" name=\"value\" value='$value'>
                <input type='text' name='newName' placeholder='Enter a new name' required>
                <input type=\"submit\" value=\"Confirm\" name=\"editSubmit\">
                <a href='./modifyCategory.php'>Cancel</a>
            </form>
        ";
    }

    if(isset($_POST['editSubmit'])){
        $old = $_POST["value"];
        $value = $_POST["newName"];
        $sql = "UPDATE category SET name='$value' WHERE name='$old'";
        $query = mysqli_query($conn, $sql);
        if($query){
            echo"
                <script>
                    window.location.replace(\"./modifyCategory.php\");
                </script>
            ";
        }else{
            die('Error: ' . mysqli_error($conn));
        }
    }

    //delete
    if(isset($_POST['delete'])){ 
        $value = $_POST["value"];
        $sql = "DELETE FROM category WHERE name='$value'";
        $query = mysqli_query($conn, $sql);
        if($query){
            echo"
                <script>
                    window.location.replace(\"./modifyCategory.php\");
                </script>
            ";
        }else{
            die('Error: ' . mysqli_error($conn));
        }
    }


?>