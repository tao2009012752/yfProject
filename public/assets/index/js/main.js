
/*模板页js*/
Base = {
    //导航切换效果
    Menu : function(){
        var url = window.location.href;
        if(url.search('newslist')>0||url.search('listdetail')>0){
            $('.navBox li').eq(1).addClass('liAction');
        }else if(url.search('Talent/index')>0){
            $('.navBox li').eq(2).addClass('liAction');
        }else{
            $('.navBox li').eq(0).addClass('liAction');
        }
    }
}

/*资讯中心js*/
News = {
    //左侧导航切换效果
    Menu : function(catename){
        if($('li[data="'+catename+'"]').length>0){
            $('li[data="'+catename+'"]').find('a').addClass('erjiListAction');
        }else{
            $('.leftBox .titBoxs li a').eq(0).addClass('erjiListAction');
        }

    }
}