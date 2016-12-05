<?php
include ('./admin/lib/php/adm_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);

session_start();
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/bootstrap-3.3.7/dist/css/bootstrap.css" />
        <link rel="stylesheet" href="./admin/lib/css/style.css" type="text/css"/> 
        <script src="admin/lib/js/jquery-3.1.1.js"></script>
        <script src="admin/lib/css/bootstrap-3.3.7/dist/js/bootstrap.js"></script>
        <meta charset='utf-8'>
    </head>
    <body>
        <div id="conteneur">
            <div id="main">
                <header id="header"> 
                    <img class="banniere" src="admin/images/banniere.jpg" alt="banniere"/>
                </header>
                
                <?php
                if(isset($_POST['submit_login'])) {
                    $log = new UserDB($cnx);
                    $retour = $log->isAuthorized($_POST['login'], $_POST['password']);
                    if($retour==1) {
                        $_SESSION['user']=1;
                        $message="Authentifié";
                    }
                    else {
                        $message = "Données incorrectes";
                        print $message;
                    }
                }
                ?>
                
                <div class="pull-right">
                    <?php
                        if(isset($_SESSION['user'])){ ?>
                           <a href="./index.php?page=disconnect_user.php" class="pull-center">Déconnexion</a>
                    <?php
                        } else { ?>
                            <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth_">    
                                Login : <input type="text" id="login_" name="login" />&nbsp;&nbsp;&nbsp;
                                Mot de passe : <input type="password" id="password_" name="password" /> &nbsp;&nbsp;&nbsp;
                                <input type="submit" name="submit_login" id="submit_login" value="Connexion" />&nbsp;&nbsp;&nbsp;
                                <a href="./index.php?page=new_account.php">Créer un compte</a>
                            </form>
                    <?php
                        }
                    ?>
                </div>

                <nav id="menu">
                    <?php
                        if (file_exists('./lib/php/menu.php')) {
                            include ('./lib/php/menu.php');
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
                        if (!isset($_SESSION['page'])) {
                            $_SESSION['page'] = "accueil";
                        }
                        if (isset($_GET['page'])) {
                            $_SESSION['page'] = $_GET['page'];
                        }
                        $path = './pages/' . $_SESSION['page'];
                        if (file_exists($path)) {
                            include ($path);
                        }
                        else {
                            ?>
                            <span class="txtGras txtRouge">Oups!La page demandée n'existe pas</span>
                            <meta http-refresh: Content="1;url=index.php?page=accueil"/>
                            <?php
                        }
                        ?> 
                </section>
            </div>	
        </div>
        <footer id="footer">
            <img src="./admin/images/logo.gif" alt="logo"/>
            <span class="gras petit">Contact daminator@webcine.org &copy; CINEWEB SA/NV 2016</span>
            </br></br>
            <?php
                if(isset($_SESSION['admin'])){ ?>
                   <a href="./index.php?page=disconnect" class="pull-center">Zone administrateur : Déconnexion</a>
            <?php
                } else { ?>
                   <a href="./admin/index.php" class="pull-center">Zone administrateur : Connexion</a>
            <?php
                }
            ?>
        </footer>	
    </body>
</html>