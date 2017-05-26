// JavaScript Document
$(function(){
	$('.btn').click(function(event) {
		var txt=$(this).html();
		if (txt=="收起") {
		$(this).parent('.kc').parent('.list').css('height', '180px')
		$(this).html("展开").css('backgroundPosition', '-276px -56px');
		} else{
			$(this).parent('.kc').parent('.list').css('height', 'auto')
			$(this).html("收起").css('backgroundPosition', '112px -50px');
		};
	});
	
	
})