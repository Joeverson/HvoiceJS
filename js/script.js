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
            url: window.location.origin + '/HVoiceJS/php/reloadJSON.php',
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


    $(".apagar-tudo").click(function(){
        $.ajax({
            type:'post',
            url: window.location.origin + '/HVoiceJS/php/reloadJSON.php',
            data: 'apagarTudo=apagar',
            datatype: 'html'

        }).done(function(e){
            alert('Ok, Tudo apagado!');
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
            url: window.location.origin + '/HVoiceJS/php/reloadJSON.php',
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

    listarTerms(); // listar termos quando for carregada a pagina

    // ---------- função que manda deletar os termos

    $(".del-alt-delete").on("click",function(){ // enviar para o php quando for clicado em deletar
        $termAtual = this.parentElement.childNodes[0].innerHTML.split(" ");
        console.log($termAtual[1]);

        terms.forEach(function(e){
            if($termAtual[1] == "'"+e.term+"'"){
                $.ajax({
                    url: window.location.origin + '/HVoiceJS/php/reloadJSON.php',
                    type: "post",
                    data: "delete="+$termAtual[1],
                typedata: "html"
                }).done(function(e){
                    $('input').val('');
                    alert('Ok, Deletado com sucesso!');
                    listarTerms();
                    //console.log(e);
                }).fail(function(){
                    listarTerms();
                    alert('Putz, houve um erro no registro');
                });
            }
        });
    });
});




function listarTerms(){
    // listando todos os termos registrados
    var f = '';
    terms.forEach(function(t){
        f += '<div class="infoterms"><span>Termo: \'' + t.term;
        f += '\' - Descrição: '+ t.desc + '</span>';

        if(t.term != 'oi')
            f += '<div class="ui hover button del-alt-delete">Apagar</div><div class="ui hover button del-alt-alterar">Alterar</div>';

        f += '</div>';
    });

    $('.termosRegistrados').html(f);
   // -------------------------------
}
