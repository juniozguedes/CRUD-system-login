<?php include_once('header.php');?>

<div class="col-md-12 principal">
<table border="2">
<tr>
<th>ID</th>
<th>EMAIL</th>
<th>PASSWORD</th>
<th colspan="2">ACTION</th>

</tr>
<?php
session_start();

$dsn = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root"; 
$dbpass = ""; 

try{
$con = new PDO($dsn, $dbuser, $dbpass);  
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$select = $con->prepare("SELECT * FROM cadastrados ");

$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
while($data=$select->fetch()){
?>

 <tr>
<td><?php echo $data['id']; ?></td>
<td><?php echo $data['email']; ?></td>
<td><?php echo $data['senha']; ?></td>
<td><a href="update.php?edit_id=<?php echo $data['id']; ?>">EDIT</a></td>
<td><a href="delete.php?del_id=<?php echo $data['id']; ?>">DELETE</a></td>
<?php
}
}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}

?>
</tr></table>
<a href="insert.php">Inserir novo usuário</a><br/>
<a href="index.php">Voltar a página principal</a><br/>
</div>
<?php include_once('footer.php');?>
