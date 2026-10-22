<?php
/**
 * Aviso mostrado en todas las paginas.
 *
 * El proyecto quedo en pausa y el despliegue publico es una demostracion.
 * Se muestra de forma visible para evitar que alguien cargue datos reales
 * de pacientes en un entorno sin control de acceso real.
 */
?>
<div class="aviso-pausa" role="alert">
    <div class="aviso-pausa__inner">
        <span class="aviso-pausa__icon" aria-hidden="true">&#9888;&#65039;</span>
        <p class="aviso-pausa__texto">
            <strong>Proyecto acad&eacute;mico en pausa.</strong>
            Esta es una demostraci&oacute;n con datos ficticios: no ingreses informaci&oacute;n real de pacientes.
        </p>
        <p class="aviso-pausa__enlaces">
            <a href="https://github.com/LENINMORENO13/Sistema-de-Historias-Clincas---OdontoMandy" target="_blank" rel="noopener">C&oacute;digo</a>
            <span aria-hidden="true">&middot;</span>
            <a href="https://github.com/LENINMORENO13/OpsMind" target="_blank" rel="noopener">OpsMind &rarr;</a>
        </p>
    </div>
</div>

<style>
    .aviso-pausa {
        background: #422006;
        color: #ffedd5;
        font-size: .82rem;
        line-height: 1.45;
    }

    .aviso-pausa__inner {
        max-width: 1400px;
        margin: 0 auto;
        padding: .55rem 1rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: .5rem .75rem;
    }

    .aviso-pausa__icon {
        font-size: 1.05rem;
        line-height: 1;
    }

    .aviso-pausa__texto {
        margin: 0;
        flex: 1 1 320px;
    }

    .aviso-pausa__texto strong {
        color: #fdba74;
    }

    .aviso-pausa__enlaces {
        margin: 0;
        display: flex;
        gap: .5rem;
        flex-wrap: wrap;
    }

    .aviso-pausa__enlaces a {
        color: #fed7aa;
        font-weight: 600;
        text-decoration: none;
        border-bottom: 1px dotted rgba(254, 215, 170, .55);
    }

    .aviso-pausa__enlaces a:hover {
        color: #fff7ed;
    }

    @media (max-width: 576px) {
        .aviso-pausa__inner {
            padding: .6rem .75rem;
        }
    }
</style>
