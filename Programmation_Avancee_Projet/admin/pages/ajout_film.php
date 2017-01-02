<?php require './lib/php/verifierCnx.php'; 
?>
<?php



if(isset($_POST['ajouter'])) {
    $log = new DiffusionDB($cnx);
    $log2 = new FilmDB($cnx);
    if (isset($_POST['11h']))
    {
        $retour = $log->insert($_POST['salle'],"11h");
        if($retour>0) {
            $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['image']);
            if($retour2>0) {
                $message="Le film a bien été créé !";
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
    if (isset($_POST['14h']))
    {
        $retour = $log->insert($_POST['salle'],"14h");
        if($retour>0) {
            $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['image']);
            if($retour2>0) {
                $message="Le film a bien été créé !";
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
    if (isset($_POST['17h']))
    {
        $retour = $log->insert($_POST['salle'],"17h");
        if($retour>0) {
            $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['image']);
            if($retour2>0) {
                $message="Le film a bien été créé !";
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
    if (isset($_POST['21h']))
    {
        $retour = $log->insert($_POST['salle'],"21h");
        if($retour>0) {
            $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['image']);
            if($retour2>0) {
                $message="Le film a bien été créé !";
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
    else
    {
        echo 'Vous n\'avez pas choisi d\'heure';
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
                <td><input type="number" name="prix" id="prix"/></td>
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
                <td><input type="checkbox" name="11h" id="11h"/>11h&nbsp;&nbsp;
                    <input type="checkbox" name="14h" id="14h"/>14h&nbsp;&nbsp;
                    <input type="checkbox" name="17h" id="17h"/>17h&nbsp;&nbsp;
                    <input type="checkbox" name="21h" id="21h"/>21h&nbsp;&nbsp;
                </td>
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
