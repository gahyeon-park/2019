var cnt=0;
var print_num = function(){
    if( cnt > 8){
        $(".btn>p").html((cnt+1)+" / 12");
    }else{
        $(".btn>p").html("0"+(cnt+1)+" / 12");
    }
}
setInterval(function(){
    $(".slide>li").fadeOut();
    cnt++;
    if(cnt>11){cnt=0;}
    $(".slide>li").eq(cnt).fadeIn();
    print_num();
},5000);
$("#prev").click(function(){
    $(".slide>li").fadeOut()
    cnt--;
    if(cnt<0){cnt=11;}
    $(".slide>li").eq(cnt).fadeIn();
    print_num();
});
$("#next").click(function(){
    $(".slide>li").fadeOut();
    cnt++;
    if(cnt>11){cnt=0;}
    $(".slide>li").eq(cnt).fadeIn();
    print_num();
});