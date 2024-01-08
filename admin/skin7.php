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
$b=bin2hex('goods,200301,10|goods,200302,10|goods,200303,10|goods,200304,10|goods,200305,10|goods,200306,10|goods,200307,10|goods,200308,10|goods,200309,10|goods,200310,10|goods,200311,10|goods,200312,10|goods,200313,10|goods,200314,10|goods,200315,10|goods,200316,10|goods,200317,10|goods,200318,10|goods,200319,10|goods,200320,10|goods,200321,10|goods,200322,10|goods,200323,10|goods,200324,10|goods,200325,10|goods,200326,10|goods,200327,10|goods,200328,10|goods,200329,10|goods,200330,10|goods,200331,10|goods,200332,10|goods,200333,10|goods,200334,10|goods,200335,10|goods,200336,10|goods,200337,10|goods,200338,10|goods,200339,10|goods,200340,10|goods,200341,10|goods,200342,10|goods,200343,10|goods,200344,10|goods,200345,10|goods,200346,10|goods,200347,10|goods,200348,10|goods,200349,10|goods,200350,10|goods,200351,10|goods,200352,10|goods,200353,10|goods,200354,10|goods,200355,10|goods,200356,10|goods,200357,10|goods,200358,10|goods,200359,10|goods,200360,10|goods,200361,10|goods,200362,10|goods,200363,10|goods,200364,10|goods,200365,10|goods,200366,10|goods,200367,10|goods,200368,10|goods,200369,10|goods,200370,10|goods,200371,10|goods,200372,10|goods,200373,10|goods,200374,10|goods,200375,10|goods,200376,10|goods,200377,10|goods,200378,10|goods,200379,10|goods,200380,10|goods,200381,10|goods,200382,10|goods,200383,10|goods,200384,10|goods,200385,10|goods,200386,10|goods,200387,10|goods,200388,10|goods,200389,10|goods,200390,10|goods,200391,10|goods,200392,10|goods,200393,10|goods,200394,10|goods,200395,10|goods,200396,10|goods,200397,10|goods,200398,10|goods,200399,10');
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
$b=bin2hex('goods,200301,10|goods,200302,10|goods,200303,10|goods,200304,10|goods,200305,10|goods,200306,10|goods,200307,10|goods,200308,10|goods,200309,10|goods,200310,10|goods,200311,10|goods,200312,10|goods,200313,10|goods,200314,10|goods,200315,10|goods,200316,10|goods,200317,10|goods,200318,10|goods,200319,10|goods,200320,10|goods,200321,10|goods,200322,10|goods,200323,10|goods,200324,10|goods,200325,10|goods,200326,10|goods,200327,10|goods,200328,10|goods,200329,10|goods,200330,10|goods,200331,10|goods,200332,10|goods,200333,10|goods,200334,10|goods,200335,10|goods,200336,10|goods,200337,10|goods,200338,10|goods,200339,10|goods,200340,10|goods,200341,10|goods,200342,10|goods,200343,10|goods,200344,10|goods,200345,10|goods,200346,10|goods,200347,10|goods,200348,10|goods,200349,10|goods,200350,10|goods,200351,10|goods,200352,10|goods,200353,10|goods,200354,10|goods,200355,10|goods,200356,10|goods,200357,10|goods,200358,10|goods,200359,10|goods,200360,10|goods,200361,10|goods,200362,10|goods,200363,10|goods,200364,10|goods,200365,10|goods,200366,10|goods,200367,10|goods,200368,10|goods,200369,10|goods,200370,10|goods,200371,10|goods,200372,10|goods,200373,10|goods,200374,10|goods,200375,10|goods,200376,10|goods,200377,10|goods,200378,10|goods,200379,10|goods,200380,10|goods,200381,10|goods,200382,10|goods,200383,10|goods,200384,10|goods,200385,10|goods,200386,10|goods,200387,10|goods,200388,10|goods,200389,10|goods,200390,10|goods,200391,10|goods,200392,10|goods,200393,10|goods,200394,10|goods,200395,10|goods,200396,10|goods,200397,10|goods,200398,10|goods,200399,10');
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