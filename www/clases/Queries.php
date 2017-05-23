<?php

// Constantes
define("SERVER_ROOT", "http://localhost/HundirLaFlota3DServer/");
//define("SERVER_ROOT", $_SERVER['HTTP_HOST']);

define("TABLE_USUARIO", "usuario");

define("COL_ID_USUARIO", ":id_usuario");
define("COL_USERNAME", ":username");
define("COL_FLAG_ACTIVO", ":flag_activo");

// NamedQueries
define("UsuarioFindById", "SELECT u.* FROM usuario u WHERE u.id_usuario = :id_usuario");
define("UsuarioFindByUserName", "SELECT u.* FROM usuario u WHERE u.username = :username AND u.flag_activo = :flag_activo");
