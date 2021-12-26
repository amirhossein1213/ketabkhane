<?php
session_start();
	include '../function/connect.php';
	include '../function/jdf.php';
	$day_number = jdate('j');
	$month_number = jdate('F');
	$year_number = jdate('Y');
	$day_name = jdate('l');
	$year_expire=jdate('Y','','','','en');
	$month_expire=jdate('n','','','','en');
 	$day_expire=jdate('j','','','','en');
	$query="update admin set `Admin_lastlogin`='".$day_number.$month_number.$year_number."'";
	$res=$connect->query($query);
	$_SESSION['admin-login-enabled']=0;
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
	header("location:login.php");
	exit;
?>