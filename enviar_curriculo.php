<?php
  $dados = $_POST;
  include 'funcoes/validadores.php';
  if (validar_curriculo($dados) == false) {
    header('location: curriculo.php?erro=erro&codigo=' .
$dados['empresa']);
    exit();
  }
  $nome = $dados['nome'];
  $email = $dados['email'];
  $cod_departamento = $dados['departamento'];
  $cod_empresa = $dados['empresa'];
?>
