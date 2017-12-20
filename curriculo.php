<?php
  include 'funcoes/validadores.php';

  $empresa = (int) $_GET['codigo'];
  if (validar_empresa($empresa) == false) {
    header('location: index.php?erro=erro');
    exit();
  }

  include 'layout/cabecalho.php';
?>
        <div class="formulario-curriculo">
         
<?php
  include 'layout/mensagem.php';
?>
         
          <h3>Envie seu currículo com foto:</h3>
          <form action="enviar_curriculo.php" method="post" enctype="multipart/form-data">
            <label>Nome:</label>
            <input type="text" name="nome" /><br />
            <label>Email:</label>
            <input type="email" name="email" /><br />
            <label>Departamento:</label>
            <select name="departamento">
<?php
  $empresa_departamento = include 'dados/empresa_departamento.php';
  $departamentos = $empresa_departamento[$empresa]['departamentos'];
  foreach ($departamentos as $indice => $departamento) {
?>

              <option value="<?php echo $indice?>"><?php echo ucfirst($indice) ?></option>

<?php
  }
?>
            </select><br />
            <label>Foto:</label>
            <input type="file" name="foto" /><br />
            <label>Curriculo:</label>
            <input type="file" name="curriculo" /><br />
            <input type="hidden" name="empresa" value="<?php echo $empresa?>" /><br /><br />     
            <input type="submit" value="Enviar" />
          </form>
        </div>
<?php
  include 'layout/rodape.php';
?>
