$(function(){
    $(".notice_nav h1").mouseover(function(){
        $(this).children(".underline").css('display', 'block');
    });
    $(".notice_nav h1").mouseleave(function(){
        $(this).children(".underline").css('display', 'none');
    });
});