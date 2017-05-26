<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="renderer" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=gbk">
    <title>华图教师直播课堂</title>
    <meta name="description" content="华图教师网是华图教育旗下重要品牌,提供教师招聘考试(含特岗)、国考教师资格证考试公告、报名时间、报名入口、面试信息、真题资料、辅导培训等,教师考试信息尽在华图教师网." />
<meta name="keywords" content="教师,教师招聘,教师资格证考试,教师考试,教师网,华图" />
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <link href="css/index_sx_2.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="//cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
<style>
    body{
        font-family: "Microsoft YaHei";
    }
    .liveppt {
        width: 640px;
        height: 360px;
    }
    .smgz {
        width: 640px;
        height: 170px;
    }

    .livetx {
        width: 282px;
        height: 212px;
        right: -15px;
    }
    .zxkf {
        width: 282px;
        right: -15px;
        top: 211px;
    }
    .talk_list {
        width: 282px;
        height: 196px;
        right: -15px;
        top: 290px;
    }
    .talk_list ul {
        height: 200px;
    }
    .listwrap {
        width: 270px;
    }
    .inputbox {
        right: 0;
        width: 282px;
        right: -15px;
    }
    .smgz .qqun {
        padding-top: 40px;
        margin-left: 35px;
        width: 386px;
    }
    .smgz .qqun .btn{
        width: 104px;
        height: 28px;
        line-height: 28px;
        font-size: 16px;
        border-radius: 3px;
        background: #ff585b;
        color: #fff;
        text-align: center;
        margin-top: 10px;
        cursor: pointer;
        margin-left: 126px;
    }
    .smgz .wx {
        padding-top: 5px;
    }
    .livelist ul li {
        padding-right: 10px;
    }
    .test_box {
        padding-left: 5px;
        line-height: 28px;
        width: 210px;
        padding-right: 10px;
    }
    .talk_list ul li {
        padding-left: 0;
    }
    .qqun p{
        font-size: 18px;
        font-weight: bold;
        margin-left: 35px;
    }
    .bgColor{
        width: 100%;
        height: 100%;
        background: #000;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 9;
        opacity: 0.6;
        filter: alpha(opacity=40);
        display: none;
    }
    .bgCon{
        width:523px;
        height: 214px;
        position: fixed;
        left: 50%;
        top: 50%;
        margin-left: -261px;
        margin-top: -104px;
        padding-top: 50px;
        background: url(images/bgColor.png) no-repeat;
        z-index: 999;
        display: none;
    }
    .bgCon em{
        width:28px;
        height: 28px;
        position: absolute;
        right: -30px;
        top: -50px;
        background: url(images/close.png) no-repeat;
        z-index: 999;
        cursor: pointer;
    }
    .bgCon p{
        font-size: 16px;
        color: #663d09;
        margin-left: 58px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .bgCon p a{
        width: 84px;
        height: 28px;
        border-radius: 3px;
        background: #ff585b;
        font-size: 16px;
        display: inline-block;
        color: #fff;
        line-height: 28px;
        text-align: center;
        float: right;
        margin-right: 65px;
        position: relative;
        top: -3px;

    }
</style>

</head>

<body>
  <!--新增直播体验区开始-->
  <?php
    include "../../inc/cookie.php";
    if(empty($_COOKIE['hteacherneta'])){
        $cookieUserName = '游客'.rand(1000,9999);
    }else{
        $cookieUserName = getUserName();
    }

 ?>
<div class="zbty">

    <div class="livebox">
        <div class="videobox">
            <!--直播头像 -->
                <div class="livetx">
                    <div id="livetx_background" style="position:absolute;width:282px;height:212px;background:url(./images/live-head.png) no-repeat;z-index:555;"></div>
                <?php if(isset($_GET['liveUrl']) && isset($_GET['secret'])){ ?>
                    <gs:video-live  site="htexam.gensee.com" ctx="webcast" ownerid="<?php echo $_GET['liveUrl']?>"  uname="<?php echo $cookieUserName;?>" group="videogroup" bar="false" py="1" k="" authcode="<?php echo $_GET['secret']?>" bgimg="http://live.huatu.com/Public/images/tx.jpg"/>
                </div>
                    <!-- ppt-->
                <div class="liveppt">
                    <div id="liveppt_background" style="position:absolute;width:640px;height:360px;background:url(./images/pdf.png) no-repeat;z-index:555;"></div>

                        <div id="docComponent" style="height: 100%;border:1px solid #3c3d40;">
                            <gs:doc site="htexam.gensee.com" ownerid="<?php echo $_GET['liveUrl']?>" ctx="webcast" group="videogroup"/>
                        </div>
                </div>
               <?php }else if(isset($_GET['vodUrl']) && isset($_GET['secret'])){ ?>
                    <gs:video-vod  site="htexam.gensee.com" ctx="webcast" ownerid="<?php echo $_GET['vodUrl']?>"  uname="<?php echo $cookieUserName;?>" group="videogroup" bar="false" py="1" k="" authcode="<?php echo $_GET['secret']?>" bgimg="http://live.huatu.com/Public/images/tx.jpg"/>
                </div>
                    <!-- ppt-->
                <div class="liveppt">
                    <div id="liveppt_background" style="position:absolute;width:640px;height:360px;background:url(./images/pdf.png) no-repeat;z-index:555;"></div>

                        <div id="docComponent" style="height: 100%;border:1px solid #3c3d40;">
                            <gs:doc site="htexam.gensee.com" ownerid="<?php echo $_GET['vodUrl']?>" ctx="webcast" group="videogroup"/>
                        </div>
                </div>
                <?php }else{
                include "./jsonback.php";
                    $one=getOne();

                    if(!empty($one['on_live'])){ ?>
                    <gs:video-live  site="htexam.gensee.com" ctx="webcast" ownerid="<?php echo $one['on_live'][0][0]?>"  uname="<?php echo $cookieUserName;?>" group="videogroup" bar="false" py="1" k="" authcode="<?php echo $one['on_live'][0][1]?>" bgimg="http://live.huatu.com/Public/images/tx.jpg"/>
                </div>
                    <!-- ppt-->
                <div class="liveppt">
                    <div id="liveppt_background" style="position:absolute;width:640px;height:360px;background:url(./images/pdf.png) no-repeat;z-index:555;"></div>

                        <div id="docComponent" style="height: 100%;border:1px solid #3c3d40;">
                            <gs:doc site="htexam.gensee.com" ownerid="<?php echo $one['on_live'][0][0]?>" ctx="webcast" group="videogroup"/>
                        </div>
                </div>


                <?php  }else if(!empty($one['on_vod'])){ ?>
                    <gs:video-vod  site="htexam.gensee.com" ctx="webcast" ownerid="<?php echo $one['on_vod'][0][0]?>"  uname="<?php echo $cookieUserName;?>" group="videogroup" bar="false" py="1" k="" authcode="<?php echo $one['on_vod'][0][1]?>" bgimg="http://live.huatu.com/Public/images/tx.jpg"/>
                </div>
                    <!-- ppt-->
                <div class="liveppt">
                    <div id="liveppt_background" style="position:absolute;width:640px;height:360px;background:url(./images/pdf.png) no-repeat;z-index:555;"></div>

                        <div id="docComponent" style="height: 100%;border:1px solid #3c3d40;">
                            <gs:doc site="htexam.gensee.com" ownerid="<?php echo $one['on_vod'][0][0]?>" ctx="webcast" group="videogroup"/>
                        </div>
                </div>


                <?php  }else{ ?>
                    <gs:video-vod  site="htexam.gensee.com" ctx="webcast" ownerid=""  uname="<?php echo $cookieUserName;?>" group="videogroup" bar="false" py="1" k="" authcode="" bgimg="http://live.huatu.com/Public/images/tx.jpg"/>
                </div>
                    <!-- ppt-->
                <div class="liveppt">
                    <div id="liveppt_background" style="position:absolute;width:640px;height:360px;background:url(./images/pdf.png) no-repeat;z-index:555;"></div>

                        <div id="docComponent" style="height: 100%;border:1px solid #3c3d40;">
                            <gs:doc site="htexam.gensee.com" ownerid="" ctx="webcast" group="videogroup"/>
                        </div>
                </div>

                  <?php  } ?>
               <?php  } ?>




            <!--二维码扫码关注修改前-->
           <!-- <div class="smgz">
                <h3>快来扫一扫或<br>搜索公众号~</h3>
                <div style="left:153px;">
                    <img src="images/ewm_wx.jpg" alt="教师网" />
                    <span>微信公众号：htjiaoshi</span>
                </div>
                <div style="left:350px;">
                    <img src="images/ewm_qq.jpg" alt="教师网" />
                    <span><a href="#" target="_blank">QQ群：一键加群</a></span>
                </div>
            </div>-->
        <!--二维码扫码关注修改后-->
        <div class="smgz">
            <div class="wx">
                <img src="./images/ewm_wx.png" alt="教师网">
                <p>教师在线APP：题库 直播</p>
                <span>扫一扫下载</span>
            </div>
            <div class="qqun">
                <p>加群听免费早读课，获取最新备考信息</p>
                <p class="btn">一键加群</p>
            </div>

        </div>
            <!--咨询客服-->
            <div class="zxkf">

                <a onclick="doyoo.util.openChat('g=10059669');return false;" style="cursor:pointer" target="_blank">咨询客服</a>
            </div>
            <!--对话列表-->
            <div id="jq_boxRigList" class="talk_list">
                <ul>

                </ul>
             </div>
             <!--对话输入框-->
             <div class="inputbox">
                <form>
                    <div id="textarea" class="test_box" contentEditable='true' placeholder="听课别闲着，跟老师互动哦～"></div>
                    <input id="chat-submit" class="plbtn" type="button" value="发送" />
                </form>
             </div>
        </div>
        <!--右侧直播列表-->
        <div class="listwrap">
            <div class="clearfix">
                <h3 class="active">今日直播</h3>
                <h3>明日预告</h3>
            </div>
        <div class="livelist-container">
		<div class="livelist-today">
            <div class="livelist today">
                <ul>
                    
                </ul>
            </div>
            <div class="vidbtn">
                <span class="vid_prev"></span>
                <span class="vid_next"></span>
            </div>
		</div>
        <div class="livelist-today" style="display:none;">
            <div class="livelist nextday">
                <ul>
                    
                </ul>
            </div>
            <div class="vidbtn">
                <span class="vid_prev"></span>
                <span class="vid_next"></span>
            </div>
        </div>
        </div>

       
        </div>
  <script>
      $('.listwrap .clearfix h3').on('click',function(){
        var index= $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $('.livelist-container .livelist-today').hide().eq(index).show();
      })
  </script>
    </div>
</div>
<div class="bgColor"></div>
<div class="bgCon">
    <em></em>
    <p class="clearfix">资格证【笔试】QQ群号：237755640 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=6d85d45b95d1509cb84c63d1ca238ff5bdb9812bc7f5dad5adf33933f99e187a">一键加群</a></p>
    <p class="clearfix">资格证【面试】QQ群号：542473319 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=01a38daf59eec9ba59a625fadfa148be7592007a9276ad905b235109bbd094bb">一键加群</a>
    </p>
    <p class="clearfix">教师招聘【笔试】QQ群号：533618594 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=7a9406cb3467d5bd150b4e2af7ee137a5b63ab08823a79c9b0d1f8f9ff145683">一键加群</a></p>
    <p class="clearfix">教师招聘【面试】QQ群号：573832165 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=eaaf5c474f23373aecc895b9e6fa5cdeaecc105ed30a60522818567e8f492472">一键加群</a>
    </p>
</div>
<!--新增直播体验区结束-->


</body>
</html>
<script type="text/javascript" src="http://static.gensee.com/webcast/static/sdk/js/gssdk.js"></script>
<script type="text/javascript">var channel = GS.createChannel("videogroup");</script>
<script type="text/javascript" src="./js/live.d9akd32f.js"></script>
<script>
$(function(){
    $('.bgCon em').on('click',function(){
        $('.bgColor').fadeOut(500);
        $('.bgCon').fadeOut(500);
    });
    $('.btn').on('click',function(){
        $('.bgColor').fadeTo(500,0.6);
        $('.bgCon').fadeIn(500);
    });

  scrollLiveList()
    function scrollLiveList(){
      var nums=0;
      $('.vid_next').on('click',function(event) {
        var ns=$(this).parents('.livelist-today').find('ul li').length;
        console.log(ns);
        nums++;
        if (nums>ns-4) {nums=ns-4;
          $('.livelist ul').css('top',-nums*106);
          $('.vid_next').css('backgroundPosition', 'right top');
          $('.vid_prev').css('backgroundPosition', 'left bottom');
        }

        $('.livelist ul').animate({top:-nums*106}, 500);
        $('.vid_prev').css('backgroundPosition', 'left bottom');
      });
      $('.vid_prev').click(function(event) {
        nums--;
        if (nums<0) {nums=0;
          $('.livelist ul').css('top',0)
          $(this).css('backgroundPosition', 'right bottom');
          $('.vid_next').css('backgroundPosition', 'right top');
        }
        $('.livelist ul').animate({top:-nums*106}, 500);
        $('.vid_next').css('backgroundPosition', 'left top');
      });
    }


    $.getUrlParam = function (name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]); return null;
    }

    $.ajax({
        type: "GET",
        url: "./jsonback.php?action=getAll",
        dataType: "json",
        success: function(data){
            var url = $.getUrlParam('liveUrl')||$.getUrlParam('vodUrl')||$('.gs-sdk-widget:first').attr('ownerid');
            if (data.on) {
                $.each(data.on,function(key,value){
                    if (url == value.replay_id)
                    $(".today ul").append("<li class='on_zb' live_type='vod' endtime='"+value.end_time+"'><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='?vodUrl="+value.replay_id+"&secret="+value.secret+"'>观看录播</a><p>"+value.title+"</p></li>");
                    else if (url == value.room_id && !value.replay_id)
                    $(".today ul").append("<li class='on_zb' live_type='live' endtime='"+value.end_time+"'><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='?liveUrl="+value.room_id+"&secret="+value.secret+"'>正在直播</a><p>"+value.title+"</p></li>");
                    else if(value.room_id && value.replay_id)
                    $(".today ul").append("<li class='zbing' live_type='vod' endtime='"+value.end_time+"'><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='?vodUrl="+value.replay_id+"&secret="+value.secret+"'>观看录播</a><p>"+value.title+"</p></li>");
                    else
                    $(".today ul").append("<li class='zbing' live_type='live' endtime='"+value.end_time+"'><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='?liveUrl="+value.room_id+"&secret="+value.secret+"'>正在直播</a><p>"+value.title+"</p></li>");
                });
            }
            if (data.no) {
                $.each(data.no,function(key,value){
                    $(".today ul").append("<li class='no_zb'><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='javascript:void(0)'>马上开始</a><p>"+value.title+"</p></li>");
                });
            }

            if($('.today ul li').hasClass('on_zb')){
                if ($('.today ul .on_zb').attr('live_type') == 'vod') {
                    setInterval(function(){
                        if (checkEndTime($('.today ul .on_zb').attr('endtime'))) {
                            window.location.href = "./index3_lb.php";
                        }
                    },1000);
                }
            }
        }
    });

    $.ajax({
        type: "GET",
        url: "./jsonBackNext.php?action=getAll",
        dataType: "json",
        success: function(data){
             console.log( data )
             $.each(data,function(key,value){
                 $(".nextday ul").append("<li class='no_zb' live_type='live' endtime='"+value.end_time+"'><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='javascript:;'>明日预告</a><p>"+value.title+"</p></li>");
             });
        }
    });

})

</script>
<script type="text/javascript" charset="utf-8" src="http://lead.soperson.com/20001211/10057017.js"></script>
