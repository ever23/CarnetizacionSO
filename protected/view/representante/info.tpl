

<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li ><a href="representante/">Representantes</a></li>
    <li class="active">Informacion</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Representante </h1>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <table class="table">
                <tbody>
                    <tr>
                        <td width="200"><b>C.I</b></td>
                        <td>: {$representante.id_repre}</td>
                    </tr>
                    <tr>
                        <td><b>Nombres</b></td>
                        <td>: {$representante.nombres_repre}</td>
                    </tr>
                    <tr>
                        <td><b>Apellidos</b></td>
                        <td>: {$representante.apellidos_repre}</td>
                    </tr>
                    <tr>
                        <td><b>Telefono </b></td>
                        <td>: {$representante.telefono_repre}</td>
                    </tr>



                </tbody>
            </table>
            <h3 class="text-center">Representados</h3>
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

                    </tr>
                </thead>
                <tbody>
                    {estudiantes->each row=row}
                    <tr>
                        <td>{$row.cedula_estu}</td>
                        <td>{$row.nombres_estu}</td>
                        <td>{$row.apellidos_estu}</td>
                        <td>{$row.sexo_estu}</td> 
                        <td>{$row.grado_estu}</td> 
                        <td>{$row.seccion_estu}</td> 
                        <td><a href="estudiante/info?id_estu={$row.id_estu}" class="glyphicon glyphicon-info-sign"></a></td>


                    </tr>
                    {/estudiantes->each}
                </tbody>
            </table>
        </div>
        <div class="col-md-2">

        </div>
    </div>





</div>