<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>HVoice.JS</title>
    <meta name='author' content='Joerverson Santos'/>
    <meta name='description' content="handling voice"/>

    <!-- styles of page -->
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/semantic.css" />

    <!-- scripts of page -->
    <script src="js/jQuery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/terms.js"></script>
    <script src="js/script.js"></script>

</head>
<body>
<p class="name">HVoice.JS</p>
<section id="faixa" class="col-md-12">
    <ul class="nav nav-tabs " role="tablist">
        <li class='active'><a href="#">Comandos Básicos</a></li>
        <li class=''><a href="#">Comandos Avançados</a></li>
        <li class=''><a href="#">Termos já registrados</a></li>
        <li class=''><a href="#">Ajudas</a></li>
        <li><a href="#">Configurações</a></li>
    </ul>
    <div class="info">
        <div class="aba">
            <div class="btn-group btns">
                <button type="button" class="btn btn-default">Navegação no Site</button>
                <button type="button" class="btn btn-default">Rolamento de Página</button>
                <button type="button" class="btn btn-default">Ações da página</button>
            </div>
           <div class="opc-menu">
               <!-- conteudo opção 1-->
               <div class="op">
                   <div class="input-group">
                       <span class="input-group-addon glyphicon glyphicon-bullhorn"></span>
                       <input type="text" id='termNavegate' class="form-control" placeholder="Infome o termo de Voz">
                   </div>
                   <div class="input-group">
                       <span class="input-group-addon glyphicon glyphicon-pushpin"></span>
                       <input type="text" id='linkNavigate' class="form-control" placeholder="Infome o link para ser enviando quando for falado o termo acima">
                   </div>
                   <button class="btn  btn-right salvarAlteracoes">Salvar Alteração</button>
               </div>
               <!-- conteudo opção 2-->
               <div class="op">
                   <div class="input-group">
                       <span class="input-group-addon glyphicon glyphicon-bullhorn"></span>
                       <input type="text" class="form-control" id="termMovePage" placeholder="Infome o termo de Voz">
                   </div>
                   <select id="selectMovePage" class='' name="selectMovePage">
                       <option value="cima">Rolar para Cima</option>
                       <option value="baixo">Rolar para Baixo</option>
                       <option value="topo">Ir para o Topo</option>
                       <option value="final">Ir para o Final</option>
                   </select>
                   <button class="btn  btn-right salvarAlteracoes">Salvar Alteração</button>
               </div>
               <!-- conteudo opção 3-->
               <div class="op">
                   <div class="input-group">
                       <span class="input-group-addon glyphicon glyphicon-bullhorn"></span>
                       <input type="text" class="form-control" id="termAcoesPage" placeholder="Infome o termo de Voz">
                   </div>
                   <select id="selectAcaoPage" name="selectAcaoPage">
                       <option value="voltar">Voltar Página</option>
                       <option value="proxima">Próxima Página</option>
                       <option value="recarregar">Recarregar Página</option>
                   </select>
                   <button class="btn  btn-right salvarAlteracoes">Salvar Alteração</button>
               </div>
           </div>
        </div>

        <!-- Segunda ABA-->

        <div class="aba">
            <div class="op">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-bullhorn"></span>
                    <input type="text" class="form-control" id='termNew' placeholder="Infome o termo de Voz">
                </div>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-bullhorn"></span>
                    <input type="text" class="form-control" id='descTerm' placeholder="Informe a descriçao Dessa nova Função">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <div class="ui form">
                            <div class="field">
                                <label>Edit Script</label>
                                <textarea class="" name="" id="func" cols="70" rows="10"></textarea>
                            </div>
                        </div>
                    </span>
                </div>
                <button class="btn btn-right salvarNewRegistro">Registrar Função e Termo</button>
            </div>
        </div>

        <!-- Terceira ABA-->

        <div class="aba">
           <div class="op termosRegistrados">

           </div>
        </div>

        <!-- quarta ABA-->

        <div class="aba">
            <div class="op">
                <p>
                    Para um bom funcionamento do sistema, scolha palavras faceis <br/>
                    de serem pronunciadas pelo usuário. Sempre se lembre que o termo que <br/>
                    foi adicionado será mais ou menos oque o usuário terá que falar para que <br/>
                    as acões funcione.
                    <br/><br/>
                    <br/>
                    termo - palavra ou frase que será necessária que o usuário pronuncie para poder <br/>
                    executar alguma ação.
                </p>
            </div>
        </div>

        <!-- quinta aba-->

        <div class="aba">
            <div class="op">
                lcmçzxkcjmçzkxcmçzkcm zçkczçxkcnzxkczlxkcn zxlcjnzxljcnzlxcn
            </div>
        </div>
    </div>
</section>
</body>
</html>