CREATE OR REPLACE FUNCTION INSERT_TICKET(integer,integer,integer)
  RETURNS integer AS
'
	DECLARE f_id_client ALIAS FOR $1;
	DECLARE f_id_projection ALIAS FOR $2;
	DECLARE f_nb_ticket ALIAS FOR $3;
	DECLARE retour integer;

	BEGIN
		INSERT INTO ticket(id_client,id_projection,nb_ticket)
		VALUES (f_id_client,f_id_projection,f_nb_ticket);

		SELECT INTO retour id_ticket
		FROM ticket
		WHERE id_projection=f_id_projection AND id_client=f_id_client AND nb_ticket=f_nb_ticket;

		IF NOT FOUND
		THEN
			retour=-1;
		END IF;
		RETURN retour;
	END;
'
  LANGUAGE 'plpgsql';