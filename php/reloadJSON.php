<?php

if(!empty($_POST)){
    if(!empty($_POST['termNav']) && !empty($_POST['linkNav'])){ // navegação na pagina

        $term = $_POST['termNav'];
        $take = "function(){ document.location.href = '".$_POST['linkNav']."'; }";
        $desc = 'Levar para a Página '.$_POST['linkNav'];
        fileWrite($term, $take, $desc, true);

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
        fileWrite($term, $take, $desc, true);

    }else if(!empty($_POST['selectAcaoPage']) && !empty($_POST['termAcoesPage'])){ // acções da pagina

        $acoes = array( 'voltar'=>" function(){ window.history.go(-1); }",
                        'proximo'=>"function(){ window.history.go(1); }",
                        'recarregar'=>"function(){ document.location.reload(); }"
                    );
        $descAcoes = array( 'voltar'=>"Voltar página", 'proxima'=>"Avançar página", 'recarregar'=>"Recarregar página");

        $term = $_POST['termAcoesPage'];
        $take = $acoes[$_POST['selectAcaoPage']];
        $desc = $descAcoes[$_POST['selectAcaoPage']];


        fileWrite($term, $take, $desc, true);

    }else if(!empty($_POST['func']) && !empty($_POST['termNew'])&&!empty($_POST['termDesc'])){ // modo avançado criação de funções
        $term = $_POST['termNew'];
        $take = $_POST['func'];
        $desc = $_POST['termDesc'];
        fileWrite($term, $take, $desc, true);

    }else if(!empty($_POST['apagarTudo'])){
        $c = ler_File(); // função que vai ler o arquivo e retornar num array
        $f = '';

        $a = fopen('../terms.js','w'); // abre o arquivo p leitura

        foreach($c as $k => $g){
            if($k < 6){
                $f .= $g;
            }
        }

        $f .= "]";

        fwrite($a,$f); // escreve no arquivo a string gerada.
        fclose($a); // fecha o arquivo.

    }else if(!empty($_POST['delete'])){ // Deletando função

        $c = ler_File(); // função que vai ler o arquivo e retornar num array
        $f = '';

        $count = 0;
        $a = fopen('../terms.js','w'); // abre o arquivo p leitura


        foreach($c as $val){
            if(strstr($val,$_POST["delete"]) != false){
                foreach($c as $k => $g){
                    if(!($k >= $count - 1 &&  $k < $count+4)){
                        $f .= $g;
                    }
                }

                break;
            }
            $count++;
        }

        fwrite($a,$f); // escreve no arquivo a string gerada.
        fclose($a); // fecha o arquivo.
        //echo $count;
    }
}



function fileWrite($term, $take, $desc, $keyWrite){
    // --- tirando espaços em branco

    $term = str_replace(" ", "-", $term);

    // ----------------------------


    if($keyWrite){

        $c = ler_File(); // função que vai ler o arquivo e retornar num array
        $f = '';
        $a = fopen('../terms.js','w'); // abre novamente só que no modo de edição

        for($i = 0; $i<count($c)-1; $i++){ // pegar todos os valores do array e concatena para formar uma string
            $f .= $c[$i];
        }

        $f .= ", { \n   term:'".$term."', \n   take:".$take.",\n   desc: '".$desc."'\n  }\n"; // linha que insere o novo termo.
        $f .= $c[count($c)-1]; // pega o ultimo elemento que é ']' e coloca nao final.

        fwrite($a,$f); // escreve no arquivo a string gerada.
        fclose($a); // fecha o arquivo.


        //echo $_POST['selectMovePage']; // menssagem qualquer para retornar para o ajax
    }
}

function ler_File(){
    $a = fopen('../terms.js','r'); // abre o arquivo p leitura
    $i = 0;

    while(!feof($a)){ // pega cada linha e coloca numa posiçao do array
        $c[$i] = fgets($a);
        $i++;
    }
    fclose($a); // fecha o arquivo que foi lido

    return $c;
}
