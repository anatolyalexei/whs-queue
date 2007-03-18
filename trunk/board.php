<?php
//WHS-Queue 1.0
//board.php
include "config.php";
$act=$_SERVER['QUERY_STRING'];
if($act=='new'){
$lstque = $db->get_row("SELECT queue FROM `queue` ORDER by time DESC LIMIT 0,1");
$quenum = $lstque->queue + 1;
$db->query("INSERT INTO queue (queue,time) VALUES ($quenum, ".time().")");
php?>
<title><?=$lang['headcard']?></title>
<h1><?=$lang['headcard']?></h1>
<?=$lang['number']?><?=$quenum?>
</body>
<?php
die();
}
$counter = $db->get_results("SELECT counter,now FROM `counter` ORDER by counter ASC");
php?>
<title><?=$lang['title']?></title>
<style>
table{
border: thin solid rgb(0,0,0);
font-size: 250%;
position:relative;
left:35%;
color:white
}
td{
border: medium rgb(0,0,0);
border-bottom-style: solid;
}
.header{
border: medium rgb(0,0,0);
border-bottom-style: solid;
background-color:yellow;
color:black;
}
/* Context menu Script- ? Dynamic Drive (www.dynamicdrive.com) Last updated: 01/08/22
For full source code and Terms Of Use, visit http://www.dynamicdrive.com */

.skin0{
position:absolute;
width:165px;
border:2px solid black;
background-color:menu;
font-family:MS Dialog Light,Microsoft Sans Serif,Loma; /* Loma for Ubuntu linux */
line-height:20px;
cursor:default;
font-size:10px;
z-index:100;
visibility:hidden;
}

.menuitems{
padding-left:10px;
padding-right:10px;
}
</style>
<body onload="tout = setTimeout('window.location.reload()',<?=$conf['refresh']?>);" bgcolor=black>
<div id="ie5menu" class="skin0" onMouseover="highlightie5(event)" onMouseout="lowlightie5(event)" onClick="jumptoie5(event)" display:none>
<div class="menuitems" url="#" onclick="clearTimeout(tout)"><?=$lang['stop']?></div>
<div class="menuitems" url="#" onclick="tout = setTimeout('window.location.reload()',<?=$conf['refresh']?>);"><?=$lang['con']?></div>
</div>
<script language="JavaScript1.2">

//set this variable to 1 if you wish the URLs of the highlighted menu to be displayed in the status bar
var display_url=0

var ie5=document.all&&document.getElementById
var ns6=document.getElementById&&!document.all
if (ie5||ns6)
var menuobj=document.getElementById("ie5menu")

function showmenuie5(e){
//Find out how close the mouse is to the corner of the window
var rightedge=ie5? document.body.clientWidth-event.clientX : window.innerWidth-e.clientX
var bottomedge=ie5? document.body.clientHeight-event.clientY : window.innerHeight-e.clientY

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<menuobj.offsetWidth)
//move the horizontal position of the menu to the left by it's width
menuobj.style.left=ie5? document.body.scrollLeft+event.clientX-menuobj.offsetWidth : window.pageXOffset+e.clientX-menuobj.offsetWidth
else
//position the horizontal position of the menu where the mouse was clicked
menuobj.style.left=ie5? document.body.scrollLeft+event.clientX : window.pageXOffset+e.clientX

//same concept with the vertical position
if (bottomedge<menuobj.offsetHeight)
menuobj.style.top=ie5? document.body.scrollTop+event.clientY-menuobj.offsetHeight : window.pageYOffset+e.clientY-menuobj.offsetHeight
else
menuobj.style.top=ie5? document.body.scrollTop+event.clientY : window.pageYOffset+e.clientY

menuobj.style.visibility="visible"
return false
}

function hidemenuie5(e){
menuobj.style.visibility="hidden"
}

function highlightie5(e){
var firingobj=ie5? event.srcElement : e.target
if (firingobj.className=="menuitems"||ns6&&firingobj.parentNode.className=="menuitems"){
if (ns6&&firingobj.parentNode.className=="menuitems") firingobj=firingobj.parentNode //up one node
firingobj.style.backgroundColor="highlight"
firingobj.style.color="white"
if (display_url==1)
window.status=event.srcElement.url
}
}

function lowlightie5(e){
var firingobj=ie5? event.srcElement : e.target
if (firingobj.className=="menuitems"||ns6&&firingobj.parentNode.className=="menuitems"){
if (ns6&&firingobj.parentNode.className=="menuitems") firingobj=firingobj.parentNode //up one node
firingobj.style.backgroundColor=""
firingobj.style.color="black"
window.status=''
}
}

function jumptoie5(e){
var firingobj=ie5? event.srcElement : e.target
if (firingobj.className=="menuitems"||ns6&&firingobj.parentNode.className=="menuitems"){
if (ns6&&firingobj.parentNode.className=="menuitems") firingobj=firingobj.parentNode
if (firingobj.getAttribute("target"))
window.open(firingobj.getAttribute("url"),firingobj.getAttribute("target"))
else
window.location=firingobj.getAttribute("url")
}
}

if (ie5||ns6){
menuobj.style.display=''
document.oncontextmenu=showmenuie5
document.onclick=hidemenuie5
}

</script>
<table border=1>
<tr class='header'><td class='header'><b><?=$lang['counter']?></b><td class='header'><b><?=$lang['num']?></b></td>
<?php
if($counter){
foreach ($counter as $n )
{
           print "<tr><td align=center>".$n->counter."</td>";
		   print "<td align=center>".$n->now."</td></tr>";
}
}else{
print "<tr><td>-</td><td>-</td></tr>";
}
php?>
</table>