$(function(){
	// 设置定时器
	var oSec=$('.Seckill');
	if(oSec.length>0){
		if(oSec.length==1){
			show_time(oSec.html(),$('.Seckill_box'));
		}
		if(oSec.length>=2){
			show_time(oSec.eq(0).html(),$('.Seckill_box').eq(0));
			show_time(oSec.eq(1).html(),$('.Seckill_box').eq(1));
		}
	}
	// 补零函数
	function toDouble(n) {
		return n<10?'0'+n:''+n;
	}
	// 倒计时
	function show_time(time_distance,obj) {
		var timer1=setInterval(function(){
			clearInterval(timer1);
			var d=parseInt(time_distance/(24*60*60));       // 天
			var h=parseInt((time_distance-d*24*60*60)/3600);// 小时
			var m=parseInt((time_distance-d*24*60*60-h*3600)/60);  // 分钟
			var s=parseInt(time_distance-d*24*60*60-h*3600-m*60);  // 秒
			if (time_distance <= 1) {
				clearInterval(timer1);
				$(obj).html('商品已下架');
				location.reload();
				$(obj).parent().parent().attr('href','javascript:void(0)');
				return;
			}
			time_distance --;
			show_time(time_distance,obj);
			// 显示时间
			if(d>0){
				obj.html('<strong>距秒杀结束还有</strong><i>'+toDouble(d)+'天</i><b>'+toDouble(h) + '：' + toDouble(m) + '：' + toDouble(s)+'</b>');
			}else{
				obj.html('<strong>距秒杀结束还有</strong><b>'+toDouble(h) + '：' + toDouble(m) + '：' + toDouble(s)+'</b>');
			}
		},1000);
	}

	/*预约名师*/
    $('.order').on('click',function() {
        $('.divcover').fadeTo(500,0.6);
        $('.tea_inner').fadeIn(500);
		$('.wel').html($(this).parent().siblings().children('.introTea').html());
		$('#tid').val($(this).parent().siblings().children('.teacherid').html());
		$('#teaName').val($(this).parent().siblings().children('h5').html());
    });
	var oUsername=$('input[name=username]');
	var oTel=$('input[name=tel]');
	var reg=/^1[34578]\d{9}$/;
	oUsername.on('focus',function(){
		oUsername.siblings('i').hide();
	});
	oTel.on('focus',function(){
		oTel.siblings('i').hide();
	});

	$('.btn input[type=button]').on('click',function(){
		if(oUsername.val()==''){
			oUsername.siblings('i').show();
			return;
		}else{
			oUsername.siblings('i').hide();
		}
		if(oTel.val()==''){
			oTel.siblings('i').css('margin-left','68px');
			oTel.siblings('i').show().html('电话不能为空');
			return;
		}else{
			oTel.siblings('i').hide();
		}
		if( !reg.test($('input[name="tel"]').val())) {
			oTel.siblings('i').css('margin-left','37px');
			oTel.siblings('i').show().html('手机号输入格式不正确！');
			return;
		}else{
			oTel.siblings('i').hide();
		}
		var oAreaHtml,oStyleHtml,oGradeHtml,oSubjectHtml;
		if($('.area-show span').html()=='请选择地区'){
			oAreaHtml='';
		}else{
			oAreaHtml=$('.area-show span').html();
		}
		if($('.style-show span').html()=='请选择类型'){
			oStyleHtml='';
		}else{
			oStyleHtml=$('.style-show span').html();
		}
		if($('.grade-show span').html()=='请选择学段'){
			oGradeHtml='';
		}else{
			oGradeHtml=$('.grade-show span').html();
		}
		if($('.subject-show span').html()=='请选择学科'){
			oSubjectHtml='';
		}else{
			oSubjectHtml=$('.subject-show span').html();
		}
		$.ajax({
			url : 'mappointment.php',
			type: 'POST',
			data : {
				name : $('#teaName').val(),//老师名字
				time : $('#timelen em.active').siblings('span').html(),//预约时间
				username : oUsername.val(),//姓名
				tel : oTel.val(),//电话
				area : oAreaHtml,//地区
				style : oStyleHtml,//考试类型
				grade : oGradeHtml,//学段
				subject : oSubjectHtml,//学科
				tid : $('#tid').val()
			},
			success : function(data){
	            var json = eval("("+data+")");
				if(json.error==''){
					$('.tea_inner').hide();
					$('.tea_succ').show();
					setTimeout(function(){
						$('.divcover').fadeOut(500);
						$('.tea_succ').fadeOut(500);
					},5000)
				}else{
					alert(json.error);
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown){
				alert(XMLHttpRequest.responseText);
			}
		});
	});
	/*关闭预约弹窗*/
    $('.tea_right .close em').click(function() {
      $('.divcover').fadeOut(500);
      $('.tea_inner').fadeOut(500);
    });
	$('.tea_succ .close em').click(function() {
      $('.divcover').fadeOut(500);
      $('.tea_succ').fadeOut(500);
    });
	$('.tea_succ input[type=button]').on('click',function () {
		$('.divcover').fadeOut(500);
		$('.tea_succ').fadeOut(500);
	});
	
	
	$('.tea_left em').on('click',function(){
		$(this).addClass('active');
		$(this).parent('div').siblings('div').find('em').removeClass('active');
	});
	$('.tea_left span').on('click',function(){
		$(this).siblings('em').addClass('active');
		$(this).parent('div').siblings('div').find('em').removeClass('active');
	});
	
	function teaSelect(oBox,aLi){
		oBox.on('click',function(){
			if($(this).find('ul').is(':hidden')){
				$(this).find('ul').show();	
				$(this).find('em').addClass('active');
			}else{
				$(this).find('ul').hide();
				$(this).find('em').removeClass('active');	
			}	
		});
		aLi.on('click',function(){
			$(this).addClass('active').siblings().removeClass('active');
			$(this).parent().siblings().children('span').html($(this).html()).css('color','#000');	
		});
	}
	function teaSelect1(oBox,aLi){
		oBox.on('click',function(){
			if($(this).find('ul').is(':hidden')){
				$(this).find('ul').show();
				$(this).find('em').addClass('active');
			}else{
				$(this).find('ul').hide();
				$(this).find('em').removeClass('active');
			}
		});
		aLi.on('click',function(){
			$(this).parent('.subject-list').siblings('.subject-show').children('span').html($(this).html()).css('color','#000');
		});
	}

	function closeUl(oBox,oUl){
		$(document).bind("click",function(e){
			var target  = $(e.target);
			if(target.closest(oBox).length == 0){
				oUl.hide();
				oUl.siblings().find('em').removeClass('active');
			};
			e.stopPropagation();
		})
	}
	/*点击弹窗类型li*/
	$('.style-list li').on('click',function(){
		$('.subject-show span').empty();
		$('.grade-show span').empty();
		$('.subject-list-box').children('ul').eq($(this).index()).addClass('active').siblings().removeClass('active');
	});
	closeUl('.style ul,.style',$(".style ul"));
	closeUl('.area ul,.area',$(".area ul"));
	closeUl('.grade ul,.grade',$(".grade ul"));
	closeUl('.subject ul,.subject',$(".subject ul"));
	teaSelect($('.area .wrap'),$('.area li'));
	teaSelect($('.style .wrap'),$('.style li'));
	teaSelect($('.grade .wrap'),$('.grade li'));
	var oIndex;
	$('.subject-show').on('click',function () {
		$('.style-list li').each(function (index, elem) {
			if($(elem).hasClass('active')){
				oIndex=index;
			}
		});
		$('.subject-list-box ul').eq(oIndex).show().siblings().hide();
		$('.subject-list li').on('click',function () {
			$('.subject-show span').html($(this).html()).css('color','#000');
			$(this).parent().hide();
		});
	});
	//teaSelect1($('.subject .wrap'),$('.subject-list li'));
	
	
	/*左右切换*/
	function next(oUl,aLi,oRight,oLeft,oRightImg1,oRightImg2,oLeftImg1,oLeftImg2,oW,oNum){
		var n=0;
		if(aLi.length<=oNum){
			oRight.css('backgroundPosition',oRightImg2);
		}else{
			oRight.click(function(event){
				oLeft.css('backgroundPosition',oLeftImg1);
				if(n<aLi.length-oNum){
					n+=oNum;
					oUl.stop().animate({
						left : -oW*n/oNum
					}, 500);
					if(n>=aLi.length-oNum){
						$(this).css('backgroundPosition',oRightImg2);
					}
				}
			});
			oLeft.click(function(event){
				oRight.css('backgroundPosition',oRightImg1);
				if(n>0){
					n-=oNum;
					oUl.stop().animate({
						left : -oW*n/oNum
					}, 500);
					if(n<=0){
						$(this).css('backgroundPosition',oLeftImg2);
					}
				}
			})
		}	
	}
	
	next($('.activityArea ul'),$('.activityArea ul li'),$('.activityArea .slip_right'),$('.activityArea .slip_left'),'-76px 0','-114px 0','0 0','-38px 0','1190',4);
	
	next($('.tealist ul li'),$('.tealist ul .tea_info'),$('.slipright'),$('.slipleft'),'-26px 0','-78px 0','0 0','-52px 0','1022',8);
	
	next($('.booklist1 ul'),$('.booklist1 ul li'),$('.sliprights'),$('.sliplefts'),'-26px 0','-78px 0','0 0','-52px 0','1022',4);
	
	/*选项卡*/
	$('.bookmenu span').on('mouseover',function(){
		$(this).addClass('active').siblings().removeClass('active');
		if($(this).index()==0){
			$('.booklistwrap .booklist').eq(0).addClass('active').siblings().removeClass('active');
			$('.sliprights_1').hide();
			$('.sliplefts_1').hide();
			$('.sliprights').show();
			$('.sliplefts').show();
			next($('.booklist1 ul'),$('.booklist1 ul li'),$('.sliprights'),$('.sliplefts'),'-26px 0','-78px 0','0 0','-52px 0','1022',4);
			$('.booklist2 ul').css('left','0');	
			$('.sliprights_1').css('background-position','-26px 0');
			$('.sliplefts_1').css('background-position','-52px 0');
		}else{
			$('.booklistwrap .booklist').eq(1).addClass('active').siblings().removeClass('active');
			$('.sliprights_1').show();
			$('.sliplefts_1').show();
			$('.sliprights').hide();
			$('.sliplefts').hide();
			next($('.booklist2 ul'),$('.booklist2 ul li'),$('.sliprights_1'),$('.sliplefts_1'),'-26px 0','-78px 0','0 0','-52px 0','1022',4);
			$('.booklist1 ul').css('left','0');	
			$('.sliprights').css('background-position','-26px 0');
			$('.sliplefts').css('background-position','-52px 0');
		}
	});
});

