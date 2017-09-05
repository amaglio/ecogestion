<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-07 08:37:12 --> Severity: Notice --> Undefined variable: cuentas_usuario /var/www/html/digipay/application/views/estructura/head.php 182
ERROR - 2016-02-07 08:37:12 --> Severity: Error --> Call to a member function result() on a non-object /var/www/html/digipay/application/views/estructura/head.php 182
ERROR - 2016-02-07 15:48:31 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 48
ERROR - 2016-02-07 15:48:31 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 51
ERROR - 2016-02-07 15:48:31 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 67
ERROR - 2016-02-07 16:08:14 --> Severity: Parsing Error --> syntax error, unexpected '?>', expecting function (T_FUNCTION) /var/www/html/digipay/application/models/Cuenta_model.php 116
ERROR - 2016-02-07 16:08:29 --> Severity: Parsing Error --> syntax error, unexpected '?>', expecting function (T_FUNCTION) /var/www/html/digipay/application/models/Cuenta_model.php 116
ERROR - 2016-02-07 16:08:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '1' at line 1 - Invalid query: 1
ERROR - 2016-02-07 16:09:21 --> Severity: Notice --> Undefined variable: emails_verificados /var/www/html/digipay/application/views/cuenta/cuenta.php 228
ERROR - 2016-02-07 16:09:21 --> Severity: Error --> Call to a member function result() on a non-object /var/www/html/digipay/application/views/cuenta/cuenta.php 228
ERROR - 2016-02-07 16:09:38 --> Severity: Error --> Call to undefined method stdClass::result() /var/www/html/digipay/application/views/cuenta/cuenta.php 228
ERROR - 2016-02-07 16:10:03 --> Severity: Notice --> Undefined property: stdClass::$email /var/www/html/digipay/application/views/cuenta/cuenta.php 228
ERROR - 2016-02-07 16:13:22 --> Severity: Notice --> Undefined property: stdClass::$email /var/www/html/digipay/application/views/cuenta/cuenta.php 228
ERROR - 2016-02-07 16:19:06 --> Severity: Notice --> Undefined property: stdClass::$id_email /var/www/html/digipay/application/views/cuenta/cuenta.php 237
ERROR - 2016-02-07 16:33:11 --> Severity: Notice --> Undefined variable: errores_agregar_telefono /var/www/html/digipay/application/views/cuenta/cuenta.php 350
ERROR - 2016-02-07 16:33:11 --> Severity: Notice --> Undefined variable: errores_agregar_telefono /var/www/html/digipay/application/views/cuenta/cuenta.php 359
ERROR - 2016-02-07 17:00:00 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '127.0.0.1' (111) /var/www/html/digipay/system/database/drivers/mysqli/mysqli_driver.php 161
ERROR - 2016-02-07 17:00:01 --> Unable to connect to the database
ERROR - 2016-02-07 17:00:07 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 48
ERROR - 2016-02-07 17:00:07 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 51
ERROR - 2016-02-07 17:00:07 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 67
ERROR - 2016-02-07 17:01:18 --> 404 Page Not Found: Usuario/procesa_alta_telefono
ERROR - 2016-02-07 17:12:23 --> 404 Page Not Found: Cuenta/index
ERROR - 2016-02-07 17:12:36 --> 404 Page Not Found: Usuario/procesa_alta_telefono
ERROR - 2016-02-07 17:32:43 --> Query error: Unknown column 'ct.verificado' in 'where clause' - Invalid query: 	SELECT *
				FROM cuenta_telefono ct,
					 usuario_email ue
				WHERE 
					 ct.id_telefono = ue.id_email
				AND  ct.id_cuenta = '1'
				AND  ct.verificado = 1 
ERROR - 2016-02-07 18:05:05 --> Could not find the language line "form_validation_comprobar_owner_autorizado"
ERROR - 2016-02-07 18:05:16 --> 404 Page Not Found: Usuario/procesa_validar_enviar_email
ERROR - 2016-02-07 18:21:30 --> 404 Page Not Found: Usuario/procesa_validar_email
ERROR - 2016-02-07 18:35:04 --> 404 Page Not Found: Home/%3C
ERROR - 2016-02-07 19:37:40 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '127.0.0.1' (111) /var/www/html/digipay/system/database/drivers/mysqli/mysqli_driver.php 161
ERROR - 2016-02-07 19:37:41 --> Unable to connect to the database
ERROR - 2016-02-07 19:46:06 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 56
ERROR - 2016-02-07 19:46:06 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 59
ERROR - 2016-02-07 19:46:06 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 61
ERROR - 2016-02-07 19:46:06 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 76
ERROR - 2016-02-07 20:02:20 --> Severity: Notice --> Undefined variable: cuentas_usuario /var/www/html/digipay/application/views/estructura/head.php 182
ERROR - 2016-02-07 20:02:20 --> Severity: Error --> Call to a member function result() on a non-object /var/www/html/digipay/application/views/estructura/head.php 182
ERROR - 2016-02-07 20:02:23 --> Severity: Notice --> Undefined variable: cuentas_usuario /var/www/html/digipay/application/views/estructura/head.php 182
ERROR - 2016-02-07 20:02:23 --> Severity: Error --> Call to a member function result() on a non-object /var/www/html/digipay/application/views/estructura/head.php 182
ERROR - 2016-02-07 20:30:28 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '127.0.0.1' (111) /var/www/html/digipay/system/database/drivers/mysqli/mysqli_driver.php 161
ERROR - 2016-02-07 20:30:29 --> Unable to connect to the database
