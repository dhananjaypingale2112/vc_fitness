<?php
// BACKEND CONFIG

// HTTP
define('HTTP_SERVER', 'http://demo.proxanttech.com/vc_fitness/upload/aplogin/');
define('HTTP_CATALOG', 'http://demo.proxanttech.com/vc_fitness/upload/');
define('HTTP_IMAGE', 'http://demo.proxanttech.com/vc_fitness/upload/image/');
define('HTTP_ADMIN', 'http://demo.proxanttech.com/vc_fitness/upload/aplogin/');

// HTTPS
define('HTTPS_SERVER', HTTP_SERVER);
define('HTTPS_CATALOG', HTTP_CATALOG);
define('HTTPS_IMAGE', HTTP_IMAGE);
define('HTTPS_ADMIN', HTTP_ADMIN);

// DIR
define('DIR_CATALOG', '/home/proxant/public_html/demo/vc_fitness/upload/catalog/');
define('DIR_APPLICATION', '/home/proxant/public_html/demo/vc_fitness/upload/aplogin/');
define('DIR_SYSTEM', '/home/proxant/public_html/demo/vc_fitness/upload/system/');
define('DIR_DATABASE', DIR_SYSTEM.'database/');
define('DIR_LANGUAGE', DIR_APPLICATION.'language/');
define('DIR_TEMPLATE', DIR_APPLICATION.'view/template/');
define('DIR_CONFIG', DIR_SYSTEM.'config/');
define('DIR_IMAGE', '/home/proxant/public_html/demo/vc_fitness/upload/image/');
define('DIR_CACHE', DIR_SYSTEM.'cache/');
define('DIR_DOWNLOAD', DIR_SYSTEM.'download/');
define('DIR_UPLOAD', DIR_SYSTEM.'upload/');
define('DIR_LOGS', DIR_SYSTEM.'logs/');
define('DIR_MODIFICATION', DIR_SYSTEM.'modification/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'vcfitness');
define('DB_PASSWORD', '8149666415');
define('DB_DATABASE', 'vc_fitness');
define('DB_PREFIX', 'oc_');
define('DB_PORT', '3306');
?>