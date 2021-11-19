<?php
include('conexao.php');
?>

<?php
$array = ["Username", "Duração", "Dimensões", "Nº de bombas", "Modo de Jogo"];
$arrayDados = $conn->query("SELECT * FROM GAME WHERE RESULT = 'win' ORDER BY (END-START)")->fetchAll();
$arrayUsers = $conn->query("SELECT * FROM USER")->fetchAll();

$arrayDados = convertTime($arrayDados);
$arrayDados = super_unique($arrayDados,2);
usort($arrayDados, "sortByDimension");

for ($i = 0; $i < 5; $i++) {
    echo "<th>" . $array[$i] . "</th>";
}
echo "</tr>";

if ($arrayDados == null) {
    echo "<td colspan=\"5\">Sem dados para exibir.</td>";
} else {
    for ($j = 0; $j < count($arrayDados); $j++) {
        $time = adjustTime($arrayDados[$j][7] - $arrayDados[$j][6]);
        $name;
        for ($i = 0; $i < count($arrayUsers); $i++) {
            if($arrayDados[$j][8] == $arrayUsers[$i][0]){
                $name = $arrayUsers[$i][6];
            }
        }

        echo "<tr>";
        echo "<td>" . $name . "</td>";
        echo "<td>" . $time . "</td>";
        echo "<td>" . $arrayDados[$j][2] . "x" . $arrayDados[$j][3] . "</td>";
        echo "<td>" . $arrayDados[$j][4] . "</td>";
        echo "<td>" . $arrayDados[$j][1] . "</td>";
        echo "</tr>";
    }
}

function sortByDimension($a, $b){
    if ($a[2] * $a[3] === $b[2] * $b[3]) {
        return 0;
    } else {
        return ($a[2] * $a[3] > $b[2] * $b[3]) ? -1 : 1;
    }
} //Ordena por dimensão (Decrescente)

function convertTime($vet){
    for ($i = 0; $i < count($vet); $i++) {
        $vet[$i][6] = substr($vet[$i][6], 11, 8);
        $vet[$i][6] = strtotime($vet[$i][6]);
        $vet[$i][7] = substr($vet[$i][7], 11, 8);
        $vet[$i][7] = strtotime($vet[$i][7]);
    }

    return $vet;
} //Converte timestamps para tempo decorrido

function adjustTime($number){
    $seconds = $number % 60;
    if ($seconds < 10) {
        $seconds = "0" + $seconds;
    }

    $minutes = ($number - $seconds) / 60;
    if ($minutes < 10) {
        $minutes = "0" + $minutes;
    }

    return str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" . str_pad($seconds, 2, "0", STR_PAD_LEFT);
} //Formata o tempo para exibição (mm:ss)

function super_unique($array,$key){
       $temp_array = [];
       foreach ($array as &$v) {
           if (!isset($temp_array[$v[$key]]))
           $temp_array[$v[$key]] =& $v;
       }
       $array = array_values($temp_array);
       return $array;

} //Remove entradas com dimensões iguais

?>
