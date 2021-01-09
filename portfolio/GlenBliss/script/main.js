var cnt=0, isClick = false;
var print_num = function(){
    if( cnt > 8){
        $(".btn>p").html((cnt+1)+" / 12");
    }else{
        $(".btn>p").html("0"+(cnt+1)+" / 12");
    }
};
var set_handle = setInterval(fadeTimer,5000);
    
function fadeTimer(){
    $(".slide>li").fadeOut();
    cnt++;
    if(cnt<0){cnt=11;}
    if(cnt>11){cnt=0;}
    $(".slide>li").eq(cnt).fadeIn();
    print_num();
};


this.onclick = function(e){
    if(e.target.id == "prev"){
            $(".slide>li").fadeOut()
            cnt--;
            if(cnt<0){cnt=11;}
            if(cnt>11){cnt=0;}
            $(".slide>li").eq(cnt).fadeIn();
            print_num();
    };
    if(e.target.id == "next"){
            $(".slide>li").fadeOut()
            cnt++;
            if(cnt<0){cnt=11;}
            if(cnt>11){cnt=0;}            
            $(".slide>li").eq(cnt).fadeIn();
            print_num();
    };
};
$(document).ready(function() {
    
    $('#footer_btn').on('click', function() {
        if(isClick == true){
            isClick = false;
            $('html, body').scrollTop('-160');
            set_handle = setInterval(fadeTimer,5000);
        }else{
            isClick = true;
            clearInterval(set_handle)
            $('html, body').animate({scrollTop: '160'});
        }
    });
    $(".topButton").click(function(){
        isClick = false;
    });
});
