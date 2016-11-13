<?php require ('dbConnect.php'); ?>
<html>
    <head>
        <link rel="stylesheet" href="./lib/css/style.css" type="text/css"/>
        <meta charset='utf-8'>
    </head>
    <body>
        <div id="conteneur">
            <div id="main">
                <header id="header"> 
                    <img class="banniere" src="images/banniere.jpg" alt="banniere"/>
                </header>

                <nav id="menu">
                    <?php require ('pages/menu.php') ?>
                </nav>

                <div id="navigation">
                    <?php
                    if (!isset($_SESSION['nav'])){
                        $_SESSION['nav'] = "Accueil";
                    }
                    if (isset($_GET['nav'])){
                        $_SESSION['nav'] = $_GET['nav'];
                    }
                    echo $_SESSION['nav'];
                    ?>
                </div>

                <section id="contenu">
                    <?php
                    if (!isset($_SESSION['page'])){
                        $_SESSION['page'] = "accueil.php";
                    }
                    if (isset($_GET['page'])){
                        $_SESSION['page'] = $_GET['page'];
                    }
                    $p = "./pages/" . $_SESSION['page'];
                    if (file_exists($p)) {
                        include $p;
                    } else {
                        echo "page en construction";
                    }
                    ?>
                </section>
            </div>	
        </div>
                    <?php require ('pages/footer.php'); ?>
    </body>
</html>