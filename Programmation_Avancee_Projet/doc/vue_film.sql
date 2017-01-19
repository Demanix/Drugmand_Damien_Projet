create or replace view vue_film as select
projection.id_projection,
projection.nom,
projection.description,
projection.duree,
projection.prix,
projection.image,
diffusion.heure_diffusion,
diffusion.nb_places_restantes,
diffusion.id_salle,
projection.id_diffusion
from projection,diffusion
where projection.id_diffusion=diffusion.id_diffusion;