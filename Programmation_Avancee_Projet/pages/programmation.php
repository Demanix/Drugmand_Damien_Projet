<?php
$liste = new Vue_filmDB($cnx);
$liste_t = $liste->getListeTousFilms();
$nbrT = count($liste_t);
if($nbrT==0) {
    ?><h2>Il n'y a aucun film pour le moment !</h2><?php
}
 else {
?>
</br></br>
<div class="pull-center">
    <div class="col-sm-12">
        <div id="gt_carousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators : qui indiquent l'image affichée -->
            <ol class="carousel-indicators">
                <?php
                $nb_fichier = 0;
                if($dossier = opendir('././admin/images/affiches'))
                {
                    while(false != ($fichier = readdir($dossier)))
                    {
                        if($fichier != ".." && $fichier != ".")
                        {
                          $nb_fichier++;
                        }
                    }
                    closedir($dossier);
                }
                for($i=0;$i<$nb_fichier;$i++)
                {
                    if($i==0) {
                            ?><li data-target="#gt_carousel" data-slide-to="0" class="active"></li><?php
                    }
                    else {
                            ?><li data-target="#gt_carousel" data-slide-to="<?php $i; ?>"></li><?php
                    }
                }
                ?>
            </ol>
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <?php
                if($dossier = opendir('././admin/images/affiches'))
                {
                    $nb_fichier2 = 0;
                    while(false !== ($fichier = readdir($dossier)))
                    {
                        if($fichier != ".." && $fichier != ".")
                        {
                            $nb_fichier2++;
                            if($nb_fichier2 == 1) {
                                    ?><div class="item active"><img class="affiche" src="././admin/images/affiches/<?php print $fichier; ?>" alt="First Slide"></div><?php
                            }
                            else {
                                    ?><div class="item"><img class="affiche" src="././admin/images/affiches/<?php print $fichier; ?>"></div><?php
                            }
                        }
                    }
                    closedir($dossier);
                }
                ?>
            </div>
            <!-- Carousel controls -->
            <a class="carousel-control left" href="#gt_carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#gt_carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>
</br>&nbsp;</br>&nbsp;
<h2>Cliquez sur l'heure du film de votre choix pour réserver votre ticket pour demain !</h2>

</br>&nbsp;</br>&nbsp;
<div class="pull-center">
    <div class="col-sm-12">
        <table class="programmation">
            <tr class="programmation3">
                <td>Nom</td><td>&nbsp;&nbsp;&nbsp;</td>
                <td class="colaenlever">Prix</td><td>&nbsp;&nbsp;&nbsp;</td>
                <td class="colaenlever colaenlever2">Durée</td><td>&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td>
            </tr>
                <?php
                $j = 0;
                for($i=0;$i<$nbrT;$i++) { $j++;?>
            <tr <?php if($j % 2){print 'class="programmation2"';}else{print 'class="programmation1"';}?> title="<?php print $liste_t[$i]->description ?>">
                    <td><?php print $liste_t[$i]->nom ?></td><td>&nbsp;&nbsp;&nbsp;</td>
                    <td class="colaenlever"><?php print $liste_t[$i]->prix  . " &euro;" ?></td><td>&nbsp;&nbsp;&nbsp;</td>
                    <td class="colaenlever colaenlever2"><?php print $liste_t[$i]->duree  . " minutes" ?></td><td>&nbsp;&nbsp;&nbsp;</td>

                    <?php if($i<$nbrT && $liste_t[$i]->heure_diffusion == '11h'){?>
                    <td><a href="index.php?page=inscrire.php&amp;id_projection=<?php print $liste_t[$i]->id_projection;?>" title= "<?php print $liste_t[$i]->nb_places_restantes  . " places restantes"; ?>" ><?php print $liste_t[$i]->heure_diffusion ?></a></td>
                    <?php if($i+1<$nbrT && $liste_t[$i+1]->nom == $liste_t[$i]->nom){$i=$i+1;} ?>
                    <?php } else { ?> <td>&nbsp;&nbsp;/&nbsp;&nbsp;</td>
                    <?php } ?>

                    <td>&nbsp;&nbsp;&nbsp;</td>

                    <?php if($i<$nbrT && $liste_t[$i]->heure_diffusion == '14h'){?>
                    <td><a href="index.php?page=inscrire.php&amp;id_projection=<?php print $liste_t[$i]->id_projection;?>" title= "<?php print $liste_t[$i]->nb_places_restantes  . " places restantes"; ?>" ><?php print $liste_t[$i]->heure_diffusion ?></a></td>
                    <?php if($i+1<$nbrT && $liste_t[$i+1]->nom == $liste_t[$i]->nom){$i=$i+1;} ?>
                    <?php } else { ?> <td>&nbsp;&nbsp;/&nbsp;&nbsp;</td>
                    <?php } ?>

                    <td>&nbsp;&nbsp;&nbsp;</td>

                    <?php if($i<$nbrT && $liste_t[$i]->heure_diffusion == '17h'){?>
                    <td><a href="index.php?page=inscrire.php&amp;id_projection=<?php print $liste_t[$i]->id_projection;?>" title= "<?php print $liste_t[$i]->nb_places_restantes  . " places restantes"; ?>" ><?php print $liste_t[$i]->heure_diffusion ?></a></td>
                    <?php if($i+1<$nbrT && $liste_t[$i+1]->nom == $liste_t[$i]->nom){$i=$i+1;} ?>
                    <?php } else { ?> <td>&nbsp;&nbsp;/&nbsp;&nbsp;</td>
                    <?php } ?>

                    <td>&nbsp;&nbsp;&nbsp;</td>

                    <?php if($i<$nbrT && $liste_t[$i]->heure_diffusion == '21h'){?>
                    <td><a href="index.php?page=inscrire.php&amp;id_projection=<?php print $liste_t[$i]->id_projection;?>" title= "<?php print $liste_t[$i]->nb_places_restantes  . " places restantes"; ?>" ><?php print $liste_t[$i]->heure_diffusion ?></a></td>
                    <?php } else { ?> <td>&nbsp;&nbsp;/&nbsp;&nbsp;</td>
                    <?php } ?>

                    <td>&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <?php } ?>
        </table>
    </div>
</div>
<?php
 }