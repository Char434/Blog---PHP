<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
//Arquivo index responsável pela inicialização do sistema

require_once 'sistema/configuracao.php';
include_once 'Helpers.php';
include 'sistema/Nucleo/Mensagem.php';

$msg = new Mensagem();
echo $msg->sucesso('Mensagem de sucesso')->renderizar();
echo '<hr>';
echo $msg->erro('Mensagem de sucesso')->renderizar();
echo '<hr>';
echo $msg->alerta('Mensagem de sucesso')->renderizar();
echo '<hr>';
echo $msg->informa('Mensagem de sucesso')->renderizar();
echo '<hr>';
