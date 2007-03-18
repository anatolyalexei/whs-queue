<?php
//WHS-Queue 1.0
//add.php
include "config.php";
$act=$_SERVER['QUERY_STRING'];
if($act=='new'){
$lstque = $db->get_row("SELECT queue FROM `queue` ORDER by queue DESC LIMIT 1");
$quenum = $lstque->queue + 1;
$db->query("INSERT INTO queue (queue) VALUES ($quenum)");
php?>
<title><?=$lang['headcard']?></title>
<h1><?=$lang['headcard']?></h1>
<body onload=printpage()>
<script>
function printpage(){
window.print();
window.location='add.php';
}
</script>
<?=$lang['number']?><?=$quenum?>
</body>
<?php
die();
}
php?>
<title><?=$lang['title']?></title>
<h1><?=$lang['title']?></h1>
<a href=add.php?new><?=$lang['new']?></a>