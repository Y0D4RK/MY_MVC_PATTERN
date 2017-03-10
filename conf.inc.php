<?php

date_default_timezone_set('Europe/Paris');

$explode = explode('/', $_SERVER['SCRIPT_NAME']);
$protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
$host = $protocol . $_SERVER['HTTP_HOST'] . str_replace(end($explode), '', $_SERVER['SCRIPT_NAME']);

define('WEBHOST', $host);

define('DIRBASE','PHP_MVC');

define('DBHOST','localhost');
define('DBUSER','root');
define('DBPWD','root');

define('DBNAME','');

