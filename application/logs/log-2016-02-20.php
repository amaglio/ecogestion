<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-20 00:07:20 --> Severity: Error --> Call to undefined method Cuenta_model::procesa_alta_cuenta_secundaria() /var/www/html/digipay/application/controllers/Cuenta.php 18
ERROR - 2016-02-20 00:07:39 --> Severity: Notice --> Undefined variable: datos /var/www/html/digipay/application/controllers/Cuenta.php 20
ERROR - 2016-02-20 00:07:39 --> Severity: Notice --> Undefined variable: cuentas_usuario /var/www/html/digipay/application/views/estructura/head.php 184
ERROR - 2016-02-20 00:07:39 --> Severity: Error --> Call to a member function result() on a non-object /var/www/html/digipay/application/views/estructura/head.php 184
ERROR - 2016-02-20 00:08:48 --> Severity: Notice --> Undefined variable: datos /var/www/html/digipay/application/controllers/Cuenta.php 20
ERROR - 2016-02-20 00:08:48 --> Severity: Notice --> Undefined variable: cuentas_usuario /var/www/html/digipay/application/views/estructura/head.php 184
ERROR - 2016-02-20 00:08:48 --> Severity: Error --> Call to a member function result() on a non-object /var/www/html/digipay/application/views/estructura/head.php 184
ERROR - 2016-02-20 00:08:50 --> Severity: Notice --> Undefined variable: datos /var/www/html/digipay/application/controllers/Cuenta.php 20
ERROR - 2016-02-20 00:08:50 --> Severity: Notice --> Undefined variable: cuentas_usuario /var/www/html/digipay/application/views/estructura/head.php 184
ERROR - 2016-02-20 00:08:50 --> Severity: Error --> Call to a member function result() on a non-object /var/www/html/digipay/application/views/estructura/head.php 184
ERROR - 2016-02-20 00:23:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '*,
						CASE tc.id_tipo_cuenta 
										WHEN 1 THEN 'CP' 
										WHEN 2 TH' at line 3 - Invalid query: 	SELECT 	c.*,
						ne.*,
						--tc.*,
						CASE tc.id_tipo_cuenta 
										WHEN 1 THEN 'CP' 
										WHEN 2 THEN 'CE' 
									END as descripcion  , 
				        ce.id_email,
				        ce.email,
				        ce.verificado as email_verificado,
				        ct.id_telefono,
				        ct.telefono,
				        ct.verificado as telefono_verificado
				FROM cuenta c
						LEFT JOIN autorizado_cuenta ac ON c.id_cuenta = ac.id_cuenta
						LEFT JOIN (	SELECT 	cem.id_cuenta,
											cem.id_email,
											uee.email,
											uee.id_usuario,
											uee.verificado
									FROM cuenta_email cem,
										 usuario_email uee
									WHERE 
											cem.id_email = uee.id_email 
									AND		uee.fecha_baja IS NULL) ce ON c.id_cuenta = ce.id_cuenta
						LEFT JOIN ( SELECT 	cet.id_cuenta,
											cet.id_telefono,
											uet.telefono,
											uet.id_usuario,
											uet.verificado
									FROM cuenta_telefono cet,
										 usuario_telefono uet
									WHERE 
											cet.id_telefono = uet.id_telefono 
									AND		uet.fecha_baja IS NULL ) ct ON c.id_cuenta = ct.id_cuenta,
					 tipo_cuenta tc,
					 cuenta_limite cl,
					 cuenta_nombre_externo cne,
					 nombre_externo ne
				WHERE 	( c.id_usuario_owner = '1' OR ac.id_usuario =  '1' )
				AND 	c.id_tipo_cuenta = tc.id_tipo_cuenta
				AND 	c.id_cuenta	= cl.id_cuenta	 
				AND 	c.id_cuenta	= cne.id_cuenta	 
				AND 	cne.id_nombre_externo = ne.id_nombre_externo	
				AND 	ne.id_usuario_owner = c.id_usuario_owner  
ERROR - 2016-02-20 00:23:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '*,
						CASE tc.id_tipo_cuenta 
										WHEN 1 THEN 'CP' 
										ELSE 2 TH' at line 3 - Invalid query: 	SELECT 	c.*,
						ne.*,
						--tc.*,
						CASE tc.id_tipo_cuenta 
										WHEN 1 THEN 'CP' 
										ELSE 2 THEN 'CE' 
						END as descripcion  , 
				        ce.id_email,
				        ce.email,
				        ce.verificado as email_verificado,
				        ct.id_telefono,
				        ct.telefono,
				        ct.verificado as telefono_verificado
				FROM cuenta c
						LEFT JOIN autorizado_cuenta ac ON c.id_cuenta = ac.id_cuenta
						LEFT JOIN (	SELECT 	cem.id_cuenta,
											cem.id_email,
											uee.email,
											uee.id_usuario,
											uee.verificado
									FROM cuenta_email cem,
										 usuario_email uee
									WHERE 
											cem.id_email = uee.id_email 
									AND		uee.fecha_baja IS NULL) ce ON c.id_cuenta = ce.id_cuenta
						LEFT JOIN ( SELECT 	cet.id_cuenta,
											cet.id_telefono,
											uet.telefono,
											uet.id_usuario,
											uet.verificado
									FROM cuenta_telefono cet,
										 usuario_telefono uet
									WHERE 
											cet.id_telefono = uet.id_telefono 
									AND		uet.fecha_baja IS NULL ) ct ON c.id_cuenta = ct.id_cuenta,
					 tipo_cuenta tc,
					 cuenta_limite cl,
					 cuenta_nombre_externo cne,
					 nombre_externo ne
				WHERE 	( c.id_usuario_owner = '1' OR ac.id_usuario =  '1' )
				AND 	c.id_tipo_cuenta = tc.id_tipo_cuenta
				AND 	c.id_cuenta	= cl.id_cuenta	 
				AND 	c.id_cuenta	= cne.id_cuenta	 
				AND 	cne.id_nombre_externo = ne.id_nombre_externo	
				AND 	ne.id_usuario_owner = c.id_usuario_owner  
ERROR - 2016-02-20 00:23:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'THEN 'CE' 
						END as descripcion  , 
				        ce.id_email,
				        ce.' at line 6 - Invalid query: 	SELECT 	c.*,
						ne.*,
						 
						CASE tc.id_tipo_cuenta 
										WHEN 1 THEN 'CP' 
										ELSE 2 THEN 'CE' 
						END as descripcion  , 
				        ce.id_email,
				        ce.email,
				        ce.verificado as email_verificado,
				        ct.id_telefono,
				        ct.telefono,
				        ct.verificado as telefono_verificado
				FROM cuenta c
						LEFT JOIN autorizado_cuenta ac ON c.id_cuenta = ac.id_cuenta
						LEFT JOIN (	SELECT 	cem.id_cuenta,
											cem.id_email,
											uee.email,
											uee.id_usuario,
											uee.verificado
									FROM cuenta_email cem,
										 usuario_email uee
									WHERE 
											cem.id_email = uee.id_email 
									AND		uee.fecha_baja IS NULL) ce ON c.id_cuenta = ce.id_cuenta
						LEFT JOIN ( SELECT 	cet.id_cuenta,
											cet.id_telefono,
											uet.telefono,
											uet.id_usuario,
											uet.verificado
									FROM cuenta_telefono cet,
										 usuario_telefono uet
									WHERE 
											cet.id_telefono = uet.id_telefono 
									AND		uet.fecha_baja IS NULL ) ct ON c.id_cuenta = ct.id_cuenta,
					 tipo_cuenta tc,
					 cuenta_limite cl,
					 cuenta_nombre_externo cne,
					 nombre_externo ne
				WHERE 	( c.id_usuario_owner = '1' OR ac.id_usuario =  '1' )
				AND 	c.id_tipo_cuenta = tc.id_tipo_cuenta
				AND 	c.id_cuenta	= cl.id_cuenta	 
				AND 	c.id_cuenta	= cne.id_cuenta	 
				AND 	cne.id_nombre_externo = ne.id_nombre_externo	
				AND 	ne.id_usuario_owner = c.id_usuario_owner  
ERROR - 2016-02-20 00:24:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'THEN 'CE' 
						END as descripcion  , 
				        ce.id_email,
				        ce.' at line 6 - Invalid query: 	SELECT 	c.*,
						ne.*,
						 
						CASE tc.id_tipo_cuenta 
										WHEN '1' THEN 'CP' 
										ELSE '2' THEN 'CE' 
						END as descripcion  , 
				        ce.id_email,
				        ce.email,
				        ce.verificado as email_verificado,
				        ct.id_telefono,
				        ct.telefono,
				        ct.verificado as telefono_verificado
				FROM cuenta c
						LEFT JOIN autorizado_cuenta ac ON c.id_cuenta = ac.id_cuenta
						LEFT JOIN (	SELECT 	cem.id_cuenta,
											cem.id_email,
											uee.email,
											uee.id_usuario,
											uee.verificado
									FROM cuenta_email cem,
										 usuario_email uee
									WHERE 
											cem.id_email = uee.id_email 
									AND		uee.fecha_baja IS NULL) ce ON c.id_cuenta = ce.id_cuenta
						LEFT JOIN ( SELECT 	cet.id_cuenta,
											cet.id_telefono,
											uet.telefono,
											uet.id_usuario,
											uet.verificado
									FROM cuenta_telefono cet,
										 usuario_telefono uet
									WHERE 
											cet.id_telefono = uet.id_telefono 
									AND		uet.fecha_baja IS NULL ) ct ON c.id_cuenta = ct.id_cuenta,
					 tipo_cuenta tc,
					 cuenta_limite cl,
					 cuenta_nombre_externo cne,
					 nombre_externo ne
				WHERE 	( c.id_usuario_owner = '1' OR ac.id_usuario =  '1' )
				AND 	c.id_tipo_cuenta = tc.id_tipo_cuenta
				AND 	c.id_cuenta	= cl.id_cuenta	 
				AND 	c.id_cuenta	= cne.id_cuenta	 
				AND 	cne.id_nombre_externo = ne.id_nombre_externo	
				AND 	ne.id_usuario_owner = c.id_usuario_owner  
ERROR - 2016-02-20 00:24:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'THEN 'CE' 
						END CASE as descripcion  , 
				        ce.id_email,
				      ' at line 6 - Invalid query: 	SELECT 	c.*,
						ne.*,
						 
						CASE tc.id_tipo_cuenta 
										WHEN '1' THEN 'CP' 
										ELSE '2' THEN 'CE' 
						END CASE as descripcion  , 
				        ce.id_email,
				        ce.email,
				        ce.verificado as email_verificado,
				        ct.id_telefono,
				        ct.telefono,
				        ct.verificado as telefono_verificado
				FROM cuenta c
						LEFT JOIN autorizado_cuenta ac ON c.id_cuenta = ac.id_cuenta
						LEFT JOIN (	SELECT 	cem.id_cuenta,
											cem.id_email,
											uee.email,
											uee.id_usuario,
											uee.verificado
									FROM cuenta_email cem,
										 usuario_email uee
									WHERE 
											cem.id_email = uee.id_email 
									AND		uee.fecha_baja IS NULL) ce ON c.id_cuenta = ce.id_cuenta
						LEFT JOIN ( SELECT 	cet.id_cuenta,
											cet.id_telefono,
											uet.telefono,
											uet.id_usuario,
											uet.verificado
									FROM cuenta_telefono cet,
										 usuario_telefono uet
									WHERE 
											cet.id_telefono = uet.id_telefono 
									AND		uet.fecha_baja IS NULL ) ct ON c.id_cuenta = ct.id_cuenta,
					 tipo_cuenta tc,
					 cuenta_limite cl,
					 cuenta_nombre_externo cne,
					 nombre_externo ne
				WHERE 	( c.id_usuario_owner = '1' OR ac.id_usuario =  '1' )
				AND 	c.id_tipo_cuenta = tc.id_tipo_cuenta
				AND 	c.id_cuenta	= cl.id_cuenta	 
				AND 	c.id_cuenta	= cne.id_cuenta	 
				AND 	cne.id_nombre_externo = ne.id_nombre_externo	
				AND 	ne.id_usuario_owner = c.id_usuario_owner  
ERROR - 2016-02-20 00:25:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'THEN 'CE' 
						END as descripcion  , 
				        ce.id_email,
				        ce.' at line 5 - Invalid query: 	SELECT 	c.*,
						ne.*,
						CASE tc.id_tipo_cuenta 
								WHEN '1' THEN 'CP' 
								ELSE '2' THEN 'CE' 
						END as descripcion  , 
				        ce.id_email,
				        ce.email,
				        ce.verificado as email_verificado,
				        ct.id_telefono,
				        ct.telefono,
				        ct.verificado as telefono_verificado
				FROM cuenta c
						LEFT JOIN autorizado_cuenta ac ON c.id_cuenta = ac.id_cuenta
						LEFT JOIN (	SELECT 	cem.id_cuenta,
											cem.id_email,
											uee.email,
											uee.id_usuario,
											uee.verificado
									FROM cuenta_email cem,
										 usuario_email uee
									WHERE 
											cem.id_email = uee.id_email 
									AND		uee.fecha_baja IS NULL) ce ON c.id_cuenta = ce.id_cuenta
						LEFT JOIN ( SELECT 	cet.id_cuenta,
											cet.id_telefono,
											uet.telefono,
											uet.id_usuario,
											uet.verificado
									FROM cuenta_telefono cet,
										 usuario_telefono uet
									WHERE 
											cet.id_telefono = uet.id_telefono 
									AND		uet.fecha_baja IS NULL ) ct ON c.id_cuenta = ct.id_cuenta,
					 tipo_cuenta tc,
					 cuenta_limite cl,
					 cuenta_nombre_externo cne,
					 nombre_externo ne
				WHERE 	( c.id_usuario_owner = '1' OR ac.id_usuario =  '1' )
				AND 	c.id_tipo_cuenta = tc.id_tipo_cuenta
				AND 	c.id_cuenta	= cl.id_cuenta	 
				AND 	c.id_cuenta	= cne.id_cuenta	 
				AND 	cne.id_nombre_externo = ne.id_nombre_externo	
				AND 	ne.id_usuario_owner = c.id_usuario_owner  
ERROR - 2016-02-20 04:19:40 --> Severity: Warning --> Missing argument 1 for Cuenta::cuenta() /var/www/html/digipay/application/controllers/Cuenta.php 31
ERROR - 2016-02-20 04:19:40 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 33
ERROR - 2016-02-20 04:19:40 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 59
ERROR - 2016-02-20 04:19:40 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 65
ERROR - 2016-02-20 04:19:40 --> Could not find the language line "form_validation_comprobar_owner_autorizado"
ERROR - 2016-02-20 04:20:49 --> Severity: Warning --> Missing argument 1 for Cuenta::cuenta() /var/www/html/digipay/application/controllers/Cuenta.php 31
ERROR - 2016-02-20 04:20:49 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 33
ERROR - 2016-02-20 04:20:49 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 59
ERROR - 2016-02-20 04:20:49 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 65
ERROR - 2016-02-20 04:20:50 --> Could not find the language line "form_validation_comprobar_owner_autorizado"
ERROR - 2016-02-20 04:21:45 --> Severity: Notice --> Undefined variable: query /var/www/html/digipay/application/controllers/Cuenta.php 354
ERROR - 2016-02-20 04:21:45 --> Severity: Warning --> Missing argument 1 for Cuenta::cuenta() /var/www/html/digipay/application/controllers/Cuenta.php 31
ERROR - 2016-02-20 04:21:45 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 33
ERROR - 2016-02-20 04:21:45 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 59
ERROR - 2016-02-20 04:21:45 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 65
ERROR - 2016-02-20 04:21:45 --> Could not find the language line "form_validation_comprobar_owner_autorizado"
ERROR - 2016-02-20 04:22:22 --> Severity: Warning --> Missing argument 1 for Cuenta::cuenta() /var/www/html/digipay/application/controllers/Cuenta.php 31
ERROR - 2016-02-20 04:22:22 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 33
ERROR - 2016-02-20 04:22:22 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 59
ERROR - 2016-02-20 04:22:22 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 65
ERROR - 2016-02-20 04:22:22 --> Could not find the language line "form_validation_comprobar_owner_autorizado"
ERROR - 2016-02-20 04:23:24 --> Severity: Notice --> Array to string conversion /var/www/html/digipay/application/controllers/Cuenta.php 334
ERROR - 2016-02-20 04:23:43 --> Severity: Notice --> Array to string conversion /var/www/html/digipay/application/controllers/Cuenta.php 334
ERROR - 2016-02-20 04:23:46 --> Severity: Notice --> Array to string conversion /var/www/html/digipay/application/controllers/Cuenta.php 334
ERROR - 2016-02-20 04:38:13 --> Query error: Incorrect number of arguments for PROCEDURE digipay_desa.sp_abm_cuenta_email; expected 9, got 8 - Invalid query: CALL `sp_abm_cuenta_email` ( 
											    	'A' , 
											    	 NULL  , 
											    	'1', 
											    	'adrian.ma1234gliola@gmail.com', 
											    	@pi_id_email_new, 
											    	@pv_token, 
											    	@pv_error_msj, 
											    	@pi_error_cod);
ERROR - 2016-02-20 15:06:14 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 43
ERROR - 2016-02-20 15:06:14 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 46
ERROR - 2016-02-20 15:06:14 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 48
ERROR - 2016-02-20 15:06:14 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 63
ERROR - 2016-02-20 15:48:26 --> Severity: Notice --> Undefined index: pi_id_email_new /var/www/html/digipay/application/controllers/Cuenta.php 357
ERROR - 2016-02-20 15:48:27 --> Severity: Warning --> Missing argument 1 for Cuenta::cuenta() /var/www/html/digipay/application/controllers/Cuenta.php 33
ERROR - 2016-02-20 15:48:27 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 35
ERROR - 2016-02-20 15:48:27 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 60
ERROR - 2016-02-20 15:48:27 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 66
ERROR - 2016-02-20 15:48:27 --> Could not find the language line "form_validation_comprobar_owner_autorizado"
ERROR - 2016-02-20 16:58:57 --> Severity: Notice --> Undefined property: stdClass::$id_email /var/www/html/digipay/application/views/cuenta/cuenta.php 327
ERROR - 2016-02-20 18:10:54 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 43
ERROR - 2016-02-20 18:10:54 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 46
ERROR - 2016-02-20 18:10:54 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 48
ERROR - 2016-02-20 18:10:54 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 63
ERROR - 2016-02-20 19:11:30 --> Severity: Error --> Call to undefined method Usuario_model::crear_token_validar_email() /var/www/html/digipay/application/controllers/Cuenta.php 502
ERROR - 2016-02-20 19:11:46 --> Severity: Error --> Call to undefined method Usuario_model::crear_token_validar_email() /var/www/html/digipay/application/controllers/Cuenta.php 502
ERROR - 2016-02-20 21:15:11 --> Severity: Error --> Call to undefined method Usuario_model::validar_email() /var/www/html/digipay/application/controllers/Usuario.php 292
ERROR - 2016-02-20 19:27:11 --> Severity: Error --> Call to undefined method Usuario_model::crear_token_validar_email() /var/www/html/digipay/application/controllers/Cuenta.php 504
ERROR - 2016-02-20 19:32:48 --> Severity: Error --> Call to undefined method Usuario_model::crear_token_validar_email() /var/www/html/digipay/application/controllers/Cuenta.php 504
ERROR - 2016-02-20 21:36:19 --> Severity: Error --> Call to undefined method Usuario_model::validar_email() /var/www/html/digipay/application/controllers/Usuario.php 292
ERROR - 2016-02-20 19:58:52 --> Severity: Error --> Call to undefined method Usuario_model::crear_token_validar_email() /var/www/html/digipay/application/controllers/Usuario.php 208
ERROR - 2016-02-20 23:12:20 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 43
ERROR - 2016-02-20 23:12:20 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 46
ERROR - 2016-02-20 23:12:20 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 48
ERROR - 2016-02-20 23:12:20 --> Severity: Notice --> Trying to get property of non-object /var/www/html/digipay/application/views/home/home.php 63
ERROR - 2016-02-20 23:20:44 --> Query error: Unknown column 'pi_id_usuario' in 'field list' - Invalid query: call sp_validar_email( 'c4ca4238a0b923820dcc509a6f75849b', '3f5ba1d28d3b7dc33e44ddca6d3a771c',  @pi_id_cuenta,  @pv_error_msj, @pi_error_cod)
ERROR - 2016-02-20 23:26:10 --> Severity: Notice --> Undefined index: pi_id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 485
ERROR - 2016-02-20 23:26:43 --> Severity: Notice --> Undefined index: pi_id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 485
ERROR - 2016-02-20 23:26:44 --> Severity: Warning --> Missing argument 1 for Cuenta::cuenta() /var/www/html/digipay/application/controllers/Cuenta.php 40
ERROR - 2016-02-20 23:26:44 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 42
ERROR - 2016-02-20 23:26:44 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 67
ERROR - 2016-02-20 23:26:44 --> Severity: Notice --> Undefined variable: id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 73
ERROR - 2016-02-20 23:26:44 --> Could not find the language line "form_validation_comprobar_owner_autorizado"
ERROR - 2016-02-20 23:28:44 --> Severity: Notice --> Undefined index: pi_id_cuenta /var/www/html/digipay/application/controllers/Cuenta.php 468
ERROR - 2016-02-20 23:47:57 --> Query error: Commands out of sync; you can't run this command now - Invalid query: SELECT @pv_error_msj as mensaje, @pi_error_cod as codigo_error, @pi_id_cuenta as id_cuenta 
ERROR - 2016-02-20 23:51:07 --> Query error: Commands out of sync; you can't run this command now - Invalid query: SELECT @pv_error_msj as mensaje, @pi_error_cod as codigo_error, @pi_id_cuenta as id_cuenta 
