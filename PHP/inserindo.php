<?php

require_once("bd.php");

?>



<?php

error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

session_start();



$senha = $_SESSION['senha'];

$iduser = $_SESSION['id_user'];



$jogador=$_POST['jogador'];

$personagem=$_POST['personagem'];

$raca=$_POST['raca'];

$classe=$_POST['classe'];

$nivel=$_POST['nivel'];

$motivacao=$_POST['motivacao'];

$pontosvida=$_POST['pontosvida'];

$pontosmana=$_POST['pontosmana'];

$forc=$_POST['forc'];

$agil=$_POST['agil'];

$inte=$_POST['inte'];

$vont=$_POST['vont'];

$defe=$_POST['defe'];

$habilidades=$_POST['habilidades'];

$equipamentos=$_POST['equipamentos'];

$ulrimage = $_POST['ulrimage'];

$visivel = $_POST['visivel'];

if($visivel==NULL){
    $visivel=0;
}

$sql = mysql_query("INSERT INTO ficha(idusuario, player, nomechar, raca, classe, nivel, motivacao, forc, agil, inte, vont, pontosvida, pontosmana, habilidades, equipamentos, senha, ulrimage, defesa, visivel) VALUES ('$iduser','$jogador', '$personagem', '$raca', '$classe', '$nivel', '$motivacao', '$forc', '$agil', '$inte', '$vont', '$pontosvida', '$pontosmana', '$habilidades', '$equipamentos', '$senha','$ulrimage', '$defe','$visivel')");
header("Location: ../menu.php");
?>