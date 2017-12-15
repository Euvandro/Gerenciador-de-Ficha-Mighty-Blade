<?php
require_once("PHP/bd.php");
?>
<?php
session_start();
$idficha=$_SESSION['id'];
$query = sprintf("SELECT id, player, nomechar, raca, classe, nivel, motivacao, forc, agil, inte, vont, pontosvida, pontosmana, habilidades, equipamentos, ulrimage, defesa FROM ficha WHERE id = '$idficha'");
$dados = mysql_query($query, $con) or die(mysql_error());
$linha = mysql_fetch_assoc($dados);
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
            <a href="busca.php">Voltar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9 col-xs-9">
            <div class="row">
                <div class="col-sm-4">
                    Jogador<h5><?= $linha['player'] ?></h5>
                </div>
                <div class="col-sm-4">
                    Personagem<h5><?= $linha['nomechar'] ?></h5>
                </div>
                <div class="col-sm-4">
                    Nivel<h5><input type="number" max="99" min="1" value="<?= $linha['nivel'] ?>"></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    Raça<h5><?= $linha['raca'] ?></h5>
                </div>
                <div class="col-sm-4">
                    Classe<h5><?= $linha['classe'] ?></h5>
                </div>
                <div class="col-sm-4 shield">
                    Defesa<h5><input class="shield" type="number" max="99" min="1" value="<?= $linha['defesa'] ?>"></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    Motivação<h5><?= $linha['motivacao'] ?></h5>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-12">
                            Força<h4><input type="number" max="99" min="1" value="<?= $linha['forc'] ?>"></h4>
                        </div>
                        <div class="col-sm-12">
                            Agilidade<h4><input type="number" max="99" min="1" value="<?= $linha['agil'] ?>"></h4>
                        </div>
                        <div class="col-sm-12">
                            Inteligencia<h4><input type="number" max="99" min="1" value="<?= $linha['inte'] ?>"></h4>
                        </div>
                        <div class="col-sm-12">
                            Vontade<h4><input type="number" max="99" min="1" value="<?= $linha['vont'] ?>"></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-12">
                            Habilidades
                        </div>
                        <div class="col-sm-12">
                            <textarea rows="8"><?= $linha['habilidades'] ?></textarea>
                        </div>
                        <div class="col-sm-12">
                            Equipamentos
                        </div>
                        <div class="col-sm-12">
                            <textarea rows="8"><?= $linha['equipamentos'] ?></textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-3 col-xl-3">
            <img class="imgPerfil" src="<?= $linha['ulrimage'] ?>">
            <div class="row">
                <div class="col-sm-12">
                    Pontos de Vida<h5><input type="number" max="99" min="1" value="<?= $linha['pontosvida'] ?>"></h5>
                </div>
                <div class="col-sm-12">
                    Pontos de Mana<h5><input type="number" max="99" min="1" value="<?= $linha['pontosmana'] ?>"></h5>
                </div>

            </div>
        </div>
    </div>

</div>


<footer>
    Plataforma desenvolvida por Evandro Machado Pereira - Jogo desenvolvido por <a href="http://www.coisinhaverde.com">Tiago Junges / Coisinha Verde &copy;</a></footer>


</body>
</html>