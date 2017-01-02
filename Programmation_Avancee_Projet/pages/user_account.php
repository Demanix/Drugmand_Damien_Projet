<?php
if(isset($_SESSION['user'])){ 
    $log = new UserDB($cnx);
    $liste = $log->getClient($_SESSION['user']);
}

if(isset($_POST['modifier'])) {
    $retour = $log->update($_POST['id_client'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['login'],$_POST['password']);
    if($retour==1) {
        $message="Le compte à bien été modifié !";
        print $message;
    }
    else {
        $message = "Données incorrectes !";
        print $message;
    }
}
?>

<form action="index.php" method='post'>
    <table id="inscrire">
        <tr>
                <td><label class="gras" for="nom">Nom</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="nom" id="nom" placeholder="Nom" value="<?php print $liste->nom_client; ?>" /></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="nom">Prénom</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php print $liste->prenom_client; ?>" /></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="nom">E-Mail</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="email" name="email" id="email" placeholder="E-Mail" value="<?php print $liste->email_client; ?>" /></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="nom">Login</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="login" id="login" placeholder="Login" value="<?php print $liste->login; ?>" /></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="nom">Mot de passe</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="password" name="password" id="password" placeholder="Mot de passe"  /></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><input type="hidden" name="id_client" id="id_client" value="<?php print $liste->id_client; ?>"  /></td>
        </tr>
        </br>	
        </br>
        <tr>
                <td><input class="button" type="reset" value="Annuler"></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Modifier" name="modifier" id="modifier"></td>
        </tr>
    </table>
</form>