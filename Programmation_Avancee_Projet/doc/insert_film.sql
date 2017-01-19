CREATE OR REPLACE FUNCTION INSERT_FILM(integer,text,integer,text,integer,text)
  RETURNS integer AS
'
	DECLARE f_id_diffusion ALIAS FOR $1;
	DECLARE f_nom ALIAS FOR $2;
	DECLARE f_prix ALIAS FOR $3;
	DECLARE f_description ALIAS FOR $4;
	DECLARE f_duree ALIAS FOR $5;
	DECLARE f_image ALIAS FOR $6;
	DECLARE f_id_projection integer;
	DECLARE retour integer;

	BEGIN
		SELECT INTO f_id_projection id_projection
		FROM projection
		WHERE nom=f_nom 
		AND id_diffusion=f_id_diffusion;

		IF NOT FOUND
		THEN
			INSERT INTO projection(id_diffusion,nom, prix, description, duree, image)
			VALUES (f_id_diffusion, f_nom, f_prix, f_description, f_duree, f_image);

			SELECT INTO f_id_projection id_projection
			FROM projection
			WHERE nom=f_nom 
			AND id_diffusion=f_id_diffusion;

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