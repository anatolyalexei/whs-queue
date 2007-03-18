<?php
//WHS-Queue Config

//ezSQL setup
//This is MySQL config
$conf['dbusr'] = "root"; //This is username of MySQL
$conf['dbpass'] = ""; //This is password of MySQL
$conf['db'] = "whs-queue"; //This is Database name that contain Data
$conf['dbhost'] = "localhost"; //This is database host. 99% of users no need to change this

//Page setup
$conf['lang'] = "en"; //Language
$conf['refresh'] = "1000"; //Refresh rate of Board. It is 1/1000 second. Ex. 1000 = 1 sec, 100 = 0.1 sec
$conf['useindex'] = ''; //blank = index.php become menu. If given other will redirect to that page.

//Don't edit everything under this line
//Elsewise you know what are you doing!
include_once "ezsql/shared/ez_sql_core.php";
include_once "ezsql/mysql/ez_sql_mysql.php";
$db = new ezSQL_mysql($conf['dbusr'],$conf['dbpass'],$conf['db'],$conf['dbhost']);
include "lang/".$conf['lang'].".php";