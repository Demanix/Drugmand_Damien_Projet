<?php require './lib/php/verifierCnx.php'; ?>

<h2 class="txtRouge">Gestion des projections</h2>
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

<div class="container">
    <div class="row">
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <div class="col-sm-3">
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
    </div>
</div>
<br/>
<?php

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
                    <?php
                    print $liste_f[$i]['nom'] . "<br/><br/>";
                    print $liste_f[$i]['prix'] . " &euro;<br/><br/>";
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
        <?php
    }
    ?>

