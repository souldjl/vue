// JavaScript Document
$(function(){
	//��ȡ���ڵĹ�������ֵ
	var $wh=$(window).height();	
	$(window).scroll(function(){
		var scrolltop=$(document).scrollTop();
		var $shengH=$wh-scrolltop;
		if (scrolltop > 780) {
    		$("#fxnav").addClass("fxnavxf");
			
  		} else {
   		 	$("#fxnav").removeClass("fxnavxf");
			
 		}
	});
})