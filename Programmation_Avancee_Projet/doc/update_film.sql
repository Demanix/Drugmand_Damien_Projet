CREATE OR REPLACE FUNCTION UPDATE_FILM(integer,text,integer,text,integer,text)
  RETURNS integer AS
'
	DECLARE f_id_projection ALIAS FOR $1;
	DECLARE f_nom ALIAS FOR $2;
	DECLARE f_prix ALIAS FOR $3;
	DECLARE f_description ALIAS FOR $4;
	DECLARE f_duree ALIAS FOR $5;
	DECLARE f_image ALIAS FOR $6;
	DECLARE f_projection integer;
	DECLARE retour integer;

	BEGIN
		SELECT INTO f_projection id_projection
		FROM projection
		WHERE id_projection=f_id_projection;

		IF FOUND
		THEN
			UPDATE projection SET nom=f_nom, prix=f_prix, description=f_description, duree=f_duree, image=f_image
			WHERE id_projection = f_id_projection;

			SELECT INTO f_projection id_projection
			FROM projection
			WHERE id_projection=f_id_projection AND nom=f_nom;

			IF NOT FOUND
			THEN
				retour=-1;
			ELSE
				retour=1;
			END IF;
		ELSE
			retour=-2;
		END IF;
		RETURN retour;
	END;
'
  LANGUAGE 'plpgsql';