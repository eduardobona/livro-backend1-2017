<?php
function mover_arquivo($arquivo, $tipo) {
  $datahora = new \DateTime();
  $datahora_string = $datahora->format('Y-m-d-His');
  $pathinfo = pathinfo($arquivo['name']);
  $novo_nome = $datahora_string . '_' . $tipo;
  $extensao = $pathinfo['extension'];
  $pasta = 'curriculos';
  $novo_nome_completo = $pasta . '/' . $novo_nome . '.' . $extensao;    
  // movendo arquivo temporário para destino final
  move_uploaded_file(
    $arquivo['tmp_name'],
    __DIR__ . '/../' . $novo_nome_completo
  );    
  return $novo_nome_completo;
}
?>
