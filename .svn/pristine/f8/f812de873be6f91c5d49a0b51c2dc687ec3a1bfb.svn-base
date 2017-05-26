$(function () {




    var channel = GS.createChannel("videogroup");
    //页面左侧/右下角固定定位
    $('.page').width($(window).width());
    $('.page').height($(window).height());
    $('.left').height($(window).height() - 60);
    $('.cenjs').height($(window).height() - 150);
    $('.cenlive').height($(window).height() - 150);
    $('.cenlive').width($(window).width() - $('.cenLeft').width() - $('.cenjs').width() - $('.right').width() - 45);
    $('.cenlive div').height($('.cenlive').height() - 20);
    $('.cenlive div').width($('.cenlive').width() - 20);
    $('.boxBom').width($(window).width() - $('.right').width());
    $('#videoComponent').height($('.cenlive').height() * 0.45);
    $(window).resize(function () {
        $('.cenjs').height($(window).height() - 150);
        $('.cenlive').height($(window).height() - 150);
        $('.cenlive').width($(window).width() - $('.cenLeft').width() - $('.cenjs').width() - $('.right').width() - 45);
        $('.cenlive div').height($('.cenlive').height() - 20);
        $('.cenlive div').width($('.cenlive').width() - 20);
        $('.boxBom').width($(window).width() - $('.right').width());
        $('.page').width($(window).width());
        $('.page').height($(window).height());
        $('#videoComponent').height($('.cenlive').height() * 0.45);
    });

    //右侧区块1/历年分数线切换
    $('.boxRig_tab p').bind('mouseenter', function () {
        $(this).addClass('cur send').siblings().removeClass('cur send');
        $('.boxRig_list div').eq($(this).index()).fadeIn().siblings().hide();
    })

    //工具箱
    $('.tool').bind('click', function () {
        //	$('.browFrame').show();
        if ($('.tools').hasClass('hide')) {
            $('.tools').removeClass('hide');
        } else {
            $('.tools').addClass('hide');
        }
    })

    //模式切换
    $(".mslist").mouseover(function (event) {
        $(this).children("dt").css('background-position', '-322px -514px');
        $(this).children("dd").css('display', 'block');

    }).mouseout(function (event) {
        $(this).children("dt").css('background-position', '-322px -562px');
        $(this).children("dd").css('display', 'none');

    });

    $("dd span").click(function (event) {

        var $html = $(this).html();
        $("#jq_selectList dt").html($html);
        $("#jq_selectList dd").hide()

    })
    //二维码
    $(".cenjs p a.wx").click(function (event) {
        $(".cenjs p .ewm").slideToggle();
    })


    //QQ交谈
    //$('.down').fadeTo(1,0.6);
    $('.qq').click(function (event) {
        $('.down').fadeTo(500, 0.6);
        $('.up').fadeIn(500);
    });
    $('.up span').click(function (event) {
        $('.down').fadeOut(500);
        $('.up').fadeOut(500);
    });
    $('.up a').click(function (event) {
        $('.down').fadeOut(500);
        $('.up').fadeOut(500);
    });



    //网络选择弹框
    $('.boxBomicon01').on('click', function () {
        $(".choose-net-container").show();
    })
    //网络选择框隐藏
    $('.close-icon,.close1').on('click', function () {
        $(".choose-net-container").hide();
    })
    //视频文档切换
    $('.boxBomicon02').on('click', function () {
        var video_02 = $("#videoComponent").html();
        var doc_02 = $("#docComponent").html();
        $("#videoComponent").empty();
        $("#docComponent").empty();
        $("#videoComponent").html(doc_02);
        $("#docComponent").html(video_02);
    })
    //视频最大化
    $('.boxBomicon03').on('click', function () {
        $('.video').css("height", "98%");
        $('.video').css("width", "100%");
        var video_03 = $("#videoComponent").html();
        $("#videoComponent").empty();
        $('.page .video').append(video_03);
        $('.page').show();
    })
    //文档最大化
    $('.boxBomicon04').on('click', function () {
        $('.doc').css("height", "98%");
        $('.doc').css("width", "100%");
        var doc_04 = $("#docComponent").html();
        $("#docComponent").empty();
        $('.page .doc').append(doc_04);
        $('.page').show();
    })
    //举手
    $('.boxBomicon05').on('click', function () {
        channel.send("submitHandup", {
            "handup": "true"
        });
    })
    //视频文档最大化关闭
    $('.page img').on('click', function () {
        $('.video').css("height", 0);
        $('.video').css("width", 0);
        $('.doc').css("height", 0);
        $('.doc').css("width", 0);
        $('.page').hide();
        if ($("#videoComponent").html().length == 0) {
            var video_0 = $(".page .video").html();
            $(".page .video").empty();
            $("#videoComponent").append(video_0);

        }
        if ($("#docComponent").html().length == 0) {
            var doc_0 = $(".page .doc").html();
            $(".page .doc").empty();
            $("#docComponent").append(doc_0);
        }
    })

    //当前在线人数
    channel.bind("onUserOnline", function (event) {
        $(".topR span").html(event.data.count);
    });
    //收到公聊
    channel.bind("onPublicChat", function (event) {
      console.log('nihao')
        var sender = event.data.sender;
        var sender_richtext = event.data.richtext;
        $(".talk_list ul").append("<li><span style='float:left'><a href='javascript:;' senderId='" + event.data.senderId + "'>" + sender + "</a>说：</span>&nbsp;" + sender_richtext + "</li>");
        // $(".talk_list ul").scrollTo({
        //     fn: function () {}
        // });
      var oH=$(".talk_list ul").height()+$(".talk_list ul").scrollTop();

      $('.talk_list ul').scrollTop(oH);

    });
    //收到私聊
    channel.bind("onPriChat", function (event) {
        var sender = event.data.sender;
        var sender_richtext = event.data.richtext;
        $(".talk_list ul").append("<li><span style='float:left'><a href='javascript:;' senderId='" + event.data.senderId + "'>" + sender + "</a>说：</span>&nbsp;" + sender_richtext + "</li>");
        $(".talk_list ul").scrollTo({
            fn: function () {}
        });
    });
    //收到在线提问
    channel.bind("onQA", function (event) {
        if ($(".question li[uuid='" + event.data.id + "']").length == 0) {
            $(".question").append("<li uuid='" + event.data.id + "'><span style='float:left'>" + event.data.submitor + "&nbsp;问：</span>" + event.data.question + "</li>");
            if (event.data.answerBy.length != 0) {
                $(".question").append("<li uuid='" + event.data.id + "'><span style='float:left'>" + event.data.answerBy + "</span>回复<span>" + event.data.submitor + "：</span>" + event.data.answer + "</li>");
            }
            // $(".question").scrollTo({
            //     fn: function () {}
            // });

          var oH=$(".talk_list ul").height()+$(".talk_list ul").scrollTop();

          $('.talk_list ul').scrollTop(oH);

        } else {
            $(".question li[uuid='" + event.data.id + "']:last").after("<li uuid='" + event.data.id + "'><span style='float:left'>" + event.data.answerBy + "</span>回复<span>" + event.data.submitor + "：</span>" + event.data.answer + "</li>");
        }
        //$(".question").append("<li uuid='"+event.data.id+"'><span style='float:left'>"+event.data.answerBy+"</span>回复<span>"+event.data.submitor+"：</span>"+event.data.answer+"</li>");
    });
    //清除某条提问
    channel.bind("onQARemove", function (event) {
        $(".question li[uuid='" + event.data.id + "']").remove();
    });
    //点击获得表情
    $(".biaoq a img").click(function () {
        $("#textarea").html($("#textarea").html() + "<img src=\"" + $(this).attr("src") + "\" >");
        $('.browFrame').addClass('hide');
    });
    //发送聊天和在线提问
    $("#chat-submit").click(function () {
		console.log($(".talk_list ul").height());
        var data = $("#textarea").html();
        if (data.length != 0) {
            channel.send("submitChat", {
                "richtext": data //"<img src=\"http://static.gensee.com/webcast/static/emotion/feedback.quickly.png\">",
            });
            console.log(data);

            $(".talk_list ul").append("<li><span style='float:left'>我 说：</span>&nbsp;" + data + "</li>");
			  var oH=$(".talk_list ul").height()+$(".talk_list ul").scrollTop();

			 $('.talk_list ul').scrollTop(oH);

            $("#textarea").html("");
        }
    });
    //选择私聊人选
    $(".boxRig_list").on("click", "a", function () {
        var li_list = $("#divselect ul li a");
        for (var ii = 0; ii != li_list.length; ii++) {
            if ($("#divselect ul li a:eq(" + ii + ")").html() == $(this).html()) {
                $("#divselect ul li a[send_to]").parent().remove();
            }
        }
        $("#divselect ul").append("<li><a href='javascript:;' senderId='" + $(this).attr("senderId") + "' send_to='" + $(this) + "'>" + $(this).html() + "</a></li>");
        $("#divselect cite").html($(this).html());
        $("#divselect cite").attr("senderId", $(this).attr("senderId"));
    });
    //提交网络选择信息
    $(".submit1").click(function () {
        channel.send("submitNetChoice", {
            "label": $("input[name='netlist']:checked").val()
        });
    });
    //收到问答历史信息
    channel.bind("onQAList", function (event) {
        for (var onQAList_i in event.data.list) {
            if ($(".question li[uuid='" + event.data.list[onQAList_i].id + "']").length == 0) {
                $(".question").append("<li uuid='" + event.data.list[onQAList_i].id + "'><span style='float:left'>" + event.data.list[onQAList_i].submitor + "&nbsp;问：</span>" + event.data.list[onQAList_i].question + "</li>");
                if (event.data.list[onQAList_i].answerBy.length != 0) {
                    $(".question").append("<li uuid='" + event.data.list[onQAList_i].id + "'><span style='float:left'>" + event.data.list[onQAList_i].answerBy + "</span>回复<span>" + event.data.list[onQAList_i].submitor + "：</span>" + event.data.list[onQAList_i].answer + "</li>");
                }
            } else {
                $(".question li[uuid='" + event.data.list[onQAList_i].id + "']:last").after("<li uuid='" + event.data.list[onQAList_i].id + "'><span style='float:left'>" + event.data.list[onQAList_i].answerBy + "</span>回复<span>" + event.data.list[onQAList_i].submitor + "：</span>" + event.data.list[onQAList_i].answer + "</li>");
            }
        }
    });
    //收到系统通知
    channel.bind("onMessage", function (event) {
        $("#broadcast").append("<div class='state-tips'><a class='close-btn' href='javascript:;' onclick='$(this).parent().hide()'>×</a><h3><i class='i-horn'></i><span>广播消息</span></h3><div class='cnt'><span class='c-red'>" + event.data.content + "</span></div></div>");
    });
    //抽奖
    channel.bind("onLottery", function (event) {
        if (event.data.action == 'start') {
            $(".lottery-container").show();
            $(".lottery-container h3").hide();
            $(".lottery-animate").show();
        } else if (event.data.action == 'stop') {
            $(".lottery-animate").hide();
            $(".lottery-container h3").show();
            $("#choujiang").html(event.data.user);
        } else {
            $(".lottery-container").hide();
        }
    });
    //抽奖隐藏
    $(".close2").click(function () {
        $(".lottery-container").hide();
    });
    //收到点名信息
    var onRollcall_value;
    channel.bind("onRollcall", function (event) {
        clearInterval(onRollcall_value);
        $(".callname-container").show().css("z-index", "999");
        $(".callname-b span").html(event.data.timeout);
        $(".callname-c").attr("call-value", event.data.id);

        function daojishi() {
            onRollcall_value = setInterval(function () {
                if ($(".callname-b span").html() != 1) {
                    $(".callname-b span").html($(".callname-b span").html() - 1);
                } else {
                    clearInterval(onRollcall_value);
                    $(".callname-container").hide();
                }
            }, 1000);
        }
        daojishi();
    });
    //提交点名确认
    $(".callname-c").click(function () {
        channel.send("submitRollcall", {
            "id": $(".callname-c").attr("call-value")
        });
        clearInterval(onRollcall_value);
        $(".callname-container").hide();
    });
    //被提出
    channel.bind("onKickOut", function () {
        $("#broadcast").append("<div class='state-tips'><a class='close-btn' href='javascript:;' onclick='$(this).parent().hide()'>×</a><h3><i class='i-horn'></i><span>广播消息</span></h3><div class='cnt'><span class='c-red'>您已被管理员请出本次活动</span></div></div>");
    });
    //直播停止
    channel.bind("onStop", function () {
        $(".topR ul").html("<li>&nbsp;</li><li class='red'>直播已结束</li><li>&nbsp;</li>");
    });
    //直播开启onStart
    channel.bind("onStart", function () {
        $(".topR ul").html("<li>&nbsp;</li><li class='green'>直播中......</li><li>&nbsp;</li>");
    });
    //收到客户端升级邀请
    channel.bind("onUpgradeRequired", function () {
        if (confirm("是否同意加入客户端")) {
            channel.send("submitUpgrade", {
                "agree": "true"
            });
        } else {
            channel.send("submitUpgrade", {
                "agree": "false"
            });
        }
    });
    //跳转到客户端
    channel.bind("onSubmitUpgrade", function (event) {
        location.href = event.data.url;
    });
    //收到调查问卷onVote
    var onVote_result = new Array();
    channel.bind("onVote", function (event) {
        var textid = event.data.id;
        onVote_result[textid] = event.data;
        if (event.data.skip == "false") {
            var close3 = "none";
        } else {
            var close3 = "block";
        }
        var list = "<div class='vote-container' uuid='" + event.data.id + "'><div class='comm-title'><span>投票调查</span><div class='s-btn'><a class='minimize-icon tran' href='javascript:;'  onClick='voteMinimize();' style='display:none;'></a><a class='close-icon tran close3' uuid='" + event.data.id + "' style='display:" + close3 + "' href='javascript:;'></a></div></div><div class='vote-body'><div class='vote-main'><h3>" + event.data.subject + "</h3>";

        for (var vote_container in event.data.questions) {
            if (event.data.questions[vote_container].type == "text") {
                list += "<dl class='vote-item' uuid='" + event.data.questions[vote_container].id + "' vote_type='text'><dt><span class='answer-icon'></span>" + event.data.questions[vote_container].subject + "</dt><dd><textarea class='vote-textarea'></textarea></dd></dl>";
            } else if (event.data.questions[vote_container].type == "single") {
                var div = "";
                for (var single_items in event.data.questions[vote_container].items) {
                    var option_status = "false";
                    if (event.data.questions[vote_container].items[single_items].correct == "true") {
                        option_status = "true";
                    }
                    div += "<dd><label class='radio' correct='" + option_status + "'><input type='radio' name='" + event.data.questions[vote_container].id + "' uuid=" + event.data.questions[vote_container].items[single_items].id + " uid=" + event.data.id + ">" + event.data.questions[vote_container].items[single_items].option + "</label></dd>";
                }
                list += "<dl class='vote-item' uuid='" + event.data.questions[vote_container].id + "' vote_type='single'><dt><span class='histogram-icon'></span>" + event.data.questions[vote_container].subject + "</dt>" + div + "</dl>"
            } else {
                var div = "";
                for (var multi_items in event.data.questions[vote_container].items) {
                    var option_status = "false";
                    if (event.data.questions[vote_container].items[multi_items].correct == "true") {
                        option_status = "true";
                    }
                    div += "<dd><label class='checkbox' correct='" + option_status + "'><input type='checkbox' uuid=" + event.data.questions[vote_container].items[multi_items].id + ">" + event.data.questions[vote_container].items[multi_items].option + "</label></dd>";
                }
                list += "<dl class='vote-item' uuid='" + event.data.questions[vote_container].id + "' vote_type='multi'><dt><span class='histogram-icon'></span>" + event.data.questions[vote_container].subject + "</dt>" + div + "</dl>";
            }
        }
        list += "<div class='vote-submit'><a href='javascript:;' status='true' class='green-btn' uuid='" + event.data.id + "'><span class='right-icon tran'></span>提交</a></div></div></div></div>";
        $("#toupiao").append(list);
        $("#toupiao .vote-container[uuid='" + event.data.id + "']").show();
    });
    //提交问卷调查结果
    $("#toupiao").on("click", ".green-btn", function () {
        var uuid = $(this).attr("uuid");
        if ($(this).attr("status") == 'true') {
            var vote_list = $(".vote-container[uuid='" + uuid + "']");
            var vote_data = onVote_result[uuid];
            if ($("input:radio[uid='" + uuid + "']:checked").val() == null && $(".vote-container[uuid='" + uuid + "'] input:checkbox:checked").val() == null && $(".vote-container[uuid='" + uuid + "'] textarea").val().length == 0) {
                alert("请至少回答其中一个问题！");
            } else {
                for (var iii in vote_data.questions) {
                    if (vote_data.questions[iii].type == "text") {
                        vote_data.questions[iii].text = $(".vote-item[uuid='" + vote_data.questions[iii].id + "'] textarea").val();
                    } else {
                        for (var iiii in vote_data.questions[iii].items) {
                            if ($("input[uuid='" + vote_data.questions[iii].items[iiii].id + "']:checked").length != 0) {
                                vote_data.questions[iii].items[iiii].selected = "true";
                            }
                        }
                    }
                    $(this).attr("status", "false");
                    $("#toupiao .close3[uuid='" + uuid + "']").show();
                }
                channel.send("submitVote", {
                    "id": vote_data.id,
                    "skip": vote_data.skip,
                    "subject": vote_data.subject,
                    "questions": vote_data.questions
                });
                $(".vote-container[uuid='" + vote_data.id + "'] label[correct='true']").after("<span class='right-ans'>√ 正确答案</span>");
                $(this).html("<span class='right-icon tran'></span>已提交");
                //alert("提交成功！");
                //$(".vote-container[uuid='"+vote_data.id+"']").hide();
            }
        }

    });
    //关闭调查问卷
    $("#toupiao").on("click", ".close3", function () {
        $(".vote-container[uuid='" + $(this).attr("uuid") + "']").hide();
    });
    //收到调查结果
    channel.bind("onVoteResult", function (event) {
        var list = "";
        list = "<div class='vote-result-container' uuid='" + event.data.id + "'><div class='comm-title'><span>投票调查结果</span><div class='s-btn'><a class='close-icon tran close4' uuid='" + event.data.id + "' href='javascript:;'></a></div></div><div class='vote-body'><div class='vote-main'><h3>" + event.data.subject + "</h3>";
        for (var vote_item in event.data.questions) {
            if (event.data.questions[vote_item].type == "text") {
                list += "<dl class='vote-item'><dt><span class='answer-icon'></span>" + event.data.questions[vote_item].subject + "</dt><dd></dd>";
            } else {
                list += "<dt><span class='histogram-icon'></span>" + event.data.questions[vote_item].subject + "</dt>";
                var div = "";
                var total = event.data.questions[vote_item].total;
                for (var single_items in event.data.questions[vote_item].items) {
                    var total2 = event.data.questions[vote_item].items[single_items].total;
                    div += "<dd class='clearfix'><div class='vote-ans'>" + event.data.questions[vote_item].items[single_items].option + "</div><div class='vote-count'><div class='vote-progress-bar'><span style='width:" + (total2 / total * 100) + "%;'></span></div><div class='num'>" + total2 + " <span>(" + (total2 / total * 100) + "%)</span></div></div></dd>";
                }
                list += div;
            }
        }
        list += "</div></div></div>";
        $("#tpjieguo").append(list);
        $("#tpjieguo .vote-result-container[uuid='" + event.data.id + "']").show();
    });
    //关闭调查结果
    $("#tpjieguo").on("click", ".close4", function () {
        $(".vote-result-container[uuid='" + $(this).attr("uuid") + "']").hide();
    });

    //点击静音
    $("#soundBtn").click(function () {
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
    //按回车说话
    $("body").keydown(function (event) {
        if (event.keyCode == "13") {
            var act = document.activeElement.id;
            if (act == "textarea") {
                $("#chat-submit").trigger("click");
            }
        }
    });
    $("body").keyup(function (event) {
        if (event.keyCode == "13") {
            var act = document.activeElement.id;
            if (act == "textarea") {
                $("#textarea").html("");
            }
        }
    });
    (function ($) {
        $.fn.scrollTo = function (options) {
          console.log('12345')
            var defaults = {
                to: "bottom" //"top":滚至顶部,"bottom":滚至底部
            }
            var opts = $.extend({}, defaults, options);
            return this.each(function () {
                var self = $(this);
                var parent = self.parent();
                var height = self.outerHeight();

                console.log( 'height:', height)
                switch (opts.to) {
                    case "bottom":
                        parent.scrollTop(height);
                        break;
                    case "top":
                        parent.scrollTop(0);
                        break;
                    default:
                        //console.log(opts.to);
                }
            });
        }
    })(jQuery);
})
