<?php

$array = ["Username", "Duração", "Dimensões", "Nº de bombas", "Modo de Jogo"];
$arrayValor = $conn->query("SELECT * FROM GAME")->fetchAll();

/* [
    ["Rosie", "23:10", "11x11", "11", "Clássico"],
    ["Chief", "12:19", "12x12", "12", "Rivotril"],
    ["Bam", "12:10", "13x13", "13", "Clássico"],
    ["Raymond", "10:10", "14x14", "14", "Rivotril"],
    ["Marshal", "09:29", "15x15", "15", "Clássico"],
    ["Audie", "08:31", "16x16", "16", "Rivotril"],
    ["Broccolo", "06:30", "17x17", "17", "Rivotril"],
    ["Buck", "04:04", "18x18", "18", "Clássico"],
    ["Jitters", "02:02", "19x19", "19", "Clássico"],
    ["Bob", "01:01", "20x20", "20", "Clássico"]
]; */

usort($arrayValor, "sortFunction");

for ($i = 0; $i < 5; $i++) {
    echo "<th>" . $array[$i] . "</th>";
}
echo "</tr>";

if($arrayValor == null){
    echo "<td colspan=\"5\">Sem dados para exibir.</td>";
} else {
    for ($j = 0; $j < 10; $j++) {
        echo "<tr>";
        for ($k = 0; $k < 5; $k++) {
            echo "<td>" . $arrayValor[$j][$k] . "</td>";
        }
        echo "</tr>";
    }
}

function sortFunction($a, $b)
{
    if ($a[1] === $b[1]) {
        return 0;
    } else {
        return ($a[1] < $b[1]) ? -1 : 1;
    }
}

?>