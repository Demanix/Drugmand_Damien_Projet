CREATE OR REPLACE FUNCTION INSERT_CLIENT(text,text,text,text,text)
  RETURNS integer AS
'
	DECLARE f_nom_client ALIAS FOR $1;
	DECLARE f_prenom_client ALIAS FOR $2;
	DECLARE f_email_client ALIAS FOR $3;
	DECLARE f_login_client ALIAS FOR $4;
	DECLARE f_password_client ALIAS FOR $5;
	DECLARE f_id_client integer;
	DECLARE retour integer;

	BEGIN
		SELECT INTO f_id_client id_client
		FROM client
		WHERE login= f_login_client
		AND email_client= f_email_client;

		IF NOT FOUND
		THEN
			INSERT INTO client(nom_client, prenom_client, email_client, login, password)
			VALUES (f_nom_client, f_prenom_client, f_email_client, f_login_client, f_password_client);

			SELECT INTO f_id_client id_client
			FROM client
			WHERE login= f_login_client
			AND email_client= f_email_client;

			IF NOT FOUND
			THEN
				retour=-1;
			ELSE
				retour=1;
			END IF;
		ELSE
			retour=2;
		END IF;
		RETURN retour;
	END;
'
  LANGUAGE 'plpgsql';