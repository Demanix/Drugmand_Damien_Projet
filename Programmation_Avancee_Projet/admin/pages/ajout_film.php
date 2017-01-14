<?php require './lib/php/verifierCnx.php'; ?>

<?php
$liste = new SalleDB($cnx);
$liste_t = $liste->getSalle();
$nbrT = count($liste_t);
?>

<?php
if(isset($_POST['ajouter'])) {
    $flag = 0;
    $flag2 = 0;
    
    if(empty($_POST['nom']) || empty($_POST['desc']) || empty($_POST['duree']) || empty($_POST['prix']) || empty($_POST['salle'])) {
        ?><div class="alert alert-danger"><strong><?php print "Veuillez renseigner tous les champs"; ?></strong></div><?php
        $flag = 1;
    }
    if($_FILES['image']['error'] > 0) {
        if($_FILES['image']['error'] == 1) {
            ?><div class="alert alert-danger"><strong><?php print "Le fichier trop volumineux"; ?></strong></div><?php
        }
        else {
            ?><div class="alert alert-danger"><strong><?php print "Erreur lors du transfert"; ?></strong></div><?php
        }
        $flag = 1;
    }
    if(!isset($_POST['11h']) && !isset($_POST['14h']) && !isset($_POST['17h']) && !isset($_POST['21h'])) {
        ?><div class="alert alert-danger"><strong><?php print "Vous n'avez pas choisi d'heure"; ?></strong></div><?php
        $flag = 1;
    }
    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
    if (!in_array($extension_upload,$extensions_valides) ) {
        ?><div class="alert alert-danger"><strong><?php print "Extension incorrecte</br>"; ?></strong></div><?php
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
                    ?><div class="alert alert-success"><strong><?php print $message; ?></strong></div><?php
                }
                else {
                    $message2 = "Données incorrectes !";
                    ?><div class="alert alert-danger"><strong><?php print $message2; ?></strong></div><?php
                }
            }
            else {
                $message3 = "Salle déjà utilisée à 11h !</br></br>";
                ?><div class="alert alert-danger"><strong><?php print $message3; ?></strong></div><?php
            }
        }
        if (isset($_POST['14h']))
        {
            $retour = $log->insert($_POST['salle'],"14h");
            if($retour>0) {
                $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['nom'].".".$extension_upload);
                if($retour2>0) {
                    $message="Le film a bien été créé à 14h !</br></br>";
                    ?><div class="alert alert-success"><strong><?php print $message; ?></strong></div><?php
                }
                else {
                    $message2 = "Données incorrectes !";
                    ?><div class="alert alert-danger"><strong><?php print $message2; ?></strong></div><?php
                    $flag2 = 1;
                }
            }
            else {
                $message3 = "Salle déjà utilisée à 14h !</br></br>";
                ?><div class="alert alert-danger"><strong><?php print $message3; ?></strong></div><?php
                $flag2 = 1;
            }
        }
        if (isset($_POST['17h']))
        {
            $retour = $log->insert($_POST['salle'],"17h");
            if($retour>0) {
                $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['nom'].".".$extension_upload);
                if($retour2>0) {
                    $message="Le film a bien été créé à 17h !</br></br>";
                    ?><div class="alert alert-success"><strong><?php print $message; ?></strong></div><?php
                }
                else {
                    $message2 = "Données incorrectes !";
                    ?><div class="alert alert-danger"><strong><?php print $message2; ?></strong></div><?php
                    $flag2 = 1;
                }
            }
            else {
                $message3 = "Salle déjà utilisée à 17h !</br></br>";
                ?><div class="alert alert-danger"><strong><?php print $message3; ?></strong></div><?php
                $flag2 = 1;
            }
        }
        if (isset($_POST['21h']))
        {
            $retour = $log->insert($_POST['salle'],"21h");
            if($retour>0) {
                $retour2 = $log2->insert($retour,$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['nom'].".".$extension_upload);
                if($retour2>0) {
                    $message="Le film a bien été créé à 21h !</br></br>";
                    ?><div class="alert alert-success"><strong><?php print $message; ?></strong></div><?php
                }
                else {
                    $message2 = "Données incorrectes !";
                    ?><div class="alert alert-danger"><strong><?php print $message2; ?></strong></div><?php
                    $flag2 = 1;
                }
            }
            else {
                $message3 = "Salle déjà utilisée à 21h !</br></br>";
                ?><div class="alert alert-danger"><strong><?php print $message3; ?></strong></div><?php
                $flag2 = 1;
            }
        }
        if($flag2 == 0)
        {
            $nom = "./images/affiches/{$_POST['nom']}.{$extension_upload}";
            $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
            if (!$resultat) {
                ?><div class="alert alert-warning"><strong><?php print "Erreur de transfert de l'image. Veuillez contacter un administrateur."; ?></strong></div><?php
            }
        }
    }
}
?>

<h2>Veuillez renseigner les champs suivants</h2>

<form action="index.php?page=ajout_film" method='post' enctype="multipart/form-data" id="form_ajout_film">
    <table>
        <tr>
                <td><label class="gras" for="nom">Nom du film</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="nom" id="nom"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="duree">Durée</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><input type="number" name="duree" id="duree" min="1"/></td>
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
                <td><input type="number" name="prix" id="prix" min="1"/></td>
        </tr>
        <tr><td>&nbsp; </td></tr>
        <tr>
                <td><label class="gras" for="salle">Salle</label></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <select name="salle" id="salle">
                    <option value="0">Choisissez</option>
                    <?php
                    for ($i = 0; $i < $nbrT; $i++) {
                        ?>                    
                        <option value="<?php print $liste_t[$i]->id_salle; ?>">
                            <?php print "Salle ".$liste_t[$i]->id_salle." - ".$liste_t[$i]->nb_place." places"?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                </td>
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
