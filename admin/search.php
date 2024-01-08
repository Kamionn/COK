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
if($_POST[name]!=''){
$namee=Mysql_query("SELECT uid FROM userprofile WHERE `name` = '$_POST[name]'");
if($namee&&mysql_num_rows($namee)>0){
$uid = mysql_fetch_array($namee);
$time=time().'000';
$time1=time();
switch($_POST[t]){
case ''.$Search_functions_5.'':{
if($_POST[type]=="buildings"){
$sql="select itemid as buildingid,level as level,building_id.name from user_building inner join building_id on building_id.id = user_building.itemid  where user_building.uid=$uid[0] order by buildingid asc";
$res=mysql_query($sql);
$count=0;
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$Search_functions_logs_1','$Search_functions_logs_2','$name[0] searched for $_POST[name] buildings ',$time1,'$ip','$user_browser','$user_os')")or die('1');
echo "<center>";
echo"<table border='1' cellspaceing='0' cellpadding='0' height='100%' width='100%'>";
echo "<tr><td>#</td><td>$Search_functions_6</td><td><font color='blue'>$Search_functions_7</font></tr>";
while($row=mysql_fetch_assoc($res)){
	$count++;

echo "<tr><td>$count</td><td>{$row['name']}</td><td>{$row['level']}</td></tr>";
}
	}
else
if($_POST[type]=="items"){
$sql="select itemid as itemid,count as count,item_id.name from user_item inner join item_id on item_id.id = user_item.itemid  where user_item.ownerid=$uid[0] order by itemid asc";
$res=mysql_query($sql);
$count=0;
mysql_query("INSERT INTO logs (admin_name,admin_role,admin_id,user_name,user_id,function_1,function_2,details,time,IP,browser,os) VALUES ('$name[0]','admin',".$_SESSION[userid].",'$_POST[name]','$dwID[0]','$Search_functions_logs_1','$Search_functions_logs_3','$name[0] searched for $_POST[name] items ',$time1,'$ip','$user_browser','$user_os')")or die('1');
echo "<center>";
echo"<table border='1' cellspaceing='0' cellpadding='0' height='100%' width='100%'>";
echo "<tr><td>#</td><td>$Search_functions_8</td><td><font color='blue'>$Search_functions_9</font></tr>";
while($row=mysql_fetch_assoc($res)){
	$count++;
echo "<tr><td>$count</td><td>{$row['name']}</td><td>{$row['count']}</td></tr>";
}
	}
break;
}
}
}else{echo '<script>alert("Name was not found");</script>';}
}
?>
<html>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<head>
		<title><?php echo $Search_functions_1 ?></title>
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
	</head>
	<body>
	 <div class="div1"><h1><?php echo $Search_functions_1 ?></h1></div><br/>
<form method="post" action="" name="form2">
<fieldset>
<label><?php echo $enter_name ?></label>
<input type="text" name="name" value="<?=$_POST[name]?>" placeholder="<?php echo $name_1 ?>" size="10">
</br>
<label><?php echo $choose_kingdom ?></label><?php
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
</fieldset>
<p>
<fieldset><legend><?php echo $Search_functions_1 ?></legend>
<label><?php echo $Search_functions_4 ?></label>
<select name="type">
<option value="buildings"><?php echo $Search_functions_2 ?></option>
<option value="items"><?php echo $Search_functions_3 ?></option>


</select>
<input type="submit" name="t" value="<?php echo $Search_functions_5 ?>"/>
</fieldset>
<p>
<fieldset>
<p>
<input style="width: 200px;  padding: 2.5px; pointer; font-weight: bold; background: #00FF00; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="<?php echo $go_back ?>"onclick="window.location.href='index.php'"/><br>

</fieldset>

	</body>
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
