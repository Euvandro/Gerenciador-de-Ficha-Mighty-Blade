<?php
require_once("bd.php");
?>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

session_start();
$idficha = $_SESSION['id'];

$nivel=$_POST['nivel'];
$pontosvida=$_POST['pontosvida'];
$pontosmana=$_POST['pontosmana'];
$forc=$_POST['forc'];
$agil=$_POST['agil'];
$inte=$_POST['inte'];
$vont=$_POST['vont'];
$defe=$_POST['defe'];
$habilidades=$_POST['habilidades'];
$equipamentos=$_POST['equipamentos'];
$visivel=$_POST['visivel'];

if($visivel==NULL){
    $visivel=0;
}

$sql = mysql_query("UPDATE ficha SET nivel = '$nivel', pontosvida = '$pontosvida', pontosmana = '$pontosmana', forc = '$forc', agil = '$agil', inte = '$inte', vont = '$vont', defesa = '$defe', habilidades = '$habilidades', equipamentos = '$equipamentos', visivel = '$visivel' WHERE id = '$idficha'");

header("Location: ../ficha.php");
?>
