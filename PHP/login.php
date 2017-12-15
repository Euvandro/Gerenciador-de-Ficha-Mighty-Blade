<script type="text/javascript">
    function loginerrado(){
        setTimeout("window.location='../index.html'", 10);
    }
</script>
<?php
require_once("bd.php");
?>
<?php

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = mysql_query("SELECT * FROM usuario WHERE usuario = '$usuario' and senha = '$senha'") or die(mysql_error("Erro"));
$linha = mysql_fetch_assoc($sql);
$row = mysql_num_rows($sql);


if($row>0){
    session_start();
    $_SESSION['usuario']=$linha['usuario'];
    $_SESSION['senha']=$linha['senha'];
    $_SESSION['id_user']=$linha['idusuario'];
    echo"
";
    header("Location: ../menu.php");
}else{
    echo"
    <script>
        document.getElementById('loader').onpageshow = alertfunc();
        function alertfunc() {
            alert('Usuario ou senha inválidos!');
        }
        </script>
    ";
    echo"
    <script>
        loginerrado();
    </script>
    ";
}
?>