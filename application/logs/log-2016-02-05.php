<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-05 00:12:35 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 659
ERROR - 2016-02-05 00:12:38 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 659
ERROR - 2016-02-05 00:35:04 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 659
ERROR - 2016-02-05 00:43:47 --> Severity: Notice --> Undefined variable: result /var/www/html/digipay/application/controllers/Usuario.php 659
ERROR - 2016-02-05 23:00:26 --> Severity: Warning --> mysqli::real_connect(): (HY000/2003): Can't connect to MySQL server on '127.0.0.1' (111) /var/www/html/digipay/system/database/drivers/mysqli/mysqli_driver.php 161
ERROR - 2016-02-05 23:00:26 --> Unable to connect to the database
ERROR - 2016-02-05 23:36:35 --> Query error: Unknown column 'aa' in 'where clause' - Invalid query:     SELECT  
                        c.id_cuenta,

                        u.nombres,
                        u.apellidos,
                        u.nick_usuario,
                        concat( u.nombres, ', ', u.apellidos) as nombre_completo

                FROM    cuenta c,
                        usuario u
                WHERE   

                        c.id_cuenta = aa
                AND     c.id_usuario_owner = u.id_usuario 
ERROR - 2016-02-05 23:36:35 --> Query error: Unknown column 'aaa' in 'where clause' - Invalid query:     SELECT  
                        c.id_cuenta,

                        u.nombres,
                        u.apellidos,
                        u.nick_usuario,
                        concat( u.nombres, ', ', u.apellidos) as nombre_completo

                FROM    cuenta c,
                        usuario u
                WHERE   

                        c.id_cuenta = aaa
                AND     c.id_usuario_owner = u.id_usuario 
ERROR - 2016-02-05 23:36:38 --> Query error: Unknown column 'aa' in 'where clause' - Invalid query:     SELECT  
                        c.id_cuenta,

                        u.nombres,
                        u.apellidos,
                        u.nick_usuario,
                        concat( u.nombres, ', ', u.apellidos) as nombre_completo

                FROM    cuenta c,
                        usuario u
                WHERE   

                        c.id_cuenta = aa
                AND     c.id_usuario_owner = u.id_usuario 
ERROR - 2016-02-05 23:36:45 --> Query error: Unknown column 'aa' in 'where clause' - Invalid query:     SELECT  
                        c.id_cuenta,

                        u.nombres,
                        u.apellidos,
                        u.nick_usuario,
                        concat( u.nombres, ', ', u.apellidos) as nombre_completo

                FROM    cuenta c,
                        usuario u
                WHERE   

                        c.id_cuenta = aa
                AND     c.id_usuario_owner = u.id_usuario 
