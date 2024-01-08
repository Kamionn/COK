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
include '../includes/language/en.php';}
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
?>
<?php

require 'database.php';
$message = '';

if(!empty($_POST['username']) && !empty($_POST['pw']) && !empty($_POST['role']) && !empty($_POST['email'])):
	
	// Enter the new user in the database
	$pw=MD5($_POST['pw']);
	$sql = "INSERT INTO users (username, password, password_text, role, emailid, phonenumber, kd, language) VALUES (:username, '$pw', :pw_text, :role, :email, :number, :kd, :language)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':username', $_POST['username']);
	$stmt->bindParam(':role', $_POST['role']);
	$stmt->bindParam(':kd', $_POST['kd']);
	$stmt->bindParam(':pw_text', $_POST['pw']);
	$stmt->bindParam(':language', $_POST['language']);
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':number', $_POST['number']);

	if( $stmt->execute() ):
		$message = 'Successfully added the user';
	else:
		$message = 'Sorry, Something went wrong!';
	endif;

endif;

?>

<!doctype html>
<html>
    <head>
        <title>Add a new user</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Welcome to WorldCUP event Registration-requests website.">
        <meta name="keywords" content="COK:SOE, COK MOD, COK, skins cok mod, clash of kings, devil, cok">
        <meta name="author" content="COK:SOE Inc.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
        
        <style>
            body{
	            margin:0px;
	            padding:0px;
	            font-family: 'Comfortaa', cursive;
	            text-align:center;
                }
                
                input[type="text"], input[type="email"]{
                	outline:none;
                	padding:10px;
                	display:block;
                	width:350px;
                	border-radius: 3px;
                	border:1px solid #eee;
                	margin:20px auto;
                }
                
                input[type="submit"]{
                	padding:10px;
                	color:#fff;
                	background:#0098cb;
                	width:350px;
                	margin:20px auto;
                	margin-top:0px;
                	border:0px;
                	border-radius: 3px;
                	cursor:pointer;
                }
                
                input[type="submit"]:hover{
                	background:#00b8eb;
                }
        </style>
        
    </head>
    <body>
        
        <?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	    <?php endif; ?>
	    
	    <form action="register.php" method="POST">
	        <h1>Add a new user</h1>
	 <input type="text" placeholder="Username" name="username" required>
		<input type="text" placeholder="password" name="pw" required>
<select name="role">
<option value="admin">admin</option>
</select required>
<select name="kd">
<option value="0">All kingdoms</option>
<option value="1">Kingdom 1</option>
<option value="2">Kingdom 2</option>
</select required>
<select name="language">
<option value="EN">English</option>
<option value="AR">Arabic</option>
</select required>
		<input type="text" placeholder="Email" name="email" required>
		<input type="text" placeholder="Number" name="number" required>
		<input type="submit" value="Finish">

		</form>
        
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
