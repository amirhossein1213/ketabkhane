<?php
session_start();
 include '../function/connect.php';
 include '../function/jdf.php';
 $year_expire=jdate('Y','','','','en');
 $month_expire=jdate('n','','','','en');
 $day_expire=jdate('j','','','','en');
 if(isset($_POST['btn']))
 {
	 if(!empty($_POST['username']) & !empty($_POST['password']))
	 {
		 $username=$_POST['username'];
		 $password=$_POST['password'];
$query="select * from admin where Admin_username=? && Admin_password=?";
$result=$connect->prepare($query);
$result->bindValue(1,$username);
$result->bindValue(2,$password);
$result->execute();
$num=$result->fetch();
if($num==true)
{
	if(isset($_POST['remember']))
	{
	setcookie("username",$num['Admin_username'],time()+(86400*8));
	setcookie("password",$num['Admin_password'],time()+(86400*8));
	}
	$_SESSION['admin-login-enabled']=1;
	$_SESSION['username']=$num['Admin_username'];
	$_SESSION['pic']=$num['Admin_pic'];
	$_SESSION['lastlogin']=$num['Admin_lastlogin'];
	$_SESSION['name']=$num['Admin_name'].' &nbsp; '.$num['Admin_family'];
	//calculate user_expire
	$query_select_expire_user="select * from `library`.`users`";
	$result_select_expire_user=$connect->query($query_select_expire_user);
	while($row=$result_select_expire_user->fetch(PDO::FETCH_ASSOC))
		{
			if($row['user_expire_year']==$year_expire & $row['user_expire_month']==$month_expire & $row['user_expire_day']==$day_expire)
				{
					$query_update="UPDATE `library`.`users` SET `user_state` = '0' where `user_code`='".$row['user_code']."'";
					$result_update=$connect->query($query_update);
				}
		}
	//calculate amanat expire
	$query_select_expire_book="select * from `library`.`amanat` where `amanat_state`=1";
	$result_select_expire_book=$connect->query($query_select_expire_book);
	while($row_book=$result_select_expire_book->fetch(PDO::FETCH_ASSOC))
		{
			if($year_expire > $row_book['amanat_expire_year'] || $month_expire > $row_book['amanat_expire_month'] || $day_expire > $row_book['amanat_expire_day'])
				{
					$year_count=$year_expire - $row_book['amanat_expire_year'];
					$year_price=$year_count * 12 * 30 * 200;
					$month_count=$month_expire - $row_book['amanat_expire_month'];
					$month_price=$month_count * 30 * 200;
					if($day_expire > $row_book['amanat_expire_day'])
						{
							$day_count=$day_expire - $row_book['amanat_expire_day'];
							$day_price=$day_count * 200;
							$all_price=$year_price + $month_price + $day_price;
						}
					else if($day_expire == $row_book['amanat_expire_day'])
						{
							$all_price=$year_price + $month_price;
						}
					else
						{
							$day_count=$row_book['amanat_expire_day'] - $day_expire;
							$day_price=$day_count * 200;
							$all_price=($year_price + $month_price) - $day_price;
						}
					$query_update_bedehi="UPDATE `library`.`amanat` SET `amanat_bedehi` ='".$all_price."' where `amanat_user_code`='".$row_book['amanat_user_code']."'";
					$result_update_bedehi=$connect->query($query_update_bedehi);
				}
				else
				{
					$query_update_bedehi="UPDATE `library`.`amanat` SET `amanat_bedehi` =0 where `amanat_user_code`='".$row_book['amanat_user_code']."'";
					$result_update_bedehi=$connect->query($query_update_bedehi);
				}
		}
	header("location:index.php");
	exit();
}
else
{
	$message="کاربری با این مشخصات پیدا نشد";
}
	 }
 }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ورود به پنل</title>
<script src="../script/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../style/login-style.css">
<style>
@font-face
{
	font-family:"arab";
	src:url(../font/BYekan.ttf);	
}
body
{
	background:#BFBFBF;
}
.main
{
	width:400px;
	height:420px;
	margin:auto;
	margin-top:100px;	
	font:18px arab;
	background:#E8E8E8;
	direction:rtl;
}
.main-form
{
	width:400px;
	height:170px;
	background:#FFFFFF;
	box-shadow:0px 0px 3px #3A3636;
	float:right;
	padding-top:30px;
}
.re
{
	float:right;
	font:13px arab;
	width:180px;
	margin-top:80px;
	margin-right:-50px;
}
.re [type=checkbox]
{
	float:right;
	font:12px arab;
	margin-top:3px;
}
.username
{
	margin:10px 20px;
	float:right;
}
.username [type=text]
{
	width:200px;
	height:25px;
	border:1px solid #000000;
	text-indent:20px;
	margin-right:30px;
	box-shadow:0px 0px 6px #000000;
	font:19px arab;
}
.password [type=password]
{
	width:200px;
	height:25px;
	border:1px solid #000000;
	text-indent:20px;
	margin-right:40px;
	box-shadow:0px 0px 6px #000000;
	font:19px arab;
}
.password
{
	margin:10px 20px;
	float:right;
}
.button
{
	margin:20px 60px;
	float:right;
}
.button [type=submit]
{
	width:80px;
	height:30px;
	border:1px solid #000000;
	font:17px arab;
	background-color:#64A3B9;
}
.button label
{
	font:17px arab;
	text-shadow:0px 0px 1px #F9060A;
	margin-right:10px;
}
.info
{
	width:100%;
	height:90px;
	margin-bottom:50px;
}
.info img
{
	float:right;
	margin-left:30px;
	margin-right:10px;
	margin-top:10px;
}
.info p
{
	float:right;
	font:22px arab;
	margin-top:40px;
}
.buttom
{
	width:100%;
	height:auto;
	margin-top:270px;
}
.buttom-right
{
	width:50%;
	height:60px;
	float:right;
}
.buttom-right [type=checkbox]
{
	float:right;
	margin-top:25px;
}
.buttom-right p
{
	float:right;
	font:21px arab;
	margin-right:5px;
}
.buttom-left
{
	width:90%;
	height:60px;
	float:left;
	margin-top:-20px;
}
.buttom-left p
{
	float:left;
	font:13px arab;
	margin-right:145px;
	margin-left:30px;
	margin-top:28px;
}
</style>
</head>
<body>
<div class="main" align="center">
<div class="info">
<img src="../image/Frank_Twin_Lakes_Library_System.png" width="80px" height="80px">
<p> سیستم مدیریت کتابخانه </p>
</div>
<form action="" method="post">
<div class="main-form">
<div class="username">
<label> نام کاربری :</label>
<input type="text" name="username" placeholder="نام کاربری " id="username" value="<?php echo @$_COOKIE['username'] ?>"><br>
</div>
<div class="password">
<label>گذرواژه :</label>
<input type="password" name="password" type="" placeholder="گذرواژه" id="password" value="<?php echo @$_COOKIE['username'] ?>" >
</div>
<div class="button">
<input type="submit" name="btn" value="ورود" id="btn" >
<label id="message"><?php echo @$message;?></label>
<div class="re"><input type="checkbox" name="remember"><p>مرا به یاد داشته باش ؟ (8 روز)</p></div>
</div>
</div>
</form>
</body>
</html>