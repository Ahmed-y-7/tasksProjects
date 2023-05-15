<?php
// هذا الملف عيارة عن ملف تهئية الملفات وربطها مع بعضها 

use App\App;
use App\Database\DBconn;
use App\Database\queryBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


require 'vendor/autoload.php';   // هذا معناه راح يحمل جميع الاعتمادات والحزم 


APP::set('config', require 'confg.php');


$log = new Logger('PHP_BASICS');

$log->pushHandler(new StreamHandler('gueries.log', Logger::INFO));


queryBuilder::make(

    DBconn::make(APP::get('config')['database']),

    $log

);



?>
