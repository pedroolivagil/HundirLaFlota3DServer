<?php

// Constantes
define("SERVER_ROOT", "http://localhost/HundirLaFlota3DServer/");
//define("SERVER_ROOT", $_SERVER['HTTP_HOST']);

//define("USUARIO", "usuario");
//define("PROJECT", "project");

define("PAISES", "paises");
define("NUEVO_PROYECTO_IMAGENES", "project_images");
define("NUEVO_PROYECTO_TARJETAS", "project_targets");
define("PROYECTOS_USUARIO", "proyectos_usuario");
define("TARJETAS_PROYECTO", "tarjetas_proyecto");
define("IMAGENES_PROYECTO", "imagenes_proyecto");
define("IMG_BASE64", "img_base64");
define("IMAGES_BODY_BASE64", "images_body_base64");
define("IMAGE_NAMES_BODY_BASE64", "image_names_body_base64");
define("ROOT_USER", "../../clients/");
define("ROOT_USER_IMG_DIR", "/img/");

define("TABLE_USUARIO", "usuario");

define("COL_ID_USUARIO", "id_usuario");
define("COL_USERNAME", "username");
define("COL_FLAG_ACTIVO", "flag_activo");

// Queries
define("UsuarioFindById", "SELECT u.* FROM usuario u WHERE u.id_usuario = :id_usuario");
define("UsuarioFindByUserName", "SELECT u.* FROM usuario u WHERE u.username = :username");