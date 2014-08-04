<?php
if(!empty($_POST)){
    if(!empty($_POST['termNav']) && !empty($_POST['linkNav'])){

        $term = $_POST['termNav'];
        $take = "function(){ document.location.href = '".$_POST['linkNav']."'; }";

    }else if(!empty($_POST['termMovePage']) && !empty($_POST['selectMovePage'])){

        $move = array(  'cima'=>" function(){ var local = $('body').scrollTop(); $('body').scrollTop( local-300 ); }",
                        'baixo'=>" function(){ var local = $('body').scrollTop(); $('body').scrollTop( local+300 ); }",
                        'topo'=>" function(){ $('body').scrollTop( 0 ); }",
                        'final'=>" function(){ $('body').scrollTop( 10000 ); }"
                      );

        $term = $_POST['termMovePage'];
        $take = $move[$_POST['selectMovePage']];

    }else if(!empty($_POST['selectAcaoPage']) && !empty($_POST['termAcoesPage'])){

        $acoes = array( 'voltar'=>" function(){ window.history.go(-1); }",
                        'proximo'=>"function(){ window.history.go(1); }",
                        'recarregar'=>"function(){ document.location.reload(); }"
                    );

        $term = $_POST['termAcoesPage'];
        $take = $acoes[$_POST['selectAcaoPage']];

    }
}



// ---- parte responsavel pela leitura do conteudo do arquivo e inserção de novo parametro json

$a = fopen('../js/json.js','r'); // abre o arquivo p leitura
$i = 0;
$f = '';

while(!feof($a)){ // pega cada linha e coloca numa posiçao do array
    $c[$i] = fgets($a);
    $i++;
}

fclose($a); // fecha o arquivo que foi lido

$a = fopen('../js/json.js','w'); // abre novamente só que no modo de edição

for($i = 0; $i<count($c)-1; $i++){ // pegar todos os valores do array e concatena para formar uma string
    $f .= $c[$i];
}

$f .= ", { \n   term:'".$term."', \n   take:".$take."\n  }\n"; // linha que insere o novo termo.
$f .= $c[count($c)-1]; // pega o ultimo elemento que é ']' e coloca nao final.

fwrite($a,$f); // escreve no arquivo a string gerada.
fclose($a); // fecha o arquivo.

echo $_POST['selectMovePage']; // menssagem qualquer para retornar para o ajax


?>