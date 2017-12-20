<?php

$mensagem = null;
$tipo = null;

if (isset($_GET['erro'])) {
  $mensagem = $_GET['erro'];
  $tipo = 'erro';
}

if ($mensagem and $tipo) {
    $html_template = '
        <div class="mensagem %s">
            <strong>%s</strong>
        </div>    
    ';
    $html = sprintf($html_template, $tipo, $mensagem);
    
    echo $html;
}
?>