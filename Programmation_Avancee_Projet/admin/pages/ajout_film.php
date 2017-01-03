<?php require './lib/php/verifierCnx.php'; ?>
<?php

if(isset($_POST['ajouter'])) {
    $flag = 0;
    if($_POST['nom']=="") {
        print "Vous n'avez pas mentionner le nom</br>";
        $flag = 1;
    }
    if($_POST['desc']=="") {
        print "Vous n'avez pas entré la description</br>";
        $flag = 1;
    }
    if($_POST['duree']=="") {
        print "Vous n'avez pas mentionné la durée</br>";
        $flag = 1;
    }
    if($_POST['prix']=="") {
        print "Vous n'avez pas mentionné le prix</br>";
        $flag = 1;
    }
    if($_POST['salle']=="") {
        print "Vous n'avez pas choisi de salle</br>";
        $flag = 1;
    }
    if($_FILES['image']['error'] > 0) {
        if($_FILES['image']['error'] == 1) {
            print "Le fichier trop volumineux</br>";
        }
        else {
            print "Erreur lors du transfert</br>";
        }
        $flag = 1;
    }
    if(!isset($_POST['11h']) && !isset($_POST['14h']) && !isset($_POST['17h']) && !isset($_POST['21h'])) {
        print "Vous n'avez pas choisi d'heure</br>";
        $flag = 1;
    }
    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
    if (!in_array($extension_upload,$extensions_valides) ) {
        print "Extension incorrecte</br>";
        $flag = 1;
    }
    
    
    if($flag == 0) {
        $log = new DiffusionDB($cnx);
        $log2 = new FilmDB($cnx);
        if (isset($_POST['11h']))
        {
            $retour = $log->insert($_POST['salle'],"11h");
            if($retour>0) {
                $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['nom'].".".$extension_upload);
                if($retour2>0) {
                    $message="Le film a bien été créé à 11h !</br></br>";
                    print $message;
                }
                else {
                    $message2 = "Données incorrectes !";
                    print $message2;
                }
            }
            else {
                $message3 = "Salle déjà utilisée à 11h !</br></br>";
                print $message3;
            }
        }
        if (isset($_POST['14h']))
        {
            $retour = $log->insert($_POST['salle'],"14h");
            if($retour>0) {
                $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['nom'].".".$extension_upload);
                if($retour2>0) {
                    $message="Le film a bien été créé à 14h !</br></br>";
                    print $message;
                }
                else {
                    $message2 = "Données incorrectes !";
                    print $message2;
                }
            }
            else {
                $message3 = "Salle déjà utilisée à 14h !</br></br>";
                print $message3;
            }
        }
        if (isset($_POST['17h']))
        {
            $retour = $log->insert($_POST['salle'],"17h");
            if($retour>0) {
                $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['nom'].".".$extension_upload);
                if($retour2>0) {
                    $message="Le film a bien été créé à 17h !</br></br>";
                    print $message;
                }
                else {
                    $message2 = "Données incorrectes !";
                    print $message2;
                }
            }
            else {
                $message3 = "Salle déjà utilisée à 17h !</br></br>";
                print $message3;
            }
        }
        if (isset($_POST['21h']))
        {
            $retour = $log->insert($_POST['salle'],"21h");
            if($retour>0) {
                $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['nom'].".".$extension_upload);
                if($retour2>0) {
                    $message="Le film a bien été créé à 21h !</br></br>";
                    print $message;
                }
                else {
                    $message2 = "Données incorrectes !";
                    print $message2;
                }
            }
            else {
                $message3 = "Salle déjà utilisée à 21h !</br></br>";
                print $message3;
            }
        }
        $nom = "./images/affiches/{$_POST['nom']}.{$extension_upload}";
        $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
        if ($resultat) {
            print "Transfert réussi";
        }
    }
}
?>

<h2>Veuillez renseigner les champs suivants</h2>

<form action="index.php?page=ajout_film" method='post' enctype="multipart/form-data">
    <table id="ajout">
        <tr>
                <td><label class="gras" for="nom">Nom du film</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="nom" id="nom"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="duree">Durée</label></td>
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
                <td><input type="file" name="image" id="image" /></td>
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
