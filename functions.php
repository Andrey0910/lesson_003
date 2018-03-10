<?php
function task1()
{
    $file = file_get_contents("data.xml");
    $xml = new SimpleXMLElement($file);
    //Начвло выводв атрибутов зоголовка
    echo "<table>";
    echo "<tr>", "<td>", "PurchaseOrderNumber: ", "</td>";
    echo "<td>", (string)$xml["PurchaseOrderNumber"], "</td>", "</tr>";
    echo "<tr>", "<td>", "OrderDate: ", "</td>";
    echo "<td>", (string)$xml["OrderDate"], "</td>", "</tr>";
    echo "</table>";
    //Конец выводв атрибутов зоголовка
    echo "<br>";
    foreach ($xml as $item) {
        switch ($item->getName()) {
            case "Address":
                echo "<tr>", "<td colspan='2' align='center'>", "<b>", (string)$item->attributes()->Type, "</b>", "</td>", "</tr>";
                echo "<table>";
                foreach ($item as $element) {
                    echo "<tr>", "<td>", $element->getName() . ": ", "</td>";
                    echo "<td>", (string)$element, "</td>", "</tr>";
                }
                echo "</table>";
                break;
            case "DeliveryNotes":
                echo $item->getName() . ": " . (string)$item;
                break;
            case "Items":
                echo "<br>";
                foreach ($item as $element) {
                    echo "<table>";
                    echo "<tr>", "<td colspan='2'>", "<b>", "PartNumber: ", "</b>", $element["PartNumber"], "</td>", "</tr>";
                    foreach ($element as $value) {
                        echo "<tr>", "<td>", $value->getName() . ": ", "</td>";
                        echo "<td>", (string)$value, "</td>", "</tr>";
                    }
                    echo "</table>";
                    echo "<br>";
                }
                break;
        }
        echo "<br>";
    }
}

function task2($data, $file1, $file2)
{
    writeJson($file1, $data);
    $decoded = readJson($file1);
    $change = randomChange($decoded, $file2);
    if ($change) {
        echo "<br>";
        echo "Изменения есть!";
        compare($file1, $file2);
    } else {
        echo "<br>";
        echo "Изменений нет!";
    }
}

function writeJson($file, $data)
{
    $encoded = json_encode($data);
    file_put_contents($file, $encoded);
}

function readJson($file1)
{
    $json = file_get_contents($file1);
    $decoded = json_decode($json, true);
    return $decoded;
}

function randomChange($decoded, $file2)
{
    $rowRandom = rand(0, 5);
    $columnRandom = rand(0, 5);
    if ($rowRandom < 4 && $columnRandom < 3) {
        $decoded[$rowRandom][$columnRandom] = "Изменен";
        writeJson($file2, $decoded);
        return true;
    } else {

        return false;
    }
}

function compare($file1, $file2)
{
    $decoded1 = readJson($file1);
    $decoded2 = readJson($file2);
    for ($row = 0; $row < count($decoded1); $row++) {
        for ($column = 0; $column < count($decoded1[$row]); $column++) {
            if ($decoded1[$row][$column] != $decoded2[$row][$column]) {
                echo "<br>";
                echo "Значения не равны! Строека: " . $row . ". Столбец: " . $column . ".";
                echo "<br>";
                echo "В файле output.json значение: " . $decoded1[$row][$column];
                echo "<br>";
                echo "В файле output2.json значение: " . $decoded2[$row][$column];
            }
        }
    }
}