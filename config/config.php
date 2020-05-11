<?php

ini_set('display_errors', 1);

define('DSN', 'mysql:dbhost=localhost;unix_socket=/tmp/mysql.sock;dbname=Oyama_homepage_db');
define('DB_USERNAME', 'mizuki');
define('DB_PASSWORD', 'loveL0V3wAR3TU5wU5lkovec5');
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/autoload.php');

session_start();
