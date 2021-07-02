<html> 
<body>



<!-- <form action="dados.php" method="POST"> -->
<form action="dados.php" method="GET"> <!-- o metodo get e enviado por via url -->
Nome: <input type="text" name="nome"> <br>
Email: <input type="email" name="email"> <br>
<!-- <input type="submit" name="enviar"> -->
<button type="submit"> Enviar </button><br>
</form>


<a href="dados.php?idade=25&sobrenome=Santos">Enviar dados</a>

</body>
</html>