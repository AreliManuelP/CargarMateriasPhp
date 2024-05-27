<?php

function validarUsu($usuario){
    return preg_match('/^[A-Za-z\sáéíóúÁÉÍÓÚüÜñÑ]+$/', $usuario);
}

function validarCon($con){
    return preg_match('/^#(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{4}@(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{4}&$/',$con);
}

?>