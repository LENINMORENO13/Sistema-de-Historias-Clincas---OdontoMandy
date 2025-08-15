<?php

if (!function_exists('calcular_edad')){

    function calcularEdad($fecha_nacimiento){
        $fecha_actual = new DateTime();
        $fecha_nac = new DateTime($fecha_nacimiento);
        $diferencia = $fecha_actual->diff($fecha_nac);
        return $diferencia->y;
    }
}