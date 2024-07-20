<?php
//Arquivo index responsável pela inicialização do sistema

require_once 'sistema/configuracao.php';
include_once 'Helpers.php';

$cpf = '12345678910';

for ($t = 9; $t < 11; $t++) {
    for ($d = 0, $c = 0; $c < $t; $c++) {
        $d += $cpf[$c] * (($t + 1) - $c);
    }
    $d = ((10 * $d) % 11) % 10;
    if ($cpf[$c] != $d) {
        echo 'CPF inválido!';
    } else {
        echo 'CPF válido!';
    }
}

// while ($numero <= 10) {
//     echo $numero++;
// }
// for ($i = 0; $i <= 10; $i++) {
//     echo ($i % 2 ? $i . ' par' : $i . ' impar') . '<br>';
//     echo $i . ' x ' . $i . ' = ' . $i * $numero . '<br>';
// }
