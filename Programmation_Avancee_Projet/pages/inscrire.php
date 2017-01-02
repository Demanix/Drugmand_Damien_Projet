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
    $log = new TicketDB($cnx);
    $retour = $log->insert($_SESSION['user'],$_POST['id_projection'],$_POST['nb']);
    if($retour!=-1) {
        $message="Confirmation";
    }
    else {
        $message = "Données incorrectes !";
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

        <div class="container">
            <?php
            for ($i = 0; $i < $nbrG; $i++) {
                ?>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="./images/<?php print $liste_f[$i]['image']; ?>" alt="image"/>                
                    </div>
                    <div class="col-sm-4 txtGras">

                        <form action="index.php?page=inscrire.php" method='post'>
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
                                        <td><input type="number" name="nb" id="nb" /></td>
                                </tr>
                                <tr><td>&nbsp; </td></tr>
                                <tr>
                                    <input type="hidden" value="<?php print $_GET['id_projection'];?>" name="id_projection" id="id_projection" />
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
                </div>
                <?php
            }
            ?>
        </div>
        <?php
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