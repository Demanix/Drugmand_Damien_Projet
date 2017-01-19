CREATE OR REPLACE FUNCTION DELETE_DIFFUSION(integer)
  RETURNS integer AS
'
	DECLARE f_id_diffusion ALIAS FOR $1;
	DECLARE f_diffusion integer;
	DECLARE retour integer;

	BEGIN
		SELECT INTO f_diffusion id_diffusion
		FROM diffusion
		WHERE id_diffusion = f_id_diffusion;

		IF FOUND
		THEN
			DELETE FROM diffusion
			WHERE id_diffusion = f_id_diffusion;

			SELECT INTO f_id_diffusion id_diffusion
			FROM diffusion
			WHERE id_diffusion = f_id_diffusion;

			IF NOT FOUND
			THEN
				retour=1;
			ELSE
				retour=-1;
			END IF;
		ELSE
			retour=-2;
		END IF;
		RETURN retour;
	END;
'
  LANGUAGE 'plpgsql';