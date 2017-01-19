CREATE OR REPLACE FUNCTION INSERT_DIFFUSION(integer,text)
  RETURNS integer AS
'
	DECLARE f_id_salle ALIAS FOR $1;
	DECLARE f_heure ALIAS FOR $2;
	DECLARE f_nb_places_restantes integer;
	DECLARE f_id_diffusion integer;
	DECLARE retour integer;

	BEGIN
		SELECT INTO f_id_diffusion id_diffusion
		FROM diffusion
		WHERE heure_diffusion= f_heure
		AND id_salle= f_id_salle;

		IF NOT FOUND
		THEN
			SELECT INTO f_nb_places_restantes nb_place
			FROM salle
			WHERE id_salle = f_id_salle;
			
			INSERT INTO diffusion(id_salle, heure_diffusion, nb_places_restantes)
			VALUES (f_id_salle, f_heure, f_nb_places_restantes);

			SELECT INTO f_id_diffusion id_diffusion
			FROM diffusion
			WHERE heure_diffusion= f_heure
			AND id_salle= f_id_salle;

			IF NOT FOUND
			THEN
				retour=-1;
			ELSE
				retour=f_id_diffusion;
			END IF;
		ELSE
			retour=-2;
		END IF;
		RETURN retour;
	END;
'
  LANGUAGE 'plpgsql';