<?php
include("config.php");
print "<h1>Installing WHS-Queue</h1>Running SQL...<br />Debug data:";
$db->query('CREATE TABLE IF NOT EXISTS `counter` (`counter` smallint(20) NOT NULL,
`now` text collate latin1_general_ci NOT NULL);');
$db->debug();
print "Debug data:";
$db->query('CREATE TABLE IF NOT EXISTS `queue` (`queue` bigint(20) NOT NULL);');
$db->debug();
php?>