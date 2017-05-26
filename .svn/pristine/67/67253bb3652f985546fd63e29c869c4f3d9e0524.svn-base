// JavaScript Document
$(function(){
	//鼠标经过qgfx时出现下拉
	$('.qgfx').hover(function() {	
		$(this).children('.list').css('display', 'block');
	}, function() {
		$(this).children('.list').css('display', 'none');
	});
	// //点击显示
	// $("#zj,#zgz").bind("click",function(){
		// $(".bx").css('display', 'block');
		
	// });
	// //点击隐藏
	// $("#qb").bind("click",function(){
		// $(".bx").css('display', 'no');
		
	// });

	//地区筛选
	$(".list a").bind("click",function(){
		
		$(".list").css("display","none");
		
	});
	
	//费用和时间筛选
	$("#nav a").bind("click",function(){
		$("#nav .current").removeClass();
		$(this).addClass("current");
		$("input[name='zbtime']").val($("#nav .current").attr("value"));
		$("form").submit();
	});
	
	//课程分类筛选
	$("#NetClassCategoryId a").bind("click",function(){
		$("#NetClassCategoryId .current").removeClass();
		$(this).addClass("current");
		var NetClassCategoryId= $("input[name='NetClassCategoryId']").val();
		if(NetClassCategoryId!=$(this).attr("value"))
		{
		  $("input[name='NetClassCategoryId']").val($(this).attr("value"));
			$("input[name='ClassType']").val(0);
			$("input[name='classPhase']").val(0);
			$("input[name='subjectId']").val(0);
		}
	
		$("form").submit();
	});
	
	//考试类型筛选
	$("#examtype a").bind("click",function(){
		$("#examtype a .current").removeClass();
		$(this).addClass("current");
		var examtype=	$("input[name='examtype']").val();
		if(examtype!=$(this).attr("value"))
		{
		  $("input[name='examtype']").val($(this).attr("value"));
			$("input[name='subjectId']").val(0);
		}
		$("form").submit();
	});
	
	//课程班型筛选
	$(".bx a").bind("click",function(){
		$(".bx .current").removeClass();
		$(this).addClass("current");
		$("input[name='ClassType']").val($(this).attr("value"));
		$("form").submit();
		//dosub();
	});
	
	//学段筛选
	$("#classPhase a").bind("click",function(){
		$("#classPhase .current").removeClass();
			$(this).addClass("current");
		$("input[name='classPhase']").val($(this).attr("value"));
			$("form").submit();
		});
		
	//学科筛选
	 $("#subjectId a").bind("click",function(){
		 $("#subjectId .current").removeClass();
		 $(this).addClass("current");
		 $("input[name='subjectId']").val($(this).attr("value"));
		 $("form").submit();
		 });
	//价格筛选
/*	$(".class_fl li:nth-child(4) a").bind("click",function(){
		$(".class_fl li:nth-child(4) .current").removeClass();
		$(this).addClass("current");
		dosub();
	});*/
	
	//轮播图1	
	var znum=10; //变量保存zindex的信息，每点击一次zindex层次加1
	var bannerTimer=null;
	var iNow=0;
	var len=$('#banner ul li').length; 

	$('#banner ol li').click(function(event) {
		znum++;

		$(this).addClass('current').siblings('li').removeClass('current');

		var index=$(this).index();
		$('#banner ul li').eq(index).css({
			zIndex: znum
		}).hide().fadeIn();

		//点击完成之后，累加器从当前开始增加
		iNow=index;
	});
	
	//提交筛选表单
	function dosub(){
/*		if($(".class_fl li:nth-child(1) .current").attr("value")==12){
			$(".class_fl li:nth-child(3) a:nth-child(2)").attr("value",0);
			$(".class_fl li:nth-child(3) a:nth-child(3)").attr("value",328);
			$(".class_fl li:nth-child(3) a:nth-child(4)").attr("value",329);
			$(".class_fl li:nth-child(3) a:nth-child(5)").attr("value",330);
			$(".class_fl li:nth-child(3) a:nth-child(6)").attr("value",331);
			$(".class_fl li:nth-child(3) a:nth-child(7)").attr("value",336);
		}else if($(".class_fl li:nth-child(1) .current").attr("value")==19){
			$(".class_fl li:nth-child(3) a:nth-child(2)").attr("value",0);
			$(".class_fl li:nth-child(3) a:nth-child(3)").attr("value",332);
			$(".class_fl li:nth-child(3) a:nth-child(4)").attr("value",333);
			$(".class_fl li:nth-child(3) a:nth-child(5)").attr("value",334);
			$(".class_fl li:nth-child(3) a:nth-child(6)").attr("value",335);
			$(".class_fl li:nth-child(3) a:nth-child(7)").attr("value",337);
		}else{
			$(".class_fl li:nth-child(3) a:nth-child(2)").attr("value",0);
			$(".class_fl li:nth-child(3) a:nth-child(3)").attr("value",0);
			$(".class_fl li:nth-child(3) a:nth-child(4)").attr("value",0);
			$(".class_fl li:nth-child(3) a:nth-child(5)").attr("value",0);
			$(".class_fl li:nth-child(3) a:nth-child(6)").attr("value",0);
			$(".class_fl li:nth-child(3) a:nth-child(7)").attr("value",0);
		}
		*/
		
		$("input[name='ClassType']").val($(".class_fl li:nth-child(3) .current").attr("value"));
		$("input[name='Province']").val($(".qgfx .cur a").attr("value"));
		
		$("input[name='jiage']").val($(".class_fl li:nth-child(4) .current").attr("value"));
		$("form").submit();
	}
	
	//名师风采
	var Timer9=null;
		var num9=0; 
		var tag9=$('.ms ul li:lt(4)').clone();
		$('.ms ul').append(tag9);
		//自动播放
		function autoPlay9() {
		num9++;
		if (num9>5) {
			num9=1;
			$('.ms ul').css('left', 0);
		}
		$('.ms ul').stop().animate({
			left : -num9* 998
		}, 500);
	}
		Timer9=setInterval(autoPlay9,5000);

		//清除定时器
		$('#tea').hover(function() {
			clearInterval(Timer9);
			$('.ms span').css('display', 'block');
		}, function() {
			clearInterval(Timer9);
			Timer9=setInterval(autoPlay9,5000);
			$('.ms span').css('display', 'none');
		});

		//点击前后
		$('.prev').click(function(event) {			
			num9--;			
			if(num9<0){
				num9=2;
				$('.ms ul').css('left',-num9*998);
			}
			$('.ms ul').animate({left:-998*num9}, 500)
		});
		$('.next').click(function(event) {
			autoPlay9()
		});		
		
		
		//banner
		var znum=10; //变量保存zindex的信息，每点击一次zindex层次加1
		var bannerTimer=null;
		var iNow=0;
		var len=$('.banner ul li').length; 
		
		$('.banner ol li').click(function(event) {
			znum++;

			$(this).addClass('current').siblings('li').removeClass('current');

			var index=$(this).index();
			$('.banner ul li').eq(index).css({
				zIndex: znum
			}).hide().fadeIn();

			//点击完成之后，累加器从当前开始增加
			iNow=index;
		});

		//自动播放
		function autoPlay(){
			iNow++;
			znum++;
			if(iNow>len-1){
				iNow=0;
			}
			$('.banner ol li').eq(iNow).addClass('current').siblings('li').removeClass('current');
			$('.banner ul li').eq(iNow).css({
				zIndex: znum
			}).hide().fadeIn();
		}
		bannerTimer=setInterval(autoPlay,3000);

		//清除定时器
		$('.banner').hover(function() {
			clearInterval(bannerTimer);
			$('.banner span').stop().fadeIn();
		}, function() {
			clearInterval(bannerTimer);
			bannerTimer=setInterval(autoPlay,3000);
			$('.banner span').stop().fadeOut();
		});

		//点击前后
		$('.banner .prev').click(function(event) {
			iNow--;
			znum++;
			if(iNow<0){
				iNow=len-1;
			}
			$('.banner ol li').eq(iNow).addClass('current').siblings('li').removeClass('current');
			$('.banner ul li').eq(iNow).css({
				zIndex: znum
			}).hide().fadeIn();
		});
		$('.banner .next').click(function(event) {
			autoPlay()
		});
		
		
})