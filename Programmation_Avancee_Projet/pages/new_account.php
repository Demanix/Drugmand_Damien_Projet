<?php
if(isset($_POST['envoyer'])) {
    $log = new UserDB($cnx);
    $retour = $log->insert($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['login'],$_POST['password']);
    if($retour==1) {
        $message="Le compte à bien été créé !";
        print $message;
    }
    else {
        $message = "Données incorrectes !";
        print $message;
    }
}
?>


<h2>Veuillez remplir les champs suivant afin de créer votre compte</h2>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post'>
    <table id="inscrire">
        <tr>
                <td><label class="gras" for="nom">Nom</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="nom" id="nom" placeholder="Nom"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="nom">Prénom</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="prenom" id="prenom" placeholder="Prénom"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="nom">E-Mail</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="email" name="email" id="email" placeholder="E-Mail"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="nom">Login</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="login" id="login" placeholder="Login"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="nom">Mot de passe</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="password" name="password" id="password" placeholder="Mot de passe"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        </br>	
        </br>
        <tr>
                <td><input class="button" type="reset" value="Annuler"></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Confirmer" name="envoyer" id="envoyer"></td>
        </tr>
    </table>
</form>
