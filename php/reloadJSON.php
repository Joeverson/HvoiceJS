<?php

$keyWrite = false; // chave para informar se esta altorizado à escrever no arquivo

if(!empty($_POST)){
    if(!empty($_POST['termNav']) && !empty($_POST['linkNav'])){ // navegação na pagina

        $term = $_POST['termNav'];
        $take = "function(){ document.location.href = '".$_POST['linkNav']."'; }";
        $desc = 'Levar para a Página '.$_POST['linkNav'];
        $keyWrite = true;

    }else if(!empty($_POST['termMovePage']) && !empty($_POST['selectMovePage'])){ //movmentação na pagina

        $move = array(  'cima'=>" function(){ var local = $('body').scrollTop(); $('body').scrollTop( local-300 ); }",
                        'baixo'=>" function(){ var local = $('body').scrollTop(); $('body').scrollTop( local+300 ); }",
                        'topo'=>" function(){ $('body').scrollTop( 0 ); }",
                        'final'=>" function(){ $('body').scrollTop( 10000 ); }"
                      );
        $descMove = array(  'cima'=>"Rolar Página para Cima",'baixo'=>"Rolar Página para Baixo",'topo'=>"Ir ao topo da Página",'final'=>"Ir para o Final da Página");

        $term = $_POST['termMovePage'];
        $take = $move[$_POST['selectMovePage']];
        $desc = $descMove[$_POST['selectMovePage']];;
        $keyWrite = true;

    }else if(!empty($_POST['selectAcaoPage']) && !empty($_POST['termAcoesPage'])){ // acções da pagina

        $acoes = array( 'voltar'=>" function(){ window.history.go(-1); }",
                        'proximo'=>"function(){ window.history.go(1); }",
                        'recarregar'=>"function(){ document.location.reload(); }"
                    );
        $descAcoes = array( 'voltar'=>"Voltar página", 'proximo'=>"Avançar página", 'recarregar'=>"Recarregar página");

        $term = $_POST['termAcoesPage'];
        $take = $acoes[$_POST['selectAcaoPage']];
        $desc = $descAcoes[$_POST['selectAcaoPage']];
        $keyWrite = true;

    }else if(!empty($_POST['func']) && !empty($_POST['termNew'])&&!empty($_POST['termDesc'])){ // modo avançado criação de funções
        $term = $_POST['termNew'];
        $take = $_POST['func'];
        $desc = $_POST['termDesc'];
        $keyWrite = true;
    }


    if($keyWrite){
        // ---- parte responsavel pela leitura do conteudo do arquivo e inserção de novo parametro json

        $a = fopen('../js/terms.js','r'); // abre o arquivo p leitura
        $i = 0;
        $f = '';

        while(!feof($a)){ // pega cada linha e coloca numa posiçao do array
            $c[$i] = fgets($a);
            $i++;
        }

        fclose($a); // fecha o arquivo que foi lido

        $a = fopen('../js/terms.js','w'); // abre novamente só que no modo de edição

        for($i = 0; $i<count($c)-1; $i++){ // pegar todos os valores do array e concatena para formar uma string
            $f .= $c[$i];
        }

        $f .= ", { \n   term:'".$term."', \n   take:".$take.",\n   desc: '".$desc."'\n  }\n"; // linha que insere o novo termo.
        $f .= $c[count($c)-1]; // pega o ultimo elemento que é ']' e coloca nao final.

        fwrite($a,$f); // escreve no arquivo a string gerada.
        fclose($a); // fecha o arquivo.

        echo $_POST['selectMovePage']; // menssagem qualquer para retornar para o ajax
        $keyWrite = false;
    }
    var_dump($_POST);
}
?>