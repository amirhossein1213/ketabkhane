    <div class="main-content-right">
    <div class="main-content-right-info">
    <div class="holder">
	<div class="bullet"></div>
	<div class="line_one"></div>
	<div class="line_two"></div>
	<div class="pholder_one"></div>	
	<input type="checkbox" class="openercheck"></input>	
	<div class="cholder">
		<ul>
        <li><?php echo $_SESSION['name'];?><img width="40px" style="float:right; margin-left:10px; border-radius:5px;" height="40px" src="<?php echo $_SESSION['pic']; ?>" /></li>
        <li>آخرين ورود شما: <?php echo $_SESSION['lastlogin']; ?></li>
        <li ><div id="clock1">ساعت : 15:20:30</div></li>
        </ul>
	</div>
	<div class="opener"></div>
	<div class="pholder_two"></div>
	<div class="open_line"></div>	
</div>
        </div><!--main-content-right-info-->
        <div class="main-content-right-menu-buttom">
        <ul>
        <li><a href="../panel/index.php" target="_blank"> صفحه اصلی </a></li>
        <li><a href="../panel/user_register.php" target="_blank"> ثبت کاربر جدید </a></li>
        <li><a href="../panel/book_register.php" target="_blank"> ثبت کتاب جدید </a></li>
        <li><a href="../panel/setting.php" target="_blank"> تغییر گذرواژه </a></li>
        <li><a href="../panel/logout.php"> خروج </a></li>
        </ul>
        </div><!--main-content-right-menu-buttom-->
        <div class="main-content-right-writer-buttom">
        	<img src="../image/Frank_Twin_Lakes_Library_System.png" style="width:60px; height:60px; margin:auto;margin-left:100px; float:left; margin-top:-20px;">
            <p style="margin-top:50px; font:19px BYekan;text-align:center;"> کلیه حقوق نرم افزار برای<br><font color="#FFFFFF"> کتابخانه  </font> محفوظ می باشد</p>
        </div>
        </div><!--main-content-right-->
