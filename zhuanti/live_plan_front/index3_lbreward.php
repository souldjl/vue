<?php
    if( isset($_COOKIE['htun']) ){
        $touristName = base64_decode( $_COOKIE['htun'] );
    }else{
        $code = md5($_SERVER['REMOTE_ADDR'].rand(10000,99999).'游客');
        $touristName = '游'.substr($code, 3, 6);
        setcookie('htun', base64_encode($touristName),time()+3600*24*7,null, 'hteacher.net',null,true);
    }
//    var_dump( $touristName );
?>
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
    <link rel="stylesheet" href="css/reward.css" type="text/css" >
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://static.gensee.com/webcast/static/interactive/js/json2.js"></script>
    <script type="text/javascript" src="http://static.gensee.com/webcast/static/sdk/js/gssdk.js"></script>
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
        height: 342px;
        position: fixed;
        left: 50%;
        top: 50%;
        margin-left: -261px;
        margin-top: -160px;
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
        margin-right: 50px;
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
        $cookieUserName = $touristName;
    }else{
        $cookieUserName = getUserName();
    }

 ?>
<div class="zbty">




    <div class="livebox">
        <div class="videobox">
            <!--直播头像 -->
                <div class="livetx" id="livetx">
                   <!-- <div id="livetx_background" style="position:absolute;width:282px;height:212px;background:url(./images/live-head.png) no-repeat;z-index:555;"></div>-->
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
                <a class="addLinktoReview" href="http://www.hteacher.net/zhuanti/liveplayback/" title="全天直播回放卡课程" target="_blank">点击查看回放</a>
            </div>

        </div>
            <!--咨询客服-->
            <div class="zxkf clearfix">
                <a href="javascript:;" class="reward_btn fr"></a>
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
                <ul></ul>
            </div>
            <div class="vidbtn">
                <span class="vid_prev vid_prev1"></span>
                <span class="vid_next vid_next1"></span>
            </div>
		</div>
        <div class="livelist-today" style="display:none;">
            <div class="livelist nextday">
                <ul></ul>
            </div>
            <div class="vidbtn">
                <span class="vid_prev vid_prev2"></span>
                <span class="vid_next vid_next2"></span>
            </div>
        </div>
        </div>

       
        </div>
<!--  <script>
    function isEdge(){
      var usag = window.navigator.userAgent;
      if( usag ){
        if(  usag.indexOf('Edge') != -1 ){
          return false;
        }else{
          return true;
        }
      }
    }
    if(isEdge()){
      var oDiv=$('<div id="livetx_background" style="position:absolute;width:282px;height:212px;background:url(./images/live-head.png) no-repeat;z-index:555;"></div>');
      $('#livetx').prepend(oDiv);
    }
  </script>-->
    </div>
</div>
<div class="bgColor"></div>
<div class="bgCon">
    <em></em>
    <p class="clearfix">资格证【笔试】QQ群号：461287727 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=87b251b1ca6aaf739d514219f2b5a7c1dfb83a3199bf34de51cbd8e856484733">一键加群</a></p>
    <p class="clearfix">资格证【面试】QQ群号：542473319 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=01a38daf59eec9ba59a625fadfa148be7592007a9276ad905b235109bbd094bb">一键加群</a>
    </p>
    <p class="clearfix">教师招聘【笔试】QQ群号：533618594 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=7a9406cb3467d5bd150b4e2af7ee137a5b63ab08823a79c9b0d1f8f9ff145683">一键加群</a></p>
    <p class="clearfix">事业单位D类【笔试】QQ群号：514840426 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=c5b2c1eff6be290c8b32491ba6ee6acfcd469b8663cf97ad628a7d1530b59602">一键加群</a></p>
    <p class="clearfix">特岗【笔试】QQ群号： 532524495 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=04389723316c8d48e4846b5a2f75b6c5fb982379ce3693ddcadb84a99c0b4da7">一键加群</a></p>
    <p class="clearfix">教师招聘【面试】QQ群号：573832165 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=eaaf5c474f23373aecc895b9e6fa5cdeaecc105ed30a60522818567e8f492472">一键加群</a>
    </p>
</div>
  <!--打赏功能-->
<input type="hidden" value="" id="teacher_id">
<input type="hidden" value="" id="teacher_name">
<input type="hidden" value="" id="plan_id">
<input type="hidden" value="<?php echo $cookieUserName;?>" id="cookieUserName">
<div id="layer"></div>
<div class="reward_window" id="pay_before" style="display:none;">
    <div class="title clearfix">
        <span class="fl">打赏红包</span>
        <a class="fr close_reward_window" href="javascript:;"></a>
    </div>
    <div class="body">
        <ul class="clearfix">
            <li class="selected" data-attr="1">￥1</li>
            <li data-attr="2">￥2</li>
            <li data-attr="5">￥5</li>
            <li data-attr="10">￥10</li>
            <li data-attr="20">￥20</li>
            <li data-attr="50">￥50</li>
            <li data-attr="">
                <div class="otherMoney">其他金额</div>
                <div class="input_pay" style="display:none;">
                    <input type="text" id="reward_money">
                   <!-- <input  type="text" onkeyup="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">-->
                </div>
            </li>
        </ul>
        <div class="pays_btn_box">
            <div class="pays_btn wx">微信支付</div>
            <div class="pays_btn zfb">支付宝支付</div>
        </div>
    </div>
</div>
<!--<div class="reward_window" >
      <div class="title clearfix">
          <span class="fl">打赏红包</span>
          <a class="fr close_reward_window" href="javascript:;"></a>
      </div>
      <div class="body">
          <div class="likeul">
              <div class="input_pay">
                  <input  type="text">
              </div>
          </div>
          <div class="other_pays">
              <h4 class="active">其他金额</h4>
          </div>
          <div class="pays_btn_box">
              <div class="pays_btn wx">微信支付</div>
              <div class="pays_btn zfb">支付宝支付</div>
          </div>
      </div>
  </div>-->

  <div class="reward_window" id="pay-paying" style="display:none">
      <div class="title clearfix">
          <span class="fl">打赏红包</span>
          <a class="fr close_reward_window" href="javascript:;"></a>
      </div>
      <div class="body-wxzf">
          <img src="./images/wxpay_code.png" width="146" height="150"><br />
          <span class="desc">微信扫一扫立即支付</span>
      </div>
      <div class="other_pay_method">
          <a href="javascript:;" id="changePayMethod_wx">选择其他支付方式></a>
      </div>
  </div>


  <div class="reward_window" id="pay-after" style="display:none;">
      <div class="title clearfix">
          <span class="fl">打赏红包</span>
          <a class="fr close_reward_window" href="javascript:;"></a>
      </div>
      <div class="body-zf_success">
          <p class="col"> 恭喜您，支付成功～</p>
          <p>
              支付遇到问题？换用其他 <a class="col" href="javascript:;">支付方式></a>
          </p>
      </div>
  </div>
  <div class="reward_window" id="zfb_frame" style="display:none">
      <div class="title clearfix">
          <span class="fl">打赏红包</span>
          <a class="fr close_reward_window" href="javascript:;"></a>
      </div>
      <div class="body-zfbzf">
      </div>
      <div style="text-align: center">
          <span class="desc">支付宝扫一扫立即支付</span>
      </div>
      <div class="other_pay_method">
          <a href="javascript:;" id="changePayMethod_zfb">选择其他支付方式></a>
      </div>
  </div>

  <!--<div class="reward_window" style="display:none;" id="zfb_frame">
  <iframe src="./zfbpay.html" id="alipay" frameborder="0" width="330px" height="350px;"></iframe>
  </div>-->
<!--新增直播体验区结束-->

<div id="payzfb"></div>
</body>
</html>
<script type="text/javascript" src="http://static.gensee.com/webcast/static/sdk/js/gssdk.js"></script>
<script type="text/javascript">var channel = GS.createChannel("videogroup");</script>
<script type="text/javascript" src="./js/live.d9akd32f2.js"></script>
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



  $('.listwrap .clearfix h3').on('click',function(){
    var index= $(this).index();
    $(this).addClass('active').siblings().removeClass('active');
    $('.livelist-container .livelist-today').hide().eq(index).show();
  });

        var nums1=0,nums2=0;

      $('.vid_next1').on('click',function() {
        var ns1=$('.today li').length;
        if(ns1<4){
          $('.livelist.today').parents('.livelist-today').find('.vid_prev1').css('backgroundPosition', 'left bottom');
          $(this).css('backgroundPosition', 'right top');
          return ;
        }
        nums1++;
       if (nums1>ns1-4) {
            nums1=ns1-4;
            $('.livelist.today').parents('.livelist-today').find('.vid_next1').css('backgroundPosition', 'right top');
            $('.livelist.today').parents('.livelist-today').find('.vid_prev1').css('backgroundPosition', 'left bottom');
        }
		 $('.livelist.today ul').animate({top:-nums1*106}, 500);
         $('.livelist.today').parents('.livelist-today').find('.vid_prev1').css('backgroundPosition', 'left bottom');
      });

      $('.vid_prev1').click(function() {
        var ns1=$('.today li').length;
        nums1--;
        if (nums1<=0) {
          nums1=0;
          $('.livelist.today ul').css('top',0)
          $('.livelist.today').parents('.livelist-today').find('.vid_prev1').css('backgroundPosition', 'right bottom');
          $('.livelist.today').parents('.livelist-today').find('.vid_next1').css('backgroundPosition', 'right top');
        }
        $('.livelist.today ul').animate({top:-nums1*106}, 500);
        $('.livelist.today').parents('.livelist-today').find('.vid_next1').css('backgroundPosition', 'left top');
      });



       $('.vid_next2').on('click',function() {

         var ns2=$('.nextday li').length;
         if(ns2<4){
           $('.livelist.nextday').parents('.livelist-today').find('.vid_prev2').css('backgroundPosition', 'left bottom');
           $(this).css('backgroundPosition', 'right top');
           return ;
         }
         nums2++;
           if (nums2>ns2-4) {
             nums2=ns2-4;
             $('.livelist.nextday').parents('.livelist-today').find('.vid_next2').css('backgroundPosition', 'right top');
             $('.livelist.nextday').parents('.livelist-today').find('.vid_prev2').css('backgroundPosition', 'left bottom');
           }
           $('.livelist.nextday ul').animate({top:-nums2*106}, 500);
       });
       $('.vid_prev2').click(function() {
         nums2--;
         if (nums2<0) {
           nums2=0;
           $('.livelist.nextday ul').css('top',0)
           $('.livelist.nextday').parents('.livelist-today').find('.vid_prev2').css('backgroundPosition', 'right bottom');
           $('.livelist.nextday').parents('.livelist-today').find('.vid_next2').css('backgroundPosition', 'right top');
         }
         $('.livelist.nextday ul').animate({top:-nums2*106}, 500);
         $('.livelist.nextday').parents('.livelist-today').find('.vid_next2').css('backgroundPosition', 'left top');
       });






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
              //教师id
              $('#teacher_id').val(data.on[0].teacher_id)
              $('#teacher_name').val(data.on[0].teacher_name)
              $('#plan_id').val(data.on[0].id)
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
             $.each(data,function(key,value){
                 $(".nextday ul").append("<li class='no_zb' live_type='live' endtime='"+value.end_time+"'><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='javascript:;'>即将开始</a><p>"+value.title+"</p></li>");
             });
        }
    });

})

</script>
<script type="text/javascript" charset="utf-8" src="http://lead.soperson.com/20001211/10057017.js"></script>

<script>
  var timer=null,
    iframe,
    pay_count,
    confirmId='',
    confirmVcode='',
    wx_pay_url="http://www.hteacher.net/pay/weixin/ega/native1.php",
    zfb_pay_url='/order/alipayreward/alipayto1.php',
    wx_createOrder='http://www.hteacher.net/zhuanti/live_plan_front/create_bonus_order.php',
    wx_confirmOrder='http://www.hteacher.net/zhuanti/live_plan_front/checkout_bonus_order.php',
    step2_url="http://www.hteacher.net/pay/weixin/ega/getorderstatus1.php";
  var reg = /(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/;

  //点击打赏按钮
  $('.reward_btn.fr').on('click',function(){
    $('#layer').show();
    $('#pay_before').show();
    $('.reward_window .body ul li:last').find('.otherMoney').show().siblings().find('input').val('');
    $('.reward_window .body ul li:first').addClass('selected');
    $('.reward_window .body ul li:last').removeClass('selected');
  })
  //选择打赏金额
  $('.reward_window .body ul li').on('click',function(){
    $(this).addClass('selected').siblings('li').removeClass('selected');
    if($.trim($(this).text()) == '其他金额'){
      $('.otherMoney').hide().siblings('div').show();
      $('.input_pay input').focus();
    }else{
      $('.otherMoney').show().siblings('div').hide()
      $('.input_pay input').val('');
    }
  });

  function getQrCode(pay_count,getPayResult,createOrder,sureOrder){
    $.post(wx_pay_url,{'total_fee':pay_count},function(data){
      var wxzfSrc = 'http://www.hteacher.net/pay/weixin/ega/'+data.url;

      if( !createOrder(pay_count,data)){
          alert('参数不正确，请重新输入');
          $('.reward_window .body ul li:last').find('.otherMoney').show().siblings().find('input').val('');
          $('.reward_window .body ul li:first').addClass('selected');
          $('.reward_window .body ul li:last').removeClass('selected');
          return false;
      }else{
          $('.body-wxzf img').attr('src',wxzfSrc);
          $('#pay-paying').hide().show();
      }
      getPayResult(pay_count,data,sureOrder)
    },'json');
  }

  function getPayResult(pay_count,data,sureOrder) {
    clearInterval(timer);
    timer = setInterval(function () {
      $.post(step2_url, {'out_trade_no': data.out_trade_no}, function (status) {
        $('#reward_money').val('');
        if (status == 'SUCCESS') {
          clearInterval(timer);
          sureOrder();
        }
      })
    }, 1000)
  }
  function getPayCount(){
    if($('.reward_window .body ul li').hasClass('selected')){
      pay_count=$('.reward_window .body ul li.selected').html();
      if($('.reward_window .body ul li:last').hasClass('selected')){
        if(reg.test($('#reward_money').val())){
          if(Number($('#reward_money').val())>0){
            pay_count=$('#reward_money').val();
          }else{
            return false;
          }
        }else{
          $('#reward_money').val('');
          $('#reward_money').parent().hide().siblings('.otherMoney').show();
          return false;
        }
      }else{
        pay_count = pay_count.substring(1);
      }
      $('.reward_window .body ul li').removeClass('selected');
      return pay_count;
    }else{
      return false;
    }
  }
  function createWxOrder(wx_payMoney,data){
    if($('#teacher_id').val()){
        var wxOrderInfos = {
            'teacher_id': $('#teacher_id').val(),
            'plan_id'   : $('#plan_id').val(),
            'out_trade_no':data.out_trade_no,
            'customer':$('#cookieUserName').val(),
            'fee'     :wx_payMoney,
            'pay_type':'wx'
        };
        $.post(wx_createOrder,wxOrderInfos,function(infos){

            if(infos.ecode=='0'){
                confirmId=infos.data.id;
                confirmVcode=infos.data.vcode;
            }
        },'json');
        return true;
    }else{
        return false;
    }

  }
  function sureOrder(){
    $.post(wx_confirmOrder,{'id':confirmId,'vcode':confirmVcode},function(data){
      if(data.ecode == '0'){
        clearInterval(timer);
        $('#pay-paying').hide();
        $('#pay-after').show();
        var message = '我认为' + $('#teacher_name').val() + '讲的好赞,打赏了'+pay_count+'元辛苦费';
        channel.send("submitChat", {
          "richtext": message
        });
        $(".talk_list ul").append("<li><span style='float:left'>我</span>" + message + "</li>");
        var oH = $(".talk_list ul").height() + $(".talk_list ul").scrollTop();
        $('.talk_list ul').scrollTop(oH);
        $("#textarea").html("");
        setTimeout(function(){
          $('#pay_before').hide();
          $('#pay-paying').hide();
          $('#pay-after').hide();
          $('#layer').hide()
        },2000)
      }
    },'json')
  }
  //微信支付'
  $('.pays_btn.wx').on('click',function() {
      clearInterval(timer);
      var wx_payMoney = getPayCount();
      if (wx_payMoney) {
          getQrCode(wx_payMoney, getPayResult, createWxOrder, sureOrder);
      } else {
          $('#reward_money').val('').focus();
          alert('金额输入不合法\n请重新输入')
      }
  })
   // getQrCode(pay_count,getPayResult,createOrder,sureOrder)


  //支付宝支付
  $('.pays_btn.zfb').on('click',function(){
    clearInterval(timer);
    var zfb_payMoney = getPayCount();
    if(zfb_payMoney){
          var zfb_args={
            'bankval':'directPay','pay_banka':'a','pay_bankb':'w',
            'total_fee':zfb_payMoney,'subject':encodeURIComponent('直播打赏')
          };
         if(!$('#teacher_id').val()){
                alert('参数不正确，请重新输入');
             $('.reward_window .body ul li:last').find('.otherMoney').show().siblings().find('input').val('');
             $('.reward_window .body ul li:first').addClass('selected');
             $('.reward_window .body ul li:last').removeClass('selected');
             return false;
         }else {
             $.post(zfb_pay_url, zfb_args, function (data) {
                 $('#reward_money').val('');
                 var data = $.parseJSON(data)
                 var frameText = '<iframe src="./zfbpay.html" id="alipay" frameborder="0" width="160px" height="160px;overflow:" scrolling="no"></iframe>'
                 $('.body-zfbzf').html(frameText);
                 iframe = document.getElementById("alipay");
                 var func = function () {
                     $('#alipay').contents().find("body").html(data.html_text);
                     $('#zfb_frame').show();
                     iframe.onload = iframe.onreadystatechange = null;
                     $('#alipay').contents().find("form").submit();
                 };
                 iframe.onload = iframe.onreadystatechange = func;
                 createAliOrder(zfb_payMoney, data, getAliPayResult)
             })
         }
    }else{
         $('#reward_money').val('').focus();
         alert('金额输入不合法\n请重新输入')
     }
  });


  function getAliPayResult(id,vcode,zfb_payMoney) {
      timer = setInterval(function () {
        isAliPaySuceess(id,vcode,zfb_payMoney,sureAliPay)
      }, 500)
  }


  function isAliPaySuceess(id,vcode,zfb_payMoney,sureAliPay){
    try{
      var trade_no=$('#alipay').contents().find("input[name='trade_no']").val();
      var out_trade_no=$('#alipay').contents().find("input[name='out_trade_no']").val();
      var trade_status=$('#alipay').contents().find("input[name='trade_status']").val();
      var buyer_email=$('#alipay').contents().find("input[name='buyer_email']").val();
      if(trade_no && out_trade_no && trade_status && buyer_email){
        clearInterval(timer);
        sureAliPay(confirmId,confirmVcode,zfb_payMoney,trade_no,buyer_email);
      }
    }catch(e){
    // console.log(e)
    }
  }

  function sureAliPay(id,vcode,zfb_payMoney,trade_no,buyer_email){
    var aliPay_args={
      'id':id,
      'vcode':vcode,
      'third_trade_no':trade_no,
      'buyer_contact':buyer_email
    }
      $.post(wx_confirmOrder,aliPay_args,function(data){
        if(data.ecode == '0'){
          clearInterval(timer);
          $('#pay-paying').hide();
          $('#zfb_frame').hide();
          $('.body-zfbzf').html('');
          $('#pay-after').show();
          var message = '我认为' + $('#teacher_name').val() + '讲的好赞,打赏了'+zfb_payMoney+'元辛苦费';
          channel.send("submitChat", {
            "richtext": message
          });
          $(".talk_list ul").append("<li><span style='float:left'>我</span>" + message + "</li>");
          var oH = $(".talk_list ul").height() + $(".talk_list ul").scrollTop();
          $('.talk_list ul').scrollTop(oH);
          $("#textarea").html("");
          /*setTimeout(function(){*/
            $('#pay_before').hide();
            $('#pay-paying').hide();
            $('#pay-after').hide();
            $('#layer').hide()
         /* },200)*/
        }
      },'json')
  }
  function createAliOrder(zfb_payMoney,data,getAliPayResult){
        var wxOrderInfos = {
            'teacher_id': $('#teacher_id').val(),
            'plan_id'   : $('#plan_id').val(),
            'out_trade_no':data.out_trade_no,
            'customer':$('#cookieUserName').val(),
            'fee'     :zfb_payMoney,
            'pay_type':'alipay'
        };
        $.post(wx_createOrder,wxOrderInfos,function(infos){
            if(infos.ecode=='0'){
                confirmId=infos.data.id;
                confirmVcode=infos.data.vcode;
                getAliPayResult(confirmId,confirmVcode,zfb_payMoney)
            }
        },'json');

  }

  //更改支付方式


  $('#changePayMethod_wx').on('click',function(){


    clearInterval(timer);
    pay_count='';
    confirmId='';
    confirmVcode='';
    $('#pay_before').show();
    $(this).parents('#pay-paying').hide();
    $('.reward_window .body ul li').removeClass('selected');
    $('.reward_window .body ul li:last').find('.otherMoney').show().siblings().find('input').val('');
    $('.reward_window .body ul li:first').addClass('selected');

  });


  $('#changePayMethod_zfb').on('click',function(){
    clearInterval(timer);
    $('.body-zfbzf').html('');
    pay_count='';
    confirmId='';
    confirmVcode='';
    $('.reward_window .body ul li').removeClass('selected');
    $('.reward_window .body ul li:last').find('.otherMoney').show().siblings().find('input').val('');
    $('.reward_window .body ul li:first').addClass('selected');
    $('#pay_before').show();
    $('#zfb_frame').hide();
  });



  // 关闭
  $('.close_reward_window').on('click',function(){
    $('.body-zfbzf').html('');
    clearInterval(timer);
     pay_count='';
     confirmId='';
     confirmVcode='';
    $('#layer').hide();
    $('.reward_window').hide();
  })
</script>
