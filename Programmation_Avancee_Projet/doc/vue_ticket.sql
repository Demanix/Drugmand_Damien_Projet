create or replace view vue_ticket as select
ticket.id_ticket,
ticket.nb_ticket,
client.id_client,
client.nom_client,
client.prenom_client,
client.email_client,
projection.nom,
projection.description,
projection.duree,
projection.prix,
projection.image,
diffusion.heure_diffusion,
diffusion.id_salle
from client,ticket,projection,diffusion
where client.id_client=ticket.id_client AND projection.id_projection=ticket.id_projection AND projection.id_diffusion=diffusion.id_diffusion;