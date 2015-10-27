<?php
session_start();
//error_reporting(E_ALL);
include ("db_connect.php");
if(!empty($_POST["email"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $login = $_POST["login"];

    $sql = "SELECT Login, idUser FROM User WHERE Email = '$email' AND Password = '$password'";
    $result = $mysqli->query($sql);
//var_dump($result);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $login = $row["Login"];
        $_SESSION["userID"] = $row["idUser"];
        header("Location: /First_PHP/Lab1/room.php?login=$login"); //redirect
        return;
    } else {
        $errors = "Invalid password";
    }
}
?>
<html>
<head>
    <title>Войдите в систему</title>
</head>
<meta charset="utf-8">
<body>
<div>
    <form method="post" action="authetification.php">
        Email<input type="email" name="email" value=<?php $_POST["email"] ?>><br>
        Пароль<input type="password" name="password" value=""><br>
        <?php echo "<br>".$errors ?>
        <input type="submit">
    </form>
</div>
</body>
</html>
