<?php
function validar_empresa($codigo){
    $empresa_departamento = include(__DIR__ . '/../dados/empresa_departamento.php');
    if (isset ($empresa_departamento[$codigo])) {
        return true;
    } else {
        return false;
    }
}
?>
