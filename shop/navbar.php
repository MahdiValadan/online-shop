<nav>
    <section id="nav-left-section">
        <button id="menu-btn" onclick="menuAction()">
            <span id="menu-btn-icon" class="material-icons-round">menu</span>
        </button>
        <a href="./shoppingCart.php" title="shopping cart">
            <span class="material-icons-round nav-icon">
                shopping_cart
            </span>
        </a>
        <?php 
            session_start();
            if(!isset($_SESSION['login'])){
                echo' 
                    <a href="./authorization/login.php" title="Login">
                        <span class="material-icons-round nav-icon">
                            login
                        </span>
                    </a>
                ';
            }else{
                echo' 
                    <a href="./logout.php" title="Logout">
                        <span class="material-icons-round nav-icon">
                            logout
                        </span>
                    </a>
                ';
            }
        ?>
    </section>

    <a href="./index.php" id='logo'>SHOP</a>
    
    <form action="./explore.php" method="GET">
        <button id='search-btn' type="submit" value="search"><span id="search-icon" class="material-icons-round">search</span></button>
        <input type="search" id="search" name="s" placeholder="Search" required>
    </form>

</nav>

<div id="menu">
    <a href="./explore.php?items=all">All</a>
    <a href="./explore.php?items=Laptop">Laptops</a>
    <a href="./explore.php?items=Cell phone">Cell Phones</a>
    <a href="./explore.php?items=Console">Consoles</a>
    <a href="./explore.php?items=keyboard">Keyboards</a>
    <a href="./explore.php?items=mouse">Mice</a>
    <a href="./explore.php?items=headset">Headsets</a>
    <a href="./explore.php?items=accessory">Accessories</a>
</div>