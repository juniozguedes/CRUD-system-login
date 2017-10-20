<?php 
include_once('header.php');

session_start(); #Se usamos sessão em nosso sitema, todos os arquivos devem ter session_start()
if(isset($_POST['email']) && empty($_POST['email'])==false){
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	try{
$con = new PDO ("mysql:host=localhost;dbname=blog","root",""); 
$sql = $con->query("SELECT * FROM cadastrados WHERE email = '$email' AND senha = '$senha'");
	if ($sql->rowCount()>0){ #verifica se tem algum usuário 
		$dado = $sql->fetch();#pega o primeiro resultado da requisi.
		print_r($dado);
		$_SESSION['id'] = $dado['id']; #SALVEI MEU ID NA SESSÃO
		header("Location:index.php");
	}
	else{
		echo "Ninguém logado <br/>";
	}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}


}
 ?>
<div class="container-fluid">
	<div class="col-md-12 principal">
Página de login
<form method="POST">
	E-mail:<br/>
	<input type="email" name="email"/><br/><br/>

	Senha: <br/>
	<input type="password" name="senha"><br/><br/>
	<input type="submit" class="btn btn-dark" value="Entrar">
	<a href="cadastro.php" class="btn btn-dark">Cadastro</a>
</form>
</div>
</div>
<?php include_once('footer.php');?>
