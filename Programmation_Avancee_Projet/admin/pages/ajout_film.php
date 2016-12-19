<?php require './lib/php/verifierCnx.php'; 
$cnx = Connexion::getInstance($dsn, $user, $pass);
?>
<?php
if(isset($_POST['ajouter'])) {
    $log = new DiffusionDB($cnx);
    $retour = $log->insert($_POST['salle'],$_POST['heure']);
    if($retour>0) {
        $log2 = new FilmDB($cnx);
        $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['image']);
        if($retour2>0) {
            $message="Le film à bien été créé !";
            print $message;
        }
        else {
            $message2 = "Données incorrectes !";
            print $message2;
        }
    }
    else {
        $message3 = "Salle déjà utilisée à cette heure !";
        print $message3;
    }
}
?>

<h2>Veuillez renseigner les champs suivants</h2>

<form action="index.php?page=ajout_film" method='post'>
    <table id="ajout">
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
                <td><input type="number" name="salle" id="salle"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="heure">Heure</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="heure" id="heure"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="image">Image</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="image" id="image"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        </br>	
        </br>
        <tr>
                <td><input class="button" type="reset" value="Annuler"></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Ajouter" name="ajouter" id="ajouter"></td>
        </tr>
    </table>
</form>
