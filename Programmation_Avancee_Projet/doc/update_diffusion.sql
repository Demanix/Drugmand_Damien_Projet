CREATE OR REPLACE FUNCTION UPDATE_DIFFUSION(integer,integer)
  RETURNS integer AS
'
	DECLARE f_id_diffusion ALIAS FOR $1;
	DECLARE f_nb ALIAS FOR $2;
	DECLARE f_nb_places_restantes integer;
	DECLARE retour integer;

	BEGIN
		SELECT INTO f_nb_places_restantes nb_places_restantes
		FROM diffusion
		WHERE id_diffusion=f_id_diffusion;

		IF f_nb_places_restantes > f_nb
		THEN
			UPDATE diffusion SET nb_places_restantes = nb_places_restantes - f_nb
			WHERE id_diffusion = f_id_diffusion;

			retour=1;
		ELSE
			retour=-1;
		END IF;
		RETURN retour;
	END;
'
  LANGUAGE 'plpgsql';