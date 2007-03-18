<?php
//WHS-Queue 1.0
//counter.php
include "config.php";
$cou=$_GET['c'];
$act=$_GET['act'];
if($act == 'add'){
$db->query("INSERT INTO `counter` ( `counter` , `now` ) VALUES ('$cou', '-');");
header("Location: counter.php?c=".$cou);
die('<script>window.location="counter.php?c='.$cou.'";</script>');
}
if(!$cou){
php?>
<title><?=$lang['title']?></title>
<h1><?=$lang['title']?></h1>
<form action=counter.php method=get>
<?=$lang['counum']?><input type=text name=c>
<input type=submit value="<?=$lang['go']?>">
</form>
<?php
die();
}else{
$c = $db->get_row("SELECT counter FROM `counter` WHERE `counter` = $cou LIMIT 0,1");
if(!$c){
php?>
<title><?=$lang['title']?></title>
<h1><?=$lang['title']?></h1>
<?=$lang['nocounter']?><a href=counter.php?act=add&c=<?=$cou?>><?=$lang['addcounter']?></a>
<?php
die();
}
}
$lstque = $db->get_row("SELECT queue FROM `queue` ORDER by queue ASC LIMIT 1");
if($lstque){
$db->query("DELETE FROM `queue` WHERE `queue` = ".$lstque->queue." LIMIT 1;");
$db->query("UPDATE `counter` SET `now` = '".$lstque->queue."' WHERE `counter` = $cou LIMIT 1 ;");
}else{
$lstque->queue = $lang['noqueue'];
$db->query("UPDATE `counter` SET `now` = '-' WHERE `counter` = $cou LIMIT 1 ;");
}
php?>
<title><?=$lang['title']?> : <?=$lang['counter']?> <?=$cou?></title>
<h1><?=$lang['title']?> : <?=$lang['counter']?> <?=$cou?></h1>
<?=$lang['current']?><?=$lstque->queue?><br />
<a href=counter.php?<?=$_SERVER['QUERY_STRING']?>><?=$lang['nextqueue']?></a><br /><br />
<iframe src=list.php height=300 width=500 style="border: 0px"></iframe>