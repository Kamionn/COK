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
include '../includes/language/en.php';
}
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
mysql_select_db($_POST['db']);
header("content-type:text/html; charset=utf-8");
if($_POST[name]!='' or $_POST[nam3]!=''){
$sql="SELECT uid FROM alliance WHERE `abbr` = '$_POST[name]' or `alliancename` = '$_POST[nam3]'";
$result=mysql_query($sql);
if($result&&mysql_num_rows($result)>0){
$dwID = mysql_fetch_array($result);
$time=time().'000';
$time1=time();
switch($_POST[t3]){
case ''.$Alliance_functions_13.'':{
	mysql_query("delete from alliance_science where allianceId= '$dwID[0]'")or die('1');
    mysql_query("INSERT INTO `alliance_science` (`allianceId`,`scienceId`,`level`,`wood`,`stone`,`iron`,`food`,`silver`,`gold`,`donateprogress`,`donatefinish`,`researchstarttime`,`effectflag`,`power`)
 VALUES ('$dwID[0]',250000,4,0,0,0,0,0,0,400000,1,0,0,100),('$dwID[0]',250100,4,0,0,0,0,0,0,3840000,1,0,0,100),('$dwID[0]',250200,3,0,0,0,0,0,0,11200000,1,0,0,50),('$dwID[0]',250300,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',250400,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',250500,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',250600,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',250700,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',250800,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',250900,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',251000,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',251100,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',251200,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',251300,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',251400,20,0,0,0,0,0,0,20160000,1,0,0,2100),('$dwID[0]',251500,10,0,0,0,0,0,0,640640000,1,0,0,550),('$dwID[0]',251600,10,0,0,0,0,0,0,12320000,1,0,0,550),('$dwID[0]',251700,10,0,0,0,0,0,0,20160000,1,0,0,550),('$dwID[0]',251800,10,0,0,0,0,0,0,61600000,1,0,0,550),('$dwID[0]',251900,10,0,0,0,0,0,0,640640000,1,0,0,550),('$dwID[0]',252000,10,0,0,0,0,0,0,14784000,1,0,0,550),('$dwID[0]',252100,10,0,0,0,0,0,0,14400000,1,0,0,550),('$dwID[0]',252200,10,0,0,0,0,0,0,308000000,1,0,0,550),('$dwID[0]',252300,10,0,0,0,0,0,0,308000000,1,0,0,1000),('$dwID[0]',252400,20,0,0,0,0,0,0,145152000,1,0,0,1000),('$dwID[0]',252500,1,0,0,0,0,0,0,180960000,1,0,0,550),('$dwID[0]',252600,10,0,0,0,0,0,0,1889600000,1,0,0,550),('$dwID[0]',252700,1,0,0,0,0,0,0,13400000,1,0,0,550),('$dwID[0]',252800,1,0,0,0,0,0,0,1868800000,1,0,0,550),('$dwID[0]',252900,10,0,0,0,0,0,0,1848000000,1,0,0,1000),('$dwID[0]',253000,5,0,0,0,0,0,0,80000,1,0,0,100),('$dwID[0]',253100,10,0,0,0,0,0,0,347500,1,0,0,100),('$dwID[0]',253200,20,0,0,0,0,0,0,20160000,1,0,0,200),('$dwID[0]',253300,5,0,0,0,0,0,0,40000,1,0,0,100),('$dwID[0]',253400,5,0,0,0,0,0,0,40000,1,0,0,100),('$dwID[0]',253500,1,0,0,0,0,0,0,160000,1,0,0,100),('$dwID[0]',253600,5,0,0,0,0,0,0,20736000,1,0,0,150);")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[nam3] , $_POST[name]','$dwID[0]','$Alliance_functions_logs_1','$Alliance_functions_logs_13','$name[0] updated alliance $_POST[nam3] $_POST[name] science',$time1,'$ip','$user_browser','$user_os')")or die('1');
echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$Alliance_functions_14.'':{
	mysql_query("delete from alliance where uid= '$dwID[0]'")or die('1');
	mysql_query("delete from alliance_apply where allianceId= '$dwID[0]'")or die('2');
    mysql_query("delete from alliance_battle_record where attAllianceId= '$dwID[0]'")or die('3');
    mysql_query("delete from alliance_battle_record where defAllianceId= '$dwID[0]'")or die('4');
	mysql_query("delete from alliance_battle_team where allianceId= '$dwID[0]'")or die('5');
	mysql_query("delete from alliance_comment where allianceId= '$dwID[0]'")or die('6');
	mysql_query("delete from alliance_comment_shield where allianceId= '$dwID[0]'")or die('7');
	mysql_query("delete from alliance_gift where allianceId= '$dwID[0]'")or die('8');
	mysql_query("delete from alliance_help where allianceId= '$dwID[0]'")or die('9');
	mysql_query("delete from alliance_member where allianceId= '$dwID[0]'")or die('10');
	mysql_query("delete from alliance_science_upgrade where allianceId= '$dwID[0]'")or die('11');
	mysql_query("delete from alliance_shop where allianceId= '$dwID[0]'")or die('12');
	mysql_query("delete from alliance_shop_make where allianceId= '$dwID[0]'")or die('13');
	mysql_query("delete from alliance_shophis where allianceId= '$dwID[0]'")or die('14');
	mysql_query("delete from alliance_territory where allianceId= '$dwID[0]'")or die('15');
	mysql_query("delete from alliance_science where allianceId= '$dwID[0]'")or die('16');
    mysql_query("update userprofile set allianceId=NULL where allianceId= '$dwID[0]'")or die('17');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[nam3] , $_POST[name]','$dwID[0]','$Alliance_functions_logs_1','$Alliance_functions_logs_14','$name[0] deleted alliance $_POST[nam3] $_POST[name] reason : $_POST[reason]',$time1,'$ip','$user_browser','$user_os')")or die('1');
mysql_select_db('coktw_global');
	mysql_query("delete from alliance where allianceId= '$dwID[0]'")or die('1');

echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$Alliance_functions_15.'':{
	mysql_query("update alliance set abbr='$_POST[allnickname]' where uid= '$dwID[0]'")or die('1');
	mysql_query("update alliance_battle_team set targetAAbbr='$_POST[allnickname]' where targetAAbbr= '$_POST[name]'")or die('1');
	mysql_query("update alliance_battle_team set allianceAbbr='$_POST[allnickname]' where allianceAbbr= '$_POST[name]'")or die('1');
	mysql_query("update alliance_territory set allianceAbbr='$_POST[allnickname]' where allianceAbbr= '$_POST[name]'")or die('1');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[nam3] , $_POST[name]','$dwID[0]','$Alliance_functions_logs_1','$Alliance_functions_logs_15','$name[0] changed alliance $_POST[nam3] $_POST[name] nickname to : $_POST[allnickname]',$time1,'$ip','$user_browser','$user_os')")or die('1');
echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$Alliance_functions_16.'':{
	mysql_query("update alliance set alliancename='$_POST[allname]' where uid= '$dwID[0]'")or die('1');
	mysql_query("update alliance_battle_team set allianceName='$_POST[allname]' where allianceId= '$dwID[0]'")or die('2');
	mysql_query("update alliance_territory set allianceName='$_POST[allname]' where allianceId= '$dwID[0]'")or die('3');
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[nam3] , $_POST[name]','$dwID[0]','$Alliance_functions_logs_1','$Alliance_functions_logs_16','$name[0] changed alliance $_POST[nam3] $_POST[name] name to : $_POST[allname]',$time1,'$ip','$user_browser','$user_os')")or die('1');
    mysql_select_db('coktw_global');
	mysql_query("update alliance set alliancename='$_POST[allname]' where allianceId= '$dwID[0]'")or die('5');
echo '<script>alert("'.$successful.'");</script>';
break;
}
case ''.$Alliance_functions_17.'':{
$dwId='';
$i=0;
$sql="SELECT uid FROM userprofile where allianceid='$dwID[0]'";
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
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[nam3] , $_POST[name]','$dwID[0]','$Alliance_functions_logs_1','$Alliance_functions_logs_17','$name[0] sent a message to $_POST[nam3] $_POST[name] members (title: $_POST[title]) (message:$_POST[content])',$time1,'$ip','$user_browser','$user_os')")or die('1');
   echo '<script>alert("'.$successful.'");</script>';
break;
}
}
}

}else{echo '<script>alert("'.$Error_alliance.'");</script>';}
}
?>
<title><?php echo $Alliance_functions_1 ?></title>

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

 <div class="div1"><h1><?php echo $Alliance_functions_1 ?></h1></div><br/>
<form method="post" action="" name="form2">
<label><?php echo $Alliance_functions_2 ?></label>
<input type="text" name="name" value="<?=$_POST[name]?>" placeholder="<?php echo $Alliance_functions_4 ?>" size="12" maxlength="3">
<label><?php echo $Alliance_functions_3 ?></label>
<input type="text" name="nam3" value="<?=$_POST[nam3]?>" placeholder="<?php echo $Alliance_functions_5 ?>" size="10">
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
<fieldset><legend><?php echo $Alliance_functions_6 ?></legend>
<input type="submit" name="t3" value="<?php echo $Alliance_functions_13 ?>"/>
</fieldset>
<fieldset><legend><?php echo $Alliance_functions_7 ?></legend>
<input type="text" name="reason" placeholder="<?php echo $Reason_1 ?>" size="10">
<input type="submit" name="t3" value="<?php echo $Alliance_functions_14 ?>"/>
</fieldset>
<fieldset><legend><?php echo $Alliance_functions_8 ?></legend>
<input type="text" name="allnickname" placeholder="<?php echo $Alliance_functions_9 ?>" maxlength="3" size="9">
<input type="submit" name="t3" value="<?php echo $Alliance_functions_15 ?>"/>
</fieldset>
<fieldset><legend><?php echo $Alliance_functions_10 ?></legend>
<input type="text" name="allname" placeholder="<?php echo $Alliance_functions_11 ?>" maxlength="12" size="9">
<input type="submit" name="t3" value="<?php echo $Alliance_functions_16 ?>"/>
</fieldset>
<fieldset><legend><?php echo $Alliance_functions_12 ?></legend>
<input type="text" name="title" size="15" placeholder="<?php echo $mail_7 ?>">
<p>
<label><?php echo $mail_8 ?></label>
<p>
<textarea name="content" cols="60" rows="10"></textarea>
<p>
<input type="submit" name="t3" value="<?php echo $Alliance_functions_17 ?>"/>

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