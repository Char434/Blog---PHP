<?php



/**
 * 
 * Gera url amigável
 * @param string $string
 * @return string
 */
function slug(string $string): string
{

    $mapa['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÕÕÖØÙÚÛÜüÝÞBàáããäåæçèéêëìíîïðñòóõõöøùúû@#$%&*()_-+{[}]/?¨|;:.,\\\'<>°◦ᵃ';
    $mapa['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuu                        ';
    //converte/transcreve caracteres
    $slug = strtr(mb_convert_encoding($string, 'ISO-8859-1', 'UTF-8'), mb_convert_encoding($mapa['a'], 'ISO-8859-1', 'UTF-8'), $mapa['b']);
    $slug = strip_tags(trim($slug));
    $slug = str_replace(' ', '-', $slug);
    $slug = str_replace(['-----', '----', '---', '--', '-'], '-', $slug);

    return strtolower($slug);
}

/**
 * Retorna uma string com o dia e data atual
 * @return string
 */
function dataAtual(): string
{
    $diaMes = date('d');
    $diaSemana = date('w');
    $mes = date('n') - 1;
    $ano = date('Y');

    $diasDaSemana = ['domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-sexta', 'sábado'];

    $nomesDosMeses = ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];

    $dataFormatada = $diasDaSemana[$diaSemana] . ', ' . $diaMes . ' de ' . $nomesDosMeses[$mes] . ' de ' . $ano;
    return $dataFormatada;
}

/**
 * Monta url de acordo com o ambiente
 * @param string $url parte da url ex. admin
 * @return string url completa
 */
function url(string $url): string
{
    $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
    $ambiente = ($servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO);

    if (str_starts_with($url, '/')) {
        return $ambiente . $url;
    }

    return $ambiente . '/' . $url;
}

function localhost(): bool
{
    $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');

    if (!$servidor == 'localhost') {
        return true;
    }
    return false;
}

/**
 * Validar Url
 * @param string $url
 * @return bool
 */
function validarUrl(string $url): bool
{
    if (mb_strlen($url) < 10) {
        return false;
    }
    if (!str_contains($url, '.')) {
        return false;
    }
    if (str_contains($url, 'http://') || str_contains($url, 'https://')) {
        return true;
    }
    return false;
}

function validarUrlComFiltro(string $url): bool
{
    return filter_var($url, FILTER_VALIDATE_URL);
}
/**
 * Validar email
 * @param string $email
 * @return bool
 */
function validarEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Conta o tempo decorrido de uma data
 * @param string $data
 * @return string
 */
function contarTempo(string $data): string
{
    $agora = strtotime(date('Y-m-d H:i:s')); //tempo desse exato momento
    $tempo = strtotime($data); //tempo que eu recebi
    echo $diferenca = $agora - $tempo;

    $segundos = $diferenca;
    $minutos = round($diferenca / 60);
    $horas = round($diferenca / 3600);
    $dias = round($diferenca / 86400);
    $semanas = round($diferenca / 604800);
    $meses = round($diferenca / 2419200);
    $anos = round($diferenca / 29030400);
    echo '<hr>';

    if ($segundos <= 60) {
        return 'agora';
    } else if ($minutos <= 60) {
        return $minutos == 1 ? 'há 1 minuto' : 'há ' . $minutos . ' minutos';
    } else if ($horas <= 24) {
        return $horas == 1 ? 'há 1 hora' : 'há ' . $horas . ' horas';
    } else if ($dias <= 7) {
        return $dias == 1 ? 'há 1 dia' : 'há ' . $dias . ' dias';
    } else if ($semanas <= 4) {
        return $semanas == 1 ? 'há 1 semana' : 'há ' . $semanas . ' semanas';
    } else if ($meses <= 12) {
        return $meses == 1 ? 'há 1 mês' : 'há ' . $meses . ' meses';
    } else {
        return $anos == 1 ? 'há 1 ano' : 'há ' . $anos . ' anos';
    }
}

/**
 * Formata valor com ponto e vírgula
 * @param float $valor
 * @return string
 */
function formatarValor(float $valor = null): string
{
    return number_format(($valor ? $valor : 10), 2, ',', '.');  //formato de moeda brasileiro
}

/**
 * Formata um número com pontos
 * @param int $numero
 * @return string
 */
function formatarNumero(int $numero = null): string
{
    return number_format(($numero ? $numero : 0), 0, '.', '.');
}

function saudacao(): string
{
    $hora = date('H');

    // if ($hora >= 0 && $hora <= 5) {
    //     $saudacao = 'boa madrugada';
    // } elseif ($hora >= 6 && $hora <= 12) {
    //     $saudacao = 'bom dia';
    // } elseif ($hora >= 13 && $hora <= 18) {
    //     $saudacao = 'boa tarde';
    // } else {
    //     $saudacao = 'boa noite';
    // }
    // switch ($hora) {
    //     case $hora >= 0 && $hora <= 5:
    //         $saudacao = 'Boa madrugada';
    //         break;
    //     case $hora >= 6 && $hora <= 12:
    //         $saudacao = 'Bom dia';
    //         break;
    //     case $hora >= 13 && $hora <= 18:
    //         $saudacao = 'Boa tarde';
    //         break;
    //     default:
    //         $saudacao = 'Boa noite';
    // };
    $saudacao = match (true) {
        $hora >= 0 && $hora <= 5 => 'boa madrugada',
        $hora >= 6 && $hora <= 12 => 'boa madrugada',
        $hora >= 13 && $hora <= 18 => 'boa madrugada',
        default => 'boa noite'
    };

    return $saudacao;
}

/**
 * Resume um texto
 * 
 * @param string $texto texto para resumir
 * @param int $limite quantidade de caracteres
 * @param string $continue opcional - o que deve ser exibido ao final do resumo
 * @return string texto resumido
 */
function resumirTexto(string $texto, int $limite, string $continue = '...'): string
{
    $textoLimpo = trim(strip_tags($texto)); //só limpa tags
    if (mb_strlen($textoLimpo) <= $limite) {
        return $textoLimpo;
    }

    $resumirTexto = mb_substr($textoLimpo, 0, $limite);
    $ultimoEspaco = mb_strrpos($resumirTexto, ' ');
    if ($ultimoEspaco !== false) {
        $resumirTexto = mb_substr($resumirTexto, 0, $ultimoEspaco);
    }

    return $resumirTexto . $continue;
}
