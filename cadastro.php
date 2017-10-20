<?php 
include_once('header.php');

session_start();

$dsn = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root"; 
$dbpass = ""; 

try{
$con = new PDO($dsn, $dbuser, $dbpass);  
if(isset($_POST['done']))
{
$novoemail = $_POST['novoemail'];
$novasenha = md5($_POST['novasenha']);


$insert = $con->prepare("INSERT INTO cadastrados (email,senha) VALUES(:novoemail,:novasenha)");
$insert->bindParam(':novoemail',$novoemail);
$insert->bindParam(':novasenha',$novasenha);
$insert->execute();
echo "insert it";
header("location: login.php");
}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}
?>
<div class="container-fluid">
	<div class="col-md-12 principal">
Página de Cadastro
<form method="POST">
	E-mail:<br/>
	<input type="email" name="novoemail"/><br/><br/>

	Senha: <br/>
	<input type="password" name="novasenha"><br/><br/>
	<input type="submit" class="btn btn-dark" name="done" value="Entrar">	
</form>
</div>
</div>
<?php include_once('footer.php');?>
