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
header("content-type:text/html; charset=utf-8");
if($_POST[name]!=''){
$sql="SELECT uid FROM userprofile WHERE `name` = '$_POST[name]'";
$result=mysql_query($sql);
if($result&&mysql_num_rows($result)>0){
$dwID = mysql_fetch_array($result);
$time=time().'000';
$time1=time();
switch($_POST[t3]){
case ''.$mail_9.'':{
$b=bin2hex($_POST[type1].','.$_POST[ts1].','.$_POST[ts2]);
$b1=($_POST[type1].','.$_POST[ts1].','.$_POST[ts2]);
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$dwID[0]', 'Thanks for playing in Clash of Castles', 0x$b, '13', '$time', '1')")or die('2');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os,message_uid) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$mail_logs_1','$mail_logs_9','$name[0] sent ($b1) to ($_POST[name])',$time1,'$ip','$user_browser','$user_os',md5($time))")or die('1');
echo '<script>alert("'.$successful.'");</script>';
break;
}

case ''.$mail_10.'':{
$dwId='';
$i=0;
$sql="SELECT uid FROM userprofile";
$b=bin2hex($_POST[type1].','.$_POST[ts1].','.$_POST[ts2]);
$result=mysql_query($sql);
if($result&&mysql_num_rows($result)>0){
while($dwID[] = mysql_fetch_array($result)){}
            mysql_free_result($result);
            array_pop($dwID);
foreach($dwID as $value){
$b1=md5($time+$i);
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$b1', '$value[0]', 'Thanks for playing in Clash of Castles', 0x$b, '13', '$time', '1')")or die('2');
$i++;
}
$b2=($_POST[type1].','.$_POST[ts1].','.$_POST[ts2]);
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'All','-','$mail_logs_1','$mail_logs_10','$name[0] sent ($b2) to all',$time1,'$ip','$user_browser','$user_os')")or die('1');
echo '<script>alert("'.$successful.'");</script>';

}
break;
}

case ''.$mail_11.'':{

if($_POST[typeEquip]=="43"){
$b=bin2hex('goods,200366,10000|goods,214008,100|goods,214002,100|goods,213995,100|goods,213980,100|goods,213974,100|goods,213892,100|goods,213885,100|goods,213876,100|goods,213870,100|goods,213863,100|goods,213854,100|goods,213853,100|goods,213852,100|goods,213845,100|goods,213840,100|goods,213834,100|goods,213828,100|goods,213821,100|goods,213814,100|goods,213795,100|goods,213788,100|goods,213781,100|goods,213772,100|goods,213738,100|goods,213729,100|goods,213721,100|goods,213714,100|goods,213704,100|goods,213699,100|goods,213569,100|goods,213563,100|goods,213557,100|goods,213551,100|goods,213544,100|goods,213532,100|goods,213526,100|goods,213485,100|goods,213478,100|goods,213453,100|goods,213443,100|goods,213429,100|goods,213419,100|goods,213418,100|goods,213417,100|goods,213416,100|goods,213415,100|goods,213414,100|goods,213407,100|goods,213396,100|goods,213390,100|goods,213379,100|goods,213373,100|goods,213254,100|goods,213232,100|goods,213218,100|goods,213211,100|goods,213176,100|goods,213175,100|goods,213174,100|goods,213173,100|goods,213171,100|goods,213170,100|goods,213169,100|goods,213168,100|goods,213167,100|goods,213166,100|goods,213165,100|goods,213164,100|goods,213161,100|goods,213160,100|goods,213159,100|goods,213158,100|goods,213157,100|goods,213156,100|goods,213155,100|goods,213152,100|goods,213149,100|goods,213146,100|goods,213145,100|goods,213144,100|goods,213143,100|goods,213142,100|goods,213141,100|goods,213140,100|goods,213139,100|goods,213138,100|goods,213137,100|goods,213136,100|goods,213135,100|goods,213134,100|goods,213133,100|goods,213132,100|goods,213131,100|goods,213130,100|goods,213129,100|goods,213128,100|goods,213127,100|goods,213126,100|goods,213125,100|goods,213124,100|goods,213123,100|goods,213122,100|goods,213121,100|goods,213120,100|goods,213119,100|goods,213118,100|goods,213117,100|goods,213116,100|goods,213115,100|goods,213114,100|goods,213113,100|goods,213112,100|goods,213111,100|goods,213110,100|goods,213109,100|goods,213108,100|goods,213107,100|goods,213106,100|goods,213105,100|goods,213104,100|goods,213087,100|goods,213081,100|goods,213052,100|goods,213046,100|goods,213027,100|goods,213009,100|goods,213003,100|goods,212995,100|goods,212989,100|goods,212957,100|goods,212945,100|goods,212939,100|goods,212933,100|goods,212927,100|goods,212921,100|goods,212913,100|goods,212893,100|goods,212889,100|goods,212796,100|goods,212789,100|goods,212783,100|goods,212757,100|goods,212751,100|goods,212744,100|goods,212733,100|goods,212727,100|goods,212722,100|goods,212710,100|goods,212703,100|goods,212698,100|goods,212654,100|goods,212648,100|goods,212640,100|goods,212624,100|goods,212612,100|goods,212605,100|goods,212444,100|goods,212435,100|goods,212413,100|goods,212382,100|goods,212378,100|goods,212393,100|goods,212387,100|goods,212320,100|goods,212314,100|goods,212301,100|goods,212203,100|goods,212196,100|goods,212175,100|goods,212158,100|goods,212151,100|goods,212127,100|goods,212122,100|goods,212108,100|goods,212107,100|goods,212093,100|goods,212058,100|goods,212051,100|goods,212021,100|goods,212008,100|goods,211995,100|goods,211980,100|goods,211973,100|goods,211738,100|goods,211666,100|goods,211587,100|goods,211560,100|goods,211553,100|goods,211510,100|goods,211494,100|goods,211454,100|goods,211439,100|goods,211433,100|goods,211385,100|goods,211379,100|goods,211298,100|goods,211227,100|goods,211116,100|goods,203363,100|goods,203351,100|goods,203332,100|goods,203326,100|goods,203320,100|goods,203314,100|goods,203308,100|goods,203303,100|goods,203297,100|goods,203290,100|goods,203282,100|goods,203276,100|goods,203271,100|goods,203265,100|goods,203260,100|goods,203248,100|goods,203242,100|goods,203237,100|goods,203183,100|goods,203144,100|goods,203139,100|goods,203133,100|goods,203119,100|goods,203091,100|goods,203086,100|goods,203043,100|goods,203038,100|goods,209861,100|goods,209862,100|goods,209863,100|goods,209864,100|goods,209865,100|goods,209866,100|goods,209867,100|goods,209868,100|goods,209869,100|goods,209870,100|goods,209870,100|goods,209871,100|goods,209872,100|goods,209873,100|goods,209874,100|goods,209875,100|goods,209876,100|goods,209877,100|goods,209878,100|goods,209879,100|goods,209880,100|goods,209881,100|goods,209882,100|goods,209883,100|goods,209884,100|goods,209885,100|goods,214513,100|goods,214507,100|goods,214500,100|goods,214493,100|goods,214484,100|goods,214477,100|goods,214466,100|goods,214459,100|goods,214451,100|goods,214443,100|goods,214436,100|goods,214422,100|goods,214416,100|goods,214410,100|goods,214403,100|goods,214398,100|goods,214392,100|goods,214385,100|goods,214378,100|goods,214372,100|goods,214366,100|goods,214354,100|goods,214341,100|goods,214335,100|goods,214328,100|goods,214321,100|goods,214305,100|goods,214298,100|goods,214285,100|goods,214243,100|goods,214236,100|goods,214230,100|goods,214213,100|goods,214206,100|goods,214115,100|goods,214109,100|goods,214093,100|goods,214085,100|goods,214079,100|goods,214067,100|goods,214058,100|goods,214050,100|goods,214040,100|goods,214034,100|goods,214027,100|goods,214013,100|goods,214005,100|goods,213999,100|goods,213992,100|goods,213977,100|goods,213971,100|goods,213888,100|goods,213860,100|goods,213824,100|goods,213817,100|goods,213811,100|goods,213792,100|goods,213785,100|goods,213769,100|goods,213734,100|goods,213727,100|goods,213718,100|goods,213711,100|goods,213696,100|goods,36003875,100|goods,36003869,100|goods,36003855,100|goods,36003849,100|goods,36003842,100|goods,36003835,100|goods,36003831,100|goods,36003818,100|goods,36003798,100|goods,36003772,100|goods,36003763,100|goods,36003757,100|goods,36003751,100|goods,36003741,100|goods,36003735,100|goods,36003724,100|goods,36003709,100|goods,36002653,100|goods,36002642,100|goods,36002628,100|goods,36002615,100|goods,36002602,100|goods,36002595,100|goods,36002585,100|goods,36002571,100|goods,36002556,100|goods,36002545,100|goods,36002537,100|goods,36002503,100|goods,36002483,100|goods,36002476,100|goods,36002462,100|goods,36002443,100|goods,36002425,100|goods,36002412,100|goods,36002398,100|goods,36002388,100|goods,36002382,100|goods,36002376,100|goods,36002301,100|goods,36002287,100|goods,36002273,100|goods,36002260,100|goods,36002246,100|goods,36002230,100|goods,36002227,100|goods,36002217,100|goods,36002206,100|goods,36002192,100|goods,36002179,100|goods,36002166,100|goods,36002157,100|goods,36002152,100|goods,36002141,100|goods,36002107,100|goods,36002100,100|goods,36002079,100|goods,36002073,100|goods,36002067,100|goods,36002060,100|goods,36002056,100|goods,36002033,100|good,36002020,100|goods,36002012,100|goods,36002005,100|goods,36001991,100|goods,36001859,100|goods,36001847,100|goods,36001834,100|goods,36001825,100|goods,36001811,100|goods,36001794,100|goods,36001783,100|goods,36001754,100|goods,36001743,100|goods,36001715,100|goods,36001699,100|goods,36001688,100|goods,36001651,100|goods,36001637,100|goods,36001630,100|goods,36001608,100|goods,36001577,100|goods,36001564,100|goods,36001552,100|goods,36001532,100|goods,36001505,100|goods,36001489,100|goods,36001475,100|goods,36001465,100|goods,36001450,100|goods,36001431,100|goods,36001410,100|goods,36001405,100|goods,36001400,100|goods,36001393,100|goods,36001282,100|goods,36001276,100|goods,36001261,100|goods,36001248,100|goods,36001242,100|goods,36001219,100|goods,36001212,100|goods,36001199,100|goods,36001170,100|goods,36001138,100');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Daily Gifts Clash of Castles', 0x$b, '13', '$time', '1')")or die('1');
		
	}

echo '<script>alert("'.$successful.'");</script>';
break;
}

case ''.$mail_12.'':{
$dwId='';
$i=0;
$sql="SELECT uid FROM userprofile";
$result=mysql_query($sql);
if($result&&mysql_num_rows($result)>0){
while($dwID[] = mysql_fetch_array($result)){}
            mysql_free_result($result);
            array_pop($dwID);
foreach($dwID as $value){
$enc=md5($time+$i+1000);
if($_POST[typeEquip]=="43"){
$b=bin2hex('goods,200366,10000|goods,214008,100|goods,214002,100|goods,213995,100|goods,213980,100|goods,213974,100|goods,213892,100|goods,213885,100|goods,213876,100|goods,213870,100|goods,213863,100|goods,213854,100|goods,213853,100|goods,213852,100|goods,213845,100|goods,213840,100|goods,213834,100|goods,213828,100|goods,213821,100|goods,213814,100|goods,213795,100|goods,213788,100|goods,213781,100|goods,213772,100|goods,213738,100|goods,213729,100|goods,213721,100|goods,213714,100|goods,213704,100|goods,213699,100|goods,213569,100|goods,213563,100|goods,213557,100|goods,213551,100|goods,213544,100|goods,213532,100|goods,213526,100|goods,213485,100|goods,213478,100|goods,213453,100|goods,213443,100|goods,213429,100|goods,213419,100|goods,213418,100|goods,213417,100|goods,213416,100|goods,213415,100|goods,213414,100|goods,213407,100|goods,213396,100|goods,213390,100|goods,213379,100|goods,213373,100|goods,213254,100|goods,213232,100|goods,213218,100|goods,213211,100|goods,213176,100|goods,213175,100|goods,213174,100|goods,213173,100|goods,213171,100|goods,213170,100|goods,213169,100|goods,213168,100|goods,213167,100|goods,213166,100|goods,213165,100|goods,213164,100|goods,213161,100|goods,213160,100|goods,213159,100|goods,213158,100|goods,213157,100|goods,213156,100|goods,213155,100|goods,213152,100|goods,213149,100|goods,213146,100|goods,213145,100|goods,213144,100|goods,213143,100|goods,213142,100|goods,213141,100|goods,213140,100|goods,213139,100|goods,213138,100|goods,213137,100|goods,213136,100|goods,213135,100|goods,213134,100|goods,213133,100|goods,213132,100|goods,213131,100|goods,213130,100|goods,213129,100|goods,213128,100|goods,213127,100|goods,213126,100|goods,213125,100|goods,213124,100|goods,213123,100|goods,213122,100|goods,213121,100|goods,213120,100|goods,213119,100|goods,213118,100|goods,213117,100|goods,213116,100|goods,213115,100|goods,213114,100|goods,213113,100|goods,213112,100|goods,213111,100|goods,213110,100|goods,213109,100|goods,213108,100|goods,213107,100|goods,213106,100|goods,213105,100|goods,213104,100|goods,213087,100|goods,213081,100|goods,213052,100|goods,213046,100|goods,213027,100|goods,213009,100|goods,213003,100|goods,212995,100|goods,212989,100|goods,212957,100|goods,212945,100|goods,212939,100|goods,212933,100|goods,212927,100|goods,212921,100|goods,212913,100|goods,212893,100|goods,212889,100|goods,212796,100|goods,212789,100|goods,212783,100|goods,212757,100|goods,212751,100|goods,212744,100|goods,212733,100|goods,212727,100|goods,212722,100|goods,212710,100|goods,212703,100|goods,212698,100|goods,212654,100|goods,212648,100|goods,212640,100|goods,212624,100|goods,212612,100|goods,212605,100|goods,212444,100|goods,212435,100|goods,212413,100|goods,212382,100|goods,212378,100|goods,212393,100|goods,212387,100|goods,212320,100|goods,212314,100|goods,212301,100|goods,212203,100|goods,212196,100|goods,212175,100|goods,212158,100|goods,212151,100|goods,212127,100|goods,212122,100|goods,212108,100|goods,212107,100|goods,212093,100|goods,212058,100|goods,212051,100|goods,212021,100|goods,212008,100|goods,211995,100|goods,211980,100|goods,211973,100|goods,211738,100|goods,211666,100|goods,211587,100|goods,211560,100|goods,211553,100|goods,211510,100|goods,211494,100|goods,211454,100|goods,211439,100|goods,211433,100|goods,211385,100|goods,211379,100|goods,211298,100|goods,211227,100|goods,211116,100|goods,203363,100|goods,203351,100|goods,203332,100|goods,203326,100|goods,203320,100|goods,203314,100|goods,203308,100|goods,203303,100|goods,203297,100|goods,203290,100|goods,203282,100|goods,203276,100|goods,203271,100|goods,203265,100|goods,203260,100|goods,203248,100|goods,203242,100|goods,203237,100|goods,203183,100|goods,203144,100|goods,203139,100|goods,203133,100|goods,203119,100|goods,203091,100|goods,203086,100|goods,203043,100|goods,203038,100|goods,209861,100|goods,209862,100|goods,209863,100|goods,209864,100|goods,209865,100|goods,209866,100|goods,209867,100|goods,209868,100|goods,209869,100|goods,209870,100|goods,209870,100|goods,209871,100|goods,209872,100|goods,209873,100|goods,209874,100|goods,209875,100|goods,209876,100|goods,209877,100|goods,209878,100|goods,209879,100|goods,209880,100|goods,209881,100|goods,209882,100|goods,209883,100|goods,209884,100|goods,209885,100|goods,214513,100|goods,214507,100|goods,214500,100|goods,214493,100|goods,214484,100|goods,214477,100|goods,214466,100|goods,214459,100|goods,214451,100|goods,214443,100|goods,214436,100|goods,214422,100|goods,214416,100|goods,214410,100|goods,214403,100|goods,214398,100|goods,214392,100|goods,214385,100|goods,214378,100|goods,214372,100|goods,214366,100|goods,214354,100|goods,214341,100|goods,214335,100|goods,214328,100|goods,214321,100|goods,214305,100|goods,214298,100|goods,214285,100|goods,214243,100|goods,214236,100|goods,214230,100|goods,214213,100|goods,214206,100|goods,214115,100|goods,214109,100|goods,214093,100|goods,214085,100|goods,214079,100|goods,214067,100|goods,214058,100|goods,214050,100|goods,214040,100|goods,214034,100|goods,214027,100|goods,214013,100|goods,214005,100|goods,213999,100|goods,213992,100|goods,213977,100|goods,213971,100|goods,213888,100|goods,213860,100|goods,213824,100|goods,213817,100|goods,213811,100|goods,213792,100|goods,213785,100|goods,213769,100|goods,213734,100|goods,213727,100|goods,213718,100|goods,213711,100|goods,213696,100|goods,36003875,100|goods,36003869,100|goods,36003855,100|goods,36003849,100|goods,36003842,100|goods,36003835,100|goods,36003831,100|goods,36003818,100|goods,36003798,100|goods,36003772,100|goods,36003763,100|goods,36003757,100|goods,36003751,100|goods,36003741,100|goods,36003735,100|goods,36003724,100|goods,36003709,100|goods,36002653,100|goods,36002642,100|goods,36002628,100|goods,36002615,100|goods,36002602,100|goods,36002595,100|goods,36002585,100|goods,36002571,100|goods,36002556,100|goods,36002545,100|goods,36002537,100|goods,36002503,100|goods,36002483,100|goods,36002476,100|goods,36002462,100|goods,36002443,100|goods,36002425,100|goods,36002412,100|goods,36002398,100|goods,36002388,100|goods,36002382,100|goods,36002376,100|goods,36002301,100|goods,36002287,100|goods,36002273,100|goods,36002260,100|goods,36002246,100|goods,36002230,100|goods,36002227,100|goods,36002217,100|goods,36002206,100|goods,36002192,100|goods,36002179,100|goods,36002166,100|goods,36002157,100|goods,36002152,100|goods,36002141,100|goods,36002107,100|goods,36002100,100|goods,36002079,100|goods,36002073,100|goods,36002067,100|goods,36002060,100|goods,36002056,100|goods,36002033,100|good,36002020,100|goods,36002012,100|goods,36002005,100|goods,36001991,100|goods,36001859,100|goods,36001847,100|goods,36001834,100|goods,36001825,100|goods,36001811,100|goods,36001794,100|goods,36001783,100|goods,36001754,100|goods,36001743,100|goods,36001715,100|goods,36001699,100|goods,36001688,100|goods,36001651,100|goods,36001637,100|goods,36001630,100|goods,36001608,100|goods,36001577,100|goods,36001564,100|goods,36001552,100|goods,36001532,100|goods,36001505,100|goods,36001489,100|goods,36001475,100|goods,36001465,100|goods,36001450,100|goods,36001431,100|goods,36001410,100|goods,36001405,100|goods,36001400,100|goods,36001393,100|goods,36001282,100|goods,36001276,100|goods,36001261,100|goods,36001248,100|goods,36001242,100|goods,36001219,100|goods,36001212,100|goods,36001199,100|goods,36001170,100|goods,36001138,100');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'DAİLY GİFTS Clash of Castles', 0x$b, '13', '$time', '1')")or die('1');

	}
$i++;
}


echo '<script>alert("'.$successful.'");</script>';

}
break;
}

case ''.$mail_13.'':{
mysql_query("INSERT INTO mail (uid,toUser,title,contents,type,createTime,reply) VALUES (md5($time), '$dwID[0]', '$_POST[title]', '$_POST[content]', '13', '$time', '1')")or die('2');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os,message_uid) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$mail_logs_1','$mail_logs_13','$name[0] sent this message($_POST[content]) title:($_POST[title]) to $_POST[name]',$time1,'$ip','$user_browser','$user_os',md5($time))")or die('1');
echo '<script>alert("'.$successful.'");</script>';
break;
}

case ''.$mail_14.'':{
$dwId='';
$i=0;
$sql="SELECT uid FROM userprofile";
$result=mysql_query($sql);
if($result&&mysql_num_rows($result)>0){
while($dwID[] = mysql_fetch_array($result)){}
            mysql_free_result($result);
            array_pop($dwID);
foreach($dwID as $value){
$b1=md5($time+$i);
mysql_query("INSERT INTO mail (uid,toUser,title,contents,type,createTime,reply) VALUES ('$b1', '$value[0]', '$_POST[title]','$_POST[content]', '13', '$time', '1')")or die('1');
$i++;
}
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'All','-','$mail_logs_1','$mail_logs_14','$name[0] sent this message($_POST[content]) title:($_POST[title]) to All',$time1,'$ip','$user_browser','$user_os')")or die('1');
echo '<script>alert("'.$successful.'");</script>';
break;
}
}

}
}else{echo '<script>alert("'.$Error_name.'");</script>';}
}
?>
<title><?php echo $mail_1 ?></title>
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

 <div class="div1"><h1><?php echo $mail_1 ?></h1></div><br/>
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
<option value="cokdb2">2</option
<option value="cokdb3">3</option>

</select>');
}
?>
<br/>
<fieldset><legend>DAİLY GİFT</legend>
<select name="typeEquip">
<option value="43">Daily Gifts</option>

</select>
<input type="submit" name="t3" value="<?php echo $mail_11 ?>"/>
<input type="submit" name="t3" value="<?php echo $mail_12 ?>"/>

<p>
<fieldset>
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