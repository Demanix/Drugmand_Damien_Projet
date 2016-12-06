<?php
//Index Administrateur
session_start();
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/bootstrap-3.3.7/dist/css/bootstrap.css" />
        <link rel="stylesheet" href="./lib/css/style.css" type="text/css"/> 
        <script src="admin/lib/js/jquery-3.1.1.js"></script>
        <script src="admin/lib/css/bootstrap-3.3.7/dist/js/bootstrap.js"></script>
        <meta charset='utf-8'>
    </head>
    <body>
        <div id="conteneur">
            <div id="main">
                <header id="header"> 
                    <img class="banniere" src="images/banniere.jpg" alt="banniere"/>
                </header>

                <nav id="menu">
                    <?php
                        if(!isset($_SESSION['admin'])){
                            if (file_exists('./lib/php/adm_connect.php')) {
                                include './lib/php/adm_connect.php';
                            } else {
                                echo "Page introuvable";
                            }
                        } else {
                            if (file_exists('./lib/php/admin_menu.php')) {
                                include './lib/php/admin_menu.php';
                            } else {
                                echo "Page introuvable";
                            }
                        }
                    ?>
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
                    if (!isset($_SESSION['admin'])) {
                        $_SESSION['page'] = "admin_connect";
                    }
                    else {
                        if (isset($_SESSION['page'])) {
                            $_SESSION['page'] = "accueil_admin";
                        }
                        if (isset($_GET['page'])) {
                            $_SESSION['page'] = $_GET['page'];
                        }
                    }
                    $path = './pages/'.$_SESSION['page'].'.php';
                    if (file_exists($path)) {
                        include $path;
                    } else {
                        echo "Page introuvable";
                    }
                    ?>
                </section>
            </div>	
        </div>
        <footer id="footer">
            <img src="./images/logo.gif" alt="logo"/>
            <span class="gras petit">Contact daminator@webcine.org &copy; CINEWEB SA/NV 2015</span>
            </br></br>
            <?php
                if(isset($_SESSION['admin'])){ ?>
                   <a href="./index.php?page=disconnect" class="pull-center">Zone administrateur : Déconnexion</a>
            <?php
                } else { ?>
                   <a href="javascript:history.back(1)" class="pull-center">Zone public</a>
            <?php
                }
            ?>
        </footer>	
    </body>
</html>