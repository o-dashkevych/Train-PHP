<?php

//  Database connection

$mysqli = new mysqli("127.0.0.1", "root", "Da951321793dA", "university_db", 3306);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>