<?php
include "config.php";
if($conf['useindex'] != ''){
header("Location: ".$conf['useindex']);
die("<script>window.location='".$conf['useindex']."';</script>");
}
php?>
<title><?=$lang['title']?></title>
<h1><?=$lang['title']?></h1>
<?=$lang['task']?><br />
<a href=add.php><?=$lang['new']?></a><br />
<a href=board.php><?=$lang['board']?></a><br />
<a href=counter.php><?=$lang['counter']?></a>