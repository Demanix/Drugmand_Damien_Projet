<?php require './lib/php/verifierCnx.php'; ?>

<?php
$liste = new Vue_filmDB($cnx);
$liste_t = $liste->getListeTousFilms();
$nbrT = count($liste_t);
if (isset($_GET['submit_type'])) {
    extract($_GET, EXTR_OVERWRITE);
    if ($choix_film > 0) {
        $liste_f = $liste->getFilmById($choix_film);
        $nbrG = count($liste_f);
    }
}
?>

<?php
if(isset($_POST['supprimer'])) {
    $log = new FilmDB($cnx);
    $retour = $log->delete($_POST['id_projection']);
    if($retour==1) {
        $log2 = new DiffusionDB($cnx);
        $retour2 = $log2->delete($_POST['id_diffusion']);
        if($retour2==1) {
            print "<meta http-equiv=\"refresh\" content=\"0\">";
            $message="Le film a bien été supprimé !";
            print $message;
        }
        else {
            $message2 = "Erreur de suppression de la diffusion !";
            print $message2;
        }
    }
    if($retour==-3) {
        print "Des clients ont acheté des tickets pour ce film !";
    }
    else {
        $message3 = "Erreur de suppression du film !";
        print $message3;
    }
}

if(isset($_POST['modifier'])) {
    $flag = 0;
    if(empty($_POST['nom']) || empty($_POST['desc']) || empty($_POST['duree']) || empty($_POST['prix'])) {
        print "Veuillez renseigner tous les champs</br>";
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
    
    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
    if (!in_array($extension_upload,$extensions_valides) ) {
        print "Extension incorrecte</br>";
        $flag = 1;
    }
    
    if($flag == 0) {
        $log = new FilmDB($cnx);
        $retour = $log->update($_POST['id_projection'],$_POST['nom'],$_POST['prix'],$_POST['desc'],$_POST['duree'],$_POST['nom'].".".$extension_upload);
        if($retour>0) {
            $nom = "./images/affiches/{$_POST['nom']}.{$extension_upload}";
            $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);
            if ($resultat) {
                print "Transfert réussi";
            }
            print "<meta http-equiv=\"refresh\" content=\"0\">";
            $message="Le film a bien été mis à jour !";
            print $message;
        }
        else {
            $message2 = "Données incorrectes !";
            print $message2;
        }
    }
}
?>

<h2 class="txtRouge">Gestion des projections</h2>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <div class="col-sm-4">
                <select name="choix_film" id="choix_film">
                    <option value="0">Choisissez</option>
                    <?php
                    for ($i = 0; $i < $nbrT; $i++) {
                        ?>                    
                        <option value="<?php print $liste_t[$i]->id_projection; ?>">
                            <?php print "Nom : "; print utf8_encode($liste_t[$i]->nom); 
                            print " -  Heure : "; print $liste_t[$i]->heure_diffusion; 
                            print " -  Salle "; print $liste_t[$i]->id_salle; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>

            </div>
            <div class="col-sm-1">
                <input type="submit" name="submit_type" value="Choisir" id="submit_type"/>
            </div> 
        </form>
<br/>
<?php
if (isset($nbrG) && $nbrG > 0) {
    ?>

        <?php
        for ($i = 0; $i < $nbrG; $i++) {
            ?>
                <div class="col-sm-4">
                    <form action="index.php?page=gestion_film" method='post' enctype="multipart/form-data" id="form_gestion_film">
                        <table>
                            <tr>
                                    <td><label class="gras" for="nom">Nom du film</label></td>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td><input type="text" name="nom" id="nom" value="<?php print $liste_f[$i]['nom'];?>"  /></td>
                            </tr>
                            <tr><td>&nbsp; </td></tr>
                            <tr>
                                    <td><label class="gras" for="nom">Durée</label></td>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td><input type="number" name="duree" id="duree" value="<?php print $liste_f[$i]['duree'];?>"  /></td>
                            </tr>
                            <tr><td>&nbsp; </td></tr>
                            <tr>
                                    <td><label class="gras" for="desc">Description</label></td>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td><input type="text" name="desc" id="desc" value="<?php print $liste_f[$i]['description'];?>"  /></td>
                            </tr>
                            <tr><td>&nbsp; </td></tr>
                            <tr>
                                    <td><label class="gras" for="prix">Prix</label></td>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td><input type="number" name="prix" id="prix" value="<?php print $liste_f[$i]['prix'];?>"  />&euro;</td>
                            </tr>
                            <tr><td>&nbsp; </td></tr>
                            <tr>
                                    <td><label class="gras" for="image">Image</label></td>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                    <td><input type="file" name="image" id="image" /></td>
                            </tr>
                            <tr>
                                <input type="hidden" value="<?php print $liste_f[$i]['id_diffusion'];?>" name="id_diffusion" id="id_diffusion" />
                                <input type="hidden" value="<?php print $liste_f[$i]['id_projection'];?>" name="id_projection" id="id_projection" />
                            </tr>
                            <tr><td>&nbsp; </td></tr>
                            </br>	
                            </br>
                            <tr>
                                <td><input class="button" type="reset" value="Annuler"></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Supprimer" name="supprimer" id="supprimer"/>
                                &nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Modifier" name="modifier" id="modifier"/></td>
                            </tr>
                        </table>
                    </form>
                    
                </div>
            <?php
        }
    }

