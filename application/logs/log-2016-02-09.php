<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-09 21:33:53 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 95
ERROR - 2016-02-09 21:33:53 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 98
ERROR - 2016-02-09 21:33:53 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 100
ERROR - 2016-02-09 21:33:53 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 115
ERROR - 2016-02-09 22:02:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LEFT JOIN cuenta_email ce ON c.id_cuenta = ce.id_cuenta,
						LEFT JOIN cuenta_' at line 4 - Invalid query: 	SELECT *
				FROM cuenta c
						LEFT JOIN autorizado_cuenta ac ON c.id_cuenta = ac.id_cuenta,
						LEFT JOIN cuenta_email ce ON c.id_cuenta = ce.id_cuenta,
						LEFT JOIN cuenta_telefono ct ON c.id_cuenta = ct.id_cuenta,
					 tipo_cuenta tc,
				     cuenta_limite cl,
				     cuenta_nombre_externo cne,
				     nombre_externo ne
				WHERE 	( c.id_usuario_owner = '1' OR ac.id_usuario =  '1' )
				AND c.id_tipo_cuenta = tc.id_tipo_cuenta
				AND 	c.id_cuenta	= cl.id_cuenta	 
				AND 	c.id_cuenta	= cne.id_cuenta	 
				AND 	cne.id_nombre_externo = ne.id_nombre_externo	
				AND 	ne.id_usuario_owner = c.id_usuario_owner  
ERROR - 2016-02-09 22:05:59 --> Severity: Notice --> Undefined property: stdClass::$email /var/www/html/digipay/application/views/home/home.php 190
ERROR - 2016-02-09 22:26:59 --> Severity: Notice --> Undefined property: stdClass::$descripcion /var/www/html/digipay/application/views/home/home.php 191
ERROR - 2016-02-09 23:03:01 --> Could not find the language line "form_validation_comprobar_owner_autorizado"
