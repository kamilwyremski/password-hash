<?php 
require_once("config.php");
if(isset($_POST['login'])){
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	
	$sth = $db->prepare('SELECT * FROM user WHERE email=:email limit 1');
	$sth->bindValue(':email', $email, PDO::PARAM_STR);
	$sth->execute();
	$user = $sth->fetch(PDO::FETCH_ASSOC);
	if($user){
		if(password_verify($password,$user['password'])){
			die("<h3>Uzytkownik zalogowany pomyslnie</h3>");
		}else{
			echo "<h3>Nieprawidlowe haslo</h3>";
		}
	}else{
		echo "<h3>Nie znaleziono uzytkownika</h3>";
	}
}
?>
<h1>Login</h1>
<form method="post">
	<input type="text" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<button type="submit" name="login">Zaloguj</button>
</form>