<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-10-17 12:00:07 --> Severity: Warning --> mysqli::real_connect(): (42000/1049): Unknown database 'ecogestion' /var/www/html/ecogestion/system/database/drivers/mysqli/mysqli_driver.php 161
ERROR - 2017-10-17 12:00:07 --> Unable to connect to the database
ERROR - 2017-10-17 12:00:07 --> Severity: Warning --> mysqli::real_connect(): (42000/1049): Unknown database 'ecogestion' /var/www/html/ecogestion/system/database/drivers/mysqli/mysqli_driver.php 161
ERROR - 2017-10-17 12:00:07 --> Unable to connect to the database
ERROR - 2017-10-17 12:38:59 --> Severity: Notice --> Trying to get property of non-object /var/www/html/ecogestion/application/models/Modulo_model.php 71
ERROR - 2017-10-17 15:50:38 --> Severity: Error --> Call to undefined function _programas_universidad() /var/www/html/ecogestion/application/models/Necesidad_model.php 78
ERROR - 2017-10-17 15:51:27 --> Query error: Incorrect date value: '1987' for column 'pd_fecha_limite' at row 1 - Invalid query: call sp_abm_necesidad(  
        									'A', 
        									 NULL , 
                                            '1',
        									2017-10-20, 
        									'', 
                                             0 , 
                                            'Primer necesidad', 
        									@pi_id_necesidad_new,
        									@pv_error_msj, 
        									@pn_error_cod	 )
ERROR - 2017-10-17 15:52:12 --> Query error: Incorrect date value: '1987' for column 'pd_fecha_limite' at row 1 - Invalid query: call sp_abm_necesidad(  
        									'A', 
        									 NULL , 
                                            '1',
        									2017-10-20, 
        									'1', 
                                             0 , 
                                            'Primer necesidad', 
        									@pi_id_necesidad_new,
        									@pv_error_msj, 
        									@pn_error_cod	 )
ERROR - 2017-10-17 15:57:54 --> Query error: FUNCTION mac_ecogestion.fn_exist_necesidad does not exist - Invalid query:     SELECT fn_exist_necesidad ( '1' ) as existe
                FROM dual 
ERROR - 2017-10-17 15:57:54 --> Query error: FUNCTION mac_ecogestion.fn_exist_necesidad does not exist - Invalid query:     SELECT fn_exist_necesidad ( '1' ) as existe
                FROM dual 
ERROR - 2017-10-17 16:00:18 --> Severity: Notice --> Undefined property: stdClass::$id_trabajo_tango /var/www/html/ecogestion/application/views/trabajo/index.php 142
ERROR - 2017-10-17 16:17:54 --> Query error: Unknown column 'fecha' in 'field list' - Invalid query: 	SELECT r.*, DATE_FORMAT(fecha, '%d/%m/%y') AS fecha_limite
    			FROM necesidad r 
    			WHERE id_necesidad = '1' 
ERROR - 2017-10-17 16:17:54 --> Query error: Unknown column 'fecha' in 'field list' - Invalid query: 	SELECT r.*, DATE_FORMAT(fecha, '%d/%m/%y') AS fecha_limite
    			FROM necesidad r 
    			WHERE id_necesidad = '1' 
ERROR - 2017-10-17 16:22:53 --> Could not find the language line "form_validation_is_numeri"
