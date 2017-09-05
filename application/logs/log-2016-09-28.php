<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-09-28 20:24:17 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 38
ERROR - 2016-09-28 20:24:17 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 77
ERROR - 2016-09-28 20:24:17 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 85
ERROR - 2016-09-28 20:24:17 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 87
ERROR - 2016-09-28 20:24:17 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 380
ERROR - 2016-09-28 20:24:17 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 380
ERROR - 2016-09-28 20:31:29 --> Query error: Expression #1 of ORDER BY clause is not in SELECT list, references column 'digipay_desa.m.fecha_creacion' which is not in SELECT list; this is incompatible with DISTINCT - Invalid query: 	SELECT  distinct( identificador_cuenta), id_tipo_ident_cuenta
				FROM movimiento m,
					 cuenta c_d
				WHERE
					m.id_usuario_owner_movimiento = '1'
				AND	m.id_tipo_movimiento = 3 
				AND m.id_cuenta_destino IS NOT NULL
				AND m.id_cuenta_destino = c_d.id_cuenta
				ORDER BY fecha_creacion DESC  
