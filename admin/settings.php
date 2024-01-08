<?php
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
$query_lang=mysql_query("SELECT language FROM `users` WHERE `userid`='".$_SESSION['userid']."' AND `role`='admin'");
$lang=mysql_fetch_row($query_lang);
$query_pw_text=mysql_query("SELECT password_text FROM `users` WHERE `userid`='".$_SESSION['userid']."' AND `role`='admin'");
$pw_old=mysql_fetch_row($query_pw_text);
if ($lang[0]=='EN') {
include '../includes/language/en.php';}
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$time=time();
$user_id=$_SESSION['userid'];
$user_role=$_SESSION['role'];
if ($lang[0]=='AR') {
include '../includes/language/ar.php';}
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$time=time();
$user_id=$_SESSION['userid'];
$user_role=$_SESSION['role'];
if(!empty($_POST['newPassword'])):

$password1 = $_POST['newPassword'];
$password2 = $_POST['confirmPassword'];

$password1 = mysql_real_escape_string($password1);
$password2 = mysql_real_escape_string($password2);
$password3=MD5($password1);
if ($password1 <> $password2)
{
    echo $settings_4;
}
else if (mysql_query("UPDATE users SET password='$password3',password_text='$password2' WHERE `userid`='".$_SESSION['userid']."'"))

{
mysql_query("INSERT INTO change_pw_logs (user_id,user_role,time,ip,old_pw,new_pw) VALUES ('$user_id', '$user_role', '$time', '$ip', '$pw_old[0]', '$password2' )")or die('1');

    echo $settings_5;
}

else
{
    echo $settings_6;
}
endif;
if(!empty($_POST['language'])):
mysql_query("UPDATE users SET language='$_POST[language]' WHERE `userid`='".$_SESSION['userid']."'");
    echo $settings_7;
endif;

?>
<!doctype html>
<title><?php echo $settings_1 ?></title>
<style type="text/css">
body{
font-family: 'Ubuntu', sans-serif;
}
.box
{
border:#666666 solid 1px;
}
label
{
width:100px;
font-size:12px;
}

</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> 
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
</head>
<body bgcolor="#FFFFFF">
<div align="center">
<div style="width:370px; margin-top: 13%; border: 1px solid #333333; border-radius: 3px;" align="left">
<div style="background-color:#333333; color:#FFFFFF; padding:8px;"><b><?php echo $settings_1;?></b></div>
<div style="margin:35px">

 <form name="frmChange" role="form" class="form-signin" method="POST" action="settings.php">

  <div class="form-group">
  <div style="background-color:#333333; color:#FFFFFF; padding:8px;"><b><?php echo $settings_2;?></b></div>
<p>
  <label><?php echo $new_password;?></label><input type="password" class="form-control" id="InputPassword2" placeholder="<?php echo $new_password;?>" name="newPassword" style="margin-left: 40px;"><br /><br />
<label><?php echo $confirm_new_password;?></label><input type="password" class="form-control" id="InputPassword3" placeholder="<?php echo $confirm_new_password;?>" name="confirmPassword">  </div>
   <button class="btn btn-lrg btn-default btn-block" type="submit" value="send" style=" background-color: #fff; color: #004080; border: 1px solid #ccc; border-radius: 3px; cursor:pointer; padding:7px; font-size: 14px; margin: 10px; margin-bottom:0px;"><?php echo $password_submit;?></button>
<div style="background-color:#333333; color:#FFFFFF; padding:8px;"><b><?php echo $settings_3;?></b></div>
<select name="language">
<option value=""><?php echo $change_language_1;?></option>
<option value="EN"><?php echo $change_language_en;?></option>
<option value="AR"><?php echo $change_language_ar;?></option>
</select>
<p>
<button class="btn btn-lrg btn-default btn-block" type="submit" value="send" style=" background-color: #fff; color: #004080; border: 1px solid #ccc; border-radius: 3px; cursor:pointer; padding:7px; font-size: 14px; margin: 10px; margin-bottom:0px;"><?php echo $password_submit;?></button>

      </div>
<fieldset style="border: 0px; border-top:1px solid #ccc;">

<input style="width: 150px;  padding: 2.5px; pointer; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="Add User"onclick="window.location.href='register.php'"/><br>
<input style="width: 250px;  padding: 2.5px; pointer; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="<?php echo $go_back;?>"onclick="window.location.href='index.php'"/><br>

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