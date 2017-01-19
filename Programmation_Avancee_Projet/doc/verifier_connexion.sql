CREATE OR REPLACE FUNCTION verifier_connexion(text, text)
  RETURNS integer AS
'
declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;
begin
	select into id id_client from client where login=f_login and password=f_password;
	if not found
	then
	  retour=0;
	else
	  retour=id;
	end if;
	return retour;
end;
'
  LANGUAGE 'plpgsql';