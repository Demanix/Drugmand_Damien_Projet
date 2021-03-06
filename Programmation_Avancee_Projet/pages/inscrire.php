<?php
if(isset($_GET['id_projection']))
{
    $liste = new Vue_filmDB($cnx);
    $liste_t = $liste->getListeTousFilms();
    $nbrT = count($liste_t);
    $liste_f = $liste->getFilmById($_GET['id_projection']);
    $nbrG = count($liste_f);
}
?>

<?php
if(isset($_POST['confirmer'])) {
    if(!empty($_POST['nb']))
    {
        $log2 = new DiffusionDB($cnx);
        $retour2 = $log2->update($_POST['id_diffusion'],$_POST['nb']);
        if($retour2==1) {
            $log = new TicketDB($cnx);
            $retour = $log->insert($_SESSION['user'],$_POST['id_projection'],$_POST['nb']);
            if($retour != -1) {
                $message = "Confirmation";
            }
            else {
                $message = "Données incorrectes";
            }
        }
        else {
            $message = "Il n'y a plus assez de places libres dans cette salle !";
        }
    }
    else
    {
        $message = "Vous n'avez pas selectionner le nombre de tickets";
    }
}
?>

<?php
if(isset($_SESSION['user']) && isset($_GET['id_projection']))
{
    ?><h2>Veuillez ajouter le nombre de tickets que vous voulez,</h2>
    <h2>puis confirmer votre achat</h2><?php
    if (isset($nbrG) && $nbrG > 0) {
        ?>

            <?php
            for ($i = 0; $i < $nbrG; $i++) {
                ?>
                    <div class="col-sm-12">
                        <form action="index.php?page=inscrire.php" method='post' id="achat">
                            <table id="ajout">
                                <tr>
                                        <td><label class="gras" for="nom">Nom du film</label></td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><p><?php print $liste_f[$i]['nom'];?></></td>
                                </tr>
                                <tr><td>&nbsp; </td></tr>
                                <tr>
                                        <td><label class="gras" for="desc">Description</label></td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><p align="justified"><?php print $liste_f[$i]['description'];?></></td>
                                </tr>
                                <tr><td>&nbsp; </td></tr>
                                <tr>
                                        <td><label class="gras" for="nom">Durée</label></td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><p><?php print $liste_f[$i]['duree']." minutes";?></></td>
                                </tr>
                                <tr><td>&nbsp; </td></tr>
                                <tr>
                                        <td><label class="gras" for="prix">Prix</label></td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><p><?php print $liste_f[$i]['prix'];?></>&euro;</td>
                                </tr>
                                <tr><td>&nbsp; </td></tr>
                                <tr>
                                        <td><label class="gras" for="heure">Heure</label></td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><p><?php print $liste_f[$i]['heure_diffusion'];?></p></td>
                                </tr>
                                <tr><td>&nbsp; </td></tr>
                                <tr>
                                        <td><label class="gras" for="salle">Salle</label></td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><p><?php print $liste_f[$i]['id_salle'];?></></td>
                                </tr>
                                <tr><td>&nbsp; </td></tr>
                                <tr>
                                        <td><label class="gras" for="salle">Nombre de tickets</label></td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><input type="number" name="nb" id="nb" min="1" /></td>
                                </tr>
                                <tr><td>&nbsp; </td></tr>
                                <tr>
                                    <input type="hidden" value="<?php print $_GET['id_projection'];?>" name="id_projection" id="id_projection" />
                                    <input type="hidden" value="<?php print $liste_f[$i]['id_diffusion'];?>" name="id_diffusion" id="id_diffusion" />
                                </tr>
                                <tr><td>&nbsp; </td></tr>
                                </br>	
                                </br>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Confirmer" name="confirmer" id="confirmer"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                <?php
            }
    }
}
if(!isset($_SESSION['user'])) {
    ?> <h2>Vous devez être connecté pour effectuer cette opération</h2> <?php
}
if(isset($message)) {
    ?> <h2><?php print $message; ?></h2> <?php
    if(isset($retour) && $retour>0){
        ?> <p>Votre commande à bien été effectuée !</p> 
        <p>Un email avec votre ticket vous a été envoyé. Vous pouvez également le consulter et le télécharger en cliquant ---><a href="index.php?page=PrintTicket.php&amp;id_ticket=<?php print $retour;?>" target="_blank">ici</a><---</p>
        <p>Nous vous remercions de votre achat et nous vous souhaitons d'avance une agréable scéance.</p>
        <p> A demain, au cinéma Demanix !</p><?php
    }
}