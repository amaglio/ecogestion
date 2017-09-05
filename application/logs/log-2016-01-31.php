<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-01-31 19:54:20 --> Severity: Notice --> Undefined variable: cuentas_usuario /var/www/html/digipay/application/views/estructura/head.php 181
ERROR - 2016-01-31 19:54:20 --> Severity: Error --> Call to a member function result() on a non-object /var/www/html/digipay/application/views/estructura/head.php 181
ERROR - 2016-01-31 20:06:26 --> Severity: Notice --> Undefined index: id /var/www/html/digipay/application/models/Usuario_model.php 250
ERROR - 2016-01-31 20:07:34 --> Severity: Notice --> Undefined index: id /var/www/html/digipay/application/models/Usuario_model.php 250
ERROR - 2016-01-31 20:23:59 --> Severity: Notice --> Undefined variable: cuentas_usuario /var/www/html/digipay/application/views/estructura/head.php 181
ERROR - 2016-01-31 20:23:59 --> Severity: Error --> Call to a member function result() on a non-object /var/www/html/digipay/application/views/estructura/head.php 181
ERROR - 2016-01-31 20:43:30 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 650
ERROR - 2016-01-31 20:43:34 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 650
ERROR - 2016-01-31 20:43:35 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 650
ERROR - 2016-01-31 20:43:37 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 650
ERROR - 2016-01-31 20:50:59 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 648
ERROR - 2016-01-31 20:51:02 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 648
ERROR - 2016-01-31 20:51:30 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 647
ERROR - 2016-01-31 20:52:41 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 647
ERROR - 2016-01-31 20:54:38 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 647
ERROR - 2016-01-31 20:54:39 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 647
ERROR - 2016-01-31 20:54:41 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 647
ERROR - 2016-01-31 20:54:43 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 647
ERROR - 2016-01-31 20:54:44 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 647
ERROR - 2016-01-31 20:57:25 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 647
ERROR - 2016-01-31 20:57:27 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 647
ERROR - 2016-01-31 22:04:19 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 624
ERROR - 2016-01-31 22:04:21 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 624
ERROR - 2016-01-31 22:04:24 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 624
ERROR - 2016-01-31 22:05:44 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 624
ERROR - 2016-01-31 22:13:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'u.nick_usuario
                FROM usuario_email ue,
                     cuent' at line 8 - Invalid query:     SELECT  ue.id_email,
                        ue.email,
                        ue.id_usuario,
                        ce.id_cuenta,
                        u.nombres,
                        u.apellidos,
                        CONCAT(u.apellidos, ', ', u.nombres) as nombre_completo
                        u.nick_usuario
                FROM usuario_email ue,
                     cuenta_email ce,
                     cuenta c,
                     usuario u
                WHERE   ue.email like '%adr%' 
                AND     ue.verificado = 1 
                AND     ue.id_email = ce.id_email
                AND     ce.id_cuenta = c.id_cuenta
                AND     c.id_usuario_owner = u.id_usuario 
ERROR - 2016-01-31 22:13:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'u.nick_usuario
                FROM usuario_email ue,
                     cuent' at line 8 - Invalid query:     SELECT  ue.id_email,
                        ue.email,
                        ue.id_usuario,
                        ce.id_cuenta,
                        u.nombres,
                        u.apellidos,
                        CONCAT(u.apellidos, ', ', u.nombres) as nombre_completo
                        u.nick_usuario
                FROM usuario_email ue,
                     cuenta_email ce,
                     cuenta c,
                     usuario u
                WHERE   ue.email like '%adr%' 
                AND     ue.verificado = 1 
                AND     ue.id_email = ce.id_email
                AND     ce.id_cuenta = c.id_cuenta
                AND     c.id_usuario_owner = u.id_usuario 
ERROR - 2016-01-31 22:13:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'u.nick_usuario
                FROM usuario_email ue,
                     cuent' at line 8 - Invalid query:     SELECT  ue.id_email,
                        ue.email,
                        ue.id_usuario,
                        ce.id_cuenta,
                        u.nombres,
                        u.apellidos,
                        CONCAT(u.apellidos, ', ', u.nombres) as nombre_completo
                        u.nick_usuario
                FROM usuario_email ue,
                     cuenta_email ce,
                     cuenta c,
                     usuario u
                WHERE   ue.email like '%adri%' 
                AND     ue.verificado = 1 
                AND     ue.id_email = ce.id_email
                AND     ce.id_cuenta = c.id_cuenta
                AND     c.id_usuario_owner = u.id_usuario 
ERROR - 2016-01-31 22:14:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'u.nick_usuario
                FROM usuario_email ue,
                     cuent' at line 8 - Invalid query:     SELECT  ue.id_email,
                        ue.email,
                        ue.id_usuario,
                        ce.id_cuenta,
                        u.nombres,
                        u.apellidos,
                        CONCAT(u.apellidos, u.nombres) as nombre_completo
                        u.nick_usuario
                FROM usuario_email ue,
                     cuenta_email ce,
                     cuenta c,
                     usuario u
                WHERE   ue.email like '%adr%' 
                AND     ue.verificado = 1 
                AND     ue.id_email = ce.id_email
                AND     ce.id_cuenta = c.id_cuenta
                AND     c.id_usuario_owner = u.id_usuario 
ERROR - 2016-01-31 22:14:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'u.nick_usuario
                FROM usuario_email ue,
                     cuent' at line 8 - Invalid query:     SELECT  ue.id_email,
                        ue.email,
                        ue.id_usuario,
                        ce.id_cuenta,
                        u.nombres,
                        u.apellidos,
                        CONCAT(u.apellidos, u.nombres) as nombre_completo
                        u.nick_usuario
                FROM usuario_email ue,
                     cuenta_email ce,
                     cuenta c,
                     usuario u
                WHERE   ue.email like '%adri%' 
                AND     ue.verificado = 1 
                AND     ue.id_email = ce.id_email
                AND     ce.id_cuenta = c.id_cuenta
                AND     c.id_usuario_owner = u.id_usuario 
ERROR - 2016-01-31 22:22:34 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 653
ERROR - 2016-01-31 23:01:33 --> Severity: Notice --> Undefined property: stdClass::$id_nombre /var/www/html/digipay/application/views/operar/enviar.php 176
ERROR - 2016-01-31 23:01:45 --> Severity: Notice --> Undefined property: stdClass::$nombre /var/www/html/digipay/application/views/operar/enviar.php 176
ERROR - 2016-01-31 23:03:48 --> Severity: Notice --> Undefined property: stdClass::$nombre /var/www/html/digipay/application/views/operar/enviar.php 176
ERROR - 2016-01-31 23:57:28 --> 404 Page Not Found: Usuario/procesa_pagar
ERROR - 2016-01-31 23:59:09 --> 404 Page Not Found: Usuario/procesa_pagar
