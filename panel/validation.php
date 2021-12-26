<?php
include '../function/connect.php';
		if(isset($_POST['phone']))
			{
				$test=preg_match('/^(((\+|00)98)|0)?9[123]\d{8}$/',$_POST['phone']);
				if($test==false)
					{
						echo "شماره تلفن معتبر نیست ";
					}
			}
		if(isset($_POST['melli']))
			{
				$test=preg_match('/^[0-9]{10,10}$/',$_POST['melli']);
				if($test==false)
					{
						echo " شماره ملی معتبر نیست باید شامل اعداد و به طول 10 باشد";
					}

			}
		if(isset($_POST['yearnashr']))
			{
				$test=preg_match('/^[0-9]{4,4}$/',$_POST['yearnashr']);
				if($test==false)
					{
						echo " سال نشر معتبر نیست باید شامل اعداد و به طول 4 باشد";
					}
			}
		if(isset($_POST['bookcount']))
			{
				$test=preg_match('/^[0-9]{1,4}$/',$_POST['bookcount']);
				if($test==false)
					{
						echo " تعداد معتبر نیست باید شامل اعداد و به طول 4 باشد";
					}
			}
		if(isset($_POST['address']))
		    {
				$test=preg_match('/^[پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژؤإأءًٌٍَُِّ\s\n\r\t\d\(\)\[\]\{\}-]+$/',$_POST['address']);
				if($test==false)
					{
						echo "فقط حروف فارسی معتبر است";
					}
		    }
		if(isset($_POST['usercode']))
			{
				$query_select="select * from `library`.`users` where user_code='".$_POST['usercode']."'";
				$result_select=$connect->query($query_select);
				$row=$result_select->fetch();
				if($row)
				{
					echo $row['user_name'];
				}
				else
				{
					echo 'کاربری با این مشخصات وجود ندارد';
				}
			}
?>