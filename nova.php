<?php
session_start();
if(!isset($_SESSION['usuario']) || !isset($_SESSION["senha"])){
    header("Location: ../../index.html");
    exit;
}else{
}
?>
<html>
<head lang="pt-BR">
    <link rel="shortcut icon" href="IMG/icone.png">
    <meta charset="UTF-8">
    <title>Ficha Mighty Blade</title>
    <link rel="stylesheet" href="CSS/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
</head>


<body>
<a class="nounderline" href="menu.php">
    <header>
        <img src="IMG/header.png">
    </header>
</a>

<div class="conteudo">
    <div class="row">
        <div class="offset-11 col-1">
            <a href="menu.php">Voltar</a>
        </div>
    </div>
    <form method="post" action="PHP/inserindo.php">
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-4">
                    Jogador<h5><input type="text" name="jogador"></h5>
                </div>
                <div class="col-sm-4">
                    Personagem<h5><input type="text" name="personagem"></h5>
                </div>
                <div class="col-sm-4">
                    Nivel<h5><input type="number" max="30" min="1" name="nivel"></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    Raça<h5><input type="text" name="raca"></h5>
                </div>
                <div class="col-sm-4">
                    Classe<h5><input type="text" name="classe"></h5>
                </div>
                <div class="col-sm-4 shield">
                    Defesa<h5><input type="number" max="99" min="0" name="defe"></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    Motivação<h5><input style="width: 100%" type="text" maxlength="60" name="motivacao"></h5>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-12">
                            Força<h4><input type="number" max="99" min="0" name="forc"></h4>
                        </div>
                        <div class="col-sm-12">
                            Agilidade<h4><input type="number" max="99" min="0" name="agil"></h4>
                        </div>
                        <div class="col-sm-12">
                            Inteligencia<h4><input type="number" max="99" min="0" name="inte"></h4>
                        </div>
                        <div class="col-sm-12">
                            Vontade<h4><input type="number" max="99" min="0" name="vont"></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-12">
                            Habilidades
                        </div>
                        <div class="col-sm-12">
                            <textarea rows="8" name="habilidades"></textarea>
                        </div>
                        <div class="col-sm-12">
                            Equipamentos
                        </div>
                        <div class="col-sm-12">
                            <textarea rows="8" name="equipamentos"></textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
           URL Imagem<br><input type="url" name="ulrimage">
            <div class="row">
                <div class="col-sm-12">
                    Pontos de Vida<h5><input type="number" max="1000" min="0" name="pontosvida"></h5>
                </div>
                <div class="col-sm-12">
                    Pontos de Mana<h5><input type="number" max="1000" min="0" name="pontosmana"></h5>
                </div>
                <div class="col-sm-12">
                    Visível para usuários <input type="checkbox" name="visivel" value="1" style="margin-bottom: 15px">
                </div>
                <div style="text-align: center;" class="col-sm-12">
                    <input class="botao" type="submit" value="Enviar">
                </div>
            </div>
        </div>
    </div>


    </form>
</div>


<footer>
    Plataforma desenvolvida por Evandro Machado Pereira - Jogo desenvolvido por <a href="http://www.coisinhaverde.com">Tiago Junges / Coisinha Verde &copy;</a></footer>


</body>
</html>