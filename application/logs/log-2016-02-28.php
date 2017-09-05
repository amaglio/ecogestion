<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-28 00:00:06 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`digipay_desa`.`movimiento`, CONSTRAINT `fk_movimiento_01` FOREIGN KEY (`id_tipo_movimiento`, `id_estado_movimiento`) REFERENCES `estado_movimiento` (`id_tipo_movimiento`, `id_estado_movimient) - Invalid query: UPDATE `movimiento` SET `id_estado_movimiento` = 400
WHERE `id_movimiento` = '57'
AND `id_usuario_owner_movimiento` = '1'
ERROR - 2016-02-28 00:00:21 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`digipay_desa`.`movimiento`, CONSTRAINT `fk_movimiento_01` FOREIGN KEY (`id_tipo_movimiento`, `id_estado_movimiento`) REFERENCES `estado_movimiento` (`id_tipo_movimiento`, `id_estado_movimient) - Invalid query: UPDATE `movimiento` SET `id_estado_movimiento` = 400
WHERE `id_movimiento` = '57'
AND `id_usuario_owner_movimiento` = '1'
ERROR - 2016-02-28 00:16:08 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE) /var/www/html/digipay/application/models/Operar_model.php 83
ERROR - 2016-02-28 00:42:07 --> Severity: Notice --> Undefined index: id_usuario_owner /var/www/html/digipay/application/models/Operar_model.php 80
ERROR - 2016-02-28 00:42:07 --> Severity: Notice --> Undefined variable: data /var/www/html/digipay/application/models/Operar_model.php 83
ERROR - 2016-02-28 00:42:12 --> Severity: Notice --> Undefined index: id_movimiento /var/www/html/digipay/application/models/Operar_model.php 79
ERROR - 2016-02-28 00:42:12 --> Severity: Notice --> Undefined index: id_usuario_owner /var/www/html/digipay/application/models/Operar_model.php 80
ERROR - 2016-02-28 00:42:12 --> Severity: Notice --> Undefined variable: data /var/www/html/digipay/application/models/Operar_model.php 83
ERROR - 2016-02-28 00:43:06 --> Severity: Notice --> Undefined variable: data /var/www/html/digipay/application/models/Operar_model.php 83
ERROR - 2016-02-28 13:49:52 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '127.0.0.1' (111) /var/www/html/digipay/system/database/drivers/mysqli/mysqli_driver.php 161
ERROR - 2016-02-28 13:49:52 --> Unable to connect to the database
ERROR - 2016-02-28 14:06:39 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 48
ERROR - 2016-02-28 14:06:39 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 51
ERROR - 2016-02-28 14:06:39 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 53
ERROR - 2016-02-28 14:06:39 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 68
ERROR - 2016-02-28 14:20:19 --> 404 Page Not Found: Operar/procesa_pagar_solicitar_cobro
ERROR - 2016-02-28 14:44:54 --> Severity: Notice --> Undefined variable: return /var/www/html/digipay/application/controllers/Operar.php 514
ERROR - 2016-02-28 14:48:03 --> Severity: Notice --> Undefined variable: return /var/www/html/digipay/application/controllers/Operar.php 516
ERROR - 2016-02-28 14:50:35 --> Severity: Notice --> Undefined variable: return /var/www/html/digipay/application/controllers/Operar.php 516
ERROR - 2016-02-28 16:28:27 --> Severity: Notice --> Undefined variable: errores_registrarse /var/www/html/digipay/application/views/operar/solicitar_cobro.php 483
ERROR - 2016-02-28 17:58:29 --> Severity: Notice --> Undefined variable: return /var/www/html/digipay/application/controllers/Operar.php 362
ERROR - 2016-02-28 17:59:51 --> Could not find the language line "form_validation_comprobar_es_pin_usuario"
ERROR - 2016-02-28 19:32:58 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '127.0.0.1' (111) /var/www/html/digipay/system/database/drivers/mysqli/mysqli_driver.php 161
ERROR - 2016-02-28 19:32:58 --> Unable to connect to the database
ERROR - 2016-02-28 21:17:58 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '127.0.0.1' (111) /var/www/html/digipay/system/database/drivers/mysqli/mysqli_driver.php 161
ERROR - 2016-02-28 21:17:58 --> Unable to connect to the database
ERROR - 2016-02-28 21:19:27 --> Severity: Notice --> Undefined index: pin /var/www/html/digipay/application/models/Operar_model.php 101
ERROR - 2016-02-28 21:19:27 --> Severity: Notice --> Undefined index: id_movimiento /var/www/html/digipay/application/models/Operar_model.php 102
ERROR - 2016-02-28 21:19:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''  , 
														    	 @pi_id_estado_mov, 
														    	 @pd_saldo_limi' at line 7 - Invalid query:  CALL `sp_responder_solicitud_cobro` ( 	'1' , 
														    	'd41d8cd98f00b204e9800998ecf8427e' , 
														    	'' , 
														    	''  ,  
														    	  NULL  ,
														    	  NULL  , 
														    	 0'  , 
														    	 @pi_id_estado_mov, 
														    	 @pd_saldo_limite, 
														    	 @pi_dias_limite, 
														    	 @pv_error_msj,
														    	 @pn_error_cod )
ERROR - 2016-02-28 21:22:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''  , 
														    	 @pi_id_estado_mov, 
														    	 @pd_saldo_limi' at line 7 - Invalid query:  CALL `sp_responder_solicitud_cobro` ( 	'1' , 
														    	'81dc9bdb52d04dc20036dbd8313ed055' , 
														    	'63' , 
														    	''  ,  
														    	 'int' ,
														    	 'ext' , 
														    	 0'  , 
														    	 @pi_id_estado_mov, 
														    	 @pd_saldo_limite, 
														    	 @pi_dias_limite, 
														    	 @pv_error_msj,
														    	 @pn_error_cod )
ERROR - 2016-02-28 22:28:07 --> 404 Page Not Found: Login/home
ERROR - 2016-02-28 22:28:30 --> 404 Page Not Found: Login/home
ERROR - 2016-02-28 23:23:15 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '127.0.0.1' (111) /var/www/html/digipay/system/database/drivers/mysqli/mysqli_driver.php 161
ERROR - 2016-02-28 23:23:15 --> Unable to connect to the database
