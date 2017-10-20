<?php
include_once('header.php');

session_start();

$dsn = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root"; 
$dbpass = ""; 

try{
$con = new PDO($dsn, $dbuser, $dbpass);  

$edit_id = $_GET['edit_id'];


$select = $con->prepare("SELECT * FROM cadastrados where id='$edit_id' ");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data=$select->fetch();
if(isset($_POST['done']))
{
$email = $_POST['email'];
$senha = $_POST['senha'];


$update = $con->prepare("UPDATE cadastrados SET email=:email ,senha=:senha where id='$edit_id'");
$update->bindParam(':email',$email);
$update->bindParam(':senha',$senha);
$update->execute();
header("location:select.php");
}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}
?>
<form method="post">
<input type="text" name="email" placeholder="Email" value="<?php echo $data['email'] ?>">
<input type="text" name="senha" placeholder="*****" value="<?php echo $data['senha'] ?>">
<input type="submit" name="done" >
</form>
<?php include_once('footer.php');?>
