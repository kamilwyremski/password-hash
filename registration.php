<?php 
require_once("config.php");
if(isset($_POST['register'])){
	$email 	= $_POST['email'];
	$password = $_POST['password'];
	$hashPassword = password_hash($password,PASSWORD_BCRYPT);

	$sth = $db->prepare('INSERT INTO user (email,password) VALUE (:email,:password)');
	$sth->bindValue(':email', $email, PDO::PARAM_STR);
	$sth->bindValue(':password', $hashPassword, PDO::PARAM_STR);
	$sth->execute();

	die('Rejestracja pomyslna!');
}
?>
<h1>Formularz rejestracyjny</h1>
<form method="post">
	<input type="text" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<button type="submit" name="register">Zarejestruj</button>
</form>