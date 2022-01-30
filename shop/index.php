<html lang="en">
<head>
    <?php require('head.php')?>
    <title>Home</title>
</head>
<body>
    <?php 
        require("navbar.php");
    ?>
    <section id="landing-page">
        <div id="hero">
            <h1>Welcome To Online Shop</h1>
            <a href="explore.php?items=all">View All of The Products</a>
        </div>
        <div id="categories">
            <a href="./explore.php?items=Laptop" id="category1"></a>
            <a href="./explore.php?items=Cell+phone" id="category2"></a>
            <a href="./explore.php?items=Console" id="category3"></a>
            <a href="./explore.php?items=accessory" id="category4"></a>
        </div>
    </section>
    <?php require("footer.php");?>
</body>
</html>