<?php
if (isset($_POST['submit_login'])) {
    if ($_POST['login'] == "admin" && $_POST['password'] == "admin") {
        $_SESSION['admin'] = 1;
        print "<META http-equiv=\"refresh\": Content=\"0;URL=./index.php?page=accueil_admin\">";
    } else {
        $message = "Données incorrectes";
    }
}
?>

<section id="message"><?php if (isset($message)) print $message; ?></section>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth_">    
    <h2>Authentifiez-vous</h2>
    <div class="col-sm-2 gras">Login : </div>
    <div class="col-sm-4"><input type="text" id="login_" name="login" /></div><br/><br/>
    <div class="col-sm-2 gras">Mot de passe :</div>
    <div class="col-sm-4"><input type="password" id="password_" name="password" /></div><br/><br/>
    <div class="col-sm-4">
        <input type="submit" name="submit_login" id="submit_login_" value="Login" />&nbsp;&nbsp;&nbsp;
        <input type="reset" id="annuler" value="Annuler" />
    </div>            
</form>
