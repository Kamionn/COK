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
if ($lang[0]=='EN') {
include '../includes/language/en.php';}
?>
<html>
	<head>
        <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<title><?php echo $html_title;?></title>
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


	</head>
	<body>
<div class="div1"><h1 style="margin: 0;"><?php echo $title;?></h1></div><br/>
<form method="post" action="" name="form2">
<fieldset>
    <legend><?php echo $hello . $name[0] ?></legend>
    <div style="text-align: center;">
        <input style="width: 150px; padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center; margin-right: 10px;" type="button" value="<?php echo $settings_title; ?>" onclick="window.location.href='settings.php'" />
        <input style="width: 150px; padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;" type="button" value="<?php echo $adminpanel_1; ?>" onclick="window.location.href='adminpanel.php'" />
    </div>
</fieldset>

<fieldset><legend>Mod Free</legend>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #6B8E23; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="Player Upgrade"onclick="window.location.href='tool.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #6B8E23; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="Equipement 55 Queen"onclick="window.location.href='skin16.php'"/><br>
<p>
<input id="dailyGiftButton" style="width: 150px; padding: 2.5px; pointer; font-weight: bold; background: #6B8E23; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;" type="button" value="Daily Gift" onclick="useDailyGift()"/><br>

<script>
function useDailyGift() {
    var lastUsed = getCookie('lastUsed');

    // Vérifier si le bouton a été utilisé dans les 24 dernières heures
    if (!lastUsed || (Date.now() - lastUsed > 24 * 60 * 60 * 1000)) {
        // Désactiver le bouton
        document.getElementById('dailyGiftButton').disabled = true;

        // Stocker le moment où le bouton a été utilisé dans les cookies
        setCookie('lastUsed', Date.now(), 1);

        // Définir le délai en millisecondes (24 heures dans cet exemple)
        var delay = 24 * 60 * 60 * 1000;

        // Rediriger vers la page associée après le délai
        setTimeout(function() {
            window.location.href = 'gift.php';
        }, delay);
    } else {
        alert("need Wait 24h now for use button");
    }
}

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return parseInt(c.substring(nameEQ.length, c.length));
    }
    return null;
}
</script>



</fieldset>

<fieldset><legend>Dont Touch</legend>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="Daily Gift Functions"onclick="window.location.href='gift.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="Alliance"onclick="window.location.href='alliance.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="Find user"onclick="window.location.href='find.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="Ptroopslords"onclick="window.location.href='ptroopslords.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="Prestige Castle"onclick="window.location.href='prestige.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="POİNT Function"onclick="window.location.href='point.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="GM Tools"onclick="window.location.href='gm-tools.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="player_total"onclick="window.location.href='players.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="Equipment gift"onclick="window.location.href='skin2.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="Equipment all Box"onclick="window.location.href='skin4.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items"onclick="window.location.href='skin1.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 1"onclick="window.location.href='skin3.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 2"onclick="window.location.href='skin5.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 3"onclick="window.location.href='skin6.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 4"onclick="window.location.href='skin7.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 5"onclick="window.location.href='skin8.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 6"onclick="window.location.href='skin9.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 7"onclick="window.location.href='skin10.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 8"onclick="window.location.href='skin11.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 9"onclick="window.location.href='skin12.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 10"onclick="window.location.href='skin13.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 11"onclick="window.location.href='skin14.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="All Mixed Items 12"onclick="window.location.href='skin15.php'"/><br>
<p>
<input style="width: 150px;  padding: 2.5px; pointer; font-weight: bold; background: #fff; color: #000; border-radius: 100px; border: 1px solid #999; font-size: 100%; text-align: center;"  type="button" value="<?php echo $mail_title;?>"onclick="window.location.href='mailer.php'"/><br>
<p>
<p>
<center>
<div class="container">
<p><strong>Downgrade power:</p>
<input type="button" id="button_pow_lv" onClick="user_pow_lv();" value="unban">
</fieldset>
</div>
        </div>
      </div>
    </div>
  </section>
</fieldset>

<p><a href="logout.php"><?php echo $logout_title;?></a><p>
	</body>



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
