$(document).ready(function() {
	//页面左侧/右下角固定定位
	$('.page').width($(window).width());
	$('.page').height($(window).height());
	$('.cenjs').height($(window).height() - 150);
	$('.cenlive').height($(window).height() - 150);
	$('.cenlivesp').height($(window).height() - 150);
	$('.cenlist').height($(window).height() - 150);
	$('.cenlive').width($(window).width() - 410);
	$('.cenlive01').height($(window).height() - 220);
	$('.cenlivesp').width($('.cenlive').width() - $('.cenjs').width() - 16);
	$('.cenlive02').width($('.cenlivesp').width() - 15);
	$('.cenlive01').width($('.cenlivesp').width() - 20);
	$('.cenlivejdt1').width($('.cenlive02').width() - 60);
	$('.cenlive01 div').height($('.cenlive').height() - 70);
	$('#videoComponent').height($('.cenlive').height() * 0.45);
	$(window).resize(function() {
		$('.page').width($(window).width());
		$('.page').height($(window).height());
		$('.cenjs').height($(window).height() - 150);
		$('.cenlive').height($(window).height() - 150);
		$('.cenlivesp').height($(window).height() - 150);
		$('.cenlist').height($(window).height() - 150);
		$('.cenlive').width($(window).width() - 405);
		$('.cenlive01').height($(window).height() - 220);
		$('.cenlivesp').width($('.cenlive').width() - $('.cenjs').width() - 16);
		$('.cenlive02').width($('.cenlivesp').width() - 15);
		$('.cenlive01').width($('.cenlivesp').width() - 20);
		$('.cenlivejdt1').width($('.cenlive02').width() - 60);
		$('.cenlive01 div').height($('.cenlive').height() - 70);
		$('#videoComponent').height($('.cenlive').height() * 0.45);
	});
	var timestamp; //文件总时长
	var jitime; //计时循环
	//网络选择弹框
	$('.boxBomicon01').on('click', function() {
			$(".choose-net-container").show();
		})
		//网络选择框隐藏
	$('.close-icon,.close1').on('click', function() {
			$(".choose-net-container").hide();
		})
		//视频文档切换
	$('.boxBomicon02').on('click', function() {
			var video_02 = $("#videoComponent").html();
			var doc_02 = $("#docComponent").html();
			$("#videoComponent").empty();
			$("#docComponent").empty();
			$("#videoComponent").html(doc_02);
			$("#docComponent").html(video_02);
			clearInterval(jitime);
			$(".ui-slider-handle").not(".sya").css("left", 0);
			$(".progress-bar-elapsed").width(0);
		})
		//视频最大化
	$('.boxBomicon03').on('click', function() {
			$('.video').css("height", "98%");
			$('.video').css("width", "100%");
			var video_03 = $("#videoComponent").html();
			$("#videoComponent").empty();
			$('.page .video').append(video_03);
			$('.page').show();
			clearInterval(jitime);
			$(".ui-slider-handle").not(".sya").css("left", 0);
			$(".progress-bar-elapsed").width(0);
		})
		//文档最大化
	$('.boxBomicon04').on('click', function() {
			$('.doc').css("height", "98%");
			$('.doc').css("width", "100%");
			var doc_04 = $("#docComponent").html();
			$("#docComponent").empty();
			$('.page .doc').append(doc_04);
			$('.page').show();
		})
		//视频文档最大化关闭
	$('.page img').on('click', function() {
			$('.video').css("height", 0);
			$('.video').css("width", 0);
			$('.doc').css("height", 0);
			$('.doc').css("width", 0);
			$('.page').hide();
			if ($("#videoComponent").html().length == 0) {
				var video_0 = $(".page .video").html();
				$(".page .video").empty();
				$("#videoComponent").append(video_0);
				clearInterval(jitime);
				$(".ui-slider-handle").not(".sya").css("left", 0);
				$(".progress-bar-elapsed").width(0);
			}
			if ($("#docComponent").html().length == 0) {
				var doc_0 = $(".page .doc").html();
				$(".page .doc").empty();
				$("#docComponent").append(doc_0);
			}
		})
		//获得doc列表
	channel.bind("onChapter", function(event) {
		var li_list = "";
		for (var i in event.data.list) {
			if (event.data.list[i].title.length > 16) {
				event.data.list[i].title = cut_str(event.data.list[i].title, 14);
			}
			if (i % 2 == 0) {
				li_list += "<li class='back' timestamp='" + event.data.list[i].starttimestamp + "'><span>" + i + "</span><a href='javascript:;'>" + event.data.list[i].title + "</a></li>";
			} else {
				li_list += "<li timestamp='" + event.data.list[i].starttimestamp + "'><span>" + i + "</span><a href='javascript:;'>" + event.data.list[i].title + "</a></li>";
			}
		}
		$(".cenlist ul.class_list").html(li_list);
	});
	//时间转换字符串
	function get_ctime(ctime) {
		ctime = parseInt(ctime / 1000);
		c_time = "";
		var hour = parseInt(ctime / 3600);
		var min = parseInt((ctime - 3600 * hour) / 60);
		var sec = parseInt((ctime - 3600 * hour) - min * 60);
		if (hour < 10) {
			hour = "0" + hour;
		}
		if (min < 10) {
			min = "0" + min;
		}
		if (sec < 10) {
			sec = "0" + sec;
		}
		c_time = hour + ":" + min + ":" + sec;
		return c_time;
	}
	//点播文件总时长onFileDuration
	channel.bind("onFileDuration", function(event) {
		timestamp = event.data.duration;
		$(".play-time").html(get_ctime(timestamp));
		channel.send("playheadTime", {});
	});
	//提交playheadTime请求后的异步回调事件
	channel.bind("onPlayheadTime", function(event) {
			var playheadTime = event.data.playheadTime;
			var cur_time = get_ctime(playheadTime);
			$(".current-play-time").html(cur_time);
			jishi(playheadTime);
		})
		//计时
	function jishi(playheadTime) {
		jitime = setInterval(function() {
			if ($(".current-play-time").html() != $(".play-time").html()) {
				playheadTime += 1000;
				cur_time = get_ctime(playheadTime);
				$(".current-play-time").html(cur_time);
				var style = $("#playerProgressBar a").attr("style").split(":")[1];
				var val = parseInt(style) + "%";
				//$( ".progress-bar-elapsed" ).attr("cha",playheadTime-timestamp*parseInt(style)/100);
				//$( ".progress-bar-elapsed" ).attr("timestamp",timestamp/100);
				if ((playheadTime - timestamp * parseInt(style) / 100) >= (timestamp / 100)) {
					$(".ui-slider-handle").not(".sya").css("left", parseInt(style) + 1 + "%");
					$(".progress-bar-elapsed").width(parseInt(style) + 1 + "%");
				}
				//$( ".progress-bar-elapsed" ).width(val);
			} else {
				clearInterval(jitime);
			}
		}, 1000);
	}
	//进度条
	$("#playerProgressBar").slider({
		value: 0,
		change: function() {
			var style = $("#playerProgressBar a").attr("style").split(":")[1];
			var val = parseInt(style) + "%";
			$(".progress-bar-elapsed").width(val);
			channel.send("seek", {
				"timestamp": timestamp * (parseInt(style) / 100)
			});
			clearInterval(jitime);
			if ($("#playBtn").hasClass("btn-play")) {
				$("#playBtn").attr({
					"class": "btn-pause",
					"title": "pause"
				});
				channel.send("play", function() {});
			}
		}
	});
	//模拟播放、暂停
	$("#playBtn").on("click", function() {
		if ($(this).attr("title") == "play") {
			$(this).attr({
				"class": "btn-pause",
				"title": "pause"
			});
			channel.send("play", function() {});
			channel.send("playheadTime", {});
		} else {
			$(this).attr({
				"class": "btn-play",
				"title": "play"
			});
			channel.send("pause", function() {});
			clearInterval(jitime);
		}
	});
	//收到跳转结束
	channel.bind("onSeekCompleted", function(event) {
		if (event.data.timeStamp != undefined) {
			jishi(event.data.timeStamp);
		}
	});
	//文档跳转
	$(".class_list").on("click", "li", function() {
		channel.send("seek", {
			"timestamp": $(this).attr("timestamp")
		});
		clearInterval(jitime);
		$(".ui-slider-handle").not(".sya").css("left", $(this).attr("timestamp") / timestamp * 100 + '%');
		$(".progress-bar-elapsed").width($(this).attr("timestamp") / timestamp * 100 + "%");
		if ($("#playBtn").hasClass("btn-play")) {
			$("#playBtn").attr({
				"class": "btn-pause",
				"title": "pause"
			});
			channel.send("play", function() {});
		}
	});
	//中文截取
	function cut_str(str, len) {
		var char_length = 0;
		for (var i = 0; i < str.length; i++) {
			var son_str = str.charAt(i);
			encodeURI(son_str).length > 2 ? char_length += 1 : char_length += 0.5;
			if (char_length >= len) {
				var sub_len = char_length == len ? i + 1 : i;
				return str.substr(0, sub_len);
				break;
			}
		}
	}
	//直播停止
	channel.bind("onStop", function() {
		$(".topR ul").html("<li>&nbsp;</li><li class='red'>视频已结束</li><li>&nbsp;</li>");
	});
	//直播开启onStart
	channel.bind("onPlay", function() {
		$(".topR ul").html("<li>&nbsp;</li><li class='green'>播放中......</li><li>&nbsp;</li>");
	});
	//音量滑块
	$("#volSlider").slider({
		value: 50,
		change: function() {
			var val = $("#volSlider a").css("left");
			$("#volSlider span").width(val);
			if (parseInt(val) == 0) {
				$("#soundBtn").attr("class", "horn-off-icon");
			} else {
				$("#soundBtn").attr("class", "horn-icon");
			}
			channel.send("submitVolume", {
				"value": (parseInt(val) / 55)
			});
		}
	});
	//点击静音
	$("#soundBtn").click(function() {
		if ($(this).hasClass("horn-icon")) {
			$(this).attr("class", "horn-off-icon");
			$(this).attr("yliang", $("#volSlider a").css("left"));
			$("#volSlider a").css("left", 0);
			channel.send("submitVolume", {
				"value": 0
			});
		} else {
			$(this).attr("class", "horn-icon");
			$("#volSlider a").css("left", $(this).attr("yliang"));
			channel.send("submitVolume", {
				"value": (parseInt($(this).attr("yliang")) / 55)
			});
		}
	});


	//二维码
	$(".cenjs p a.wx").click(function(event) {
		$(".cenjs p .ewm").slideToggle();
	})


	//QQ交谈
	//$('.down').fadeTo(1,0.6);
	$('.qq').click(function(event) {
		$('.down').fadeTo(500, 0.6);
		$('.up').fadeIn(500);
	});
	$('.up span').click(function(event) {
		$('.down').fadeOut(500);
		$('.up').fadeOut(500);
	});
	$('.up a').click(function(event) {
		$('.down').fadeOut(500);
		$('.up').fadeOut(500);
	});


	/*讲义下载*/
	$(".boxLnav04").click(function() {
		$(".win_jy").fadeIn();
	})
	$(".win_jy .close").click(function() {
		$(".win_jy").fadeOut();
	});
	/*聊天记录*/
	channel.bind("onDataReady",function(event){
		event.data.supportChatSync=true;
	});
	channel.bind("onChatHistory", function(event) {

	});

	function toDouble(n){
		return n<10?'0'+n:''+n;
	}
	function loadChat(event){
		var oList = event.data.list;
		var date, h, m, s, chatTime, oContent;
		for (var i = 0; i < oList.length; i++) {
			date = new Date(oList[i].submitTime * 1000);
			h = date.getHours();
			m = date.getMinutes();
			s = date.getSeconds();
			chatTime = h + ":" + toDouble(m) + ":" + toDouble(s);

			oContent = $('<div>' + oList[i].content + '</div>').text();

			var oLi = "<li>\
								<div class='clearfix conBox'>\
									<span class='fl Stu'>" + oList[i].sender + "&nbsp;说:</span>\
									<span class='fr Time'>" + chatTime + "</span>\
								</div>\
								<span class='content'>" + oContent + "</span>\
							</li>";
			$('.chat_history').append(oLi);
		}
	}
	function loadChatHistory(){

	}
	$('.boxRig_tab p').on('click',function(){
		$(this).addClass('active').siblings('p').removeClass('active');
		$('.boxRig_list ul').eq($(this).index()).addClass('active').siblings('ul').removeClass('active');
	});


	$('.boxRig_tab p:nth-child(2)').on('click',function(){
			channel.bind("onChatHistory", function(event) {
				channel.send("submitChatHistory",{});
				loadChat(event);
				obj.setInterval(function(){
					if(event.data.more){
						channel.send("submitChatHistory",{});
						loadChat(event)
					}else{
						console.log('没有数据了');
						clearInterval(obj.timer)
					}
				},50)
		   })

	})

})
