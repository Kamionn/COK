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
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$dwID[0]', 'Thanks for playing in WestMod', 0x$b, '13', '$time', '1')")or die('2');
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
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$b1', '$value[0]', 'Thanks for playing in WestMod', 0x$b, '13', '$time', '1')")or die('2');
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
    $b=bin2hex('goods,211055,200000 |goods,200065,5000 |goods, 210208, 1|goods,204009,100|goods,204101,5000|goods,204102,5000|goods,204103,5000|goods,204104,5000|goods,204105,5000|goods,204106,5000|goods,204107,5000|goods,204108,5000|goods,204109,5000|goods,204110,5000|goods,204111,5000|goods,204112,5000|goods,204113,5000|goods,204114,5000|goods,204115,5000|goods,204116,5000|goods,204117,5000|goods,204118,5000|goods,204119,5000|goods,204120,5000|goods,204121,5000|goods,204122,5000|goods,204123,5000|goods,204124,5000 | goods,204500,10|goods,204501,10|goods,204502,10|goods,204503,10|goods,204504,10|goods,204505,10|goods,204506,10|goods,204507,10|goods,204508,10|goods,204509,10|goods,204510,10|goods,204511,10|goods,204512,10|goods,204513,10|goods,204514,10|goods,204515,10|goods,204516,10|goods,204517,10|goods,204518,10|goods,204519,10|goods,204520,10|goods,204521,10|goods,204522,10|goods,204523,10|goods,204524,10|goods,204525,10|goods,204526,10|goods,204527,10|goods,204528,10|goods,204529,10|goods,204530,10|goods,204531,10|goods,204532,10|goods,204533,10|goods,204534,10|goods,204535,10|goods,204536,10|goods,204537,10|goods,204538,10|goods,204539,10|goods,204540,10|goods,204541,10|goods,204542,10|goods,204543,10|goods,204544,10|goods,204545,10|goods,204546,10|goods,204547,10|goods,204548,10|goods,204549,10|goods,204550,10|goods,204551,10|goods,204552,10|goods,204553,10|goods,204554,10|goods,204555,10|goods,204556,10|goods,204557,10|goods,204558,10|goods,204559,10|goods,204560,10|goods,204561,10|goods,204562,10|goods,204563,10|goods,204564,10|goods,204565,10');
    mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time+100), '$dwID[0]', 'Daily Gifts WestMod', 0x$b, '13', '$time', '1')")or die('1');
		
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
    $b=bin2hex('goods,211055,200000 |goods,200065,5000 |goods, 210208, 1|goods,204009,100|goods,204101,5000|goods,204102,5000|goods,204103,5000|goods,204104,5000|goods,204105,5000|goods,204106,5000|goods,204107,5000|goods,204108,5000|goods,204109,5000|goods,204110,5000|goods,204111,5000|goods,204112,5000|goods,204113,5000|goods,204114,5000|goods,204115,5000|goods,204116,5000|goods,204117,5000|goods,204118,5000|goods,204119,5000|goods,204120,5000|goods,204121,5000|goods,204122,5000|goods,204123,5000|goods,204124,5000 | goods,204500,10|goods,204501,10|goods,204502,10|goods,204503,10|goods,204504,10|goods,204505,10|goods,204506,10|goods,204507,10|goods,204508,10|goods,204509,10|goods,204510,10|goods,204511,10|goods,204512,10|goods,204513,10|goods,204514,10|goods,204515,10|goods,204516,10|goods,204517,10|goods,204518,10|goods,204519,10|goods,204520,10|goods,204521,10|goods,204522,10|goods,204523,10|goods,204524,10|goods,204525,10|goods,204526,10|goods,204527,10|goods,204528,10|goods,204529,10|goods,204530,10|goods,204531,10|goods,204532,10|goods,204533,10|goods,204534,10|goods,204535,10|goods,204536,10|goods,204537,10|goods,204538,10|goods,204539,10|goods,204540,10|goods,204541,10|goods,204542,10|goods,204543,10|goods,204544,10|goods,204545,10|goods,204546,10|goods,204547,10|goods,204548,10|goods,204549,10|goods,204550,10|goods,204551,10|goods,204552,10|goods,204553,10|goods,204554,10|goods,204555,10|goods,204556,10|goods,204557,10|goods,204558,10|goods,204559,10|goods,204560,10|goods,204561,10|goods,204562,10|goods,204563,10|goods,204564,10|goods,204565,10');
mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES ('$enc', '$value[0]', 'DAİLY GİFTS WestMod', 0x$b, '13', '$time', '1')")or die('1');

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
<title><?php echo 'a' ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport">
<style>
          body {
            font-family: 'Arial', cursive;
            background-color: #e0e0e0; /* Fond un peu plus sombre */
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        header {
            background-color: #39e600;
            color: #fff;
            text-align: center;
            padding: 20px;
            width: 100%;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"],
        button {
            width: calc(100% - 20px);
            padding: 12px;
            background-color: #004080; /* Bleu mat */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 16px;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #00264d; /* Teinte plus sombre de bleu mat */
        }

        fieldset {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        legend {
            font-size: 18px;
            font-weight: bold;
        }
    </style>

<form method="post" action="" name="form2">
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
<legend>Options</legend>
            <select name="typeEquip">
                <option value="43">Daily Gifts</option>
                <option value="43">Daily Gifts (Gold, Stone, Badge)</option>
                <option value="43">Skin</option>
                <option value="43">Heros</option>

            </select>
            <input type="submit" name="t3" value="<?php echo $mail_11 ?>"/>
            <input type="submit" name="t3" value="<?php echo $mail_12 ?>"/>
        </fieldset>

        <button type="button" onclick="window.location.href='index.php'"><?php echo $go_back ?></button>
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