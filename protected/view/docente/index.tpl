

<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li class="active">Docentes</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Docentes <small><a href="docente/insertar" class="btn btn-danger glyphicon glyphicon-plus-sign"></a></small></h1>
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
                <th>C.I</th>
                <th>Nombres</th>
                <th>Apellidos</th>

                <th></th>
                <th></th> 
                <th></th>
            </tr>
        </thead>
        <tbody>
            {docente->each row=row}
            <tr>
                <td>{$row.id_docente}</td>
                <td>{$row.nombres_docente}</td>
                <td>{$row.apellidos_docente}</td>

                <td><a href="docente/info?id_docente={$row.id_docente}" class="glyphicon glyphicon-info-sign"></a></td> 
                <td><a href="docente/editar?id_docente={$row.id_docente}" class="glyphicon glyphicon-edit"></a></td>
                <td><a href="docente/eliminar?id_docente={$row.id_docente}" class="glyphicon glyphicon-remove"></a></td>

            </tr>
            {/docente->each}
        </tbody>
    </table>



</div>