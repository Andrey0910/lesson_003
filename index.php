<?php
//Подключаем функции
require_once("functions.php");
//Включение буферизации вывода
ob_start();
// начало вывода первого задания
echo "<div class='jumbotron'>";
echo "<h5>", "Задание 1", "</h5>";
echo "<p>", task1(), "</p>";
echo "</div>";
// конец вывода первого задания
// начало вывода второго задания
echo "<div class='jumbotron'>";
echo "<h5>", "Задание 2", "</h5>";
$file1 = "output.json";
$file2 = "output2.json";
$data = [
    ['a', 'b', 'c'],
    ['a1', 'b2', 'c3'],
    ['2', '2', '2'],
    ['3', '4', '5']
];
echo "<p>", task2($data, $file1, $file2), "</p>";
echo "</div>";
// конец вывода второго задания
// начало вывода третьего задания
echo "<div class='jumbotron'>";
echo "<h5>", "Задание 3", "</h5>";
$file = "./csvData.csv";
echo "<p>", task3($file), "</p>";
echo "</div>";
// конец вывода третьего задания
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