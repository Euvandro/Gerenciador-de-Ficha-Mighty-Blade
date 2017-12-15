<?php
require_once("PHP/bd.php");
?>
<?php
session_start();
$idficha=$_SESSION['id'];
$query = sprintf("SELECT id, player, nomechar, raca, classe, nivel, motivacao, forc, agil, inte, vont, pontosvida, pontosmana, habilidades, equipamentos, ulrimage, defesa, visivel FROM ficha WHERE id = '$idficha'");
$dados = mysql_query($query, $con) or die(mysql_error());
$linha = mysql_fetch_assoc($dados);

if($linha['visivel']=='1'){
    $linha['visivel']='checked';
}else{
    $linha['visivel']='unchecked';
}
?>
<html>
<head lang="pt-BR">
    <link rel="shortcut icon" href="IMG/icone.png">
    <meta charset="UTF-8">
    <title>Ficha Mighty Blade</title>
    <link rel="stylesheet" href="CSS/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <script>
        function expandir(){
            document.getElementById('janelaRemover').style.display='block';
            document.getElementById('botaoApagar').style.display='none';
        }
        function botaoCancelar(){
            document.getElementById('janelaRemover').style.display='none'
            document.getElementById('botaoApagar').style.display='block';
        }
    </script>
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

    <form name="ficha" method="post" action="PHP/editar.php">
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

                        Nivel<h5><input type="number" max="99" min="1" value="<?= $linha['nivel'] ?>" name="nivel"></h5>

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

                        Defesa<h5><input class="shield" type="number" max="99" min="1" value="<?= $linha['defesa'] ?>" name="defe"></h5>

                    </div>

                </div>



                <div class="row">

                    <div class="col-sm-12">

                        Motivação<h5><?= $linha['motivacao'] ?></h5>

                    </div>

                            <div class="col-sm-3">

                                <div class="row">

                                    <div class="col-sm-12">

                                        Força<h4><input type="number" max="99" min="0" value="<?= $linha['forc'] ?>" name="forc"></h4>
                                    </div>

                                    <div class="col-sm-12">

                                        Agilidade<h4><input type="number" max="99" min="0" value="<?= $linha['agil'] ?>" name="agil"></h4>
                                    </div>

                                    <div class="col-sm-12">

                                        Inteligencia<h4><input type="number" max="99" min="0" value="<?= $linha['inte'] ?>" name="inte"></h4>
                                    </div>

                                    <div class="col-sm-12">

                                        Vontade<h4><input type="number" max="99" min="0" value="<?= $linha['vont'] ?>" name="vont"></h4>
                                    </div>

                            </div>

                                </div>

                            <div class="col-sm-9">

                                <div class="row">

                                    <div class="col-sm-12">

                                        Habilidades

                                    </div>

                                    <div class="col-sm-12">

                                    <textarea name="habilidades" rows="8"><?= $linha['habilidades'] ?></textarea>

                                    </div>

                                    <div class="col-sm-12">

                                        Equipamentos

                                    </div>

                                    <div class="col-sm-12">

                                        <textarea name="equipamentos" rows="8"><?= $linha['equipamentos'] ?></textarea>

                                    </div>

                                </div>

                            </div>



                </div>

            </div>

                <div class="col-sm-3 col-xl-3">

                    <img class="imgPerfil" src="<?= $linha['ulrimage'] ?>">

                    <div class="row">

                        <div class="col-sm-12">

                            Pontos de Vida<h5><input style="color: red" type="number" max="99" min="0" value="<?= $linha['pontosvida'] ?>" name="pontosvida"></h5>

                        </div>

                        <div class="col-sm-12">

                            Pontos de Mana<h5><input style="color: deepskyblue" type="number" max="99" min="0" value="<?= $linha['pontosmana'] ?>" name="pontosmana"></h5>

                        </div>
                        
                        <div class="col-sm-12">

                            Visível para usuários <input type="checkbox" name="visivel" value="1" <?= $linha['visivel'] ?> style="margin-bottom: 15px">

                        </div>

                        <div class="col-sm-12 col-12">

                            <input type="submit" class="botao" value="Salvar Ficha">
                    </div>

                </div>

            </div>

        </div>

    </form>


        <div class="row">
            <div class="offset-9 col-3">

                <div class="col-sm-12" id="botaoApagar">

                    <a onclick="expandir()" style="cursor: pointer; color: gray">Apagar Personagem</a>

                </div>

                <div class="col-sm-12">
                                                           <span id="janelaRemover" class="janelaRemover">

                                        <form name="remover" method="post" action="PHP/removendo.php">

                                            <div class="col-sm-12">

                                                <div class="row">

                                                    Senha do usuário

                                                    <input type="password" name="senha" class="campotexto"><input type="hidden" value="<?= $linha['id'] ?>" name="id">

                                                </div>

                                            </div>

                                            <div class="col-sm-12" style="margin-top: 10px">

                                                <button class="botao" type="button" onclick="botaoCancelar()">Cancelar</button>

                                                <input class="botao" type="submit" class="btn-cad" value="Remover">

                                            </div>

                                        </form>

                                    </span>

                </div>

            </div>

        </div>

    </div>
<footer>

    Plataforma desenvolvida por Evandro Machado Pereira - Jogo desenvolvido por <a href="http://www.coisinhaverde.com">Tiago Junges / Coisinha Verde &copy;</a></footer>





</body>

</html>