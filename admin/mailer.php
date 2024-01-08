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
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$dwID[0]', 'Thanks for playing in Ottoman\'s Beta', 0x$b, '13', '$time', '1')")or die('2');
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
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$b1', '$value[0]', 'Thanks for playing in COK:SOE MOD', 0x$b, '13', '$time', '1')")or die('2');
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
$b=bin2hex('equip,1043025,1|equip,1043215,1|equip,1043515,1|equip,1043115,1|equip,1043315,1|equip,1043415,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Equipments level 43', 0x$b, '13', '$time', '1')")or die('1');

	}
else

if($_POST[typeEquip]=="45"){
$b=bin2hex('equip,6000000,1|equip,555555,1|equip,444444,1|equip,333333,1|equip,222222,1|equip,111110,1|equip,7777777,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Equipments level 45', 0x$b, '13', '$time', '1')")or die('1');
	}

else
	
if($_POST[typeEquip]=="50"){
$b=bin2hex('equip,1054035,1|equip,1054115,1|equip,1054215,1|equip,1054335,1|equip,1054425,1|equip,1054525,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Equipments level 50', 0x$b, '13', '$time', '1')")or die('1');

	}
else
if($_POST[typeEquip]=="55"){

$b=bin2hex('equip,1054036,1|equip,1054116,1|equip,1054216,1|equip,1054336,1|equip,1054426,1|equip,1054526,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Equipments level 55', 0x$b, '13', '$time', '1')")or die('1');

	}

else

if($_POST[typeEquip]=="60"){
	
$b=bin2hex('equip,1054037,1|equip,1054117,1|equip,1054217,1|equip,1054337,1|equip,1054427,1|equip,1054527,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Equipments level 60', 0x$b, '13', '$time', '1')")or die('1');

	}
else
	
if($_POST[typeEquip]=="63"){
	
$b=bin2hex('equip,9981121,1|equip,9981122,1|equip,9981123,1|equip,9981124,1|equip,9981125,1|equip,9981126,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Equipments level 63', 0x$b, '13', '$time', '1')")or die('1');
		
	}
	
if($_POST[typeEquip]=="64"){
	
$b=bin2hex('equip,9981161,1|equip,9981152,1|equip,9981143,1|equip,9981134,1|equip,9981135,1|equip,9981116,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Equipments level 64', 0x$b, '13', '$time', '1')")or die('1');
		
	}
else
if($_POST[typeEquip]=="70"){
$b=bin2hex('equip,9981961,1|equip,9981952,1|equip,9981943,1|equip,9981934,1|equip,9981935,1|equip,9981916,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Equipments level 70', 0x$b, '13', '$time', '1')")or die('1');
		
	}
else

if($_POST[typeEquip]=="80"){
$b=bin2hex('equip,9581961,1|equip,9581952,1|equip,9581943,1|equip,9581934,1|equip,9581935,1|equip,9581916,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Equipments level 80', 0x$b, '13', '$time', '1')")or die('1');
		
	}
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os,message_uid) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$mail_logs_1','$mail_logs_11','$name[0] sent Equipments level $_POST[typeEquip] to $_POST[name]',$time1,'$ip','$user_browser','$user_os',md5($time+100))")or die('1');

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
$b=bin2hex('equip,1043025,1|equip,1043215,1|equip,1043515,1|equip,1043115,1|equip,1043315,1|equip,1043415,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'Equipments level 43', 0x$b, '13', '$time', '1')")or die('1');

	}
	
else
if($_POST[typeEquip]=="45"){
$b=bin2hex('equip,6000000,1|equip,555555,1|equip,444444,1|equip,333333,1|equip,222222,1|equip,111110,1|equip,7777777,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'Equipments level 45', 0x$b, '13', '$time', '1')")or die('1');

	}
else
if($_POST[typeEquip]=="50"){

$b=bin2hex('equip,1054035,1|equip,1054115,1|equip,1054215,1|equip,1054335,1|equip,1054425,1|equip,1054525,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'Equipments level 50', 0x$b, '13', '$time', '1')")or die('1');

	}
else
if($_POST[typeEquip]=="55"){
$b=bin2hex('equip,1054036,1|equip,1054116,1|equip,1054216,1|equip,1054336,1|equip,1054426,1|equip,1054526,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'Equipments level 55', 0x$b, '13', '$time', '1')")or die('1');

	}
	else
if($_POST[typeEquip]=="60"){
$b=bin2hex('equip,1054037,1|equip,1054117,1|equip,1054217,1|equip,1054337,1|equip,1054427,1|equip,1054527,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'Equipments level 60', 0x$b, '13', '$time', '1')")or die('1');

	}
	
else
if($_POST[typeEquip]=="63"){
$b=bin2hex('equip,9981121,1|equip,9981122,1|equip,9981123,1|equip,9981124,1|equip,9981125,1|equip,9981126,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'Equipments level 63', 0x$b, '13', '$time', '1')")or die('1');

	}
else
if($_POST[typeEquip]=="64"){
$b=bin2hex('equip,9981161,1|equip,9981152,1|equip,9981143,1|equip,9981134,1|equip,9981135,1|equip,9981116,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'Equipments level 64', 0x$b, '13', '$time', '1')")or die('1');

	}
	
else
if($_POST[typeEquip]=="70"){
$b=bin2hex('equip,9981961,1|equip,9981952,1|equip,9981943,1|equip,9981934,1|equip,9981935,1|equip,9981916,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'Equipments level 70', 0x$b, '13', '$time', '1')")or die('1');

	}
	
else
if($_POST[typeEquip]=="80"){
$b=bin2hex('equip,9581961,1|equip,9581952,1|equip,9581943,1|equip,9581934,1|equip,9581935,1|equip,9581916,1');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'Equipments level 80', 0x$b, '13', '$time', '1')")or die('1');

	}
$i++;
}
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'All','-','$mail_logs_1','$mail_logs_12','$name[0] sent Equipments level $_POST[typeEquip] to All',$time1,'$ip','$user_browser','$user_os')")or die('1');


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

<p>
<fieldset><legend><?php echo $mail_6 ?></legend>
<input type="text" name="title" size="15" placeholder="<?php echo $mail_7 ?>">
<p>
<label><?php echo $mail_8 ?></label>
<p>
<textarea name="content" cols="60" rows="10"></textarea>
<p>
<input type="submit" name="t3" value="<?php echo $mail_13 ?>" />
<input type="submit" name="t3" value="<?php echo $mail_14 ?>"/>

</fieldset>
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