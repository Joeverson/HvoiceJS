$(function(){

    var tamanhoM = parseInt($('.aba').css('width'));
    $('.nav li').on("click",function(){
        $('.nav li').removeClass('active');
        $(this).addClass('active');

        var pos = $(this).index();

        if(pos == 0){
            $('.aba').css({transition:'all 0.3s linear', transform:'translateX('+0+'px)'});
        }else if(pos == 1){
            $('.aba').css({transition:'all 0.3s linear', transform:'translateX('+-(tamanhoM)+'px)'});
        }else if(pos == 2){
            $('.aba').css({transition:'all 0.3s linear', transform:'translateX('+-(tamanhoM*2)+'px)'});
        }else if(pos == 3){
            $('.aba').css({transition:'all 0.3s linear', transform:'translateX('+-(tamanhoM*3)+'px)'});
        }

    });



    var tamanho = parseInt($('.opc-menu').css('width'));
    $('.btns button').on("click",function(){
        var pos = $(this).index();

        if(pos == 0){
            $('.op').css({transition:'all 0.3s linear', transform:'translateX('+0+'px)'});
        }else if(pos == 1){
            $('.op').css({transition:'all 0.3s linear', transform:'translateX('+-(tamanho)+'px)'});
        }else if(pos == 2){
            $('.op').css({transition:'all 0.3s linear', transform:'translateX('+-(tamanho*2)+'px)'});
        }else if(pos == 3){
            $('.op').css({transition:'all 0.3s linear', transform:'translateX('+-(tamanho*3)+'px)'});
        }
    });
});
