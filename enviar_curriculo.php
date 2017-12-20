<?php
  // recebendo dados
  $dados = $_POST;
  include 'funcoes/validadores.php';
  if (validar_curriculo($dados) == false) {
    header('location: curriculo.php?erro=erro&codigo=' .
$dados['empresa']);
    exit();
  }

  // recebendo dados em variáveis
  $nome = $dados['nome'];
  $email = $dados['email'];
  $cod_departamento = $dados['departamento'];
  $cod_empresa = $dados['empresa'];

  // realizando o upload
  include 'funcoes/arquivos.php';

  $foto = mover_arquivo($arquivos['foto'], 'foto');
  $curriculo = mover_arquivo($arquivos['curriculo'], 'curriculo');

?>
