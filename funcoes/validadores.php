<?php

function validar_empresa($codigo){
    $empresa_departamento = include(__DIR__ . '/../dados/empresa_departamento.php');
    if (isset ($empresa_departamento[$codigo])) {
        return true;
    } else {
        return false;
    }
}

function validar_curriculo($dados) {
  if( isset($dados['nome']) and isset($dados['email']) ) {
    if( empty($dados['nome']) and empty($dados['email']) ){
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function validar_curriculo_arquivos($arquivos) {
  if (isset($arquivos['foto'])) {
    if ($arquivos['foto']['error']!=0) {
      return false;
    }
    if (in_array($arquivos['foto']['type'], array(
      'image/jpeg', 'image/png'
    ))){
      return true;
    }else{
      return false;
    }
  } else {
    return false;
  }        
  if (isset($arquivos['curriculo'])) {
    if ($arquivos['foto']['error']!=0) {
      return false;
    }
    if (in_array($arquivos['curriculo']['type'], array(
      'application/msword', 'application/pdf'
    ))){
      return true;
    }else{
      return false;
    }
  } else {
    return false;
  }
}


?>
