<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Room</title>
</head>
<body>
<?php
$login = $_POST["login"];
$var = print_r($login, true);
echo "Привет " . $login . "!";
?>
<br>
<br>
<?php
myCalendar($_GET["month"], $_GET["year"]);

function myCalendar($month, $year)
{
    $dateNow = strtotime("$year-$month-01");
    echo "Year: " . $year . " Month: " . $month . "<br><br>";
    $Weeks = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"];
    for ($i = 0; $i <= 7; $i++) {
        echo $Weeks[$i] . " ";
    }
    echo "<br><table>";
    $index = date("N", $dateNow);
    $amount = date('t', $dateNow);
    $slash = 0;
    for ($i = 1; $i <= $amount;) {
        echo "<tr>";
        for ($j = 0; $j <= 7; $j++) {
            if ($slash++ < $index)
                echo "<td>" . " " . "</td>";
            else if ($i <= $amount) echo "<td>" . $i++ . "</td>";
        }
        echo "</tr>";
    }
    echo "</table><br><br>";
}
?>
<form method="get">
    Year
    <select name="year">
        <?php
        $dateNow = strtotime("now");
        $yearNow = date("Y", $dateNow);
        for($i=1980; $i <= $yearNow; $i++) {
            if($i == $_GET["year"]) {
                echo "<option selected>" . $i . "</option>";
                }
            else echo "<option>" . $i . "</option>";
        }
?>
    </select>
    Month
    <select name="month">
        <?php
        $dateNow = strtotime("now");
        $monthNow = date("m", $dateNow);
        for($i=1; $i <= 12; $i++) {
            if($i == $_GET["month"]) {
                echo "<option selected>" . $i . "</option>";
            }
            else echo "<option>" . $i . "</option>";
        }
        ?>
    </select>
    <input type="submit">
</form>
</body>
</html>
