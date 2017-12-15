<?php
require_once("PHP/bd.php");

session_start();
$id_busca=$_SESSION['id_pesquisa'];


$query = sprintf("SELECT id, player, nomechar, nivel FROM ficha WHERE idusuario='$id_busca' and visivel='1'");

$dados = mysql_query($query, $con) or die(mysql_error());

$linha = mysql_fetch_assoc($dados);

$total = mysql_num_rows($dados);

if($total=='0'){

    $msg = 'As fichas desse usuário não estão visíveis!';

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
    <header style="margin-top=0">
        <img src="IMG/header.png">
    </header>
</a>
<div class="conteudo">
        <h3><?= $msg ?></h3>
    <div class="row">
        <div class="offset-11 col-1">
            <a href="menu.php">Voltar</a>
        </div>
    </div>
<?php
if($total>0){
    do{
        ?>

        <form name="abrindo" method="post" action="PHP/buscaabrindo.php">
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
</div>
<footer>
    Plataforma desenvolvida por Evandro Machado Pereira - Jogo desenvolvido por <a href="http://www.coisinhaverde.com">Tiago Junges / Coisinha Verde &copy;</a>
</footer>
</body>
</html>