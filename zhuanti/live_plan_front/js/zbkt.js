$(function(){
	/*ͼƬ�ӳټ���*/
	function loadImg(Img){
        var oScrollTop=$(window).scrollTop();
        var oClientH=$(window).height();
        Img.each(function(index,element){
            var oTop=$(element).offset().top;
            if($(element).attr('src')){
                $(element).removeAttr('_src');
            }else{
                var oSrc=$(element).attr('_src');
                if(oScrollTop+oClientH>oTop){
                    $(element).attr('src',oSrc);
                }
            }
        });
    }
	$(window).on('scroll resize load',function(){
		loadImg($('#class_list img'));
	});
    /*ֱ����ˢѡ*/
    //����
    $('.totle li:nth-child(1)').on('click',function () {
        $(this).addClass('active').siblings().removeClass('active');
        $("input[name='zbtime']").val('');
        $("form").submit();
    });
    $(".totle li:nth-child(2)").on("click",function(){
        $(this).addClass('active').siblings().removeClass('active');
        $("input[name='zbtime']").val(1);
        $("form").submit();
    });
    $('.totle li:nth-child(3)').on('click',function () {
        $(this).addClass('active').siblings().removeClass('active');
        $("input[name='zbtime']").val(21);
        $("form").submit();
    });
    $('.totle li:nth-child(4)').on('click',function () {
        $(this).addClass('active').siblings().removeClass('active');
        $("input[name='zbtime']").val(22);
        $("form").submit();
    });
    $('.totle li:nth-child(5)').on('click',function () {
        $(this).addClass('active').siblings().removeClass('active');
        $("input[name='zbtime']").val(23);
        $("form").submit();
    });

    // ����ѡ��״̬
    var oProvince=$("input[name='Province']").val();
    $('#cur a').each(function (index, elem) {
        if($(elem).attr('value')==oProvince){
            $(this).addClass('current').siblings().removeClass('current');
        }
    });
    // �ۺ�����ѡ��״̬
    var oZbtime=$("input[name='zbtime']").val();
    $('ol.totle li').each(function (index, elem) {
        if($(elem).attr('value')==oZbtime){
            $(this).addClass('active').siblings().removeClass('active');
        }
    });

    // չ��������
    $('h3.title').on('click',function () {
        $('.class_nav').slideToggle(400);
        $(this).children('em').toggleClass('active');
    });
	$('.oArea_title').on('click',function () {
        $('.oArea').slideToggle(400);
    });

});
