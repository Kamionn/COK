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
if ($lang[0]=='EN') {
include '../includes/language/en.php';
}
$time=time();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$console_status1=mysql_query("select status from console_status");
$console_status2=mysql_fetch_array($console_status1);
if ($console_status2[0]!='2'){
$console_status='Online';
$console_s=$adminpanel_26;
}
else if ($console_status2[0]=='2'){
$console_status='Offline';
$console_s=$adminpanel_25;

}
header("content-type:text/html; charset=utf-8");
switch($_POST[t3]){
case ''.$adminpanel_2.'':{
$sql="select users.userid,username,role,language from users ";
				$res2=mysql_query($sql);
				echo "<table border=1 width=100% heght=100%>";
				echo "<tr><td>$adminpanel_3</td><td>$adminpanel_4</td><td>$adminpanel_5</td><td>$adminpanel_6</td><td>$adminpanel_7</td></tr>";
				while($row2=mysql_fetch_assoc($res2)){
					$one[]=$row2;
	echo"<tr><td>{$row2['userid']}</td><td>{$row2['username']}</td><td>{$row2['password_text']}</td><td>{$row2['role']}</td><td>{$row2['language']}</td></tr>";

}

break;

}
case ''.$adminpanel_8.'':{
$sql="select fail_login_log.ip,count,user_name,last_time,browser,os from fail_login_log ";
				$res2=mysql_query($sql);
				echo "<table border=1 width=100% heght=100%>";
				echo "<tr><td>$adminpanel_9</td><td>$adminpanel_10</td><td>$adminpanel_11</td><td>$adminpanel_12</td><td>$adminpanel_13</td><td>$adminpanel_14</td></tr>";
				while($row2=mysql_fetch_assoc($res2)){
					$one[]=$row2;
	echo"<tr><td>{$row2['ip']}</td><td>{$row2['count']}</td><td>{$row2['user_name']}</td><td>{$row2['last_time']}</td><td>{$row2['browser']}</td><td>{$row2['os']}</td></tr>";

}

break;

}
case ''.$adminpanel_15.'':{
$sql="select users.userid,username,role,ban_reason,banned_by from users where ban='Y'";
				$res2=mysql_query($sql);
				echo "<table border=1 width=100% heght=100%>";
				echo "<tr><td>$adminpanel_3</td><td>$adminpanel_4</td><td>$adminpanel_6</td><td>$adminpanel_16</td><td>$adminpanel_17</td></tr>";
				while($row2=mysql_fetch_assoc($res2)){
					$one[]=$row2;
	echo"<tr><td>{$row2['userid']}</td><td>{$row2['username']}</td><td>{$row2['role']}</td><td>{$row2['ban_reason']}</td><td>{$row2['banned_by']}</td></tr>";

}

break;

}
case ''.$adminpanel_18.'':{
$sql="select ban.ip,bantime,reason,banned_by from ban where bantime>$time or bantime='0'";
				$res2=mysql_query($sql);
				echo "<table border=1 width=100% heght=100%>";
				echo "<tr><td>$adminpanel_9</td><td>$adminpanel_19</td><td>$adminpanel_16</td><td>$adminpanel_17</td></tr>";
				while($row2=mysql_fetch_assoc($res2)){
					$one[]=$row2;
	echo"<tr><td>{$row2['ip']}</td><td>{$row2['bantime']}</td><td>{$row2['reason']}</td><td>{$row2['banned_by']}</td></tr>";

}

break;

}
case ''.$adminpanel_22.'':{
mysql_query("Update users set ban='Y',ban_reason='$_POST[reason1]',banned_by='$name[0]' where username='$_POST[username]'")or die('User not found');


echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$adminpanel_23.'':{
Mysql_query("insert into ban(ip,bantime,reason,banned_by) values ('$_POST[ip_ban]','$_POST[duration1]','$_POST[reason2]','$name[0]')
ON DUPLICATE KEY update bantime='$_POST[duration1]',reason='$_POST[reason2]',banned_by='$name[0]'") or die('1');


echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$adminpanel_25.'':{
mysql_query("Update console_status set status=1")or die('Error');
echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$adminpanel_26.'':{
mysql_query("Update console_status set status=2")or die('Error');
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
<title><?php echo $adminpanel_1 ?></title>
	</head>
	<body>
	 <div class="div1"><h1><?php echo $adminpanel_1 ?></h1></div><br/>
<form method="post" action="" name="form2">
<fieldset>
<input type="submit" name="t3" value="<?php echo $adminpanel_2 ?>"/>
</br>
<input type="submit" name="t3" value="<?php echo $adminpanel_8 ?>"/>
</br>
<input type="submit" name="t3" value="<?php echo $adminpanel_15 ?>"/>
</br>
<label><?php echo $adminpanel_20 ?></label><input type="submit" name="t3" value="<?php echo $adminpanel_18 ?>"/> 
</br>
</fieldset>
<fieldset>
<input type="text" name="username" size="10" placeholder="<?php echo $adminpanel_4 ?>">
<input type="text" name="reason1" size="20" placeholder="<?php echo $adminpanel_16 ?>">
<input type="submit" name="t3" value="<?php echo $adminpanel_22 ?>"/>
</br>
<label><?php echo $adminpanel_20 ?></label>
<input type="text" name="ip_ban" size="10" placeholder="<?php echo $adminpanel_9 ?>">
<input type="text" name="reason2" size="20" placeholder="<?php echo $adminpanel_16 ?>">
<input type="text" name="duration1" size="20" placeholder="<?php echo $adminpanel_24 ?>">
<input type="submit" name="t3" value="<?php echo $adminpanel_23 ?>"/>
</fieldset>
<fieldset>
<label><?php echo $adminpanel_21 ?></label>
<?php echo $console_status ?>
</br>
<input type="submit" name="t3" value="<?php echo $console_s ?>"/>

</fieldset>

<fieldset>
<input style="width: 200px;  padding: 2.5px; pointer; font-weight: bold; background: #00FF00; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="<?php echo $go_back ?>"onclick="window.location.href='index.php'"/><br>

</fieldset>
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
