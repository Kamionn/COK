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
$b=bin2hex('goods,200001,10|goods,200002,10|goods,200003,10|goods,200004,10|goods,200005,10|goods,200006,10|goods,200007,10|goods,200008,10|goods,200009,10|goods,200010,10|goods,200011,10|goods,200012,10|goods,200013,10|goods,200014,10|goods,200015,10|goods,200016,10|goods,200017,10|goods,200018,10|goods,200019,10|goods,200020,10|goods,200021,10|goods,200022,10|goods,200023,10|goods,200024,10|goods,200025,10|goods,200026,10|goods,200027,10|goods,200028,10|goods,200029,10|goods,200030,10|goods,200031,10|goods,200032,10|goods,200033,10|goods,200040,10|goods,200041,10|goods,200042,10|goods,200043,10|goods,200044,10|goods,200045,10|goods,200046,10|goods,200047,10|goods,200048,10|goods,200051,10|goods,200052,10|goods,200053,10|goods,200060,10|goods,200061,10|goods,200062,10|goods,200063,10|goods,200064,10|goods,200065,100000|goods,200066,10|goods,200080,10|goods,200101,10|goods,200200,10|goods,200201,10|goods,200202,10|goods,200203,10|goods,200204,10|goods,200205,10|goods,200206,10|goods,200207,10|goods,200208,10|goods,200213,10|goods,200214,10|goods,200215,10|goods,200216,10|goods,200217,10|goods,200218,10|goods,200219,10|goods,200220,10|goods,200221,10|goods,200222,10|goods,200223,10|goods,200224,10|goods,200225,10|goods,200226,10|goods,200227,10|goods,200228,10|goods,200229,10|goods,200230,10|goods,200231,10|goods,200232,10|goods,200233,10|goods,200234,10|goods,200234,10|goods,200235,10|goods,200236,10|goods,200237,10|goods,200238,10|goods,200239,10|goods,200240,10|goods,200241,10|goods,200242,10|goods,200243,10|goods,200244,10|goods,200245,10|goods,200246,10|goods,200247,10|goods,200248,10|goods,200249,10|goods,200250,10|goods,200251,10|goods,200252,10|goods,200253,10|goods,200254,10|goods,200255,10|goods,200256,10|goods,200257,10|goods,200258,10|goods,200259,10|goods,200260,10|goods,200261,10|goods,200262,10|goods,200263,10|goods,200264,10|goods,200300,10|goods,200301,10|goods,200302,10|goods,200303,10|goods,200304,10|goods,200305,10|goods,200306,10|goods,200307,10|goods,200308,10|goods,200309,10|goods,200310,10|goods,200311,10|goods,200312,10|goods,200313,10|goods,200314,10|goods,200315,10|goods,200316,10|goods,200317,10|goods,200318,10|goods,200319,10|goods,200320,10|goods,200321,10|goods,200322,10|goods,200323,10|goods,200324,10|goods,200325,10|goods,200326,10|goods,200327,10|goods,200328,10|goods,200329,10|goods,200330,10|goods,200331,10|goods,200332,10|goods,200333,10|goods,200334,10|goods,200335,10|goods,200336,10|goods,200337,10|goods,200338,10|goods,200339,10|goods,200340,10|goods,200341,10|goods,200342,10|goods,200343,10|goods,200344,10|goods,200345,10|goods,200346,10|goods,200347,10|goods,200348,10|goods,200349,10|goods,200350,10|goods,200351,10|goods,200352,10|goods,200353,10|goods,200360,10|goods,200361,10|goods,200362,10|goods,200363,10|goods,200364,10|goods,200365,10|goods,200366,10|goods,200367,10|goods,200370,10|goods,200371,10|goods,200372,10|goods,200373,10|goods,200374,10|goods,200380,10|goods,200381,10|goods,200382,10|goods,200385,10|goods,200386,10|goods,200390,10|goods,200391,10|goods,200392,10|goods,200393,10|goods,200394,10|goods,200395,10|goods,200396,10|goods,200397,10|goods,200398,10|goods,200399,10|goods,200400,10|goods,200401,10|goods,200402,10|goods,200403,10|goods,200404,10|goods,200408,10|goods,200409,10|goods,200410,10|goods,200411,10|goods,200412,10|goods,200413,10|goods,200414,10|goods,200415,10|goods,200416,10|goods,200417,10|goods,200418,10|goods,200419,10|goods,200420,10|goods,200421,10|goods,200424,10|goods,200425,10|goods,200426,10|goods,200427,10|goods,200428,10|goods,200450,10|goods,200451,10|goods,200452,10|goods,200453,10|goods,200454,10|goods,200455,10|goods,200456,10|goods,200500,10|goods,200501,10|goods,200502,10|goods,200510,10|goods,200511,10|goods,200512,10|goods,200550,10|goods,200551,10|goods,200552,10|goods,200553,10|goods,200554,10|goods,200555,10|goods,200560,10|goods,200561,10|goods,200562,10|goods,200563,10|goods,200564,10|goods,200565,10|goods,200566,10|goods,200567,10|goods,200570,10|goods,200571,10|goods,200572,10|goods,200580,10|goods,200581,10|goods,200590,10|goods,200600,10|goods,200601,10|goods,200602,10|goods,200603,10|goods,200604,10|goods,200610,10|goods,200611,10|goods,200621,10|goods,200622,10|goods,200623,10|goods,200624,10|goods,200625,10|goods,200626,10|goods,200627,10|goods,200650,10|goods,200651,10|goods,200652,10|goods,203381,10|goods,200653,10|goods,200654,10|goods,200655,10|goods,200656,10|goods,200657,10|goods,200658,10|goods,200659,10|goods,200660,10|goods,200661,10|goods,200662,10|goods,200663,10|goods,200664,10|goods,200665,10|goods,200666,10|goods,200667,10|goods,200668,10|goods,200669,10|goods,200670,10|goods,200671,10|goods,200672,10|goods,200673,10|goods,200674,10|goods,200675,10|goods,200676,10|goods,200677,10|goods,200678,5000|goods,200679,10|goods,200680,10|goods,200681,10|goods,200682,10|goods,200683,10|goods,200684,10|goods,200685,10|goods,200686,10|goods,200687,10|goods,200688,10|goods,200689,10|goods,200690,10|goods,200691,10|goods,200692,10|goods,200693,10|goods,200694,10|goods,200695,10|goods,200696,10|goods,200697,10|goods,200698,10|goods,200700,10|goods,200701,10|goods,200702,10|goods,200703,10|goods,200704,10|goods,200705,10|goods,200706,10|goods,200707,10|goods,200710,10|goods,200711,10|goods,200712,10|goods,200713,10|goods,200714,10|goods,200715,10|goods,200716,10|goods,200717,10|goods,200718,10|goods,200719,10|goods,200800,10|goods,200801,10|goods,20080,10|goods,200803,10|goods,200900,10|goods,200901,10|goods,200902,10|goods,200903,10|goods,200904,10');
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
$b=bin2hex('goods,200001,10|goods,200002,10|goods,200003,10|goods,200004,10|goods,200005,10|goods,200006,10|goods,200007,10|goods,200008,10|goods,200009,10|goods,200010,10|goods,200011,10|goods,200012,10|goods,200013,10|goods,200014,10|goods,200015,10|goods,200016,10|goods,200017,10|goods,200018,10|goods,200019,10|goods,200020,10|goods,200021,10|goods,200022,10|goods,200023,10|goods,200024,10|goods,200025,10|goods,200026,10|goods,200027,10|goods,200028,10|goods,200029,10|goods,200030,10|goods,200031,10|goods,200032,10|goods,200033,10|goods,200040,10|goods,200041,10|goods,200042,10|goods,200043,10|goods,200044,10|goods,200045,10|goods,200046,10|goods,200047,10|goods,200048,10|goods,200051,10|goods,200052,10|goods,200053,10|goods,200060,10|goods,200061,10|goods,200062,10|goods,200063,10|goods,200064,10|goods,200065,100000|goods,200066,10|goods,200080,10|goods,200101,10|goods,200200,10|goods,200201,10|goods,200202,10|goods,200203,10|goods,200204,10|goods,200205,10|goods,200206,10|goods,200207,10|goods,200208,10|goods,200213,10|goods,200214,10|goods,200215,10|goods,200216,10|goods,200217,10|goods,200218,10|goods,200219,10|goods,200220,10|goods,200221,10|goods,200222,10|goods,200223,10|goods,200224,10|goods,200225,10|goods,200226,10|goods,200227,10|goods,200228,10|goods,200229,10|goods,200230,10|goods,200231,10|goods,200232,10|goods,200233,10|goods,200234,10|goods,200234,10|goods,200235,10|goods,200236,10|goods,200237,10|goods,200238,10|goods,200239,10|goods,200240,10|goods,200241,10|goods,200242,10|goods,200243,10|goods,200244,10|goods,200245,10|goods,200246,10|goods,200247,10|goods,200248,10|goods,200249,10|goods,200250,10|goods,200251,10|goods,200252,10|goods,200253,10|goods,200254,10|goods,200255,10|goods,200256,10|goods,200257,10|goods,200258,10|goods,200259,10|goods,200260,10|goods,200261,10|goods,200262,10|goods,200263,10|goods,200264,10|goods,200300,10|goods,200301,10|goods,200302,10|goods,200303,10|goods,200304,10|goods,200305,10|goods,200306,10|goods,200307,10|goods,200308,10|goods,200309,10|goods,200310,10|goods,200311,10|goods,200312,10|goods,200313,10|goods,200314,10|goods,200315,10|goods,200316,10|goods,200317,10|goods,200318,10|goods,200319,10|goods,200320,10|goods,200321,10|goods,200322,10|goods,200323,10|goods,200324,10|goods,200325,10|goods,200326,10|goods,200327,10|goods,200328,10|goods,200329,10|goods,200330,10|goods,200331,10|goods,200332,10|goods,200333,10|goods,200334,10|goods,200335,10|goods,200336,10|goods,200337,10|goods,200338,10|goods,200339,10|goods,200340,10|goods,200341,10|goods,200342,10|goods,200343,10|goods,200344,10|goods,200345,10|goods,200346,10|goods,200347,10|goods,200348,10|goods,200349,10|goods,200350,10|goods,200351,10|goods,200352,10|goods,200353,10|goods,200360,10|goods,200361,10|goods,200362,10|goods,200363,10|goods,200364,10|goods,200365,10|goods,200366,10|goods,200367,10|goods,200370,10|goods,200371,10|goods,200372,10|goods,200373,10|goods,200374,10|goods,200380,10|goods,200381,10|goods,200382,10|goods,200385,10|goods,200386,10|goods,200390,10|goods,200391,10|goods,200392,10|goods,200393,10|goods,200394,10|goods,200395,10|goods,200396,10|goods,200397,10|goods,200398,10|goods,200399,10|goods,200400,10|goods,200401,10|goods,200402,10|goods,200403,10|goods,200404,10|goods,200408,10|goods,200409,10|goods,200410,10|goods,200411,10|goods,200412,10|goods,200413,10|goods,200414,10|goods,200415,10|goods,200416,10|goods,200417,10|goods,200418,10|goods,200419,10|goods,200420,10|goods,200421,10|goods,200424,10|goods,200425,10|goods,200426,10|goods,200427,10|goods,200428,10|goods,200450,10|goods,200451,10|goods,200452,10|goods,200453,10|goods,200454,10|goods,200455,10|goods,200456,10|goods,200500,10|goods,200501,10|goods,200502,10|goods,200510,10|goods,200511,10|goods,200512,10|goods,200550,10|goods,200551,10|goods,200552,10|goods,200553,10|goods,200554,10|goods,200555,10|goods,200560,10|goods,200561,10|goods,200562,10|goods,200563,10|goods,200564,10|goods,200565,10|goods,200566,10|goods,200567,10|goods,200570,10|goods,200571,10|goods,200572,10|goods,200580,10|goods,200581,10|goods,200590,10|goods,200600,10|goods,200601,10|goods,200602,10|goods,200603,10|goods,200604,10|goods,200610,10|goods,200611,10|goods,200621,10|goods,200622,10|goods,200623,10|goods,200624,10|goods,200625,10|goods,200626,10|goods,200627,10|goods,200650,10|goods,200651,10|goods,200652,10|goods,203381,10|goods,200653,10|goods,200654,10|goods,200655,10|goods,200656,10|goods,200657,10|goods,200658,10|goods,200659,10|goods,200660,10|goods,200661,10|goods,200662,10|goods,200663,10|goods,200664,10|goods,200665,10|goods,200666,10|goods,200667,10|goods,200668,10|goods,200669,10|goods,200670,10|goods,200671,10|goods,200672,10|goods,200673,10|goods,200674,10|goods,200675,10|goods,200676,10|goods,200677,10|goods,200678,5000|goods,200679,10|goods,200680,10|goods,200681,10|goods,200682,10|goods,200683,10|goods,200684,10|goods,200685,10|goods,200686,10|goods,200687,10|goods,200688,10|goods,200689,10|goods,200690,10|goods,200691,10|goods,200692,10|goods,200693,10|goods,200694,10|goods,200695,10|goods,200696,10|goods,200697,10|goods,200698,10|goods,200700,10|goods,200701,10|goods,200702,10|goods,200703,10|goods,200704,10|goods,200705,10|goods,200706,10|goods,200707,10|goods,200710,10|goods,200711,10|goods,200712,10|goods,200713,10|goods,200714,10|goods,200715,10|goods,200716,10|goods,200717,10|goods,200718,10|goods,200719,10|goods,200800,10|goods,200801,10|goods,20080,10|goods,200803,10|goods,200900,10|goods,200901,10|goods,200902,10|goods,200903,10|goods,200904,10');
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