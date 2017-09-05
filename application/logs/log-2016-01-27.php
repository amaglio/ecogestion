<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-01-27 00:36:56 --> Could not find the language line "form_validation_comprobar_usuario_existente_validation"
ERROR - 2016-01-27 00:54:00 --> 404 Page Not Found: Usuario/comprobar_usuario_existente
ERROR - 2016-01-27 01:05:00 --> Could not find the language line "form_validation_comprobar_usuario_existente_validation"
ERROR - 2016-01-27 01:32:43 --> Severity: Notice --> Array to string conversion /var/www/html/digipay/application/controllers/Login.php 109
ERROR - 2016-01-27 01:47:42 --> Severity: Notice --> Array to string conversion /var/www/html/digipay/application/views/login/login.php 64
ERROR - 2016-01-27 02:06:12 --> Severity: Notice --> Undefined variable: errors /var/www/html/digipay/application/views/login/login.php 61
ERROR - 2016-01-27 02:12:15 --> Severity: Notice --> Array to string conversion /var/www/html/digipay/application/views/login/login.php 64
ERROR - 2016-01-27 02:12:52 --> Severity: Notice --> Array to string conversion /var/www/html/digipay/application/views/login/login.php 64
ERROR - 2016-01-27 02:26:14 --> Severity: Notice --> Undefined index: email_ingresa /var/www/html/digipay/application/helpers/general_helper.php 29
ERROR - 2016-01-27 02:26:14 --> Severity: Notice --> Undefined index: clave /var/www/html/digipay/application/helpers/general_helper.php 29
ERROR - 2016-01-27 02:28:06 --> Severity: Notice --> Undefined index: email_ingresa /var/www/html/digipay/application/helpers/general_helper.php 29
ERROR - 2016-01-27 02:28:06 --> Severity: Notice --> Undefined index: clave /var/www/html/digipay/application/helpers/general_helper.php 29
ERROR - 2016-01-27 02:28:41 --> Severity: Error --> Call to undefined function iseet() /var/www/html/digipay/application/helpers/general_helper.php 29
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 49
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 58
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 59
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 70
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 79
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 88
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 105
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 121
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 138
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 270
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 326
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 372
ERROR - 2016-01-27 13:42:46 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/usuario/usuario.php 419
ERROR - 2016-01-27 14:01:11 --> Could not find the language line "form_validation_comprobar_password_anterior_validation"
ERROR - 2016-01-27 14:01:14 --> Severity: Notice --> Undefined variable: mensaje_modificar_password /var/www/html/digipay/application/views/usuario/usuario.php 266
ERROR - 2016-01-27 14:02:10 --> Could not find the language line "form_validation_comprobar_password_anterior_validation"
ERROR - 2016-01-27 14:31:23 --> Could not find the language line "form_validation_comprobar_password_anterior_validation"
ERROR - 2016-01-27 23:41:13 --> Query error: Unknown column 'ne.id_usuario' in 'where clause' - Invalid query: 	SELECT *
				FROM cuenta c,
					 tipo_cuenta tc,
				     cuenta_limite cl,
				     cuenta_nombre_externo cne,
				     nombre_externo ne
				WHERE 	c.id_tipo_cuenta = tc.id_tipo_cuenta
				AND 	c.id_cuenta	= cl.id_cuenta	 
				AND 	c.id_cuenta	= cne.id_cuenta	 
				AND 	cne.id_nombre_externo = ne.id_nombre_externo	
				AND 	ne.id_usuario = c.id_usuario_owner
				AND 	c.id_usuario_owner	= NULL 
ERROR - 2016-01-27 23:41:21 --> Query error: Unknown column 'ne.id_usuario' in 'where clause' - Invalid query: 	SELECT *
				FROM cuenta c,
					 tipo_cuenta tc,
				     cuenta_limite cl,
				     cuenta_nombre_externo cne,
				     nombre_externo ne
				WHERE 	c.id_tipo_cuenta = tc.id_tipo_cuenta
				AND 	c.id_cuenta	= cl.id_cuenta	 
				AND 	c.id_cuenta	= cne.id_cuenta	 
				AND 	cne.id_nombre_externo = ne.id_nombre_externo	
				AND 	ne.id_usuario = c.id_usuario_owner
				AND 	c.id_usuario_owner	= NULL 
ERROR - 2016-01-27 23:41:26 --> Query error: Unknown column 'ne.id_usuario' in 'where clause' - Invalid query: 	SELECT *
				FROM cuenta c,
					 tipo_cuenta tc,
				     cuenta_limite cl,
				     cuenta_nombre_externo cne,
				     nombre_externo ne
				WHERE 	c.id_tipo_cuenta = tc.id_tipo_cuenta
				AND 	c.id_cuenta	= cl.id_cuenta	 
				AND 	c.id_cuenta	= cne.id_cuenta	 
				AND 	cne.id_nombre_externo = ne.id_nombre_externo	
				AND 	ne.id_usuario = c.id_usuario_owner
				AND 	c.id_usuario_owner	= NULL 
