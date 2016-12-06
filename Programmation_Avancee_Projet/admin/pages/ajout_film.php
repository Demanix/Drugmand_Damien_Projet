<?php require './lib/php/verifierCnx.php'; ?>

<?php
if(isset($_POST['ajouter'])) {
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

<h2>Veuillez renseigner les champs suivants</h2>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post'>
    <table id="inscrire">
        <tr>
                <td><label class="gras" for="nom">Nom du film</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="nom" id="nom"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="nom">Durée</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="number" name="duree" id="duree"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="desc">Description</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="desc" id="desc"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="prix">Prix</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="float" name="prix" id="prix"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="salle">Salle</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="salle" id="salle"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="heure">Heure</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="heure" id="heure"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        </br>	
        </br>
        <tr>
                <td><input class="button" type="reset" value="Annuler"></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Ajouter" name="envoyer" id="envoyer"></td>
        </tr>
    </table>
</form>
