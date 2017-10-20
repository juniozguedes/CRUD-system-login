<h1>teste boots</h1>
<?php 
session_start(); #fundamental para o login, iniciar uma sessão em cada arquivo do sistema

	if (isset($_SESSION['id']) && empty($_SESSION['id'])==false)
	{ #Verifica se tem algo guardado na variável global $_SESSION['id'] e verifica também se ela não está vazia garantindo acesso a área restrita.
	header("Location:premmy.php");		
	}else{ #Caso o $SESSION ID não esteja populado, será requisitado o login
	header("Location:login.php");
	}
?>
<a href="logout.php">Sair</a>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
</body>
</html>