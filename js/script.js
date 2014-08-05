$(function(){

    var tamanhoM = parseInt($('.aba').css('width')); // alternar entre as abas
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
        }else if(pos == 4){
            console.log(tamanhoM*4);
            $('.aba').css({transition:'all 0.3s linear', transform:'translateX('+-(tamanhoM*4)+'px)'});
        }

    });



    var tamanho = parseInt($('.opc-menu').css('width')); // alternar entre as opções
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


    $('.salvarAlteracoes').on("click",function(){
        var termNav = $('#termNavegate').val();
        var linkNav = $('#linkNavigate').val();
        var termMove = $('#termMovePage').val();
        var takePage = $('#selectMovePage').val();
        var termAcoes = $('#termAcoesPage').val();
        var takeAcoes = $('#selectAcaoPage').val();

        console.log(linkNav);

        $.ajax({
            type:'post',
            url: '/SPH%20-%20SiteSpeech/php/reloadJSON.php',
            data: 'termNav='+termNav+'&linkNav='+linkNav+'&termMovePage='+termMove+'&selectMovePage='+takePage+'&selectAcaoPage='+takeAcoes+'&termAcoesPage='+termAcoes,
            datatype: 'html'

        }).done(function(e){
            $('input').val('');
            alert('Ok, termo registrado!');
            console.log(e);
        }).fail(function(){
            alert('Putz, houve um erro no registro');
        });
    });




    $('.salvarNewRegistro').on("click",function(){ // salvar novo registro (modo avançado)
        var termNew = $('#termNew').val();
        var func = $('#func').val();
        var desc = $('#descTerm').val();


        //converter para string caso não esteja dentro de uma função
        if(!new RegExp('^function').test(func)){
           var NFunc = "'"+func+"'";
        }else{
            NFunc = func;
        }

        console.log(termNew+' - '+NFunc+' - '+desc);
        $.ajax({
            type:'post',
            url: '/SPH%20-%20SiteSpeech/php/reloadJSON.php',
            data: 'termNew='+termNew+'&func='+NFunc+'&termDesc='+desc,
            datatype: 'html'

        }).done(function(e){
            $('input').val('');
            alert('Ok, termo registrado!');
            console.log(e);
        }).fail(function(){
            alert('Putz, houve um erro no registro');
        });
    });



    // listando todos os termos registrados
    var f = '';
    terms.forEach(function(t){f += 'Termo: "'+t.term+'", Descrição: '+ t.desc+'<br>'});
    $('.termosRegistrados').html(f);
    // -------------------------------

});
