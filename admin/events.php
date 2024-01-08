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
include '../includes/browser_os.php';
include '../includes/logs.php';
if ($lang[0]=='EN') {
include '../includes/language/en.php';}
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$time=time().'000';
$time1=time();
header("content-type:text/html; charset=utf-8");
$actId=$_POST[id];
switch($_POST[t3]){

case ''.$Events_functions_6.'':{
mysql_select_db($_POST['db']);
$durat=$_POST[duration1]*3600000;
$duration=$time+$durat;
$durat1=$_POST[duration1]*3600;
$duration1=$time1+$durat1;
Mysql_query("Update activity set startTime='$duration' where id='$_POST[ido]'") or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[ido]','$_POST[ido]','$Events_functions_logs_1','$Events_functions_logs_6','$name[0] opened  $_POST[ido] activity at $duration1',$time1,'$ip','$user_browser','$user_os')")or die('1');

echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$Events_functions_7.'':{
mysql_select_db($_POST['db']);
if($actId==110004){
Mysql_query("insert into activity(id,name,type,openTime,startTime) values ($actId,'MonsterSiege',4,'1498755600139',$time)
			ON DUPLICATE KEY update startTime=$time") or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'Dark Knight','$actId','$Events_functions_logs_1','$Events_functions_logs_7','$name[0] added  Dark Knight activity',$time1,'$ip','$user_browser','$user_os')")or die('1');

		}
		if($actId==110007){
			Mysql_query("insert into activity(id,name,type,openTime,startTime) values ($actId,'CrossKingdomFight',7,'1498755600139',$time)
			ON DUPLICATE KEY update startTime=$time") or die('1');
			Mysql_query("Update server_info set crossFightServerId='$_POST[server]'") or die('1');
			Mysql_query("Update userprofile set crossFightSrcServerId='$_POST[server]'") or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'Ancient BattleField','$actId','$Events_functions_logs_1','$Events_functions_logs_7','$name[0] added  Ancient BattleField activity serverid=$_POST[server]',$time1,'$ip','$user_browser','$user_os')")or die('1');
			mysql_select_db('coktw_global');
			Mysql_query("insert into server_info(id,type,cross_fight_server_id) values('$_POST[server]',0,'$_POST[server]') ON DUPLICATE KEY update type =0,cross_fight_server_id ='$_POST[server]',id='$_POST[server]'") or die('1');
			}
			if($actId==1){
			mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'Daily Events','$actId','$Events_functions_logs_1','$Events_functions_logs_7','$name[0] added  Daily Events activity',$time1,'$ip','$user_browser','$user_os')")or die('1');
			Mysql_query("Update server_info set kaifu='1498755600139',yangfu='1498755600139',daoliangStart='1498755600139',daoliangEnd='1498755600139',shuaguaiActStart='1498755600139',activityTime='1498755600139',activationTime='1498755600139'") or die('1');
			}
echo '<script>alert("'.$successful.'");</script>';
break;
}
}
?>

<html>

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

<head>
<title><?php echo $Events_functions_1 ?></title>
	</head>
	<body>
<div class="div1"><h1><?php echo $Events_functions_1 ?></h1></div><br/>
<form method="post" action="" name="form2">
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
<fieldset><legend><?php echo $Events_functions_2 ?></legend>
<select name="ido">
<option value="8999"><?php echo $Events_1 ?></option>
</select>
<?php echo $Events_functions_3 ?>
<input type="text" name="duration" size="3" placeholder="" maxlength="3">
<?php echo $Events_functions_4 ?>
 <P>
<input type="submit" name="t3" value="<?php echo $Events_functions_6 ?>"/>
</fieldset>
<fieldset><legend>Add events function</legend>
<select name="id">
<option value="110004"><?php echo $Events_3 ?></option>
<option value="110007"><?php echo $Events_4 ?></option>
<option value="1"><?php echo $Events_2 ?></option>
</select>
<?php echo $Warn_1 ?>
<P>
<input type="text" name="server" size="3" placeholder="" maxlength="3">
<p>
<input type="submit" name="t3" value="<?php echo $Events_functions_7 ?>"/>
</fieldset>
<p>
<fieldset>
<input style="width: 200px;  padding: 2.5px; pointer; font-weight: bold; background: #00FF00; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="<?php echo $go_back ?>"onclick="window.location.href='index.php'"/><br>

</fieldset>

</form>
</html>
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
