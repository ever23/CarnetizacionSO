

<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li ><a href="docente/">Docente</a></li>
    <li class="active">Informacion</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Docente </h1>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <table class="table">
                <tbody>
                    <tr>
                        <td width="200"><b>C.I</b></td>
                        <td>: {$docente.id_docente}</td>
                    </tr>
                    <tr>
                        <td><b>Nombres</b></td>
                        <td>: {$docente.nombres_docente}</td>
                    </tr>
                    <tr>
                        <td><b>Apellidos</b></td>
                        <td>: {$docente.apellidos_docente}</td>
                    </tr>
                    <tr>
                        <td><b>Fecha de Nacimiento</b></td>
                        <td>: {$docente.naci_docente}</td>
                    </tr>

                    <tr>
                        <td><b>Sexo</b></td>
                        <td>: {$docente.sexo_docente}</td>
                    </tr>

                    <tr>
                        <td><b>Direccion</b></td>
                        <td>: {$docente.direccion}</td>
                    </tr>

                </tbody>
            </table>
            <h3 class="text-center">Estudiantes</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>edula</th>
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