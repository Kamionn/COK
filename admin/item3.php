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
$b=bin2hex('goods,211405,100000|goods,211406,100000|goods,211407,100000|goods,211408,100000|goods,211409,100000|goods,211412,450000|goods,211426,450000|goods,211427,450000|goods,211428,450000|goods,211429,100000|goods,211430,100000|goods,211434,100000|goods,211439,100000|goods,211444,100000|goods,211445,100000|goods,211446,100000|goods,211447,100000|goods,211448,100000|goods,211449,100000|goods,211450,100000|goods,211451,100000|goods,211452,100000|goods,211453,100000|goods,211454,100000|goods,211460,100000|goods,211466,100000|goods,211472,100000|goods,211478,100000|goods,211484,100000|goods,211490,100000|goods,211494,100000|goods,211496,100000|goods,211501,100000|goods,211502,100000|goods,211503,100000|goods,211504,100000|goods,211505,100000|goods,211506,100000|goods,211507,100000|goods,211508,100000|goods,211509,100000|goods,211510,100000|goods,211513,100000|goods,211516,100000|goods,211519,100000|goods,211522,100000|goods,211525,100000|goods,211528,100000|goods,211531,100000|goods,211534,100000|goods,211542,100000|goods,211548,100000|goods,211554,100000|goods,211560,100000|goods,211566,100000|goods,211572,100000|goods,211573,100000|goods,211579,100000|goods,211581,100000|goods,211582,100000|goods,211587,100000|goods,211589,100000|goods,211590,100000|goods,211591,100000|goods,211592,100000|goods,211593,100000|goods,211594,100000|goods,211595,100000|goods,211596,100000|goods,211597,100000|goods,211600,100000|goods,211601,100000|goods,211602,100000|goods,211603,100000|goods,211604,100000|goods,211605,100000|goods,211606,100000|goods,211607,100000|goods,211608,100000|goods,211609,100000|goods,211610,100000|goods,211611,100000|goods,211612,100000|goods,211613,100000|goods,211614,100000|goods,211615,100000|goods,211616,100000|goods,211617,100000|goods,211618,100000|goods,211619,100000|goods,211620,100000|goods,211621,100000|goods,211622,100000|goods,211623,100000|goods,211624,100000|goods,211625,100000|goods,211626,100000|goods,211627,100000|goods,211628,100000|goods,211629,100000|goods,211630,100000|goods,211631,100000|goods,211632,100000|goods,200345,100000|goods,200352,100000|goods,200366,100000|goods,200381,100000|goods,200392,100000|goods,200404,100000|goods,200413,100000|goods,200415,100000|goods,200417,100000|goods,200419,100000|goods,200421,100000|goods,200425,100000|goods,200426,100000|goods,200428,100000|goods,200456,100000|goods,200502,100000|goods,200511,100000|goods,200512,100000|goods,200552,100000|goods,200553,100000|goods,200554,100000|goods,200555,100000|goods,200567,100000|goods,200572,100000|goods,200581,100000|goods,200590,100000|goods,200604,100000|goods,200610,100000|goods,200611,100000|goods,200629,100000|goods,200659,100000|goods,200669,100000|goods,200679,100000|goods,200689,100000|goods,200698,100000|goods,200707,100000|goods,200719,100000|goods,200803,100000|goods,200904,100000|goods,200926,100000|goods,200950,100000|goods,201015,100000|goods,201025,100000|goods,201035,100000|goods,201045,100000|goods,201055,100000|goods,201065,100000|goods,201075,100000|goods,201085,100000|goods,201095,100000|goods,201105,100000|goods,201115,100000|goods,201125,100000|goods,201130,100000|goods,201131,100000|goods,201132,100000|goods,201133,100000|goods,201134,100000|goods,201135,100000|goods,201136,100000|goods,201137,100000|goods,201138,100000|goods,201139,100000|goods,201140,100000|goods,201141,100000|goods,201200,100000|goods,201200,100000|goods,201201,100000|goods,201202,100000|goods,201203,100000|goods,201204,100000|goods,201205,100000|goods,201206,100000|goods,201207,100000|goods,201208,100000|goods,201209,100000|goods,201210,100000|goods,201210,100000|goods,201211,100000|goods,201212,100000|goods,201213,100000|goods,201214,100000|goods,201215,100000|goods,201216,100000|goods,202005,100000|goods,202006,100000|goods,202007,100000|goods,202008,100000|goods,202009,100000|goods,203003,100000|goods,203007,100000|goods,203011,100000|goods,203015,100000|goods,203020,100000|goods,203025,100000|goods,203030,100000|goods,203034,100000|goods,203040,100000|goods,203044,100000|goods,203049,100000|goods,203054,100000|goods,203059,100000|goods,203064,100000|goods,203066,100000|goods,203067,100000|goods,203071,100000|goods,203076,100000|goods,203081,100000|goods,203087,100000|goods,203092,100000|goods,203097,100000|goods,203102,100000|goods,203108,100000|goods,203110,100000|goods,203114,100000|goods,203119,100000|goods,203124,100000|goods,203129,100000|goods,203134,100000|goods,203139,100000|goods,203144,100000|goods,203149,100000|goods,203154,100000|goods,203159,100000|goods,203164,100000|goods,203169,100000|goods,203174,100000|goods,203179,100000|goods,203183,100000|goods,203187,100000|goods,203192,100000|goods,203197,100000|goods,203202,100000|goods,203207,100000|goods,203212,100000|goods,203217,100000|goods,203222,100000|goods,203227,100000|goods,203233,5000000|goods,203238,100000|goods,203243,500|goods,203245,20000000|goods,203249,50000|goods,203254,100000|goods,203256,100000|goods,203261,100000|goods,203266,100000|goods,203271,100000|goods,203277,100000|goods,203282,100000|goods,203284,100000|goods,203285,100000|goods,203291,100000|goods,203297,100000|goods,203303,100000|goods,203309,100000|goods,203315,100000|goods,203321,100000|goods,203327,100000|goods,203333,100000|goods,203351,100000|goods,203363,100000|goods,203369,100000|goods,203371,100000|goods,203372,100000|goods,203373,100000|goods,203374,100000|goods,203375,100000|goods,203376,6000|goods,203377,6000|goods,203378,6000|goods,203379,6000|goods,203380,6000|goods,203381,6000|goods,203382,100000|goods,205000,100000|goods,205001,100000|goods,205002,100000|goods,209003,100000|goods,209004,100000|goods,209005,100000|goods,209171,100000|goods,209172,100000|goods,209173,100000|goods,209174,100000|goods,209175,100000|goods,209176,100000|goods,209177,100000|goods,209178,100000|goods,209179,100000|goods,209180,100000|goods,209181,100000|goods,209182,100000|goods,209183,100000|goods,209184,100000|goods,209185,100000|goods,209200,100000|goods,209305,100000|goods,209309,100000|goods,209315,5000|goods,209319,100000|goods,209325,100000|goods,209329,100000|goods,209339,100000|goods,209349,100000|goods,209359,100000|goods,209366,100000|goods,209376,100000|goods,209382,100000|goods,209392,100000|goods,209405,100000|goods,209415,100000|goods,209425,100000|goods,209435,100000|goods,209466,450000|goods,209492,450000|goods,209567,450000|goods,209572,450000|goods,209573,100000|goods,209574,100000|goods,209575,100000|goods,209576,100000|goods,209577,100000|goods,209578,100000|goods,209579,100000|goods,209580,100000|goods,209581,100000|goods,209582,100000|goods,209583,100000|goods,209584,100000|goods,209585,100000|goods,209586,100000|goods,209587,100000|goods,209588,100000|goods,209589,100000|goods,209595,100000|goods,209596,100000');
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
$b=bin2hex('goods,211405,100000|goods,211406,100000|goods,211407,100000|goods,211408,100000|goods,211409,100000|goods,211412,450000|goods,211426,450000|goods,211427,450000|goods,211428,450000|goods,211429,100000|goods,211430,100000|goods,211434,100000|goods,211439,100000|goods,211444,100000|goods,211445,100000|goods,211446,100000|goods,211447,100000|goods,211448,100000|goods,211449,100000|goods,211450,100000|goods,211451,100000|goods,211452,100000|goods,211453,100000|goods,211454,100000|goods,211460,100000|goods,211466,100000|goods,211472,100000|goods,211478,100000|goods,211484,100000|goods,211490,100000|goods,211494,100000|goods,211496,100000|goods,211501,100000|goods,211502,100000|goods,211503,100000|goods,211504,100000|goods,211505,100000|goods,211506,100000|goods,211507,100000|goods,211508,100000|goods,211509,100000|goods,211510,100000|goods,211513,100000|goods,211516,100000|goods,211519,100000|goods,211522,100000|goods,211525,100000|goods,211528,100000|goods,211531,100000|goods,211534,100000|goods,211542,100000|goods,211548,100000|goods,211554,100000|goods,211560,100000|goods,211566,100000|goods,211572,100000|goods,211573,100000|goods,211579,100000|goods,211581,100000|goods,211582,100000|goods,211587,100000|goods,211589,100000|goods,211590,100000|goods,211591,100000|goods,211592,100000|goods,211593,100000|goods,211594,100000|goods,211595,100000|goods,211596,100000|goods,211597,100000|goods,211600,100000|goods,211601,100000|goods,211602,100000|goods,211603,100000|goods,211604,100000|goods,211605,100000|goods,211606,100000|goods,211607,100000|goods,211608,100000|goods,211609,100000|goods,211610,100000|goods,211611,100000|goods,211612,100000|goods,211613,100000|goods,211614,100000|goods,211615,100000|goods,211616,100000|goods,211617,100000|goods,211618,100000|goods,211619,100000|goods,211620,100000|goods,211621,100000|goods,211622,100000|goods,211623,100000|goods,211624,100000|goods,211625,100000|goods,211626,100000|goods,211627,100000|goods,211628,100000|goods,211629,100000|goods,211630,100000|goods,211631,100000|goods,211632,100000|goods,200345,100000|goods,200352,100000|goods,200366,100000|goods,200381,100000|goods,200392,100000|goods,200404,100000|goods,200413,100000|goods,200415,100000|goods,200417,100000|goods,200419,100000|goods,200421,100000|goods,200425,100000|goods,200426,100000|goods,200428,100000|goods,200456,100000|goods,200502,100000|goods,200511,100000|goods,200512,100000|goods,200552,100000|goods,200553,100000|goods,200554,100000|goods,200555,100000|goods,200567,100000|goods,200572,100000|goods,200581,100000|goods,200590,100000|goods,200604,100000|goods,200610,100000|goods,200611,100000|goods,200629,100000|goods,200659,100000|goods,200669,100000|goods,200679,100000|goods,200689,100000|goods,200698,100000|goods,200707,100000|goods,200719,100000|goods,200803,100000|goods,200904,100000|goods,200926,100000|goods,200950,100000|goods,201015,100000|goods,201025,100000|goods,201035,100000|goods,201045,100000|goods,201055,100000|goods,201065,100000|goods,201075,100000|goods,201085,100000|goods,201095,100000|goods,201105,100000|goods,201115,100000|goods,201125,100000|goods,201130,100000|goods,201131,100000|goods,201132,100000|goods,201133,100000|goods,201134,100000|goods,201135,100000|goods,201136,100000|goods,201137,100000|goods,201138,100000|goods,201139,100000|goods,201140,100000|goods,201141,100000|goods,201200,100000|goods,201200,100000|goods,201201,100000|goods,201202,100000|goods,201203,100000|goods,201204,100000|goods,201205,100000|goods,201206,100000|goods,201207,100000|goods,201208,100000|goods,201209,100000|goods,201210,100000|goods,201210,100000|goods,201211,100000|goods,201212,100000|goods,201213,100000|goods,201214,100000|goods,201215,100000|goods,201216,100000|goods,202005,100000|goods,202006,100000|goods,202007,100000|goods,202008,100000|goods,202009,100000|goods,203003,100000|goods,203007,100000|goods,203011,100000|goods,203015,100000|goods,203020,100000|goods,203025,100000|goods,203030,100000|goods,203034,100000|goods,203040,100000|goods,203044,100000|goods,203049,100000|goods,203054,100000|goods,203059,100000|goods,203064,100000|goods,203066,100000|goods,203067,100000|goods,203071,100000|goods,203076,100000|goods,203081,100000|goods,203087,100000|goods,203092,100000|goods,203097,100000|goods,203102,100000|goods,203108,100000|goods,203110,100000|goods,203114,100000|goods,203119,100000|goods,203124,100000|goods,203129,100000|goods,203134,100000|goods,203139,100000|goods,203144,100000|goods,203149,100000|goods,203154,100000|goods,203159,100000|goods,203164,100000|goods,203169,100000|goods,203174,100000|goods,203179,100000|goods,203183,100000|goods,203187,100000|goods,203192,100000|goods,203197,100000|goods,203202,100000|goods,203207,100000|goods,203212,100000|goods,203217,100000|goods,203222,100000|goods,203227,100000|goods,203233,5000000|goods,203238,100000|goods,203243,500|goods,203245,20000000|goods,203249,50000|goods,203254,100000|goods,203256,100000|goods,203261,100000|goods,203266,100000|goods,203271,100000|goods,203277,100000|goods,203282,100000|goods,203284,100000|goods,203285,100000|goods,203291,100000|goods,203297,100000|goods,203303,100000|goods,203309,100000|goods,203315,100000|goods,203321,100000|goods,203327,100000|goods,203333,100000|goods,203351,100000|goods,203363,100000|goods,203369,100000|goods,203371,100000|goods,203372,100000|goods,203373,100000|goods,203374,100000|goods,203375,100000|goods,203376,6000|goods,203377,6000|goods,203378,6000|goods,203379,6000|goods,203380,6000|goods,203381,6000|goods,203382,100000|goods,205000,100000|goods,205001,100000|goods,205002,100000|goods,209003,100000|goods,209004,100000|goods,209005,100000|goods,209171,100000|goods,209172,100000|goods,209173,100000|goods,209174,100000|goods,209175,100000|goods,209176,100000|goods,209177,100000|goods,209178,100000|goods,209179,100000|goods,209180,100000|goods,209181,100000|goods,209182,100000|goods,209183,100000|goods,209184,100000|goods,209185,100000|goods,209200,100000|goods,209305,100000|goods,209309,100000|goods,209315,5000|goods,209319,100000|goods,209325,100000|goods,209329,100000|goods,209339,100000|goods,209349,100000|goods,209359,100000|goods,209366,100000|goods,209376,100000|goods,209382,100000|goods,209392,100000|goods,209405,100000|goods,209415,100000|goods,209425,100000|goods,209435,100000|goods,209466,450000|goods,209492,450000|goods,209567,450000|goods,209572,450000|goods,209573,100000|goods,209574,100000|goods,209575,100000|goods,209576,100000|goods,209577,100000|goods,209578,100000|goods,209579,100000|goods,209580,100000|goods,209581,100000|goods,209582,100000|goods,209583,100000|goods,209584,100000|goods,209585,100000|goods,209586,100000|goods,209587,100000|goods,209588,100000|goods,209589,100000|goods,209595,100000|goods,209596,10000');
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