<?php
error_reporting(0);
ob_start();
session_start();
require_once('config.php');
if(isset($_SESSION['role'])=='admin')
{
mysql_connect($config['host'],$config['dbuser'],$config['dbpswd']) or die("sql error");
mysql_select_db('console');
mysql_query("set names utf8");
$query1= mysql_query("SELECT * FROM `users` WHERE `userid`='".$_SESSION['userid']."' AND `role`='admin'");
$arr1 = mysql_fetch_array($query1);
$num1 = mysql_num_rows($query1); 
if($num1==1)
{
$query=mysql_query("SELECT username FROM `users` WHERE `userid`='".$_SESSION['userid']."' AND `role`='admin'");
$name=mysql_fetch_row($query);
$query2=mysql_query("SELECT kd FROM `users` WHERE `userid`='".$_SESSION['userid']."' AND `role`='admin'");
$kd=mysql_fetch_row($query2);
$query_lang=mysql_query("SELECT language FROM `users` WHERE `userid`='".$_SESSION['userid']."' AND `role`='admin'");
$lang=mysql_fetch_row($query_lang);
include '../includes/logs.php';
include '../includes/browser_os.php';
if ($lang[0]=='EN') {
include '../includes/language/en.php';}
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
mysql_select_db($_POST['db']);
if ($_POST['db']=ctwdb1) {
$serverid='1';
$servername='Kingdom1';
} elseif ($_POST['db']=cokdb2) {
$serverid='2';
$servername='Kingdom2';
}
header("content-type:text/html; charset=utf-8");
if($_POST[name]!=''){
$sql="SELECT uid FROM userprofile WHERE `name` = '$_POST[name]'";
$result=mysql_query($sql);
if($result&&mysql_num_rows($result)>0){
$dwID = mysql_fetch_array($result);
$time=time().'000';
$time1=time();
switch($_POST[t3]){
case ''.$players_function_20.'':{
if($_POST[typeEquip]=="1"){
	mysql_query("update userprofile set gold=gold+'$_POST[add1]' WHERE uid = '$dwID[0]' ");

	}

else
if($_POST[typeEquip]=="2"){
	mysql_query("update userprofile set level='$_POST[add1]' WHERE uid = '$dwID[0]' ");

}

else
if($_POST[typeEquip]=="hero"){
	mysql_query("update new_general set level='$_POST[add1]' WHERE uid = '$dwID[0]' ");

}

else
if($_POST[typeEquip]=="herosk"){
	mysql_query("update new_general set talentpoint='$_POST[add1]' WHERE uid = '$dwID[0]' ");

}

else
if($_POST[typeEquip]=="archangel"){
$b=bin2hex('equip,10010105,1|equip,10010115,1|equip,10010125,1|equip,10010135,1|equip,10010145,1|equip,10010155,1|equip,1128605,1|equip,1130605,1|equip,1135605,1|equip,1140605,1|equip,1138605,1|equip,1141605,1|equip,1142605,1|equip,1143705,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'ARCHANGEL SET', 0x$b, '13', '$time', '1')")or die('1');


}

else
if($_POST[typeEquip]=="queen"){
$b=bin2hex('equip,10000805,1|equip,10000815,1|equip,10000825,1|equip,10000835,1|equip,10000845,1|equip,10000855,1|equip,1128605,1|equip,1130605,1|equip,1135605,1|equip,1140605,1|equip,1138605,1|equip,1141605,1|equip,1142605,1|equip,1143705,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'QUEEN SET', 0x$b, '13', '$time', '1')")or die('1');


}

else
if($_POST[typeEquip]=="4"){
    mysql_query("Delete FROM user_Science where uid='$dwID[0]'")or die('1');
    mysql_query("INSERT INTO `user_science` VALUES ('$dwID[0]','700100',5,9223372036854775807),('$dwID[0]','700200',5,9223372036854775807),('$dwID[0]','700300',5,9223372036854775807),('$dwID[0]','700400',15,9223372036854775807),('$dwID[0]','700500',15,9223372036854775807),('$dwID[0]','700600',5,9223372036854775807),('$dwID[0]','700700',15,9223372036854775807),('$dwID[0]','700800',5,9223372036854775807),('$dwID[0]','700900',15,9223372036854775807),('$dwID[0]','701000',5,9223372036854775807),('$dwID[0]','701200',15,9223372036854775807),('$dwID[0]','701300',15,9223372036854775807),('$dwID[0]','701400',10,9223372036854775807),('$dwID[0]','701500',15,9223372036854775807),('$dwID[0]','701600',15,9223372036854775807),('$dwID[0]','701700',15,9223372036854775807),('$dwID[0]','701800',15,9223372036854775807),('$dwID[0]','701900',15,9223372036854775807),('$dwID[0]','702000',15,9223372036854775807),('$dwID[0]','702100',10,9223372036854775807),('$dwID[0]','702200',5,9223372036854775807),('$dwID[0]','702300',5,9223372036854775807),('$dwID[0]','702400',5,9223372036854775807),('$dwID[0]','702500',15,9223372036854775807),('$dwID[0]','702600',15,9223372036854775807),('$dwID[0]','702700',1,9223372036854775807),('$dwID[0]','702800',15,9223372036854775807),('$dwID[0]','702900',5,9223372036854775807),('$dwID[0]','703000',15,9223372036854775807),('$dwID[0]','703100',5,9223372036854775807),('$dwID[0]','710000',10,9223372036854775807),('$dwID[0]','710300',10,9223372036854775807),('$dwID[0]','710400',5,9223372036854775807),('$dwID[0]','710500',10,9223372036854775807),('$dwID[0]','710600',10,9223372036854775807),('$dwID[0]','710700',15,9223372036854775807),('$dwID[0]','711000',15,9223372036854775807),('$dwID[0]','711100',15,9223372036854775807),('$dwID[0]','711200',15,9223372036854775807),('$dwID[0]','711300',15,9223372036854775807),('$dwID[0]','711400',5,9223372036854775807),('$dwID[0]','711500',5,9223372036854775807),('$dwID[0]','711600',10,9223372036854775807),('$dwID[0]','711700',10,9223372036854775807),('$dwID[0]','711800',15,9223372036854775807),('$dwID[0]','711900',10,9223372036854775807),('$dwID[0]','712000',10,9223372036854775807),('$dwID[0]','712100',15,9223372036854775807),('$dwID[0]','712200',15,9223372036854775807),('$dwID[0]','712300',15,9223372036854775807),('$dwID[0]','720000',10,9223372036854775807),('$dwID[0]','720100',5,9223372036854775807),('$dwID[0]','720200',5,9223372036854775807),('$dwID[0]','720300',5,9223372036854775807),('$dwID[0]','720400',10,9223372036854775807),('$dwID[0]','720500',5,9223372036854775807),('$dwID[0]','720600',5,9223372036854775807),('$dwID[0]','720700',5,9223372036854775807),('$dwID[0]','720800',10,9223372036854775807),('$dwID[0]','720900',10,9223372036854775807),('$dwID[0]','721000',15,9223372036854775807),('$dwID[0]','721100',10,9223372036854775807),('$dwID[0]','721200',10,9223372036854775807),('$dwID[0]','721400',20,9223372036854775807),('$dwID[0]','721500',10,9223372036854775807),('$dwID[0]','721600',10,9223372036854775807),('$dwID[0]','721700',10,9223372036854775807),('$dwID[0]','721800',20,9223372036854775807),('$dwID[0]','721900',15,9223372036854775807),('$dwID[0]','722000',5,9223372036854775807),('$dwID[0]','722100',5,9223372036854775807),('$dwID[0]','722200',10,9223372036854775807),('$dwID[0]','722300',20,9223372036854775807),('$dwID[0]','722400',10,9223372036854775807),('$dwID[0]','722500',10,9223372036854775807),('$dwID[0]','722600',20,9223372036854775807),('$dwID[0]','730000',10,9223372036854775807),('$dwID[0]','730100',3,9223372036854775807),('$dwID[0]','730200',3,9223372036854775807),('$dwID[0]','730300',3,9223372036854775807),('$dwID[0]','730400',3,9223372036854775807),('$dwID[0]','730500',10,9223372036854775807),('$dwID[0]','730600',3,9223372036854775807),('$dwID[0]','730700',3,9223372036854775807),('$dwID[0]','730800',3,9223372036854775807),('$dwID[0]','730900',3,9223372036854775807),('$dwID[0]','731000',1,9223372036854775807),('$dwID[0]','731100',3,9223372036854775807),('$dwID[0]','731200',3,9223372036854775807),('$dwID[0]','731300',3,9223372036854775807),('$dwID[0]','731400',3,9223372036854775807),('$dwID[0]','731500',3,9223372036854775807),('$dwID[0]','731600',1,9223372036854775807),('$dwID[0]','731700',5,9223372036854775807),('$dwID[0]','731800',5,9223372036854775807),('$dwID[0]','731900',5,9223372036854775807),('$dwID[0]','732000',5,9223372036854775807),('$dwID[0]','732100',15,9223372036854775807),('$dwID[0]','732200',5,9223372036854775807),('$dwID[0]','732300',5,9223372036854775807),('$dwID[0]','732400',5,9223372036854775807),('$dwID[0]','732500',5,9223372036854775807),('$dwID[0]','732600',15,9223372036854775807),('$dwID[0]','732700',5,9223372036854775807),('$dwID[0]','732800',5,9223372036854775807),('$dwID[0]','732900',5,9223372036854775807),('$dwID[0]','733000',5,9223372036854775807),('$dwID[0]','733100',5,9223372036854775807),('$dwID[0]','733200',1,9223372036854775807),('$dwID[0]','733300',7,9223372036854775807),('$dwID[0]','733400',7,9223372036854775807),('$dwID[0]','733500',7,9223372036854775807),('$dwID[0]','733600',7,9223372036854775807),('$dwID[0]','733700',20,9223372036854775807),('$dwID[0]','733800',7,9223372036854775807),('$dwID[0]','733900',7,9223372036854775807),('$dwID[0]','734000',7,9223372036854775807),('$dwID[0]','734100',7,9223372036854775807),('$dwID[0]','734200',20,9223372036854775807),('$dwID[0]','734300',7,9223372036854775807),('$dwID[0]','734400',7,9223372036854775807),('$dwID[0]','734500',7,9223372036854775807),('$dwID[0]','734600',7,9223372036854775807),('$dwID[0]','734700',7,9223372036854775807),('$dwID[0]','734800',7,9223372036854775807),('$dwID[0]','734900',7,9223372036854775807),('$dwID[0]','735000',7,9223372036854775807),('$dwID[0]','735100',7,9223372036854775807),('$dwID[0]','735200',20,9223372036854775807),('$dwID[0]','735300',7,9223372036854775807),('$dwID[0]','735400',7,9223372036854775807),('$dwID[0]','735500',7,9223372036854775807),('$dwID[0]','735600',7,9223372036854775807),('$dwID[0]','735700',20,9223372036854775807),('$dwID[0]','735800',7,9223372036854775807),('$dwID[0]','735900',7,9223372036854775807),('$dwID[0]','736000',7,9223372036854775807),('$dwID[0]','736100',7,9223372036854775807),('$dwID[0]','736200',7,9223372036854775807),('$dwID[0]','736300',7,9223372036854775807),('$dwID[0]','736400',7,9223372036854775807),('$dwID[0]','736500',7,9223372036854775807),('$dwID[0]','736600',7,9223372036854775807),('$dwID[0]','736700',20,9223372036854775807),('$dwID[0]','736800',7,9223372036854775807),('$dwID[0]','736900',7,9223372036854775807),('$dwID[0]','737000',7,9223372036854775807),('$dwID[0]','737100',7,9223372036854775807),('$dwID[0]','737200',20,9223372036854775807),('$dwID[0]','737300',7,9223372036854775807),('$dwID[0]','737400',7,9223372036854775807),('$dwID[0]','737500',7,9223372036854775807),('$dwID[0]','737600',7,9223372036854775807),('$dwID[0]','737700',7,9223372036854775807),('$dwID[0]','750100',10,9223372036854775807),('$dwID[0]','750200',10,9223372036854775807),('$dwID[0]','750300',5,9223372036854775807),('$dwID[0]','750400',5,9223372036854775807),('$dwID[0]','750500',5,9223372036854775807),('$dwID[0]','750600',5,9223372036854775807),('$dwID[0]','750700',5,9223372036854775807),('$dwID[0]','750800',5,9223372036854775807),('$dwID[0]','750900',5,9223372036854775807),('$dwID[0]','751000',10,9223372036854775807),('$dwID[0]','751100',10,9223372036854775807),('$dwID[0]','751200',5,9223372036854775807),('$dwID[0]','751300',5,9223372036854775807),('$dwID[0]','751400',5,9223372036854775807),('$dwID[0]','751500',5,9223372036854775807),('$dwID[0]','751600',5,9223372036854775807),('$dwID[0]','751700',5,9223372036854775807),('$dwID[0]','751800',5,9223372036854775807),('$dwID[0]','751900',5,9223372036854775807),('$dwID[0]','760000',10,9223372036854775807),('$dwID[0]','760100',10,9223372036854775807),('$dwID[0]','760200',10,9223372036854775807),('$dwID[0]','760300',10,9223372036854775807),('$dwID[0]','760400',10,9223372036854775807),('$dwID[0]','760500',10,9223372036854775807),('$dwID[0]','760600',10,9223372036854775807),('$dwID[0]','760700',10,9223372036854775807),('$dwID[0]','760800',10,9223372036854775807),('$dwID[0]','760900',10,9223372036854775807),('$dwID[0]','761000',10,9223372036854775807),('$dwID[0]','761100',10,9223372036854775807),('$dwID[0]','761200',10,9223372036854775807),('$dwID[0]','761300',10,9223372036854775807),('$dwID[0]','761400',5,9223372036854775807),('$dwID[0]','761500',10,9223372036854775807),('$dwID[0]','761600',10,9223372036854775807),('$dwID[0]','761700',10,9223372036854775807),('$dwID[0]','761800',10,9223372036854775807),('$dwID[0]','761900',10,9223372036854775807),('$dwID[0]','762000',10,9223372036854775807),('$dwID[0]','762100',10,9223372036854775807),('$dwID[0]','762200',1,9223372036854775807),('$dwID[0]','762300',10,9223372036854775807),('$dwID[0]','762400',10,9223372036854775807),('$dwID[0]','762500',10,9223372036854775807),('$dwID[0]','762600',5,9223372036854775807),('$dwID[0]','762700',7,9223372036854775807),('$dwID[0]','762800',7,9223372036854775807),('$dwID[0]','762900',7,9223372036854775807),('$dwID[0]','763000',7,9223372036854775807),('$dwID[0]','763100',7,9223372036854775807),('$dwID[0]','763200',7,9223372036854775807),('$dwID[0]','763300',7,9223372036854775807),('$dwID[0]','763400',3,9223372036854775807),('$dwID[0]','763500',7,9223372036854775807),('$dwID[0]','763600',7,9223372036854775807),('$dwID[0]','763700',3,9223372036854775807),('$dwID[0]','763800',7,9223372036854775807),('$dwID[0]','763900',7,9223372036854775807),('$dwID[0]','764000',7,9223372036854775807),('$dwID[0]','764100',7,9223372036854775807),('$dwID[0]','764200',7,9223372036854775807),('$dwID[0]','764300',7,9223372036854775807),('$dwID[0]','764400',7,9223372036854775807),('$dwID[0]','764500',3,9223372036854775807),('$dwID[0]','764600',7,9223372036854775807),('$dwID[0]','764700',7,9223372036854775807),('$dwID[0]','764800',3,9223372036854775807),('$dwID[0]','770100',10,9223372036854775807),('$dwID[0]','770200',10,9223372036854775807),('$dwID[0]','770300',10,9223372036854775807),('$dwID[0]','770400',4,9223372036854775807),('$dwID[0]','770500',3,9223372036854775807),('$dwID[0]','770600',3,9223372036854775807),('$dwID[0]','770700',3,9223372036854775807),('$dwID[0]','770800',3,9223372036854775807),('$dwID[0]','770900',10,9223372036854775807),('$dwID[0]','771000',10,9223372036854775807),('$dwID[0]','771100',10,9223372036854775807),('$dwID[0]','771200',3,9223372036854775807),('$dwID[0]','771300',3,9223372036854775807),('$dwID[0]','771400',3,9223372036854775807),('$dwID[0]','771500',3,9223372036854775807),('$dwID[0]','771600',3,9223372036854775807),('$dwID[0]','771700',3,9223372036854775807),('$dwID[0]','771800',3,9223372036854775807),('$dwID[0]','771900',3,9223372036854775807),('$dwID[0]','772000',3,9223372036854775807),('$dwID[0]','772100',3,9223372036854775807),('$dwID[0]','772200',10,9223372036854775807),('$dwID[0]','772300',10,9223372036854775807),('$dwID[0]','772400',10,9223372036854775807),('$dwID[0]','772500',10,9223372036854775807),('$dwID[0]','780100',5,9223372036854775807),('$dwID[0]','780200',5,9223372036854775807),('$dwID[0]','780300',5,9223372036854775807),('$dwID[0]','780400',5,9223372036854775807),('$dwID[0]','780500',5,9223372036854775807),('$dwID[0]','780600',5,9223372036854775807),('$dwID[0]','780700',5,9223372036854775807),('$dwID[0]','780800',5,9223372036854775807),('$dwID[0]','780900',5,9223372036854775807),('$dwID[0]','781000',5,9223372036854775807),('$dwID[0]','781100',5,9223372036854775807),('$dwID[0]','781200',5,9223372036854775807),('$dwID[0]','781300',5,9223372036854775807),('$dwID[0]','781400',5,9223372036854775807),('$dwID[0]','781500',5,9223372036854775807),('$dwID[0]','781600',5,9223372036854775807),('$dwID[0]','781700',5,9223372036854775807),('$dwID[0]','781800',5,9223372036854775807),('$dwID[0]','781900',5,9223372036854775807),('$dwID[0]','782000',5,9223372036854775807),('$dwID[0]','782100',3,9223372036854775807),('$dwID[0]','782200',5,9223372036854775807),('$dwID[0]','782300',5,9223372036854775807),('$dwID[0]','782400',5,9223372036854775807),('$dwID[0]','782500',5,9223372036854775807),('$dwID[0]','782600',3,9223372036854775807),('$dwID[0]','782700',1,9223372036854775807),('$dwID[0]','782800',5,9223372036854775807),('$dwID[0]','782900',5,9223372036854775807),('$dwID[0]','783000',5,9223372036854775807),('$dwID[0]','783100',5,9223372036854775807),('$dwID[0]','783200',5,9223372036854775807),('$dwID[0]','783300',5,9223372036854775807),('$dwID[0]','783400',5,9223372036854775807),('$dwID[0]','783500',5,9223372036854775807),('$dwID[0]','783600',5,9223372036854775807),('$dwID[0]','783700',5,9223372036854775807),('$dwID[0]','783800',5,9223372036854775807),('$dwID[0]','783900',5,9223372036854775807),('$dwID[0]','784000',5,9223372036854775807),('$dwID[0]','784100',5,9223372036854775807),('$dwID[0]','784200',5,9223372036854775807),('$dwID[0]','784300',5,9223372036854775807),('$dwID[0]','784400',5,9223372036854775807),('$dwID[0]','784500',5,9223372036854775807),('$dwID[0]','784600',5,9223372036854775807),('$dwID[0]','784700',5,9223372036854775807),('$dwID[0]','784800',5,9223372036854775807),('$dwID[0]','784900',5,9223372036854775807),('$dwID[0]','785000',5,9223372036854775807),('$dwID[0]','785100',5,9223372036854775807),('$dwID[0]','785200',1,9223372036854775807),('$dwID[0]','790100',5,9223372036854775807),('$dwID[0]','790200',5,9223372036854775807),('$dwID[0]','790300',5,9223372036854775807),('$dwID[0]','790400',5,9223372036854775807),('$dwID[0]','790500',5,9223372036854775807),('$dwID[0]','790600',5,9223372036854775807),('$dwID[0]','790700',5,9223372036854775807),('$dwID[0]','790800',5,9223372036854775807),('$dwID[0]','790900',5,9223372036854775807),('$dwID[0]','791000',5,9223372036854775807),('$dwID[0]','791100',5,9223372036854775807),('$dwID[0]','791200',5,9223372036854775807),('$dwID[0]','791300',5,9223372036854775807),('$dwID[0]','791400',5,9223372036854775807),('$dwID[0]','791500',5,9223372036854775807),('$dwID[0]','791600',5,9223372036854775807),('$dwID[0]','791700',5,9223372036854775807),('$dwID[0]','791800',5,9223372036854775807),('$dwID[0]','791900',5,9223372036854775807),('$dwID[0]','792000',5,9223372036854775807),('$dwID[0]','792100',5,9223372036854775807),('$dwID[0]','792200',5,9223372036854775807),('$dwID[0]','795000',5,9223372036854775807),('$dwID[0]','796000',5,9223372036854775807),('$dwID[0]','797000',1,9223372036854775807),('$dwID[0]','798000',7,9223372036854775807),('$dwID[0]','799000',7,9223372036854775807),('$dwID[0]','800000',7,9223372036854775807),('$dwID[0]','801000',7,9223372036854775807),('$dwID[0]','802000',7,9223372036854775807),('$dwID[0]','803000',10,9223372036854775807),('$dwID[0]','804000',1,9223372036854775807),('$dwID[0]','806000',10,9223372036854775807),('$dwID[0]','807000',10,9223372036854775807),('$dwID[0]','808000',10,9223372036854775807),('$dwID[0]','809000',12,9223372036854775807),('$dwID[0]','810000',10,9223372036854775807),('$dwID[0]','811000',12,9223372036854775807),('$dwID[0]','812000',15,9223372036854775807),('$dwID[0]','813000',10,9223372036854775807),('$dwID[0]','814000',10,9223372036854775807),('$dwID[0]','815000',12,9223372036854775807),('$dwID[0]','816000',12,9223372036854775807),('$dwID[0]','817000',5,9223372036854775807),('$dwID[0]','818000',5,9223372036854775807),('$dwID[0]','819000',12,9223372036854775807),('$dwID[0]','820000',1,9223372036854775807),('$dwID[0]','821000',15,9223372036854775807),('$dwID[0]','822000',15,9223372036854775807),('$dwID[0]','823000',10,9223372036854775807),('$dwID[0]','824000',15,9223372036854775807),('$dwID[0]','825000',15,9223372036854775807),('$dwID[0]','826000',15,9223372036854775807),('$dwID[0]','827000',10,9223372036854775807),('$dwID[0]','828000',10,9223372036854775807),('$dwID[0]','829000',1,9223372036854775807)")or die('2');

}

else
if($_POST[typeEquip]=="3"){
	
	mysql_query("update user_building set progress=0 where uid='$dwID[0]'")or die('1');
	mysql_query("update user_building set updateTime=0 where uid='$dwID[0]'")or die('2');
	mysql_query("update user_building set level=30 where itemId=400000 and uid='$dwID[0]'")or die('3');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=400000 and uid='$dwID[0]'")or die('4');
	mysql_query("update user_building set level=30 where itemId=401000 and uid='$dwID[0]'")or die('5');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=401000 and uid='$dwID[0]'")or die('6');
	mysql_query("update user_building set level=30 where itemId=402000 and uid='$dwID[0]'")or die('7');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=402000 and uid='$dwID[0]'")or die('8');
	mysql_query("update user_building set level=30 where itemId=403000 and uid='$dwID[0]'")or die('9');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=403000 and uid='$dwID[0]'")or die('10');
	mysql_query("update user_building set level=30 where itemId=404000 and uid='$dwID[0]'")or die('11');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=404000 and uid='$dwID[0]'")or die('12');
	mysql_query("update user_building set level=30 where itemId=407000 and uid='$dwID[0]'")or die('13');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=407000 and uid='$dwID[0]'")or die('14');
	mysql_query("update user_building set level=30 where itemId=408000 and uid='$dwID[0]'")or die('15');
	mysql_query("update user_building set level=30 where itemId=410000 and uid='$dwID[0]'")or die('16');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=410000 and uid='$dwID[0]'")or die('17');
	mysql_query("update user_building set level=30 where itemId=411000 and uid='$dwID[0]'")or die('18');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=411000 and uid='$dwID[0]'")or die('19');
	mysql_query("update user_building set level=30 where itemId=412000 and uid='$dwID[0]'")or die('20');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=412000 and uid='$dwID[0]'")or die('21');
	mysql_query("update user_building set level=30 where itemId=413000 and uid='$dwID[0]'")or die('22');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=413000 and uid='$dwID[0]'")or die('23');
	mysql_query("update user_building set level=30 where itemId=415000 and uid='$dwID[0]'")or die('24');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=415000 and uid='$dwID[0]'")or die('25');
	mysql_query("update user_building set level=30 where itemId=416000 and uid='$dwID[0]'")or die('26');
	mysql_query("update user_building set level=30 where itemId=417000 and uid='$dwID[0]'")or die('27');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=417000 and uid='$dwID[0]'")or die('28');
	mysql_query("update user_building set level=30 where itemId=418000 and uid='$dwID[0]'")or die('29');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=418000 and uid='$dwID[0]'")or die('30');
	mysql_query("update user_building set level=30 where itemId=419000 and uid='$dwID[0]'")or die('31');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=419000 and uid='$dwID[0]'")or die('32');
	mysql_query("update user_building set level=30 where itemId=422000 and uid='$dwID[0]'")or die('33');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=422000 and uid='$dwID[0]'")or die('34');
	mysql_query("update user_building set level=30 where itemId=423000 and uid='$dwID[0]'")or die('35');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=423000 and uid='$dwID[0]'")or die('36');
	mysql_query("update user_building set level=30 where itemId=424000 and uid='$dwID[0]'")or die('37');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=424000 and uid='$dwID[0]'")or die('38');
	mysql_query("update user_building set level=30 where itemId=425000 and uid='$dwID[0]'")or die('39');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=425000 and uid='$dwID[0]'")or die('40');
	mysql_query("update user_building set level=30 where itemId=426000 and uid='$dwID[0]'")or die('41');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=426000 and uid='$dwID[0]'")or die('42');
	mysql_query("update user_building set level=30 where itemId=427000 and uid='$dwID[0]'")or die('43');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=427000 and uid='$dwID[0]'")or die('44');
	mysql_query("update user_building set level=30 where itemId=428000 and uid='$dwID[0]'")or die('45');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=428000 and uid='$dwID[0]'")or die('46');
	mysql_query("update user_building set level=30 where itemId=429000 and uid='$dwID[0]'")or die('47');
	mysql_query("update user_building set star='$_POST[add1]' where itemId=429000 and uid='$dwID[0]'")or die('48');
	mysql_query("update user_building set level=30 where itemId=432000 and uid='$dwID[0]'")or die('49');
	mysql_query("update user_building set level=30 where itemId=433000 and uid='$dwID[0]'")or die('50');
	mysql_query("update user_building set level=30 where itemId=434000 and uid='$dwID[0]'")or die('51');
	mysql_query("update user_building set level=30 where itemId=435000 and uid='$dwID[0]'")or die('52');
	mysql_query("update user_building set level=30 where itemId=436000 and uid='$dwID[0]'")or die('53');
	mysql_query("update user_building set level=30 where itemId=437000 and uid='$dwID[0]'")or die('54');
	mysql_query("update user_building set level=1 where itemId=439000 and uid='$dwID[0]'")or die('55');
	mysql_query("update user_building set level=30 where itemId=441000 and uid='$dwID[0]'")or die('56');
}
echo '<script>alert("'.$successful.'");</script>';
break;
}
}
}else{echo '<script>alert("'.$Error_name.'");</script>';}
}
?>
<title><?php echo $players_function_1 ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport">
    <style type="text/css">
body{
font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;	
	background-color: #000000;
	font-weight: bold;
    font-size: 14px;
	color: 53ff1a;
    text-align: center;
    line-height: 2.5;
    margin: 0px;
    padding:0px;
	font-family: 'Arial', cursive;
}
.div1{
font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;	
    height: 50px;
    line-height: 50px;
    background-color: #39e600;  
    color: 000000;
}
a {
font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;	
    text-decoration: none;
    color: ff0000;
    font-size: 16px;
}
input[type=text] {
font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;	
    padding: 2px 8px;
    margin: 2px 0;
	text-align: center;
    display: inline-block;
    border: 2.5px solid #ccc;
    border-radius: 20px;
    box-sizing: border-box;
}
input[type=number] {
font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;	
    padding: 2px 8px;
    margin: 2px 0;
	text-align: center;
    display: inline-block;
    border: 2.5px solid #ccc;
    border-radius: 20px;
    box-sizing: border-box;
}
select{
font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;	
    padding: 2px 8px;
    margin: 2.5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 20px;
    box-sizing: border-box;
}
input[type=submit] {
font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;	
    padding: 0px 0px;
    margin: 10px 0px;
    display: inline-block;
    border: 5px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
}
textarea {
font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;	
    padding: 2px 8px;
    margin: 2px 0;
	text-align: center;
    display: inline-block;
    border: 2.5px solid #ccc;
    border-radius: 20px;
    box-sizing: border-box;
}
</style>
 <div class="div1"><h1>Player Upgrade</h1></div><br/>
<form method="post" action="" name="form2">
<label><?php echo $enter_name ?></label>
<input type="text" name="name" value="<?=$_POST[name]?>" placeholder="<?php echo $name_1 ?>" size="10">
</br>
<label><?php echo $choose_kingdom ?></label>
<?php
if ($kd[0]=='1') {
echo ('
<select name="db">
<option value="ctwdb1">1</option>
</select>');
}
elseif ($kd[0]=='2') {
echo('<select name="db">
<option value="cokdb2">2</option>
</select>');
}
elseif ($kd[0]=='3') {
echo('<select name="db">
<option value="cokdb3">3</option>
</select>');
}
elseif ($kd[0]=='0') {
echo('<select name="db">
<option value="ctwdb1">1</option>
<option value="cokdb2">2</option>
<option value="cokdb3">3</option>
</select>');
}
?><br/>

<fieldset><legend>GOLD Functions</legend>
<select name="typeEquip">
<option value="1">GOLD</option>
<option value="2">LORD LEVEL</option>
<option value="hero">Hero level</option>
<option value="herosk">Hero Skill Point</option>
<option value="3">CASTLE Prestige</option>
<!--<option value="archangel">ARCHANGEL SET </option>
<option value="queen">QUEEN SET</option>-->

</select>
<input type="number" name="add1" size="18" placeholder="<?php echo $mail_3 ?>">
<input type="submit" name="t3" value="<?php echo $players_function_20 ?>"/>
</fieldset>

<p>
<input style="width: 200px;  padding: 2.5px; pointer; font-weight: bold; background: #00FF00; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="<?php echo $go_back ?>"onclick="window.location.href='index.php'"/><br>

</fieldset>

</form>
<?php 
   }
    else
    {
      header ("location:/index.php");
      }

    }    
else
      header ("location:/index.php");
    ?>