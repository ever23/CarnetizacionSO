

<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li class="active">Estudiantes</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Estudiantes </h1>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">   <form action="" method="GET"  class="input-group">
                <input type="search" class="form-control" placeholder="Buscar" name='q' style="    min-width: 30%;"  value="">
                <span class="input-group-btn">
                    <button class="btn btn-info glyphicon glyphicon-search " style="    background: rgba(245, 8, 8, 0.92);
                            border-color: rgba(245, 8, 8, 0.7);"></button>
                </span>

            </form></div>
        <div class="col-sm-3"></div>

    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>sexo</th>
                <th>Grado</th>
                <th>Seccion</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {estudiante->each row=row}
            <tr>
                <td>{$row.cedula_estu}</td>
                <td>{$row.nombres_estu}</td>
                <td>{$row.apellidos_estu}</td>
                <td>{$row.sexo_estu}</td> 
                <td>{$row.grado_estu}</td> 
                <td>{$row.seccion_estu}</td> 
                <td><a href="estudiante/info?id_estu={$row.id_estu}" class="glyphicon glyphicon-info-sign"></a></td>
                    {if $session.type_user=='root'}
                    <td><a href="estudiante/editar?id_estu={$row.id_estu}" class="glyphicon glyphicon-edit"></a></td>
                    <td><a href="estudiante/eliminar?id_estu={$row.id_estu}" class="glyphicon glyphicon-remove"></a></td>
                    {/if}
            </tr>
            {/estudiante->each}
        </tbody>
    </table>



</div>