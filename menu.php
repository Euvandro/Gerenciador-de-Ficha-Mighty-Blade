<?php
require_once("PHP/bd.php");
?>
<?php
session_start();
$id_user=$_SESSION['id_user'];
if(!isset($_SESSION['usuario']) || !isset($_SESSION["senha"])){
    header("Location: ../../index.html");
    exit;
}else{
}
?>
<?php
$query = sprintf("SELECT id, player, nomechar, nivel FROM ficha WHERE idusuario='$id_user'");

$dados = mysql_query($query, $con) or die(mysql_error());

$linha = mysql_fetch_assoc($dados);

$total = mysql_num_rows($dados);
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
            <a href="PHP/logout.php">Sair</a>
        </div>
    </div>
<?php
if($total>0){
    do{
        ?>

        <form name="abrindo" method="post" action="PHP/abrindo.php">
            <div class="row">
                    <input type="hidden" value="<?= $linha['id'] ?>" name="id" />
                <div class="col-sm-3">
                    Jogador<h5><?= $linha['player'] ?></h5>
                </div>
                <div class="col-sm-3">
                    Personagem<h5><?= $linha['nomechar'] ?></h5>
                    </div>
                    <div class="col-sm-3">
                    Nivel<h5><?= $linha['nivel'] ?></h5>
                        </div>
                    <div class="col-sm-3"><br>
                        <input type="submit" class="botao" value="Abrir"/>
                     </div>

            </div>
        </form>
        <hr>

    <?php
    }while ($linha = mysql_fetch_assoc($dados));
}
?>
    <div class="row">
        <div class="col-3">
<a href="nova.php">Nova Ficha</a></div>
    <div class="offset-6 col-3">
        <button class="botao" id="botaobusca" onclick="document.getElementById('caixaBusca').style.display='block';document.getElementById('botaobusca').style.display='none'">Outras Fichas</button>
        <span id="caixaBusca" class="janelaRemover">
            <form method="post" action="PHP/pesquisa.php">
            Usuário <input style="width:100%; margin-bottom: 10px" name="busca">
                <input type="submit" class="botao" value="Pesquisar">
            </form>
    </span>
    </div>
    </div>
</div>
<footer>
    Plataforma desenvolvida por Evandro Machado Pereira - Jogo desenvolvido por <a href="http://www.coisinhaverde.com">Tiago Junges / Coisinha Verde &copy;</a>
</footer>
</body>
</html>