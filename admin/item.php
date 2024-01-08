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
$b=bin2hex('goods,200001,100000|goods,204109,100000|goods,204110,100000|goods,204111,100000|goods,200002,100000|goods,200003,100000|goods,200004,100000|goods,200005,100000|goods,200006,100000|goods,200007,100000|goods,200008,100000|goods,200009,100000|goods,200010,100000|goods,200011,100000|goods,200012,100000|goods,200013,100000|goods,200014,100000|goods,200015,100000|goods,200016,100000|goods,200017,100000|goods,200018,100000|goods,200019,100000|goods,200020,100000|goods,200021,100000|goods,200026,100000|goods,200027,100000|goods,200028,100000|goods,200029,100000|goods,200030,100000|goods,200031,100000|goods,200032,100000|goods,200033,100000|goods,200040,100000|goods,200041,100000|goods,200042,100000|goods,200043,100000|goods,200044,100000|goods,200045,100000|goods,200046,100000|goods,200047,100000|goods,200048,100000|goods,200051,100000|goods,200052,100000|goods,200060,100000|goods,200061,100000|goods,200062,100000|goods,200063,100000|goods,200064,100000|goods,200065,100000|goods,200066,100000|goods,200067,100000|goods,200080,100000|goods,200081,100000|goods,200082,100000|goods,200083,100000|goods,200084,100000|goods,200085,100000|goods,200086,100000|goods,200087,100000|goods,200088,100000|goods,200089,10000|goods,200090,1000000|goods,200091,1000000|goods,200092,1000000|goods,200093,1000000|goods,200094,1000000|goods,200095,1000000|goods,200096,1000000|goods,200097,1000000|goods,200098,1000000|goods,200099,1000000|goods,200100,1000000|goods,200101,100000|goods,200102,100000|goods,200103,100000|goods,200104,100000|goods,200105,100000|goods,200106,100000|goods,200107,100000|goods,200108,100000|goods,200109,100000|goods,200200,100000|goods,200201,100000|goods,200202,100000|goods,200203,100000|goods,200204,100000|goods,200205,100000|goods,200206,100000|goods,200207,100000|goods,200208,100000|goods,200213,100000|goods,200214,100000|goods,200215,100000|goods,200216,100000|goods,200217,100000|goods,200218,100000|goods,200220,100000|goods,200221,100000|goods,200222,100000|goods,200223,100000|goods,200224,100000|goods,200225,100000|goods,200226,100000|goods,200227,100000|goods,200228,100000|goods,200229,100000|goods,200230,100000|goods,200231,100000|goods,200232,100000|goods,200233,100000|goods,200234,100000|goods,200235,100000|goods,200236,100000|goods,200237,100000|goods,200238,100000|goods,200239,100000|goods,200240,100000|goods,200241,100000|goods,200242,100000|goods,200243,100000|goods,200244,100000|goods,200245,100000|goods,200246,100000|goods,200247,100000|goods,200248,100000|goods,200249,100000|goods,200250,100000|goods,200254,100000|goods,200258,100000|goods,200259,100000|goods,200260,100000|goods,200261,100000|goods,200262,100000|goods,200263,100000|goods,200264,100000|goods,200265,100000|goods,200266,100000|goods,200267,100000|goods,200268,100000|goods,200269,100000|goods,200270,100000|goods,200271,100000|goods,200272,100000|goods,200273,100000|goods,200274,100000|goods,200275,100000|goods,200276,100000|goods,200277,100000|goods,200278,100000|goods,200279,100000|goods,200280,100000|goods,200281,100000|goods,200282,100000|goods,200283,100000|goods,200284,100000|goods,200285,100000|goods,200286,100000|goods,200287,100000|goods,200288,100000|goods,200289,100000|goods,200290,100000|goods,200291,100000|goods,200292,100000|goods,200293,100000|goods,200294,100000|goods,200295,100000|goods,200296,100000|goods,200297,100000|goods,200298,100000|goods,200299,100000|goods,200300,100000|goods,200301,100000|goods,200302,100000|goods,200303,100000|goods,200304,100000|goods,200305,100000|goods,200306,100000|goods,200306,100000|goods,200307,100000|goods,200308,100000|goods,200309,100000|goods,200310,100000|goods,200311,100000|goods,200305,100000|goods,200315,100000|goods,200325,100000|goods,200335,100000|goods,200345,100000|goods,200352,100000|goods,200366,100000|goods,200381,100000|goods,200392,100000|goods,200404,100000|goods,200413,100000|goods,200415,100000|goods,200417,100000|goods,200419,100000|goods,200421,100000|goods,200425,100000|goods,200426,100000|goods,200428,100000|goods,200456,100000|goods,200502,100000|goods,200511,100000|goods,200512,100000|goods,200552,100000|goods,200553,100000|goods,200554,100000|goods,200555,100000|goods,200567,100000|goods,200572,100000|goods,200581,100000|goods,200590,100000|goods,200604,100000|goods,200610,100000|goods,200611,100000|goods,200629,100000|goods,200659,100000|goods,200669,100000|goods,200679,100000|goods,200689,100000|goods,200698,100000|goods,200707,100000|goods,200719,100000|goods,200803,100000|goods,200904,100000|goods,200926,100000|goods,200950,100000|goods,201015,100000|goods,201025,100000|goods,201035,100000|goods,201045,100000|goods,201055,100000|goods,201065,100000|goods,201075,100000|goods,201085,100000|goods,201095,100000|goods,201105,100000|goods,201115,100000|goods,201125,100000|goods,201130,100000|goods,201131,100000|goods,201132,100000|goods,201133,100000|goods,201134,100000|goods,201135,100000|goods,201136,100000|goods,201137,100000|goods,201138,100000|goods,201139,100000|goods,201140,100000|goods,201141,100000|goods,201200,100000|goods,201200,100000|goods,201201,100000|goods,201202,100000|goods,201203,100000|goods,201204,100000|goods,201205,100000|goods,201206,100000|goods,201207,100000|goods,201208,100000|goods,201209,100000|goods,201210,100000|goods,201210,100000|goods,201211,100000|goods,201212,100000|goods,201213,100000|goods,201214,100000|goods,201215,100000|goods,201216,100000|goods,202005,100000|goods,202006,100000|goods,202007,100000|goods,202008,100000|goods,202009,100000|goods,203003,100000|goods,203007,100000|goods,203011,100000|goods,203015,100000|goods,203020,100000|goods,203025,100000|goods,203030,100000|goods,203034,100000|goods,203040,100000|goods,203044,100000|goods,203049,100000|goods,203054,100000|goods,203059,100000|goods,203064,100000|goods,203066,100000|goods,203067,100000|goods,203071,100000|goods,203076,100000|goods,203081,100000|goods,203087,100000|goods,203092,100000|goods,203097,100000|goods,203102,100000|goods,203108,100000|goods,203110,100000|goods,203114,100000|goods,203119,100000|goods,203124,100000|goods,203129,100000|goods,203134,100000|goods,203139,100000|goods,203144,100000|goods,203149,100000|goods,203154,100000|goods,203159,100000|goods,203164,100000|goods,203169,100000|goods,203174,100000|goods,203179,100000|goods,203183,100000|goods,203187,100000|goods,203192,100000|goods,203197,100000|goods,203202,100000|goods,203207,100000|goods,203212,100000|goods,203217,100000|goods,203222,100000|goods,203227,100000|goods,203233,5000000|goods,203238,100000|goods,203243,500|goods,203245,20000000|goods,203249,50000|goods,203254,100000|goods,203256,100000|goods,203261,100000|goods,203266,100000|goods,203271,100000|goods,203277,100000|goods,203282,100000|goods,203284,100000|goods,203285,100000|goods,203291,100000|goods,203297,100000|goods,203303,100000|goods,203309,100000|goods,203315,100000|goods,203321,100000|goods,203327,100000|goods,203333,100000|goods,203351,100000|goods,203363,100000|goods,203369,100000|goods,203371,100000|goods,203372,100000|goods,203373,100000|goods,203374,100000|goods,203375,100000|goods,203376,6000|goods,203377,6000|goods,203378,6000|goods,203379,6000|goods,203380,6000|goods,203381,6000|goods,203382,100000|goods,205000,100000|goods,205001,100000|goods,205002,100000|goods,209003,100000|goods,209004,100000|goods,209005,100000|goods,209171,100000|goods,209172,100000|goods,209173,100000|goods,209174,100000|goods,209175,100000|goods,209176,100000|goods,209177,100000|goods,209178,100000|goods,209179,100000|goods,209180,100000|goods,209181,100000|goods,209182,100000|goods,209183,100000|goods,209184,100000|goods,209185,100000|goods,209200,100000|goods,209305,100000|goods,209309,100000|goods,209315,5000|goods,209319,100000|goods,209325,100000|goods,209329,100000|goods,209339,100000|goods,209349,100000|goods,209351,100000|goods,209352,100000|goods,209353,100000|goods,209354,100000|goods,209355,100000|goods,209356,100000|goods,209357,100000|goods,209358,100000|goods,209359,100000|goods,209360,100000|goods,209361,100000|goods,209362,100000|goods,209363,100000|goods,209364,100000|goods,209365,100000|goods,209366,100000|goods,209370,100000|goods,209371,100000|goods,209372,100000|goods,209373,100000|goods,209374,100000|goods,209375,100000|goods,209376,100000|goods,209380,10000|goods,209381,10000|goods,209382,10000|goods,209391,100000|goods,209391,10000|goods,209392,100000|goods,209400,10000|goods,209401,10000|goods,209402,10000|goods,209403,10000|goods,209404,10000|goods,209405,10000|goods,209406,10000|goods,209407,10000|goods,209408,10000|goods,209409,10000|goods,209410,100000|goods,209411,100000|goods,209412,1000000|goods,209413,100000|goods,209414,100000|goods,209415,100000|goods,209416,100000|goods,209417,100000|goods,209418,100000|goods,209419,100000|goods,209420,100000|goods,209421,100000|goods,209422,100000|goods,209423,100000|goods,209424,100000|goods,209425,100000|goods,209426,100000|goods,209427,100000|goods,209428,100000|goods,209429,100000|goods,209430,100000|goods,209431,100000|goods,209432,100000|goods,209433,100000|goods,209434,100000|goods,209435,100000|goods,209436,100000|goods,209437,10000|goods,209438,1000000|goods,209439,100000|goods,209460,450000|goods,209461,450000|goods,209462,450000|goods,209463,450000|goods,209464,450000|goods,209465,450000|goods,209466,450000|goods,209481,450000|goods,209482,450000|goods,209490,450000|goods,209491,450000|goods,209492,450000|goods,209500,450000|goods,209564,450000|goods,209565,450000|goods,209566,450000|goods,209567,450000|goods,209568,450000|goods,209569,450000|goods,209570,450000|goods,209571,450000|goods,209572,450000|goods,209573,100000|goods,209574,100000|goods,209575,100000|goods,209576,100000|goods,209577,100000|goods,209578,100000|goods,209579,100000|goods,209580,100000|goods,209581,100000|goods,209582,100000|goods,209583,100000|goods,209584,100000|goods,209585,100000|goods,209586,100000|goods,209587,100000|goods,209588,100000|goods,209589,100000|goods,209590,100000|goods,209591,100000|goods,209592,100000|goods,209593,100000|goods,209594,100000|goods,209595,100000|goods,209596,100000');
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
$b=bin2hex('goods,200001,100000|goods,204109,100000|goods,204110,100000|goods,204111,100000|goods,200002,100000|goods,200003,100000|goods,200004,100000|goods,200005,100000|goods,200006,100000|goods,200007,100000|goods,200008,100000|goods,200009,100000|goods,200010,100000|goods,200011,100000|goods,200012,100000|goods,200013,100000|goods,200014,100000|goods,200015,100000|goods,200016,100000|goods,200017,100000|goods,200018,100000|goods,200019,100000|goods,200020,100000|goods,200021,100000|goods,200026,100000|goods,200027,100000|goods,200028,100000|goods,200029,100000|goods,200030,100000|goods,200031,100000|goods,200032,100000|goods,200033,100000|goods,200040,100000|goods,200041,100000|goods,200042,100000|goods,200043,100000|goods,200044,100000|goods,200045,100000|goods,200046,100000|goods,200047,100000|goods,200048,100000|goods,200051,100000|goods,200052,100000|goods,200060,100000|goods,200061,100000|goods,200062,100000|goods,200063,100000|goods,200064,100000|goods,200065,100000|goods,200066,100000|goods,200067,100000|goods,200080,100000|goods,200081,100000|goods,200082,100000|goods,200083,100000|goods,200084,100000|goods,200085,100000|goods,200086,100000|goods,200087,100000|goods,200088,100000|goods,200089,10000|goods,200090,1000000|goods,200091,1000000|goods,200092,1000000|goods,200093,1000000|goods,200094,1000000|goods,200095,1000000|goods,200096,1000000|goods,200097,1000000|goods,200098,1000000|goods,200099,1000000|goods,200100,1000000|goods,200101,100000|goods,200102,100000|goods,200103,100000|goods,200104,100000|goods,200105,100000|goods,200106,100000|goods,200107,100000|goods,200108,100000|goods,200109,100000|goods,200200,100000|goods,200201,100000|goods,200202,100000|goods,200203,100000|goods,200204,100000|goods,200205,100000|goods,200206,100000|goods,200207,100000|goods,200208,100000|goods,200213,100000|goods,200214,100000|goods,200215,100000|goods,200216,100000|goods,200217,100000|goods,200218,100000|goods,200220,100000|goods,200221,100000|goods,200222,100000|goods,200223,100000|goods,200224,100000|goods,200225,100000|goods,200226,100000|goods,200227,100000|goods,200228,100000|goods,200229,100000|goods,200230,100000|goods,200231,100000|goods,200232,100000|goods,200233,100000|goods,200234,100000|goods,200235,100000|goods,200236,100000|goods,200237,100000|goods,200238,100000|goods,200239,100000|goods,200240,100000|goods,200241,100000|goods,200242,100000|goods,200243,100000|goods,200244,100000|goods,200245,100000|goods,200246,100000|goods,200247,100000|goods,200248,100000|goods,200249,100000|goods,200250,100000|goods,200254,100000|goods,200258,100000|goods,200259,100000|goods,200260,100000|goods,200261,100000|goods,200262,100000|goods,200263,100000|goods,200264,100000|goods,200265,100000|goods,200266,100000|goods,200267,100000|goods,200268,100000|goods,200269,100000|goods,200270,100000|goods,200271,100000|goods,200272,100000|goods,200273,100000|goods,200274,100000|goods,200275,100000|goods,200276,100000|goods,200277,100000|goods,200278,100000|goods,200279,100000|goods,200280,100000|goods,200281,100000|goods,200282,100000|goods,200283,100000|goods,200284,100000|goods,200285,100000|goods,200286,100000|goods,200287,100000|goods,200288,100000|goods,200289,100000|goods,200290,100000|goods,200291,100000|goods,200292,100000|goods,200293,100000|goods,200294,100000|goods,200295,100000|goods,200296,100000|goods,200297,100000|goods,200298,100000|goods,200299,100000|goods,200300,100000|goods,200301,100000|goods,200302,100000|goods,200303,100000|goods,200304,100000|goods,200305,100000|goods,200315,100000|goods,200325,100000|goods,200335,100000|goods,200345,100000|goods,200352,100000|goods,200366,100000|goods,200381,100000|goods,200392,100000|goods,200404,100000|goods,200413,100000|goods,200415,100000|goods,200417,100000|goods,200419,100000|goods,200421,100000|goods,200425,100000|goods,200426,100000|goods,200428,100000|goods,200456,100000|goods,200502,100000|goods,200511,100000|goods,200512,100000|goods,200552,100000|goods,200553,100000|goods,200554,100000|goods,200555,100000|goods,200567,100000|goods,200572,100000|goods,200581,100000|goods,200590,100000|goods,200604,100000|goods,200610,100000|goods,200611,100000|goods,200629,100000|goods,200659,100000|goods,200669,100000|goods,200679,100000|goods,200689,100000|goods,200698,100000|goods,200707,100000|goods,200719,100000|goods,200803,100000|goods,200904,100000|goods,200926,100000|goods,200950,100000|goods,201015,100000|goods,201025,100000|goods,201035,100000|goods,201045,100000|goods,201055,100000|goods,201065,100000|goods,201075,100000|goods,201085,100000|goods,201095,100000|goods,201105,100000|goods,201115,100000|goods,201125,100000|goods,201130,100000|goods,201131,100000|goods,201132,100000|goods,201133,100000|goods,201134,100000|goods,201135,100000|goods,201136,100000|goods,201137,100000|goods,201138,100000|goods,201139,100000|goods,201140,100000|goods,201141,100000|goods,201200,100000|goods,201200,100000|goods,201201,100000|goods,201202,100000|goods,201203,100000|goods,201204,100000|goods,201205,100000|goods,201206,100000|goods,201207,100000|goods,201208,100000|goods,201209,100000|goods,201210,100000|goods,201210,100000|goods,201211,100000|goods,201212,100000|goods,201213,100000|goods,201214,100000|goods,201215,100000|goods,201216,100000|goods,202005,100000|goods,202006,100000|goods,202007,100000|goods,202008,100000|goods,202009,100000|goods,203003,100000|goods,203007,100000|goods,203011,100000|goods,203015,100000|goods,203020,100000|goods,203025,100000|goods,203030,100000|goods,203034,100000|goods,203040,100000|goods,203044,100000|goods,203049,100000|goods,203054,100000|goods,203059,100000|goods,203064,100000|goods,203066,100000|goods,203067,100000|goods,203071,100000|goods,203076,100000|goods,203081,100000|goods,203087,100000|goods,203092,100000|goods,203097,100000|goods,203102,100000|goods,203108,100000|goods,203110,100000|goods,203114,100000|goods,203119,100000|goods,203124,100000|goods,203129,100000|goods,203134,100000|goods,203139,100000|goods,203144,100000|goods,203149,100000|goods,203154,100000|goods,203159,100000|goods,203164,100000|goods,203169,100000|goods,203174,100000|goods,203179,100000|goods,203183,100000|goods,203187,100000|goods,203192,100000|goods,203197,100000|goods,203202,100000|goods,203207,100000|goods,203212,100000|goods,203217,100000|goods,203222,100000|goods,203227,100000|goods,203233,5000000|goods,203238,100000|goods,203243,500|goods,203245,20000000|goods,203249,50000|goods,203254,100000|goods,203256,100000|goods,203261,100000|goods,203266,100000|goods,203271,100000|goods,203277,100000|goods,203282,100000|goods,203284,100000|goods,203285,100000|goods,203291,100000|goods,203297,100000|goods,203303,100000|goods,203309,100000|goods,203315,100000|goods,203321,100000|goods,203327,100000|goods,203333,100000|goods,203351,100000|goods,203363,100000|goods,203369,100000|goods,203371,100000|goods,203372,100000|goods,203373,100000|goods,203374,100000|goods,203375,100000|goods,203376,6000|goods,203377,6000|goods,203378,6000|goods,203379,6000|goods,203380,6000|goods,203381,6000|goods,203382,100000|goods,205000,100000|goods,205001,100000|goods,205002,100000|goods,209003,100000|goods,209004,100000|goods,209005,100000|goods,209171,100000|goods,209172,100000|goods,209173,100000|goods,209174,100000|goods,209175,100000|goods,209176,100000|goods,209177,100000|goods,209178,100000|goods,209179,100000|goods,209180,100000|goods,209181,100000|goods,209182,100000|goods,209183,100000|goods,209184,100000|goods,209185,100000|goods,209200,100000|goods,209305,100000|goods,209309,100000|goods,209315,5000|goods,209319,100000|goods,209325,100000|goods,209329,100000|goods,209339,100000|goods,209349,100000|goods,209351,100000|goods,209352,100000|goods,209353,100000|goods,209354,100000|goods,209355,100000|goods,209356,100000|goods,209357,100000|goods,209358,100000|goods,209359,100000|goods,209360,100000|goods,209361,100000|goods,209362,100000|goods,209363,100000|goods,209364,100000|goods,209365,100000|goods,209366,100000|goods,209370,100000|goods,209371,100000|goods,209372,100000|goods,209373,100000|goods,209374,100000|goods,209375,100000|goods,209376,100000|goods,209380,10000|goods,209381,10000|goods,209382,10000|goods,209391,100000|goods,209391,10000|goods,209392,100000|goods,209400,10000|goods,209401,10000|goods,209402,10000|goods,209403,10000|goods,209404,10000|goods,209405,10000|goods,209406,10000|goods,209407,10000|goods,209408,10000|goods,209409,10000|goods,209410,100000|goods,209411,100000|goods,209412,1000000|goods,209413,100000|goods,209414,100000|goods,209415,100000|goods,209416,100000|goods,209417,100000|goods,209418,100000|goods,209419,100000|goods,209420,100000|goods,209421,100000|goods,209422,100000|goods,209423,100000|goods,209424,100000|goods,209425,100000|goods,209426,100000|goods,209427,100000|goods,209428,100000|goods,209429,100000|goods,209430,100000|goods,209431,100000|goods,209432,100000|goods,209433,100000|goods,209434,100000|goods,209435,100000|goods,209436,100000|goods,209437,10000|goods,209438,1000000|goods,209439,100000|goods,209460,450000|goods,209461,450000|goods,209462,450000|goods,209463,450000|goods,209464,450000|goods,209465,450000|goods,209466,450000|goods,209481,450000|goods,209482,450000|goods,209490,450000|goods,209491,450000|goods,209492,450000|goods,209500,450000|goods,209564,450000|goods,209565,450000|goods,209566,450000|goods,209567,450000|goods,209568,450000|goods,209569,450000|goods,209570,450000|goods,209571,450000|goods,209572,450000|goods,209573,100000|goods,209574,100000|goods,209575,100000|goods,209576,100000|goods,209577,100000|goods,209578,100000|goods,209579,100000|goods,209580,100000|goods,209581,100000|goods,209582,100000|goods,209583,100000|goods,209584,100000|goods,209585,100000|goods,209586,100000|goods,209587,100000|goods,209588,100000|goods,209589,100000|goods,209590,100000|goods,209591,100000|goods,209592,100000|goods,209593,100000|goods,209594,100000|goods,209595,100000|goods,209596,100000');
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