<script type="text/javascript">
    function loginerrado(){
        setTimeout("window.location='../ficha.php'", 10);
    }
</script>
<?php
require_once("bd.php");
?>
<?php
$id = $_POST['id'];
$senha = $_POST['senha'];

$sql = mysql_query("SELECT * FROM ficha WHERE id = '$id' and senha = '$senha'") or die(mysql_error("Erro"));
$linha = mysql_fetch_assoc($sql);
$row = mysql_num_rows($sql);

if($row > 0){
    $sql = mysql_query("DELETE FROM ficha WHERE id = $id");
    header("Refresh:0; url=../menu.php");
}else{
    echo"
    <script>
        document.getElementById('loader').onpageshow = alertfunc();
        function alertfunc() {
            alert('Erro ao deletar personagem!');
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