// JavaScript Document
$(function(){
	
	
/*	
	$('.starlist span').eq(0).mouseover(function() {
		$(this).parents('.starlist').css('background', 'url(images/star1.png)');
	});
	$('.starlist span').eq(1).mouseover(function() {
		$(this).parents('.starlist').css('background', 'url(images/star2.png)');
	});
	
	$('.starlist span').eq(2).mouseover(function() {
		$(this).parents('.starlist').css('background', 'url(images/star3.png)');
	});
	
	$('.starlist span').eq(3).mouseover(function() {
		$(this).parents('.starlist').css('background', 'url(images/star4.png)');
	});
	$('.starlist span').eq(4).mouseover(function() {
		$(this).parents('.starlist').css('background', 'url(images/star5.png)');
	});*/
	
	$('.starlist span').eq(0).click(function() {
		$(this).parents('.starlist').css('background', 'url(images/star1.png)');
	});
	$('.starlist span').eq(1).click(function() {
		$(this).parents('.starlist').css('background', 'url(images/star2.png)');
	});
	
	$('.starlist span').eq(2).click(function() {
		$(this).parents('.starlist').css('background', 'url(images/star3.png)');
	});
	
	$('.starlist span').eq(3).click(function() {
		$(this).parents('.starlist').css('background', 'url(images/star4.png)');
	});
	$('.starlist span').eq(4).click(function() {
		$(this).parents('.starlist').css('background', 'url(images/star5.png)');
	});
	
	
	//鼠标点击搜索框时
	$('.search').click(function(event) {
		$(this).attr('value', '')}
	);

	$('.search').blur(function(event) {
		var val=$('.search').attr('value');
		if (val=='') {
			$(this).attr('value', '')}
		}
	);
	 
	 $('.s_ewm').click(function(){
			$('#wemcn').css('display','block')	
		})
		
		$('#ewmkg').click(function(){
			$('#wemcn').css('display','none')	
		})
		
	//轮播图1
		var wid=$('#video span').width();
		var wid2=(670-wid)/2;
		$('#video span').css('left',wid2);	

		
	 
	//鼠标点击 #tabmenu li时 选项卡切换
	$('#tabmenu li').click(function(event) {
		$(this).children('em').addClass('current').parents('li').siblings('li').children('em').removeClass('current')
		var index=$(this).index();
		$(this).parents('#tabmenu').parents('.kcxq_g').siblings('#xq_txt').children('div').eq(index).css('display', 'block').siblings().css('display', 'none');
	});
	
	var num=0;
	var timer=null;
	var tag=$('.xslist ul li:first').clone();
	$('.xslist ul').append(tag);
	function palyAuto() {
		num++;
		if (num>5) {num=0;
			$('.xslist ul').css('top',0);
		};
		$('.xslist ul').animate({top:-num*460}, 2000)
	}
	 timer=setInterval(palyAuto,5000)
	
		$('.xslist ul').mouseover(function(event) {
			clearInterval(timer);	
		}).mouseout(function(event) {
			clearInterval(timer);
			timer=setInterval(palyAuto, 5000);
		});
		
	//.link .link_add 友情链接滚动 定时器，鼠标经过停止
		var num5=0;
		var timer5=null;
		var tag5=$('.link_add ul li:first').clone();
		$('.link_add ul').append(tag5);
		function palyAuto5() {
			num5++;
			if (num5>3) {num5=1;
				$('.link_add ul').css('top',0);
			};
			$('.link_add ul').animate({top:-num5*32}, 500)
		}
		 timer5=setInterval(palyAuto5,3000)
		
			//当鼠标经过的时候,停止滚动
			$('.link_add ul').mouseover(function(event) {
				clearInterval(timer5);	
			}).mouseout(function(event) {
				clearInterval(timer5);
				timer5=setInterval(palyAuto5, 3000);
			});

	//获取窗口的滚动坐标值
	var $wh=$(window).height();	
	$(window).scroll(function(){
		var scrolltop=$(document).scrollTop();
		var $shengH=$wh-scrolltop;
		if (scrolltop > 520) {
    		$(".kcxq_g").addClass("jq_tabmenu");
			$(".buybox").css("display","block");
  		} else {
   		 	$(".kcxq_g").removeClass("jq_tabmenu");
			$(".buybox").css("display","none");
 		}
	});
	
	/*点赞*/
		 $('.s_save').click(function(){
			$(this).css('backgroundPosition','0 -661px');
			$(this).css('color','#f40')
			$(this).html('已收藏');	 
		})
        $('.s_zan').click(function(){
			$(this).css('backgroundPosition','0 -557px');
			var htm=$(this).html();
			if(htm=='0'){
				$(this).html('1')
			}
			if(htm=='1'){
				alert('您已点赞过了')
			}
				 
		})
	
})