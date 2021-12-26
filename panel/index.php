<?php
session_start();
include '../function/jdf.php';
$day_number = jdate('j');
$month_number = jdate('F');
$year_number = jdate('Y');
$day_name = jdate('l');
if($_SESSION['admin-login-enabled']==1)
{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>سیستم کتابخانه | پنل اصلی</title>
<script src="../script/jquery-1.11.1.min.js"></script>
<script src="../script/script.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../style/style.css">

</head>
<body>
<div class="main">
<?php include '../function/top-menu.php'; ?>
    <div class="main-content">
<?php include '../function/right-menu.php'; ?>
        <div class="main-content-left">
        <div class="main-content-left-content">
        <ul>
        <li><div class="main-content-left-content-box"><a rel="tooltip" href="" target="_blank" title="در این جا می تونید خرید و فروش های خود را مدیریت کنید "><p>ثبت کاربر </p><img src="../image/080855-glossy-black-icon-business-pencil4.png"></a></div></li>
        <li><div class="main-content-left-content-box"><a rel="tooltip" href="" target="_blank" title="در این جا لیست کارکنان را می تونید مشاهده کنید و تنظیمات مربوطه را انجام دهید "><p>مشاهده کاربران </p><img src="../image/033340-rounded-glossy-black-icon-culture-books3-stacked.png"></a></div></li>
        <li><div class="main-content-left-content-box"><a rel="tooltip" href="" target="_blank" title="در این جا می تونید سفارشات را ثبت و ویرایش نمایید"><p>امانت دادن کتاب </p><img src="../image/icons8-refund-40.png"></a></div></li>
        <li><div class="main-content-left-content-box"><a rel="tooltip" href="" target="_blank" title="در این جا لیست محصولات موجود را می تونید مشاهده کنید"><p>ثبت کتاب جدید</p><img src="../image/Optimization-icon.png"></a></div></li>
                <li><div class="main-content-left-content-box"><a rel="tooltip" href="" target="_blank" title="در این جا لیست محصولات موجود را می تونید مشاهده کنید"><p>ثبت دسته کتاب </p><img src="../image/cat.png"></a></div></li>
        <li><div class="main-content-left-content-box"><a href="" target="_blank" rel="tooltip" title="در این جا می تونید یادداشت  جدیدی را ثبت و یادداشت های قبلی را مشاهده کنید "><p>امانت داده شده ها</p><img src="../image/Optimization-icon.png"></a></div></li>
        <li><div class="main-content-left-content-box"><a href="" target="_blank" rel="tooltip" title="در این جا می تونید تنظیمات مربوط به پنل را انجام دهید مانند تغییر گذرواژه "><p>تنظیمات</p><img src="../image/Optimization-icon.png"></a></div></li>
        </ul>
        </div>
        </div><!--main-content-left-->
    </div><!--main-content-->
</div><!--main-->
</body>
</html>
<?php
}
else
{
	header("location:login.php");
	exit;
}
?>