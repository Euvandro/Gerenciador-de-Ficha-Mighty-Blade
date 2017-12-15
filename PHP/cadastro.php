<script type="text/javascript">
    function loginerrado(){
        setTimeout("window.location='../cadastro.html'", 10);
    }
</script>
<?php
require_once("bd.php");
?>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$usuario=$_POST['usuario'];
$email=$_POST['email'];
$senha=$_POST['senha'];

$sql = mysql_query("SELECT * FROM usuario WHERE usuario = '$usuario'") or die(mysql_error("Erro"));
$linha = mysql_fetch_assoc($sql);
$row = mysql_num_rows($sql);
if($row>0){
    echo"
    <script>
        document.getElementById('loader').onpageshow = alertfunc();
        function alertfunc() {
            alert('Usuario ja existente!');
        }
        </script>
    ";
    echo"
    <script>
        loginerrado();
    </script>
    ";
}else{
    $sql = mysql_query("INSERT INTO usuario(usuario, email, senha) VALUES ('$usuario', '$email', '$senha')");

    session_start();
    $_SESSION['id']=$id;
    header("Location: ../menu.php");
}




?>