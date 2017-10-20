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
$email = $_POST['email'];
$senha = md5($_POST['senha']);


$insert = $con->prepare("INSERT INTO cadastrados (email,senha) VALUES(:email,:senha)");
$insert->bindParam(':email',$email);
$insert->bindParam(':senha',$senha);
$insert->execute();
echo "insert it";
header("location: select.php");
}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}
?>
<div class="container-fluid">
	<div class="col-md-12 principalcompadding">
<form method="post">
<input type="text" name="email" placeholder="E-mail">
<input type="text" name="senha" placeholder="*****">
<input type="submit" name="done" >
</form>
</div>
</div>
<?php include_once('footer.php');?>
