(function($){
	jQuery.divselect = function(divselectid,inputselectid) {
		var inputselect = $(inputselectid);
		var ul = $(divselectid+" ul");
		var cite = $(divselectid+" cite");
		$(divselectid+" cite").mouseover(function(){
			$(this).siblings('ul').mouseover(function () {
				$(this).show();
			})
			if(ul.css("display")=="none"){
				ul.slideDown("fast");
			}else{
				ul.slideUp("fast");
			}
		});
		$(divselectid+" ul").on("click","li a",function(){
			var txt = $(this).text();
			$(divselectid+" cite").html(txt);
			var value = $(this).attr("selectid");
			inputselect.val(value);
			$(divselectid+" ul").hide();			
		});
		$(ul).bind('mouseleave',function(){
			$(ul).hide();
		})
		$(cite).bind('mouseleave',function(){
			$(ul).hide();
		})
	};
})(jQuery);
