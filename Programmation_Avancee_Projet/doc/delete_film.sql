CREATE OR REPLACE FUNCTION DELETE_FILM(integer)
  RETURNS integer AS
'
	DECLARE f_id_projection ALIAS FOR $1;
	DECLARE f_projection integer;
	DECLARE f_ticket integer;
	DECLARE retour integer;

	BEGIN
		SELECT INTO f_ticket id_ticket
		FROM ticket
		WHERE id_projection = f_id_projection;
		
		IF NOT FOUND
		THEN
			SELECT INTO f_projection id_projection
			FROM projection
			WHERE id_projection = f_id_projection;

			IF FOUND
			THEN
				DELETE FROM projection
				WHERE id_projection = f_id_projection;

				SELECT INTO f_id_projection id_projection
				FROM projection
				WHERE id_projection = f_id_projection;

				IF NOT FOUND
				THEN
					retour=1;
				ELSE
					retour=-1;
				END IF;
			ELSE
				retour=-2;
			END IF;
		
		ELSE
			retour=-3;
		END IF;
		RETURN retour;
	END;
'
  LANGUAGE 'plpgsql';