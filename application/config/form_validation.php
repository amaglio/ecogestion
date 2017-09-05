<?
$config = array(
            
// --------------------------------- LOGUEO ------------------------------


            'loguearse' => array(
                                    array(
                                            'field' => 'usuario',
                                            'label' => 'usuario',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'password',
                                            'rules' => 'required|trim|xss_clean'
                                        )
                                ),

           'cambiar_primer_password' => array(

                                array(
                                        'field' => 'alias',
                                        'label' => 'alias',
                                        'rules' => 'required|trim|xss_clean'
                                    ),
                                array(
                                        'field' => 'password_anterior',
                                        'label' => 'password_anterior',
                                        'rules' => 'required|trim|xss_clean'
                                    ),
                                array(
                                        'field' => 'password_nuevo',
                                        'label' => 'password_nuevo',
                                        'rules' => 'required|trim|xss_clean'
                                    ),
                                array(
                                        'field' => 'repite_password_nuevo',
                                        'label' => 'repite_password_nuevo',
                                        'rules' => 'required|trim|xss_clean|matches[password_nuevo]'
                                    ) 
                            ),
               
// --------------------------------- USUARIO ------------------------------


            'alta_usuario' => array(
                                    array(
                                            'field' => 'alias',
                                            'label' => 'alias',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                    array(
                                            'field' => 'nombre',
                                            'label' => 'nombre',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                    array(
                                            'field' => 'apellido',
                                            'label' => 'apellido',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'password',
                                            'rules' => 'required|trim|xss_clean'
                                        )
                                ) ,
            
            'modifica_usuario' => array(

                                    array(
                                            'field' => 'id_usuario',
                                            'label' => 'id_usuario',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        ),
                                    array(
                                            'field' => 'alias',
                                            'label' => 'alias',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                    array(
                                            'field' => 'nombre',
                                            'label' => 'nombre',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                    array(
                                            'field' => 'apellido',
                                            'label' => 'apellido',
                                            'rules' => 'required|trim|xss_clean'
                                        ) 
                                ),

            'baja_usuario' => array(

                                    array(
                                            'field' => 'id_usuario',
                                            'label' => 'id_usuario',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )  
                                ),

            'desbloquear_usuario' => array(

                                    array(
                                            'field' => 'id_usuario',
                                            'label' => 'id_usuario',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'password',
                                            'rules' => 'required|trim|xss_clean'
                                        ) 
                                ),

            'ver_desbloquear_usuario' => array(

                                    array(
                                            'field' => 'id_usuario_desbloquear',
                                            'label' => 'id_usuario_desbloquear',
                                            'rules' => 'required|trim|xss_clean|is_numeric|callback_es_usuario_desbloquear_validation'
                                        ) 
                                ),
            
            'ver_usuario' => array(
                                     array(
                                            'field' => 'id_usuario',
                                            'label' => 'id_usuario',
                                            'rules' => 'required|trim|xss_clean|is_numeric|callback_existe_usuario_validation'
                                        )
                                ),

            'asignar_roles_usuario' => array(
                                     array(
                                            'field' => 'id_usuario',
                                            'label' => 'id_usuario',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        ),
                                     array(
                                            'field' => 'rol[]',
                                            'label' => 'rol',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

// --------------------------------- ROL ------------------------------

            'alta_rol' => array(

                                    array(
                                            'field' => 'rol',
                                            'label' => 'rol',
                                            'rules' => 'required|trim|xss_clean'
                                        )  
                                ),

            'modificar_rol' => array(
                                    
                                    array(
                                            'field' => 'id_rol',
                                            'label' => 'id_rol',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )  ,
                                    array(
                                            'field' => 'rol',
                                            'label' => 'rol',
                                            'rules' => 'required|trim|xss_clean'
                                        )  
                                ),

            'baja_rol' => array(
                                     array(
                                            'field' => 'id_rol',
                                            'label' => 'id_rol',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),


            'ver_rol' => array(
                                     array(
                                            'field' => 'id_rol',
                                            'label' => 'id_rol',
                                            'rules' => 'required|trim|xss_clean|is_numeric|callback_existe_rol_validation'
                                        )
                                ),

// --------------------------------- RAMA ------------------------------

            'alta_rama' => array(
                                     array(
                                            'field' => 'nombre_rama',
                                            'label' => 'nombre_rama',
                                            'rules' => 'required|trim|xss_clean'
                                        )
                                ),

            'modifica_rama' => array(
                                     array(
                                            'field' => 'nombre_rama',
                                            'label' => 'nombre_rama',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                     array(
                                            'field' => 'id_rama',
                                            'label' => 'id_rama',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

            'baja_rama' => array(
 
                                     array(
                                            'field' => 'id_rama',
                                            'label' => 'id_rama',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

            'ver_rama' => array(
                                     array(
                                            'field' => 'id_rama',
                                            'label' => 'id_rama',
                                            'rules' => 'required|trim|xss_clean|is_numeric|callback_existe_rama_validation'
                                        )
                                ),

// --------------------------------- AREA ------------------------------

            'alta_area' => array(
                                     array(
                                            'field' => 'nombre_area',
                                            'label' => 'nombre_area',
                                            'rules' => 'required|trim|xss_clean'
                                        )
                                ),

            'modifica_area' => array(
                                     array(
                                            'field' => 'nombre_area',
                                            'label' => 'nombre_area',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                     array(
                                            'field' => 'id_area',
                                            'label' => 'id_area',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

            'baja_area' => array(
 
                                     array(
                                            'field' => 'id_area',
                                            'label' => 'id_area',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

            'ver_area' => array(
                                     array(
                                            'field' => 'id_area',
                                            'label' => 'id_area',
                                            'rules' => 'required|trim|xss_clean|is_numeric|callback_existe_area_validation'
                                        )
                                ),

// --------------------------------- Cargo ------------------------------

            'alta_cargo' => array(
                                     array(
                                            'field' => 'nombre_cargo',
                                            'label' => 'nombre_cargo',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                     array(
                                            'field' => 'area',
                                            'label' => 'area',
                                            'rules' => 'required|trim|xss_clean'
                                        )
                                ),

            'modifica_cargo' => array(
                                     array(
                                            'field' => 'nombre_cargo',
                                            'label' => 'nombre_cargo',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                     array(
                                            'field' => 'id_cargo',
                                            'label' => 'id_cargo',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

            'baja_cargo' => array(
 
                                     array(
                                            'field' => 'id_cargo',
                                            'label' => 'id_cargo',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

            'ver_cargo' => array(
                                     array(
                                            'field' => 'id_cargo',
                                            'label' => 'id_cargo',
                                            'rules' => 'required|trim|xss_clean|is_numeric|callback_existe_cargo_validation'
                                        )
                                ),

// --------------------------------- Recurso ------------------------------

            'alta_recurso' => array(
                                     array(
                                            'field' => 'recurso_area',
                                            'label' => 'recurso_area',
                                            'rules' => 'required|trim|xss_clean'
                                        )
                                ),

            'modifica_recurso' => array(
                                     array(
                                            'field' => 'recurso_area',
                                            'label' => 'recurso_area',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                     array(
                                            'field' => 'id_recurso',
                                            'label' => 'id_recurso',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

            'baja_recurso' => array(
 
                                     array(
                                            'field' => 'id_recurso',
                                            'label' => 'id_recurso',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

            'ver_recurso' => array(
                                     array(
                                            'field' => 'id_recurso',
                                            'label' => 'id_recurso',
                                            'rules' => 'required|trim|xss_clean|is_numeric|callback_existe_recurso_validation'
                                        )
                                ),


// --------------------------------- PROVEEDOR ------------------------------

            'alta_proveedor' => array(
                                     array(
                                            'field' => 'nombre_proveedor',
                                            'label' => 'nombre_proveedor',
                                            'rules' => 'required|trim|xss_clean'
                                        )
                                ),

            'modifica_proveedor' => array(
                                     array(
                                            'field' => 'nombre_proveedor',
                                            'label' => 'nombre_proveedor',
                                            'rules' => 'required|trim|xss_clean'
                                        ),
                                     array(
                                            'field' => 'id_proveedor',
                                            'label' => 'id_proveedor',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

            'baja_proveedor' => array(
 
                                     array(
                                            'field' => 'id_proveedor',
                                            'label' => 'id_proveedor',
                                            'rules' => 'required|trim|xss_clean|is_numeric'
                                        )
                                ),

            'ver_proveedor' => array(
                                     array(
                                            'field' => 'id_proveedor',
                                            'label' => 'id_proveedor',
                                            'rules' => 'required|trim|xss_clean|is_numeric|callback_existe_proveedor_validation'
                                        )
                                ),


);


?>