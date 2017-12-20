<?php
  include 'layout/cabecalho.php';
  include 'funcoes/validadores.php';

  $empresa = (int) $_GET['codigo'];
  if (validar_empresa($empresa) == false) {
    header('location: index.php?erro=erro');
    exit();
  }
?>
        <div class="formulario-curriculo">
          <h3>Envie seu currículo com foto:</h3>
          <form action="enviar_curriculo.php" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" />
            <label>Email:</label>
            <input type="email" name="email" />
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
            </select>
            <label>Foto:</label>
            <input type="file" name="foto" />
            <label>Curriculo:</label>
            <input type="file" name="curriculo" />
            <input type="hidden" name="empresa" value="<?php echo $empresa?>" />        
            <input type="submit" value="Enviar" />
          </form>
        </div>
<?php
  include 'layout/rodape.php';
?>
