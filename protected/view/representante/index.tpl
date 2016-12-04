

<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li class="active">Representantes</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Representantes </h1>
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
                <th>Telefono</th>
                <th></th>
                <th></th> 
                <th></th>
            </tr>
        </thead>
        <tbody>
            {representante->each row=row}
            <tr>
                <td>{$row.id_repre}</td>
                <td>{$row.nombres_repre}</td>
                <td>{$row.apellidos_repre}</td>
                <td>{$row.telefono_repre}</td> 
                <td><a href="representante/info?id_repre={$row.id_repre}" class="glyphicon glyphicon-info-sign"></a></td> 
                    {if $session.type_user=='root'}
                    <td><a href="representante/editar?id_repre={$row.id_repre}" class="glyphicon glyphicon-edit"></a></td>
                    <td><a href="representante/eliminar?id_repre={$row.id_repre}" class="glyphicon glyphicon-remove"></a></td>
                    {/if}
            </tr>
            {/representante->each}
        </tbody>
    </table>



</div>