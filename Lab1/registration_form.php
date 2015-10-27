<?php
//error_reporting(E_ALL);
include ("db_connect.php");

$login = $_POST["login"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT Email FROM User WHERE Email = '$email'";
$result = $mysqli->query($sql);
//var_dump($result);

if ($result->num_rows > 0) {
    $errors = "Such user is already registered";
} else {
    $sql = "INSERT INTO User (Login, Password, Email) VALUES ('$login', '$password', '$email')";
    $result = $mysqli->query($sql);
    header("Location: /First_PHP/Lab1/room.php?login=$login"); //redirect
    return;
}
?>
<html>
<head>
    <title>Зарегистрируйтесь</title>
</head>
<meta charset="utf-8">
<body>
<div>
<form method="post" action="registration_form.php">
    Имя пользователя<input type="text" name="login" value=<?php $_POST["login"] ?>><br>
    Email<input type="email" name="email" value=<?php $_POST["email"] ?>><br>
    Пароль<input type="password" name="password" value=""><br>
    <?php echo "<br>".$errors ?>
    <input type="submit">
</form>
</div>
</body>
</html>
