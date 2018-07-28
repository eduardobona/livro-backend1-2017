<?php

function validar_empresa($codigo){
    $empresa_departamento = include(__DIR__ . '/../dados/empresa_departamento.php');
    if (isset ($empresa_departamento[$codigo])) {
        return true;
    } else {
        return 'Código da empresa não foi encontrado';
    }
}

function validar_curriculo($dados) {
  if( isset($dados['nome']) and isset($dados['email']) ) {
    if( ! empty($dados['nome']) and ! empty($dados['email']) ){
      return true;
    } else {
      return 'O preenchimento de nome e email é obrigatório';
    }
  } else {
    return 'O preenchimento de nome e email é obrigatório';
  }
}

function validar_curriculo_arquivos($arquivos) {
  
  if (isset($arquivos['foto'])) {
    if ($arquivos['foto']['error']!=0) {
      return "Houve um erro no envio da foto pelo formulário";
    }
    if (! in_array($arquivos['foto']['type'], array(
      'image/jpeg', 'image/png'
    ))){
      return "A foto enviada deve ser compatível com image/jpeg ou image/png";
    }
  } else {
    return "O envio da foto (anexo) é obrigatória";
  }        
  
  if (isset($arquivos['curriculo'])) {
    if ($arquivos['foto']['error'] != 0) {
      return "Houve um erro no envio do currículo pelo formulário";
    }
    if (! in_array($arquivos['curriculo']['type'], array(
      'application/msword', 'application/pdf'
    ))){
      return "O currículo enviado deve ser compatível com applicarion/msword e application/pdf";
    }
  } else {
    return "O envio do currículo (anexo) é obrigatório";
  }
  
  return true;
}