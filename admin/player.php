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
	mysql_query("update userprofile set gold=gold+'$_POST[add1]' WHERE uid = '$dwID[0]' ")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_20','$name[0] gave $_POST[name] ($_POST[add1]) gold',$time1,'$ip','$user_browser','$user_os')")or die('1');

	}

else
if($_POST[typeEquip]=="2"){
	mysql_query("update userprofile set level='$_POST[add1]' WHERE uid = '$dwID[0]' ")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_2','$name[0] updated $_POST[name] Lord Level to level ($_POST[add1])',$time1,'$ip','$user_browser','$user_os')")or die('9');

}

else
if($_POST[typeEquip]=="3"){
	mysql_query("update user_building set level='$_POST[add1]' WHERE uid = '$dwID[0]' ")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_3','$name[0] updated $_POST[name] Castle Level to level ($_POST[add1])',$time1,'$ip','$user_browser','$user_os')")or die('9');

	}

else
if($_POST[typeEquip]=="4"){
    mysql_query("Delete FROM user_Science where uid='$dwID[0]'")or die('1');
    mysql_query("INSERT INTO `user_science` VALUES ('$dwID[0]','700100',4,9223372036854775807),('$dwID[0]','700200',5,9223372036854775807),('$dwID[0]','700300',5,9223372036854775807),('$dwID[0]','700400',15,9223372036854775807),('$dwID[0]','700500',15,9223372036854775807),('$dwID[0]','700600',5,9223372036854775807),('$dwID[0]','700700',15,9223372036854775807),('$dwID[0]','700800',5,9223372036854775807),('$dwID[0]','700900',15,9223372036854775807),('$dwID[0]','701000',5,9223372036854775807),('$dwID[0]','701200',15,9223372036854775807),('$dwID[0]','701300',15,9223372036854775807),('$dwID[0]','701400',10,9223372036854775807),('$dwID[0]','701500',15,9223372036854775807),('$dwID[0]','701600',15,9223372036854775807),('$dwID[0]','701700',15,9223372036854775807),('$dwID[0]','701800',15,9223372036854775807),('$dwID[0]','701900',15,9223372036854775807),('$dwID[0]','702000',15,9223372036854775807),('$dwID[0]','702100',10,9223372036854775807),('$dwID[0]','710000',10,9223372036854775807),('$dwID[0]','710300',10,9223372036854775807),('$dwID[0]','710400',5,9223372036854775807),('$dwID[0]','710500',10,9223372036854775807),('$dwID[0]','710600',10,9223372036854775807),('$dwID[0]','710700',15,9223372036854775807),('$dwID[0]','711000',15,9223372036854775807),('$dwID[0]','711100',15,9223372036854775807),('$dwID[0]','711200',15,9223372036854775807),('$dwID[0]','711300',15,9223372036854775807),('$dwID[0]','711400',5,9223372036854775807),('$dwID[0]','711500',5,9223372036854775807),('$dwID[0]','711600',10,9223372036854775807),('$dwID[0]','711700',10,9223372036854775807),('$dwID[0]','720000',10,9223372036854775807),('$dwID[0]','720100',5,9223372036854775807),('$dwID[0]','720200',5,9223372036854775807),('$dwID[0]','720300',5,9223372036854775807),('$dwID[0]','720400',10,9223372036854775807),('$dwID[0]','720500',5,9223372036854775807),('$dwID[0]','720600',5,9223372036854775807),('$dwID[0]','720700',5,9223372036854775807),('$dwID[0]','720800',10,9223372036854775807),('$dwID[0]','720900',10,9223372036854775807),('$dwID[0]','721000',15,9223372036854775807),('$dwID[0]','721100',10,9223372036854775807),('$dwID[0]','721200',10,9223372036854775807),('$dwID[0]','721400',20,9223372036854775807),('$dwID[0]','721500',10,9223372036854775807),('$dwID[0]','721600',10,9223372036854775807),('$dwID[0]','721700',10,9223372036854775807),('$dwID[0]','721800',20,9223372036854775807),('$dwID[0]','730000',10,9223372036854775807),('$dwID[0]','730100',3,9223372036854775807),('$dwID[0]','730200',3,9223372036854775807),('$dwID[0]','730300',3,9223372036854775807),('$dwID[0]','730400',3,9223372036854775807),('$dwID[0]','730500',10,9223372036854775807),('$dwID[0]','730600',3,9223372036854775807),('$dwID[0]','730700',3,9223372036854775807),('$dwID[0]','730800',3,9223372036854775807),('$dwID[0]','730900',3,9223372036854775807),('$dwID[0]','731000',1,9223372036854775807),('$dwID[0]','731100',3,9223372036854775807),('$dwID[0]','731200',3,9223372036854775807),('$dwID[0]','731300',3,9223372036854775807),('$dwID[0]','731400',3,9223372036854775807),('$dwID[0]','731500',3,9223372036854775807),('$dwID[0]','731600',1,9223372036854775807),('$dwID[0]','731700',5,9223372036854775807),('$dwID[0]','731800',5,9223372036854775807),('$dwID[0]','731900',5,9223372036854775807),('$dwID[0]','732000',5,9223372036854775807),('$dwID[0]','732100',15,9223372036854775807),('$dwID[0]','732200',5,9223372036854775807),('$dwID[0]','732300',5,9223372036854775807),('$dwID[0]','732400',5,9223372036854775807),('$dwID[0]','732500',5,9223372036854775807),('$dwID[0]','732600',15,9223372036854775807),('$dwID[0]','732700',5,9223372036854775807),('$dwID[0]','732800',5,9223372036854775807),('$dwID[0]','732900',5,9223372036854775807),('$dwID[0]','733000',5,9223372036854775807),('$dwID[0]','733100',5,9223372036854775807),('$dwID[0]','733200',1,9223372036854775807),('$dwID[0]','733300',7,9223372036854775807),('$dwID[0]','733400',7,9223372036854775807),('$dwID[0]','733500',7,9223372036854775807),('$dwID[0]','733600',7,9223372036854775807),('$dwID[0]','733700',20,9223372036854775807),('$dwID[0]','733800',7,9223372036854775807),('$dwID[0]','733900',7,9223372036854775807),('$dwID[0]','734000',7,9223372036854775807),('$dwID[0]','734100',7,9223372036854775807),('$dwID[0]','734200',20,9223372036854775807),('$dwID[0]','734300',7,9223372036854775807),('$dwID[0]','734400',7,9223372036854775807),('$dwID[0]','734500',7,9223372036854775807),('$dwID[0]','734600',7,9223372036854775807),('$dwID[0]','734700',7,9223372036854775807)")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_4','$name[0] updated ($_POST[name]) science',$time1,'$ip','$user_browser','$user_os')")or die('9');

	}
else
if($_POST[typeEquip]=="5"){
    mysql_query("Delete FROM world_march where ownerUid='$dwID[0]'")or die('reset 1');
    mysql_query("update user_army set pve=0 where uid='$dwID[0]'")or die('reset 2');
	mysql_query("update user_army set march=0 where uid='$dwID[0]'")or die('reset 3');
	mysql_query("update user_army set defence=0 where uid='$dwID[0]'")or die('reset 4');
	mysql_query("update user_army set free =120000000 where uid='$dwID[0]' and armyId =107000")or die('reset 6');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107001")or die('reset 7');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107002")or die('reset 8');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107003")or die('reset 9');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107004")or die('reset 10');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107005")or die('reset 11');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107006")or die('reset 12');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107007")or die('reset 13');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107008")or die('reset 14');
	mysql_query("update user_army set free =11000000 where uid='$dwID[0]' and armyId =107009")or die('reset 15');
	mysql_query("update user_army set free =11000000 where uid='$dwID[0]' and armyId =107010")or die('reset 16');
	mysql_query("update user_army set free =11000000 where uid='$dwID[0]' and armyId =107011")or die('reset 17');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107100")or die('reset 18');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107101")or die('reset 19');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107102")or die('reset 20');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107103")or die('reset 21');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107104")or die('reset 22');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107105")or die('reset 23');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107106")or die('reset 24');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107107")or die('reset 25');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107108")or die('reset 26');
	mysql_query("update user_army set free =18000000 where uid='$dwID[0]' and armyId =107109")or die('reset 27');
	mysql_query("update user_army set free =18000000 where uid='$dwID[0]' and armyId =107110")or die('reset 28');
	mysql_query("update user_army set free =18000000 where uid='$dwID[0]' and armyId =107111")or die('reset 29');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107200")or die('reset 30');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107201")or die('reset 31');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107202")or die('reset 32');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107203")or die('reset 33');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107204")or die('reset 34');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107205")or die('reset 35');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107206")or die('reset 36');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107207")or die('reset 37');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107208")or die('reset 38');
	mysql_query("update user_army set free =18000000 where uid='$dwID[0]' and armyId =107209")or die('reset 39');
	mysql_query("update user_army set free =18000000 where uid='$dwID[0]' and armyId =107210")or die('reset 40');
	mysql_query("update user_army set free =18000000 where uid='$dwID[0]' and armyId =107211")or die('reset 41');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107300")or die('reset 42');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107301")or die('reset 43');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107302")or die('reset 44');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107303")or die('reset 45');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107304")or die('reset 46');
	mysql_query("update user_army set free =2000000 where uid='$dwID[0]' and armyId =107305")or die('reset 47');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107306")or die('reset 48');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107307")or die('reset 49');
	mysql_query("update user_army set free =4000000 where uid='$dwID[0]' and armyId =107308")or die('reset 50');
	mysql_query("update user_army set free =9500000 where uid='$dwID[0]' and armyId =107309")or die('reset 51');
	mysql_query("update user_army set free =9500000 where uid='$dwID[0]' and armyId =107310")or die('reset 52');
	mysql_query("update user_army set free =9500000 where uid='$dwID[0]' and armyId =107311")or die('reset 53');
	mysql_query("update user_hospital set dead =0 where uid='$dwID[0]'")or die('reset 54');
	mysql_query("update user_hospital set heal =0 where uid='$dwID[0]'")or die('reset 55');
	mysql_query("update user_hospital set finishtime =0 where uid='$dwID[0]'")or die('reset 56');
	mysql_query("update playerinfo set power =2000000000 where uid='$dwID[0]'")or die('reset 57');
	mysql_query("INSERT INTO logs_old (subject,object,function,details,time,IP) VALUES ('$name[0]','$_POST[name]', 'Troop Reset Function', '($name[0]) Reset ($_POST[name]) Troops',$time1,'$ip')")or die('reset 58');
}
echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$players_function_21.'':{


if($_POST[type]=="1"){
	mysql_query("Delete from `user_equip` where uid='$dwID[0]'")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_5','$name[0] deleted $_POST[name] equipments',$time1,'$ip','$user_browser','$user_os')")or die('9');

}


else
if($_POST[type]=="2"){
	mysql_query("update userprofile set gold=0 WHERE uid = '$dwID[0]'")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_6','$name[0] deleted $_POST[name] gold',$time1,'$ip','$user_browser','$user_os')")or die('9');

}

else
if($_POST[type]=="3"){
	mysql_query("update userprofile set level=1 WHERE uid = '$dwID[0]'")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_7','$name[0] deleted $_POST[name] Lord Level (Lord level became 1)',$time1,'$ip','$user_browser','$user_os')")or die('9');

}

else
if($_POST[type]=="4"){
	mysql_query("update user_Vip set level=1 WHERE uid = '$dwID[0]'")or die('1');
	mysql_query("update user_Vip set score=100 WHERE uid = '$dwID[0]'")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_8','$name[0] deleted $_POST[name] VIP Level (VIP level became 1)',$time1,'$ip','$user_browser','$user_os')")or die('9');

}

else
if($_POST[type]=="5"){
	mysql_query("update user_building set level=1 WHERE uid = '$dwID[0]'")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_9','$name[0] deleted $_POST[name] Castle Level (Castle level became 1)',$time1,'$ip','$user_browser','$user_os')")or die('9');

}

echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$players_function_22.'':{
if($_POST[type5]=="1"){
$durat=$_POST[duration]*86400000;
$duration=$time+$durat;
mysql_query("update userprofile set bantime='$duration' where uid = '$dwID[0]'")or die('Error1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os,ban_duration) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_22','$name[0] banned $_POST[name] for $_POST[duration] days reason : $_POST[reason]',$time1,'$ip','$user_browser','$user_os',$duration)")or die('9');

}
else
if($_POST[type5]=="2"){
$durat=$_POST[duration]*3600000;
$duration=$time+$durat;
mysql_query("update userprofile set bantime='$duration' where uid = '$dwID[0]'")or die('Error2');
mysql_query("INSERT INTO logs_old (subject,object,function,details,time,IP) VALUES ('$name[0]','$_POST[name]', 'Ban function', '($name[0]) banned ($_POST[name]) for $_POST[duration] hours (reason : $_POST[reason])',$time1,'$ip')")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os,ban_duration) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_10','$name[0] banned $_POST[name] for $_POST[duration] hours reason : $_POST[reason]',$time1,'$ip','$user_browser','$user_os',$duration)")or die('9');

}

echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$players_function_23.'':{
$old_ban1=mysql_query("SELECT bantime FROM `userprofile` WHERE `uid`='$dwID[0]'");
$old_ban=mysql_fetch_row($old_ban1);
mysql_query("update userprofile set bantime=0 where uid = '$dwID[0]'")or die('Error1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os,old_ban_duration) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_23','$name[0] unbanned $_POST[name]',$time1,'$ip','$user_browser','$user_os','$old_ban[0]')")or die('9');

echo '<script>alert("'.$successful.'");</script>';
break;
}

case ''.$players_function_24.'':{
mysql_query("delete from alliance_apply where userid= '$dwID[0]'")or die('1');
mysql_query("delete from alliance_comment where senderuid= '$dwID[0]'")or die('2');
mysql_query("delete from alliance_help where senderid= '$dwID[0]'")or die('4');
mysql_query("delete from alliance_member where uid= '$dwID[0]'")or die('5');
mysql_query("delete from chat_shield where owner= '$dwID[0]'")or die('6');
mysql_query("delete from compensation_record where uid= '$dwID[0]'")or die('7');
mysql_query("delete from crystal_cost_record where userid= '$dwID[0]'")or die('8');
mysql_query("delete from donate_history where uid= '$dwID[0]'")or die('9');
mysql_query("delete from exchange_activity where uid= '$dwID[0]'")or die('10');
mysql_query("delete from exchange_time where uid= '$dwID[0]'")or die('11');
mysql_query("delete from exchange_visible where uid= '$dwID[0]'")or die('12');
mysql_query("delete from gold_cost_record where userid= '$dwID[0]'")or die('13');
mysql_query("delete from goods_cost_record where userid= '$dwID[0]'")or die('14');
mysql_query("delete from hot_buy_record where uid= '$dwID[0]'")or die('15');
mysql_query("delete from hot_goods_cost_record where uid= '$dwID[0]'")or die('16');
mysql_query("delete from hot_refresh_record where uid= '$dwID[0]'")or die('17');
mysql_query("delete from kingdom_position where uid= '$dwID[0]'")or die('18');
mysql_query("delete from logstat where user= '$dwID[0]'")or die('19');
mysql_query("delete from lottery_log where uid= '$dwID[0]'")or die('20');
mysql_query("delete from lottery_record where uid= '$dwID[0]'")or die('21');
mysql_query("delete from mail where touser= '$dwID[0]'")or die('22');
mysql_query("delete from mail where fromuser= '$dwID[0]'")or die('23');
mysql_query("delete from mail_group where uid= '$dwID[0]'")or die('24');
mysql_query("delete from material_control where uid= '$dwID[0]'")or die('25');
mysql_query("delete from notice_cost_log where uid= '$dwID[0]'")or die('26');
mysql_query("delete from pay_action where uid= '$dwID[0]'")or die('27');
mysql_query("delete from pay_request where uid= '$dwID[0]'")or die('28');
mysql_query("delete from pic_upload_record where uid= '$dwID[0]'")or die('29');
mysql_query("delete from playerinfo where uid= '$dwID[0]'")or die('30');
mysql_query("delete from pray_record where uid= '$dwID[0]'")or die('31');
mysql_query("delete from queue where ownerid= '$dwID[0]'")or die('32');
mysql_query("delete from stat_reg where uid= '$dwID[0]'")or die('33');
mysql_query("delete from stat_tutorial_v2 where uid= '$dwID[0]'")or die('34');
mysql_query("delete from territory_user_effect where uid= '$dwID[0]'")or die('35');
mysql_query("delete from user_14day_login where uid= '$dwID[0]'")or die('36');
mysql_query("delete from user_achievement where uid= '$dwID[0]'")or die('37');
mysql_query("delete from user_army where uid= '$dwID[0]'")or die('38');
mysql_query("delete from user_assets where uid= '$dwID[0]'")or die('39');
mysql_query("delete from user_building where uid= '$dwID[0]'")or die('40');
mysql_query("delete from user_building_exp where uid= '$dwID[0]'")or die('41');
mysql_query("delete from user_daily_task where uid= '$dwID[0]'")or die('42');
mysql_query("delete from user_equip where uid= '$dwID[0]'")or die('43');
mysql_query("delete from user_general where uid= '$dwID[0]'")or die('44');
mysql_query("delete from user_honor where uid= '$dwID[0]'")or die('45');
mysql_query("delete from user_hospital where uid= '$dwID[0]'")or die('46');
mysql_query("delete from user_hot_item_best where uid= '$dwID[0]'")or die('47');
mysql_query("delete from user_hot_item_v2 where uid= '$dwID[0]'")or die('48');
mysql_query("delete from user_item where ownerid= '$dwID[0]'")or die('49');
mysql_query("delete from user_login_ip where uid= '$dwID[0]'")or die('50');
mysql_query("delete from user_lord where uid= '$dwID[0]'")or die('51');
mysql_query("delete from user_mine where uid= '$dwID[0]'")or die('52');
mysql_query("delete from user_mixed_info where uid= '$dwID[0]'")or die('53');
mysql_query("delete from user_monster_siege where uid= '$dwID[0]'")or die('54');
mysql_query("delete from user_onlinereward where uid= '$dwID[0]'")or die('55');
mysql_query("delete from user_pray where uid= '$dwID[0]'")or die('56');
mysql_query("delete from user_reg where uid= '$dwID[0]'")or die('57');
mysql_query("delete from user_resource where uid= '$dwID[0]'")or die('58');
mysql_query("delete from user_science where uid= '$dwID[0]'")or die('59');
mysql_query("delete from user_skill where ownerid= '$dwID[0]'")or die('60');
mysql_query("delete from user_state where uid= '$dwID[0]'")or die('61');
mysql_query("delete from user_task where uid= '$dwID[0]'")or die('62');
mysql_query("delete from user_timereward where uid= '$dwID[0]'")or die('63');
mysql_query("delete from user_vip where uid= '$dwID[0]'")or die('64');
mysql_query("delete from user_wall where uid= '$dwID[0]'")or die('65');
mysql_query("delete from user_world where uid= '$dwID[0]'")or die('66');
mysql_query("delete from userprofile where uid= '$dwID[0]'")or die('67');
mysql_query("delete from world_favorite where uid= '$dwID[0]'")or die('68');
mysql_query("delete from world_march where owneruid= '$dwID[0]'")or die('69');
mysql_query("delete from worldpoint where ownerid= '$dwID[0]'")or die('70');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$players_function_logs_1','$players_function_logs_24','$name[0] deleted $_POST[name] castle from $servername reason:$_POST[reasons]',$time1,'$ip','$user_browser','$user_os')")or die('9');
mysql_select_db('coktw_global');
$sql10="SELECT gameuid FROM account_new where server=$serverid and gameuid='$dwID[0]'";
$result=mysql_query($sql10);
$value=mysql_fetch_array($result);
mysql_query("delete from account_new where gameuid= '$value[0]'")or die('1');
mysql_query("delete from account_device_mapping where gameuid= '$value[0]'")or die('2');
mysql_query("delete from usermapping where gameuid= '$value[0]'")or die('3');


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
 <div class="div1"><h1><?php echo $players_function_1 ?></h1></div><br/>
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

<fieldset><legend><?php echo $players_function_2 ?></legend>
<select name="typeEquip">
<option value="1"><?php echo $players_function_3 ?></option>
<option value="2"><?php echo $players_function_4 ?></option>
<option value="3"><?php echo $players_function_5 ?></option>
<option value="4"><?php echo $players_function_6 ?></option>
<option value="5"><?php echo $players_function_25 ?></option>
</select>
<input type="number" name="add1" size="18" placeholder="<?php echo $mail_3 ?>">
<input type="submit" name="t3" value="<?php echo $players_function_20 ?>"/>
</fieldset>

<fieldset><legend><?php echo $players_function_7 ?></legend>
<select name="type">
<option value="1"><?php echo $players_function_8 ?></option>
<option value="2"><?php echo $players_function_9 ?></option>
<option value="3"><?php echo $players_function_10 ?></option>
<option value="4"><?php echo $players_function_11 ?></option>
<option value="5"><?php echo $players_function_12 ?></option>
</select>
<input type="submit" name="t3" value="<?php echo $players_function_21 ?>"/>
</fieldset>

<fieldset><legend><?php echo $players_function_13 ?></legend>
<select name="type5">
<option value="1"><?php echo $players_function_14 ?></option>
<option value="2"><?php echo $players_function_15 ?></option>
</select>
<input type="text" name="duration" size="18" placeholder="<?php echo $players_function_16 ?>">
<input type="text" name="reason" size="18" placeholder="<?php echo $Reason_1 ?>">
<input type="submit" name="t3" value="<?php echo $players_function_22 ?>"/>
</fieldset>
<fieldset><legend><?php echo $players_function_18 ?></legend>
<input type="submit" name="t3" value="<?php echo $players_function_23 ?>"/>
</fieldset>
<fieldset><legend><?php echo $players_function_17 ?></legend>
<input type="text" name="reasons" size="18" placeholder="<?php echo $Reason_1 ?>">
<input type="submit" name="t3" value="<?php echo $players_function_24 ?>"/>
</fieldset>
<p>
<fieldset>
<input style="width: 220px;  padding: 2.5px; pointer; font-weight: bold; background: #00FF00; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="<?php echo $players_function_19 ?>"onclick="window.location.href='players.php'"/><br>
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