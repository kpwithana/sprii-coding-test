<?php
define('DEVELOPMENT',true);

define('BASEPATH', 'http://'.$_SERVER['HTTP_HOST'].'/sprii-coding-test/');
define('MODELPATH','models/');
define('CONTROLLERPATH','controllers/');
define('VIEWPATH','views/');
define('LIBPATH','libs/');
 
define('DEFAULTCONTROLLER', 'IndexController');

$xml = simplexml_load_file(__DIR__.'/Db.xml');
foreach ($xml as $db) {

define('DB_TYPE', $db->type);
define('DB_HOST', $db->host);
define('DB_NAME', $db->dbname);
define('DB_USER', $db->username);
define('DB_PASS', $db->password);
}
 

 

