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
			if ($_POST['db']=ctwdb1) {
				$serverid='1';
				$servername='Kingdom1';
				} elseif ($_POST['db']=cokdb2) {
				$serverid='2';
				$servername='Kingdom2';
			}
			header("content-type:text/html; charset=utf-8");
			if($_POST[name]!=''){
				$sql="SELECT uid FROM userprofile WHERE `name` = '$_POST[name]'";
				$result=mysql_query($sql);
				if($result&&mysql_num_rows($result)>0){
					$uid = mysql_fetch_array($result)[0];
					$time=time(). '000';
					$value = $_POST[value];
					switch($_POST[update]){
						case ''.$players_function_20.'':{
							if($_POST[functionType]=="gold"){
								mysql_query("UPDATE userprofile SET gold=gold+'$value' WHERE uid = '$uid'") or die(mysql_error());
							}
							else if($_POST[functionType]=="lord-level"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								mysql_query("UPDATE userprofile SET level='$value' WHERE uid = '$uid'") or die(mysql_error());
								}
							else if($_POST[functionType]=="ptroops"){
								if(empty($value) || $value < 0 || $value > 50)
									die('ERROR, VALUE MUST BE IN RANGE 1-50');
								mysql_query("UPDATE user_army SET level='$value' WHERE uid = '$uid'") or die(mysql_error());
							}
							else if($_POST[functionType]=="hero-level"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								mysql_query("UPDATE new_general SET level='$value' WHERE uid = '$uid'") or die(mysql_error());
							}
							else if($_POST[functionType]=="archangel"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$b=bin2hex("equip,10010105,$value|equip,10010115,$value|equip,10010125,$value|equip,10010135,$value|equip,10010145,$value|equip,10010155,$value");
								mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$uid', 'ARCHANGEL SET', 0x$b, '13', '$time', '0')") or die(mysql_error());
							}
							else if($_POST[functionType]=="archangel1"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$b=bin2hex("equip,20010105,$value|equip,20010115,$value|equip,20010125,$value|equip,20010135,$value|equip,20010145,$value|equip,20010155,$value");
								mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$uid', 'ARCHANGEL SET', 0x$b, '13', '$time', '0')") or die(mysql_error());
							}
							else if($_POST[functionType]=="archangel2"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$b=bin2hex("equip,21010105,$value|equip,21010115,$value|equip,21010125,$value|equip,21010135,$value|equip,21010145,$value|equip,21010155,$value");
								mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$uid', 'ARCHANGEL SET', 0x$b, '13', '$time', '0')") or die(mysql_error());
								}
							else if($_POST[functionType]=="items"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$b=bin2hex("goods,200366,100000|goods,200456,100|goods,200084,100|goods,200093,100|goods,200089,100|goods,200090,100|goods,200091,100|goods,200033,100|goods,200002,1000|goods,200001,1000|goods,200008,1000|goods,200629,100|goods,200020,100000|goods,200098,10");
								mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$uid', 'ARCHANGEL SET', 0x$b, '13', '$time', '0')") or die(mysql_error());
							}
							else if($_POST[functionType]=="archangel3"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$b=bin2hex("equip,22010105,$value|equip,22010115,$value|equip,22010125,$value|equip,22010135,$value|equip,22010145,$value|equip,22010155,$value");
								mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$uid', 'ARCHANGEL SET', 0x$b, '13', '$time', '0')") or die(mysql_error());
							}
							else if($_POST[functionType]=="archangel4"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$b=bin2hex("equip,23010105,$value|equip,23010115,$value|equip,23010125,$value|equip,23010135,$value|equip,23010145,$value|equip,23010155,$value");
								mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$uid', 'ARCHANGEL SET', 0x$b, '13', '$time', '0')") or die(mysql_error());
							}
							else if($_POST[functionType]=="emperor"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$b=bin2hex("equip,10010203,$value|equip,10010213,$value|equip,10010223,$value|equip,10010233,$value|equip,10010243,$value|equip,10010253,$value");
								mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$uid', 'EMPEROR SET', 0x$b, '13', '$time', '0')") or die(mysql_error());	
							}
							else if($_POST[functionType]=="emperor1"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$b=bin2hex("equip,10011555,$value|equip,10011545,$value|equip,10011535,$value|equip,10011525,$value|equip,10011515,$value|equip,10011505,$value");
								mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$uid', 'EMPEROR SET', 0x$b, '13', '$time', '0')") or die(mysql_error());	
							}
							else if($_POST[functionType]=="emperor12"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$b=bin2hex("equip,12005155,$value|equip,12005055,$value|equip,12004955,$value|equip,12004845,$value|equip,12004745,$value|equip,12004645,$value|equip,12004535,$value|equip,12004435,$value|equip,12004335,$value|equip,12004215,$value|equip,12004115,$value|equip,12004015,$value|equip,12003925,$value|equip,12003825,$value|equip,12003725,$value|equip,12003605,$value|equip,12003505,$value|equip,12003405,$value|equip,12003305,$value|equip,12003205,$value|equip,12003105,$value");
								mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$uid', 'EMPEROR SET', 0x$b, '13', '$time', '0')") or die(mysql_error());	
							}
							else if($_POST[functionType]=="queen"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$b=bin2hex("equip,10000805,$value|equip,10000815,$value|equip,10000825,$value|equip,10000835,$value|equip,10000845,$value|equip,10000855,$value");
								mysql_query("INSERT INTO mail (uid,toUser,title,rewardId,type,createTime,reply) VALUES (md5($time), '$uid', 'QUEEN SET', 0x$b, '13', '$time', '0')") or die(mysql_error());
							}
							else if($_POST[functionType]=="science"){
								mysql_query("DELETE FROM user_science WHERE uid='$uid'") or die(mysql_error());
								mysql_query("INSERT INTO user_science VALUES ('$uid','700100',5,9223372036854775807),('$uid','700200',5,9223372036854775807),('$uid','700300',5,9223372036854775807),('$uid','700400',15,9223372036854775807),('$uid','700500',15,9223372036854775807),('$uid','700600',5,9223372036854775807),('$uid','700700',15,9223372036854775807),('$uid','700800',5,9223372036854775807),('$uid','700900',15,9223372036854775807),('$uid','701000',5,9223372036854775807),('$uid','701200',15,9223372036854775807),('$uid','701300',15,9223372036854775807),('$uid','701400',10,9223372036854775807),('$uid','701500',15,9223372036854775807),('$uid','701600',15,9223372036854775807),('$uid','701700',15,9223372036854775807),('$uid','701800',15,9223372036854775807),('$uid','701900',15,9223372036854775807),('$uid','702000',15,9223372036854775807),('$uid','702100',10,9223372036854775807),('$uid','702200',5,9223372036854775807),('$uid','702300',5,9223372036854775807),('$uid','702400',5,9223372036854775807),('$uid','702500',15,9223372036854775807),('$uid','702600',15,9223372036854775807),('$uid','702700',1,9223372036854775807),('$uid','702800',15,9223372036854775807),('$uid','702900',5,9223372036854775807),('$uid','703000',15,9223372036854775807),('$uid','703100',5,9223372036854775807),('$uid','710000',10,9223372036854775807),('$uid','710300',10,9223372036854775807),('$uid','710400',5,9223372036854775807),('$uid','710500',10,9223372036854775807),('$uid','710600',10,9223372036854775807),('$uid','710700',15,9223372036854775807),('$uid','711000',15,9223372036854775807),('$uid','711100',15,9223372036854775807),('$uid','711200',15,9223372036854775807),('$uid','711300',15,9223372036854775807),('$uid','711400',5,9223372036854775807),('$uid','711500',5,9223372036854775807),('$uid','711600',10,9223372036854775807),('$uid','711700',10,9223372036854775807),('$uid','711800',15,9223372036854775807),('$uid','711900',10,9223372036854775807),('$uid','712000',10,9223372036854775807),('$uid','712100',15,9223372036854775807),('$uid','712200',15,9223372036854775807),('$uid','712300',15,9223372036854775807),('$uid','720000',10,9223372036854775807),('$uid','720100',5,9223372036854775807),('$uid','720200',5,9223372036854775807),('$uid','720300',5,9223372036854775807),('$uid','720400',10,9223372036854775807),('$uid','720500',5,9223372036854775807),('$uid','720600',5,9223372036854775807),('$uid','720700',5,9223372036854775807),('$uid','720800',10,9223372036854775807),('$uid','720900',10,9223372036854775807),('$uid','721000',15,9223372036854775807),('$uid','721100',10,9223372036854775807),('$uid','721200',10,9223372036854775807),('$uid','721400',20,9223372036854775807),('$uid','721500',10,9223372036854775807),('$uid','721600',10,9223372036854775807),('$uid','721700',10,9223372036854775807),('$uid','721800',20,9223372036854775807),('$uid','721900',15,9223372036854775807),('$uid','722000',5,9223372036854775807),('$uid','722100',5,9223372036854775807),('$uid','722200',10,9223372036854775807),('$uid','722300',20,9223372036854775807),('$uid','722400',10,9223372036854775807),('$uid','722500',10,9223372036854775807),('$uid','722600',20,9223372036854775807),('$uid','730000',10,9223372036854775807),('$uid','730100',3,9223372036854775807),('$uid','730200',3,9223372036854775807),('$uid','730300',3,9223372036854775807),('$uid','730400',3,9223372036854775807),('$uid','730500',10,9223372036854775807),('$uid','730600',3,9223372036854775807),('$uid','730700',3,9223372036854775807),('$uid','730800',3,9223372036854775807),('$uid','730900',3,9223372036854775807),('$uid','731000',1,9223372036854775807),('$uid','731100',3,9223372036854775807),('$uid','731200',3,9223372036854775807),('$uid','731300',3,9223372036854775807),('$uid','731400',3,9223372036854775807),('$uid','731500',3,9223372036854775807),('$uid','731600',1,9223372036854775807),('$uid','731700',5,9223372036854775807),('$uid','731800',5,9223372036854775807),('$uid','731900',5,9223372036854775807),('$uid','732000',5,9223372036854775807),('$uid','732100',15,9223372036854775807),('$uid','732200',5,9223372036854775807),('$uid','732300',5,9223372036854775807),('$uid','732400',5,9223372036854775807),('$uid','732500',5,9223372036854775807),('$uid','732600',15,9223372036854775807),('$uid','732700',5,9223372036854775807),('$uid','732800',5,9223372036854775807),('$uid','732900',5,9223372036854775807),('$uid','733000',5,9223372036854775807),('$uid','733100',5,9223372036854775807),('$uid','733200',1,9223372036854775807),('$uid','733300',7,9223372036854775807),('$uid','733400',7,9223372036854775807),('$uid','733500',7,9223372036854775807),('$uid','733600',7,9223372036854775807),('$uid','733700',20,9223372036854775807),('$uid','733800',7,9223372036854775807),('$uid','733900',7,9223372036854775807),('$uid','734000',7,9223372036854775807),('$uid','734100',7,9223372036854775807),('$uid','734200',20,9223372036854775807),('$uid','734300',7,9223372036854775807),('$uid','734400',7,9223372036854775807),('$uid','734500',7,9223372036854775807),('$uid','734600',7,9223372036854775807),('$uid','734700',7,9223372036854775807),('$uid','734800',7,9223372036854775807),('$uid','734900',7,9223372036854775807),('$uid','735000',7,9223372036854775807),('$uid','735100',7,9223372036854775807),('$uid','735200',20,9223372036854775807),('$uid','735300',7,9223372036854775807),('$uid','735400',7,9223372036854775807),('$uid','735500',7,9223372036854775807),('$uid','735600',7,9223372036854775807),('$uid','735700',20,9223372036854775807),('$uid','735800',7,9223372036854775807),('$uid','735900',7,9223372036854775807),('$uid','736000',7,9223372036854775807),('$uid','736100',7,9223372036854775807),('$uid','736200',7,9223372036854775807),('$uid','736300',7,9223372036854775807),('$uid','736400',7,9223372036854775807),('$uid','736500',7,9223372036854775807),('$uid','736600',7,9223372036854775807),('$uid','736700',20,9223372036854775807),('$uid','736800',7,9223372036854775807),('$uid','736900',7,9223372036854775807),('$uid','737000',7,9223372036854775807),('$uid','737100',7,9223372036854775807),('$uid','737200',20,9223372036854775807),('$uid','737300',7,9223372036854775807),('$uid','737400',7,9223372036854775807),('$uid','737500',7,9223372036854775807),('$uid','737600',7,9223372036854775807),('$uid','737700',7,9223372036854775807),('$uid','750100',10,9223372036854775807),('$uid','750200',10,9223372036854775807),('$uid','750300',5,9223372036854775807),('$uid','750400',5,9223372036854775807),('$uid','750500',5,9223372036854775807),('$uid','750600',5,9223372036854775807),('$uid','750700',5,9223372036854775807),('$uid','750800',5,9223372036854775807),('$uid','750900',5,9223372036854775807),('$uid','751000',10,9223372036854775807),('$uid','751100',10,9223372036854775807),('$uid','751200',5,9223372036854775807),('$uid','751300',5,9223372036854775807),('$uid','751400',5,9223372036854775807),('$uid','751500',5,9223372036854775807),('$uid','751600',5,9223372036854775807),('$uid','751700',5,9223372036854775807),('$uid','751800',5,9223372036854775807),('$uid','751900',5,9223372036854775807),('$uid','760000',10,9223372036854775807),('$uid','760100',10,9223372036854775807),('$uid','760200',10,9223372036854775807),('$uid','760300',10,9223372036854775807),('$uid','760400',10,9223372036854775807),('$uid','760500',10,9223372036854775807),('$uid','760600',10,9223372036854775807),('$uid','760700',10,9223372036854775807),('$uid','760800',10,9223372036854775807),('$uid','760900',10,9223372036854775807),('$uid','761000',10,9223372036854775807),('$uid','761100',10,9223372036854775807),('$uid','761200',10,9223372036854775807),('$uid','761300',10,9223372036854775807),('$uid','761400',5,9223372036854775807),('$uid','761500',10,9223372036854775807),('$uid','761600',10,9223372036854775807),('$uid','761700',10,9223372036854775807),('$uid','761800',10,9223372036854775807),('$uid','761900',10,9223372036854775807),('$uid','762000',10,9223372036854775807),('$uid','762100',10,9223372036854775807),('$uid','762200',1,9223372036854775807),('$uid','762300',10,9223372036854775807),('$uid','762400',10,9223372036854775807),('$uid','762500',10,9223372036854775807),('$uid','762600',5,9223372036854775807),('$uid','762700',7,9223372036854775807),('$uid','762800',7,9223372036854775807),('$uid','762900',7,9223372036854775807),('$uid','763000',7,9223372036854775807),('$uid','763100',7,9223372036854775807),('$uid','763200',7,9223372036854775807),('$uid','763300',7,9223372036854775807),('$uid','763400',3,9223372036854775807),('$uid','763500',7,9223372036854775807),('$uid','763600',7,9223372036854775807),('$uid','763700',3,9223372036854775807),('$uid','763800',7,9223372036854775807),('$uid','763900',7,9223372036854775807),('$uid','764000',7,9223372036854775807),('$uid','764100',7,9223372036854775807),('$uid','764200',7,9223372036854775807),('$uid','764300',7,9223372036854775807),('$uid','764400',7,9223372036854775807),('$uid','764500',3,9223372036854775807),('$uid','764600',7,9223372036854775807),('$uid','764700',7,9223372036854775807),('$uid','764800',3,9223372036854775807),('$uid','770100',10,9223372036854775807),('$uid','770200',10,9223372036854775807),('$uid','770300',10,9223372036854775807),('$uid','770400',4,9223372036854775807),('$uid','770500',3,9223372036854775807),('$uid','770600',3,9223372036854775807),('$uid','770700',3,9223372036854775807),('$uid','770800',3,9223372036854775807),('$uid','770900',10,9223372036854775807),('$uid','771000',10,9223372036854775807),('$uid','771100',10,9223372036854775807),('$uid','771200',3,9223372036854775807),('$uid','771300',3,9223372036854775807),('$uid','771400',3,9223372036854775807),('$uid','771500',3,9223372036854775807),('$uid','771600',3,9223372036854775807),('$uid','771700',3,9223372036854775807),('$uid','771800',3,9223372036854775807),('$uid','771900',3,9223372036854775807),('$uid','772000',3,9223372036854775807),('$uid','772100',3,9223372036854775807),('$uid','772200',10,9223372036854775807),('$uid','772300',10,9223372036854775807),('$uid','772400',10,9223372036854775807),('$uid','772500',10,9223372036854775807),('$uid','780100',5,9223372036854775807),('$uid','780200',5,9223372036854775807),('$uid','780300',5,9223372036854775807),('$uid','780400',5,9223372036854775807),('$uid','780500',5,9223372036854775807),('$uid','780600',5,9223372036854775807),('$uid','780700',5,9223372036854775807),('$uid','780800',5,9223372036854775807),('$uid','780900',5,9223372036854775807),('$uid','781000',5,9223372036854775807),('$uid','781100',5,9223372036854775807),('$uid','781200',5,9223372036854775807),('$uid','781300',5,9223372036854775807),('$uid','781400',5,9223372036854775807),('$uid','781500',5,9223372036854775807),('$uid','781600',5,9223372036854775807),('$uid','781700',5,9223372036854775807),('$uid','781800',5,9223372036854775807),('$uid','781900',5,9223372036854775807),('$uid','782000',5,9223372036854775807),('$uid','782100',3,9223372036854775807),('$uid','782200',5,9223372036854775807),('$uid','782300',5,9223372036854775807),('$uid','782400',5,9223372036854775807),('$uid','782500',5,9223372036854775807),('$uid','782600',3,9223372036854775807),('$uid','782700',1,9223372036854775807),('$uid','782800',5,9223372036854775807),('$uid','782900',5,9223372036854775807),('$uid','783000',5,9223372036854775807),('$uid','783100',5,9223372036854775807),('$uid','783200',5,9223372036854775807),('$uid','783300',5,9223372036854775807),('$uid','783400',5,9223372036854775807),('$uid','783500',5,9223372036854775807),('$uid','783600',5,9223372036854775807),('$uid','783700',5,9223372036854775807),('$uid','783800',5,9223372036854775807),('$uid','783900',5,9223372036854775807),('$uid','784000',5,9223372036854775807),('$uid','784100',5,9223372036854775807),('$uid','784200',5,9223372036854775807),('$uid','784300',5,9223372036854775807),('$uid','784400',5,9223372036854775807),('$uid','784500',5,9223372036854775807),('$uid','784600',5,9223372036854775807),('$uid','784700',5,9223372036854775807),('$uid','784800',5,9223372036854775807),('$uid','784900',5,9223372036854775807),('$uid','785000',5,9223372036854775807),('$uid','785100',5,9223372036854775807),('$uid','785200',1,9223372036854775807),('$uid','790100',5,9223372036854775807),('$uid','790200',5,9223372036854775807),('$uid','790300',5,9223372036854775807),('$uid','790400',5,9223372036854775807),('$uid','790500',5,9223372036854775807),('$uid','790600',5,9223372036854775807),('$uid','790700',5,9223372036854775807),('$uid','790800',5,9223372036854775807),('$uid','790900',5,9223372036854775807),('$uid','791000',5,9223372036854775807),('$uid','791100',5,9223372036854775807),('$uid','791200',5,9223372036854775807),('$uid','791300',5,9223372036854775807),('$uid','791400',5,9223372036854775807),('$uid','791500',5,9223372036854775807),('$uid','791600',5,9223372036854775807),('$uid','791700',5,9223372036854775807),('$uid','791800',5,9223372036854775807),('$uid','791900',5,9223372036854775807),('$uid','792000',5,9223372036854775807),('$uid','792100',5,9223372036854775807),('$uid','792200',5,9223372036854775807),('$uid','795000',5,9223372036854775807),('$uid','796000',5,9223372036854775807),('$uid','797000',1,9223372036854775807),('$uid','798000',7,9223372036854775807),('$uid','799000',7,9223372036854775807),('$uid','800000',7,9223372036854775807),('$uid','801000',7,9223372036854775807),('$uid','802000',7,9223372036854775807),('$uid','803000',10,9223372036854775807),('$uid','804000',1,9223372036854775807),('$uid','806000',10,9223372036854775807),('$uid','807000',10,9223372036854775807),('$uid','808000',10,9223372036854775807),('$uid','809000',12,9223372036854775807),('$uid','810000',10,9223372036854775807),('$uid','811000',12,9223372036854775807),('$uid','812000',15,9223372036854775807),('$uid','813000',10,9223372036854775807),('$uid','814000',10,9223372036854775807),('$uid','815000',12,9223372036854775807),('$uid','816000',12,9223372036854775807),('$uid','817000',5,9223372036854775807),('$uid','818000',5,9223372036854775807),('$uid','819000',12,9223372036854775807),('$uid','820000',1,9223372036854775807),('$uid','821000',15,9223372036854775807),('$uid','822000',15,9223372036854775807),('$uid','823000',10,9223372036854775807),('$uid','824000',15,9223372036854775807),('$uid','825000',15,9223372036854775807),('$uid','826000',15,9223372036854775807),('$uid','827000',10,9223372036854775807),('$uid','828000',10,9223372036854775807),('$uid','829000',1,9223372036854775807)") or die(mysql_error());
							}
							else if($_POST[functionType]=="pray-level"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								mysql_query("UPDATE army_skill_info SET `level`='$value', exp='0' WHERE `uid`='$uid'") or die(mysql_error());
							}
							else if($_POST[functionType]=="prestige"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('ERROR, VALUE MUST BE IN RANGE 1-1000');
								$prestigeLevel = $value;
								$level = 30;
								mysql_query("UPDATE user_building SET progress = 0, updateTime = 0 WHERE uid = '$uid' AND (level < $level OR star < $prestigeLevel)");//Reset prestige stage and upgrate remaining time 	
								//Update valid buildings can have star. 	
								mysql_query("UPDATE user_building SET level = $level, star = $prestigeLevel WHERE (level < $level OR star < $prestigeLevel) AND itemId IN('400000', '401000', '402000', '403000', '404000', '407000', '410000', '410000', '410000', '410000', '410000', '410000', '410000', '410000', '411000', '411000', '411000', '411000', '411000', '411000', '411000', '411000', '413000', '415000', '417000', '418000', '418000', '419000', '422000', '423000', '424000', '425000', '426000', '427000', '428000') AND uid = '$uid'") or die(mysql_error());
								//Some buildings cannot have star. 
								mysql_query("UPDATE user_building SET level = $level, star = 0 WHERE (level < $level OR star > 0) AND itemId IN ('432000', '433000', '434000', '435000', '436000', '437000', '441000', '408000', '416000') AND uid='$uid'") or die(mysql_error());	
								//Special building (Dragon words?) need stay at level 1. 	
								mysql_query("UPDATE user_building SET level = 1, star = 0 WHERE itemId = 439000 AND uid='$uid'") or die(mysql_error());
							}
							else if($_POST[functionType]=="svip"){
								mysql_query("UPDATE user_vip SET `score`='300000', `level`='10', `sLevel`='10', `sPoint`='10000000', `shop_level`='6', `shop_exp`='10000000' WHERE  `uid`='$uid'") or die(mysql_error());
							}
							else if($_POST[functionType]=="resources"){
								if(empty($value) || $value < 0 || $value > 900000000000000) //Max in table is 900.000.000.000.000.000
									die('INVALID RANG, VALUE MUST BE IN 1-900T');
								mysql_query("UPDATE user_resource SET woodbind=woodbind + '$value', stonebind = stonebind +'$value', ironbind= ironbind +'$value', foodbind= foodbind + '$value' WHERE uid='$uid'") or die(mysql_error());
							}
							else if($_POST[functionType]=="crystal"){
								if(empty($value) || $value < 0)
									die('NO VALUE PROVIDED');
								mysql_query("UPDATE userprofile SET `crystal`= crystal +'$value' WHERE  `uid`='$uid'") or die(mysql_error());
							}
							else if($_POST[functionType]=="dragon-level"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('INVALID RANG, VALUE MUST BE IN 1-1000');
								mysql_query("UPDATE user_pet_dragon SET `lv`= '$value' WHERE  `uid`='$uid'") or die(mysql_error());
							}
							else if($_POST[functionType]=="dragon-skill-level"){
								if(empty($value) || $value < 0 || $value > 1000)
									die('INVALID RANG, VALUE MUST BE IN 1-1000');
								mysql_query("UPDATE user_pet_dragon_skill SET `level`= '$value' WHERE  `uid`='$uid'") or die(mysql_error());
							}
							else if($_POST[functionType]=="civilization"){
								if(empty($value) || $value < 0)
									die('NO VALUE PROVIDED');
								mysql_query("UPDATE userprofile SET `civilizationSorce`= civilizationSorce +'$value' WHERE  `uid`='$uid'") or die(mysql_error());
								mysql_query("UPDATE `user_civilization_prestige` SET `actionLimits`='',`prestigeValue`= `prestigeValue+'$value' WHERE  `uid`='$uid'") or die(mysql_error());
							}
							if(empty($value)){
								$value = 'No value provided.';
							}
							mysql_query("INSERT INTO console.gm_tools_log (uuid, user, action, to_user, username, value, time) VALUES (md5($time), '$_SESSION[user]', '$_POST[functionType]', '$uid', '$_POST[name]', '$value', '$time')") or die (mysql_error());
							echo '<script>alert("'.$successful.'");</script>';
							break;
						}
					}
				}else{echo '<script>alert("'.$Error_name.'");</script>';}
			}
		?>
		<title><?php echo $players_function_1 ?></title>
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
			input[type=number] {
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
		<div class="div1"><h1>Player Upgrade</h1></div><br/>
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
					<option value="cokdb2">2</option>
					<option value="cokdb3">3</option>
					</select>');
				}
			?><br/>
			
			<fieldset><legend>GM TOOLS</legend>
				<select name="functionType">
				    <option value="items">items</option>
					<option value="ptroops">ptroops</option>
					<option value="gold">GOLD</option>
					<option value="lord-level">LORD LEVEL</option>
					<option value="hero-level">HERO LEVEL</option>
					<option value="prestige">CASTLE PRESTIGE</option>
					<option value="science">UNIVERCITY SCIENCE</option>
					<option value="archangel">ARCHANGEL SET </option>
					<option value="archangel1">GM Equipment 35 </option>
					<option value="archangel2">GM Equipment 40 </option>
					<option value="archangel3">GM Equipment 45 </option>
					<option value="archangel4">GM Equipment 50 </option>
					<option value="emperor">EMPEROR SET 40</option>
					<option value="emperor1">EMPEROR SET 30</option>
					<option value="emperor12">EMPEROR SET 30</option>
					<option value="queen">QUEEN SET</option>
					<option value="svip">FULL SVIP</option>
					<option value="crystal">CRYSTAL</option>
					<option value="resource">RESOURCES</option>
					<option value="pray">PRAY LEVEL</option>
					<option value="civilization">CIVILIZATION</option>
					<option value="dragon-level">DRAGON LEVEL</option>
					<option value="dragon-skill-level">DRAGON SKILL LEVEL</option>
				</select>
				<input type="number" name="value" size="18" placeholder="<?php echo $mail_3 ?>">
				<input type="submit" name="update" value="<?php echo $players_function_20 ?>"/>
			</fieldset>
			
			<p>
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