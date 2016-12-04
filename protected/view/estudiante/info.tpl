

<ol class="breadcrumb" >
    <li><a href="">Inicio</a></li>
    <li ><a href="estudiante/">Estudiante</a></li>
    <li class="active">Informacion</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Estudiante <a href="estudiante/carnet?id_estu={$estudiante.id_estu}" title="Carnet" class="btn btn-info"><img src="src/images/carnet.png?GDw=30"></a></h1>
    <div class="row">
        <div class="col-md-4">
            <img src="fotos/?id_foto={$estudiante.id_foto}&GDw=200" class="img-responsive img-rounded">

        </div>
        <div class="col-md-8">
            <table class="table ">
                <tbody>
                    <tr>
                        <td width="200" ><b>Cedula</b></td>
                        <td>{$estudiante.cedula_estu}</td>
                    </tr>
                    <tr>
                        <td width="200" ><b>Nombres</b></td>
                        <td>: {$estudiante.nombres_estu} </td>
                    </tr>
                    <tr>
                        <td><b>Apellidos</b></td>
                        <td>: {$estudiante.apellidos_estu} </td>
                    </tr>
                    <tr>
                        <td><b>Edad</b></td>
                        <td>: {$estudiante.edad} </td>
                    </tr>
                    <tr>
                        <td><b>Fecha de Nacimiento</b></td>
                        <td>: {$estudiante.nacimiento_estu} </td>
                    </tr>
                    <tr>
                        <td><b>Sexo</b></td>
                        <td>: {$estudiante.sexo_estu} </td>
                    </tr>
                    <tr>
                        <td><b>Enfermedad</b></td>
                        <td>: {$estudiante.enfermedad_estu} </td>
                    </tr>
                    <tr>
                        <td><b>Discapacidad</b></td>
                        <td>: {$estudiante.discapacidad_estu} </td>
                    </tr>
                    <tr>
                        <td><b>Fecha de ingreso</b></td>
                        <td>: {$estudiante.ingreso_estu} </td>
                    </tr>
                    <tr>
                        <td><b>Grado</b></td>
                        <td>: {$estudiante.grado_estu} </td>
                    </tr>
                    <tr>
                        <td><b>Seccion</b></td>
                        <td>: {$estudiante.seccion_estu} </td>
                    </tr>
                    <tr>
                        <td><b>Turno</b></td>
                        <td>: {$estudiante.turno_estu} </td>
                    </tr>
                </tbody>
            </table>
            <h3 class="text-center">Representante</h3>
            <table class="table">
                <tbody>
                    <tr>
                        <td ><b>C.I</b></td>
                        <td>:{$representante.id_repre} </td>
                    </tr>
                    <tr>
                        <td ><b>Nombres</b></td>
                        <td>: {$representante.nombres_repre}</td>
                    </tr>
                    <tr>
                        <td ><b>Apellidos</b></td>
                        <td>: {$representante.apellidos_repre}</td>
                    </tr>
                    <tr>
                        <td ><b>Telefono</b></td>
                        <td>: {$representante.telefono_repre}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>






</div>