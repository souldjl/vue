<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gbk">
    <title>С�۷�</title>
    <meta name="description" content="��ͼ��ʦ���ǻ�ͼ����������ҪƷ��,�ṩ��ʦ��Ƹ����(���ظ�)��������ʦ�ʸ�֤���Թ��桢����ʱ�䡢������ڡ�������Ϣ���������ϡ�������ѵ��,��ʦ������Ϣ���ڻ�ͼ��ʦ��." />
<meta name="keywords" content="��ʦ,��ʦ��Ƹ,��ʦ�ʸ�֤����,��ʦ����,��ʦ��,��ͼ" />
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <link href="css/index_sx.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="//cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
 <!--����ֱ����������ʼ-->
  <?php
    include "../../inc/cookie.php";
    if(empty($_COOKIE['hteacherneta'])){
        $cookieUserName = '�ο�'.rand(1000,9999);
    }else{
        $cookieUserName = getUserName();
    }

 ?>
<div class="zbty">
    <h2>ֱ��������</h2>
    <div class="livebox">
        <div class="videobox">
            <!--ֱ��ͷ�� -->
            <div class="livetx">
            <?php if(isset($_GET['liveUrl']) && isset($_GET['secret'])){ ?>
                    <gs:video-live  site="htexam.gensee.com" ctx="webcast" ownerid="<?php echo $_GET['liveUrl']?>"  uname="<?php echo $cookieUserName;?>" group="videogroup" bar="false" py="1" k="" authcode="<?php echo $_GET['secret']?>" bgimg="http://live.huatu.com/Public/images/tx.jpg"/>
                    </div>
                    <!-- ppt-->
                    <div class="liveppt">
                        <div id="docComponent" style="height: 100%;border:1px solid #3c3d40;">
                            <gs:doc site="htexam.gensee.com" ownerid="<?php echo $_GET['liveUrl']?>" ctx="webcast" group="videogroup"/>
                        </div>
                    </div>
               <?php }else if(isset($_GET['vodUrl']) && isset($_GET['secret'])){ ?>
                    <gs:video-vod  site="htexam.gensee.com" ctx="webcast" ownerid="<?php echo $_GET['vodUrl']?>"  uname="<?php echo $cookieUserName;?>" group="videogroup" bar="false" py="1" k="" authcode="<?php echo $_GET['secret']?>" bgimg="http://live.huatu.com/Public/images/tx.jpg"/>
                    </div>
                    <!-- ppt-->
                    <div class="liveppt">
                        <div id="docComponent" style="height: 100%;border:1px solid #3c3d40;">
                            <gs:doc site="htexam.gensee.com" ownerid="<?php echo $_GET['vodUrl']?>" ctx="webcast" group="videogroup"/>
                        </div>
                    </div>
                <?php }else{
                include "./jsonback.php";
                    $one=getOne();

                    if(!empty($one['on'])){ ?>
                    <gs:video-live  site="htexam.gensee.com" ctx="webcast" ownerid="<?php echo $one['on'][0][0]?>"  uname="<?php echo $cookieUserName;?>" group="videogroup" bar="false" py="1" k="" authcode="<?php echo $one['on'][0][1]?>" bgimg="http://live.huatu.com/Public/images/tx.jpg"/>
                    </div>
                    <!-- ppt-->
                    <div class="liveppt">
                        <div id="docComponent" style="height: 100%;border:1px solid #3c3d40;">
                            <gs:doc site="htexam.gensee.com" ownerid="<?php echo $one['on'][0][0]?>" ctx="webcast" group="videogroup"/>
                        </div>
                    </div>


                <?php  }else if(!empty($one['over'])){ ?>
                    <gs:video-vod  site="htexam.gensee.com" ctx="webcast" ownerid="<?php echo $one['over'][0][0]?>"  uname="<?php echo $cookieUserName;?>" group="videogroup" bar="false" py="1" k="" authcode="<?php echo $one['over'][0][1]?>" bgimg="http://live.huatu.com/Public/images/tx.jpg"/>
                    </div>
                    <!-- ppt-->
                    <div class="liveppt">
                        <div id="docComponent" style="height: 100%;border:1px solid #3c3d40;">
                            <gs:doc site="htexam.gensee.com" ownerid="<?php echo $one['over'][0][0]?>" ctx="webcast" group="videogroup"/>
                        </div>
                    </div>

                   <?php }else{ ?>
                    <gs:video-vod  site="htexam.gensee.com" ctx="webcast" ownerid=""  uname="<?php echo $cookieUserName;?>" group="videogroup" bar="false" py="1" k="" authcode="" bgimg="http://live.huatu.com/Public/images/tx.jpg"/>
                    </div>
                    <!-- ppt-->
                    <div class="liveppt">
                        <div id="docComponent" style="height: 100%;border:1px solid #3c3d40;">
                            <gs:doc site="htexam.gensee.com" ownerid="" ctx="webcast" group="videogroup"/>
                        </div>
                    </div>

                  <?php  } ?>
               <?php  } ?>




            <!--��ά��ɨ���ע�޸�ǰ-->
           <!-- <div class="smgz">
                <h3>����ɨһɨ��<br>�������ں�~</h3>
                <div style="left:153px;">
                    <img src="images/ewm_wx.jpg" alt="��ʦ��" />
                    <span>΢�Ź��ںţ�htjiaoshi</span>
                </div>
                <div style="left:350px;">
                    <img src="images/ewm_qq.jpg" alt="��ʦ��" />
                    <span><a href="#" target="_blank">QQȺ��һ����Ⱥ</a></span>
                </div>
            </div>-->
        <!--��ά��ɨ���ע�޸ĺ�-->
        <div class="smgz">
            <div class="wx">
                <img src="images/ewm_wx.jpg" alt="��ʦ��">
                <p>΢�Ź��ںţ�htjiaoshi</p>
                <span>ɨһɨ</span>
            </div>
            <div class="qqun">
                <p>�ʸ�֤�����ԡ�QQȺ�ţ�237755640 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=6d85d45b95d1509cb84c63d1ca238ff5bdb9812bc7f5dad5adf33933f99e187a">һ����Ⱥ</a></p>
                <p>�ʸ�֤�����ԡ�QQȺ�ţ�542473319 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=01a38daf59eec9ba59a625fadfa148be7592007a9276ad905b235109bbd094bb">һ����Ⱥ</a>
                </p>
                <p>��ʦ��Ƹ�����ԡ�QQȺ�ţ�533618594 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=7a9406cb3467d5bd150b4e2af7ee137a5b63ab08823a79c9b0d1f8f9ff145683">һ����Ⱥ</a></p>
                <p>��ʦ��Ƹ�����ԡ�QQȺ�ţ�573832165 <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=eaaf5c474f23373aecc895b9e6fa5cdeaecc105ed30a60522818567e8f492472">һ����Ⱥ</a>
                </p>
            </div>
        </div>
            <!--��ѯ�ͷ�-->
            <div class="zxkf">

				<a onclick="doyoo.util.openChat('g=10059669');return false;" style="cursor:pointer" target="_blank">��ѯ�ͷ�</a>
            </div>
            <!--�Ի��б�-->
            <div id="jq_boxRigList" class="talk_list">
                <ul>

                </ul>
             </div>
             <!--�Ի������-->
             <div class="inputbox">
                <form>
                    <div id="textarea" class="test_box" contentEditable='true' placeholder="���α����ţ�����ʦ����Ŷ��"></div>
                    <input id="chat-submit" class="plbtn" type="button" value="����" />
                </form>
             </div>
        </div>
        <!--�Ҳ�ֱ���б�-->
        <div class="listwrap">
            <h3>����ֱ��</h3>
            <div class="livelist">
                <ul>
<!--                     ֱ���ѽ���over_zb
<li class="over_zb">
    <p>���۾���1����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">�ۿ�¼��</a>
</li>
���ڲ��ŵ�ֱ��on_zb
<li class="on_zb">
    <p>���۾���2����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">����ֱ��</a>
</li>
δ���ŵ�ֱ��
<li class="zbing">
    <p>���۾���3����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">����ֱ��</a>
</li>
��δ��ʼ��ֱ��
<li class="no_zb">
    <p>���۾���4����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">���Ͽ�ʼ</a>
</li>
<li class="no_zb">
    <p>���۾���4����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">���Ͽ�ʼ</a>
</li>
<li class="no_zb">
    <p>���۾���4����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">���Ͽ�ʼ</a>
</li>
<li class="no_zb">
    <p>���۾���4����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">���Ͽ�ʼ</a>
</li>
<li class="no_zb">
    <p>���۾���4����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">���Ͽ�ʼ</a>
</li><li class="no_zb">
    <p>���۾���4����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">���Ͽ�ʼ</a>
</li><li class="no_zb">
    <p>���۾���4����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">���Ͽ�ʼ</a>
</li>
<li class="no_zb">
    <p>���۾���4����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">���Ͽ�ʼ</a>
</li>
<li class="no_zb">
    <p>���۾���4����������������ѧϰ��������������ѧϰ</p>
    <span><em>19:00</em>-21:00</span>
    <a href="#">���Ͽ�ʼ</a>
</li> -->
                </ul>
            </div>
            <div class="vidbtn">
                <span class="vid_prev"></span>
                <span class="vid_next"></span>
            </div>
        </div>
    </div>
</div>
<!--����ֱ������������-->


</body>
</html>
<script type="text/javascript" src="http://static.gensee.com/webcast/static/sdk/js/gssdk.js"></script>
<script type="text/javascript">var channel = GS.createChannel("videogroup");</script>
<script type="text/javascript" src="./js/live_2.js"></script>
<script>
$(function(){
     var nums=0;
    $('.vid_next').on('click',function(event) {
     var ns=$('.livelist ul li').length;
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
            if (data.over) {
                $.each(data.over,function(key,value){
                    if (url == value.replay_id)
                    $(".livelist ul").append("<li class='on_zb'><p>"+value.title+"</p><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='?vodUrl="+value.replay_id+"&secret="+value.secret+"'>�ۿ�¼��</a></li>");
                    else
                    $(".livelist ul").append("<li class='over_zb'><p>"+value.title+"</p><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='?vodUrl="+value.replay_id+"&secret="+value.secret+"'>�ۿ�¼��</a></li>");
                });
            }
            if (data.on) {
                $.each(data.on,function(key,value){
                    if (url == value.room_id)
                    $(".livelist ul").append("<li class='on_zb'><p>"+value.title+"</p><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='?liveUrl="+value.room_id+"&secret="+value.secret+"'>����ֱ��</a></li>");
                    else
                    $(".livelist ul").append("<li class='zbing'><p>"+value.title+"</p><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='?liveUrl="+value.room_id+"&secret="+value.secret+"'>����ֱ��</a></li>");
                });
            }
            if (data.no) {
                $.each(data.no,function(key,value){
                    $(".livelist ul").append("<li class='no_zb'><p>"+value.title+"</p><span><em>"+value.start_time+"</em>-"+value.end_time+"</span><a href='javascript:void(0)'>���Ͽ�ʼ</a></li>");
                });
            }
        }
    });
})

</script>
<script type="text/javascript" charset="utf-8" src="http://lead.soperson.com/20001211/10057017.js"></script>