<ol class="breadcrumb">
    <li class="active">Inicio</li>
    <li></li>
</ol>

<div class="container">
    <h1 class="text-center header2"><img src="src/images/admin.png">Bienvenido {$session.nombres_docente|capitalize}
        <br><small>
            {if $session.type_user=='root'}
                (Administrador)
            {else}
                (Docente)
            {/if}

        </small>
    </h1>
    <ul  class="menu list-inline">
        <li> <a href="estudiante/insertar"><img src="src/images/agregar48.jpg"> Agregar Nuevo Estudiante</a></li>
        <li><a href="representante/"><img src="src/images/representante48.png"> Representantes</a></li>
        <li><a href="estudiante/"><img src="src/images/buscar48.jpg"> Buscar Estudiante</a></li>
        <li><a href="estudiante/reportes"><img src="src/images/reporte.png"> Generar Reportes</a></li>

        {if $session.type_user=='root'}
            <li><a href="docente/"><img src="src/images/reporte.png"> Docentes</a></li>

        {/if}


    </ul>

</div>