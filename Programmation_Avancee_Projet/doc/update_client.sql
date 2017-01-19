CREATE OR REPLACE FUNCTION UPDATE_CLIENT(integer,text,text,text,text,text)
  RETURNS integer AS
'
	DECLARE f_id_client ALIAS FOR $1;
	DECLARE f_nom_client ALIAS FOR $2;
	DECLARE f_prenom_client ALIAS FOR $3;
	DECLARE f_email_client ALIAS FOR $4;
	DECLARE f_login_client ALIAS FOR $5;
	DECLARE f_password_client ALIAS FOR $6;
	DECLARE f_client integer;
	DECLARE retour integer;

	BEGIN
		SELECT INTO f_client id_client
		FROM client
		WHERE login= f_login_client
		AND email_client= f_email_client
		AND id_client<>f_id_client;

		IF NOT FOUND
		THEN
			UPDATE client SET nom_client=f_nom_client, prenom_client=f_prenom_client, email_client=f_email_client, login=f_login_client, password=f_password_client
			WHERE id_client = f_id_client;

			SELECT INTO f_client id_client
			FROM client
			WHERE id_client = f_id_client
			AND nom_client = f_nom_client
			AND prenom_client = f_prenom_client
			AND email_client = f_email_client
			AND login = f_login_client
			AND password = f_password_client;

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