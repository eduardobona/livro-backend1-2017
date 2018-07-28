<?php

  // recebendo e validando dados
  $dados = $_POST;
  include 'funcoes/validadores.php';
  $validacao = validar_curriculo($dados);
  if ($validacao !== true) {
    header('location: curriculo.php?erro='.
      $validacao.'&codigo=' . $dados['empresa']);
    exit();
  }

  // recebendo dados em variáveis
  $nome = $dados['nome'];
  $email = $dados['email'];
  $cod_departamento = $dados['departamento'];
  $cod_empresa = $dados['empresa'];

  // validando arquivos
  $arquivos = $_FILES;
  $validacao = validar_curriculo_arquivos($arquivos);
  if ($validacao !== true) {
    header('location: curriculo.php?erro='.
      $validacao.'&codigo=' . $dados['empresa']);
    exit();
  }

  // realizando o upload
  include 'funcoes/arquivos.php';

  $foto = mover_arquivo($arquivos['foto'], 'foto');
  if ($foto === false) {
    $mensagem_erro = "Erro ao enviar foto";
    header('location: curriculo.php?erro='.
           $mensagem_erro . '&codigo=' . $dados['empresa']);
    exit();
  }

  $curriculo = mover_arquivo($arquivos['curriculo'], 'curriculo');
  if ($curriculo === false) {
    $mensagem_erro = "Erro ao enviar currículo";
    header('location: curriculo.php?erro='.
           $mensagem_erro . '&codigo=' . $dados['empresa']);
    exit();
  }

  // enviando email e concluindo cadastro
  include 'funcoes/emails.php';
  agradecer_contato($nome, $email);
  enviar_curriculo_email(
    array('nome' => $nome, 'email' => $email, 'cod_departamento' => $cod_departamento, 'cod_empresa' => $cod_empresa),
    array('foto' => $foto, 'curriculo' => $curriculo)
  );

  header('location: curriculo_cadastrado.php');
  exit();

