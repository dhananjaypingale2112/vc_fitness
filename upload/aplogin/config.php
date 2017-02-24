<?php
// BACKEND CONFIG

// HTTP
define('HTTP_SERVER', 'http://localhost/vc_fitness.git/upload/aplogin/');
define('HTTP_CATALOG', 'http://localhost/vc_fitness.git/upload/');
define('HTTP_IMAGE', 'http://localhost/vc_fitness.git/upload/image/');
define('HTTP_ADMIN', 'http://localhost/vc_fitness.git/upload/aplogin/');

// HTTPS
define('HTTPS_SERVER', HTTP_SERVER);
define('HTTPS_CATALOG', HTTP_CATALOG);
define('HTTPS_IMAGE', HTTP_IMAGE);
define('HTTPS_ADMIN', HTTP_ADMIN);

// DIR
define('DIR_CATALOG', 'E:/xampp/htdocs/vc_fitness.git/upload/catalog/');
define('DIR_APPLICATION', 'E:/xampp/htdocs/vc_fitness.git/upload/aplogin/');
define('DIR_SYSTEM', 'E:/xampp/htdocs/vc_fitness.git/upload/system/');
define('DIR_DATABASE', DIR_SYSTEM.'database/');
define('DIR_LANGUAGE', DIR_APPLICATION.'language/');
define('DIR_TEMPLATE', DIR_APPLICATION.'view/template/');
define('DIR_CONFIG', DIR_SYSTEM.'config/');
define('DIR_IMAGE', 'E:/xampp/htdocs/vc_fitness.git/upload/image/');
define('DIR_CACHE', DIR_SYSTEM.'cache/');
define('DIR_DOWNLOAD', DIR_SYSTEM.'download/');
define('DIR_UPLOAD', DIR_SYSTEM.'upload/');
define('DIR_LOGS', DIR_SYSTEM.'logs/')	;
define('DIR_MODIFICATION', DIR_SYSTEM.'modification/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'vc_fitness');
define('DB_PREFIX', 'oc_');
define('DB_PORT', '3306');
?>