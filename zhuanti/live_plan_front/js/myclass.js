// JavaScript Document
$(function(){
	$('.btn').click(function(event) {
		var txt=$(this).html();
		if (txt=="����") {
		$(this).parent('.kc').parent('.list').css('height', '180px')
		$(this).html("չ��").css('backgroundPosition', '-276px -56px');
		} else{
			$(this).parent('.kc').parent('.list').css('height', 'auto')
			$(this).html("����").css('backgroundPosition', '112px -50px');
		};
	});
	
	
})