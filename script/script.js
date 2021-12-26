// JavaScript Document
$(document).ready(function(e) {
	
	//clock show code ------------start
setInterval(clock,1000);
document.getElementById("clock1").innerHTML="ساعت : " + new Date().getHours() + ':' + new Date().getMinutes() + ':' + new Date().getSeconds();
function clock()
{
document.getElementById("clock1").innerHTML="ساعت : " + new Date().getHours() + ':' + new Date().getMinutes() + ':' + new Date().getSeconds();
}
	//clock show code ------------end
	
	
	//menue show code ------------start
	$("#showmenue").css("display","block");
	var click_count=0;
	$(".active").click(function(e) {
		if(click_count==0)
		{
			$("ul",this).css("display","block");
			click_count=1;
			$("#showmenue").css("display","");
			$("#hidemenue").css("display","block");
		}
		else
		{
			$("ul",this).css("display","");
			click_count=0;
			$("#showmenue").css("display","block");
			$("#hidemenue").css("display","");

		}
	});
	//menue show code ------------end

	//right menue up show code ------------start
		var writer=0;
	$('.main-content-right-writer-buttom').hide();
    $('.openercheck').click(function(e) {
		if(writer==0)
		{
        $('.main-content-right-writer-buttom').slideDown(1500);
		writer++;
		}
		else
		{
			$('.main-content-right-writer-buttom').slideUp(950);;
			writer=0;
		}
    });
	//right menue up show code ------------end
	
	//validation code ------------start
			var maxlenght=10;
			$("#name").keyup(function(e) {
                var lenght=$("#name").val().length;
				var re=maxlenght-lenght; 
				$("#lengthname").html("کاراکتر باقی مانده "+re);
            });
			//family
			var maxlenght1=15;
			$("#family").keyup(function(e) {
                var lenght=$("#family").val().length;
				var re=maxlenght1-lenght; 
				$("#lengthfamily").html("کاراکتر باقی مانده "+re);
            });
			//book name 
			var maxlenght=40;
			$("#bookname").keyup(function(e) {
                var lenght=$("#bookname").val().length;
				var re=maxlenght-lenght; 
				$("#lengthbook").html("کاراکتر باقی مانده "+re);
            });
			//book writer 
			var maxlenght=40;
			$("#bookwriter").keyup(function(e) {
                var lenght=$("#bookwriter").val().length;
				var re=maxlenght-lenght; 
				$("#lengthwriter").html("کاراکتر باقی مانده "+re);
            });
			//nashr 
			var maxlenght=40;
			$("#nashr").keyup(function(e) {
                var lenght=$("#nashr").val().length;
				var re=maxlenght-lenght; 
				$("#lengthnashr").html("کاراکتر باقی مانده "+re);
            });
			//category name  
			var maxlenght=20;
			$("#catname").keyup(function(e) {
                var lenght=$("#catname").val().length;
				var re=maxlenght-lenght; 
				$("#lengthcatname").html("کاراکتر باقی مانده "+re);
            });




});
