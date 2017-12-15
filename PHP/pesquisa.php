<script type="text/javascript">
    function loginerrado(){
        setTimeout("window.location='../menu.php'", 10);
    }
</script>
<?php
require_once("bd.php");
?>
<?php

$usuario = $_POST['busca'];

$sql = mysql_query("SELECT idusuario FROM usuario WHERE usuario = '$usuario'") or die(mysql_error("Erro"));
$linha = mysql_fetch_assoc($sql);
$row = mysql_num_rows($sql);

if($row>0) {
    session_start();
    $_SESSION['id_pesquisa'] = $linha['idusuario'];

    header("Location: ../busca.php");
}else{
    echo"
    <script>
        document.getElementById('loader').onpageshow = alertfunc();
        function alertfunc() {
            alert('Usuario não existe!');
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