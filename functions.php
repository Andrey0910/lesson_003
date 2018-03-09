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