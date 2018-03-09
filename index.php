<?php
//Подключаем функции
require_once ("functions.php");
//Включение буферизации вывода
ob_start();
// начало вывода первого задания
echo "<div class='jumbotron'>";
echo "<h5>", "Задание 1", "</h5>";
echo "<p>", task1(), "</p>";
echo "</div>";
// конец вывода первого задания
//Возвращает содержимое буфера вывода
$content = ob_get_contents();
//Очищаем и отключаем буферизацию вывода
ob_end_clean();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Третье домашнее задание от loftschool.com</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md">
            <h1>Третье домашнее задание</h1>
            <?= $content ?>
        </div>
    </div>
</div>
</body>
</html>