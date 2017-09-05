SELECT  ue.id_email,
		ue.email,
		ue.id_usuario,
		ce.id_cuenta,
		u.nombres,
		u.apellidos,
		u.nick_usuario,
		concat( u.nombres, ', ', u.apellidos) as nombre_completo
FROM usuario_telefono ue,
	 cuenta_telefono ce,
	 cuenta c,
	 usuario u
WHERE   ue.telefono like '%$email%' 
AND     ue.verificado = 1 
AND     ue.id_email = ce.id_email
AND     ce.id_cuenta = c.id_cuenta
AND     c.id_usuario_owner = u.id_usuario