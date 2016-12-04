
<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li><a href="docente/">Docentes</a></li>
    <li class="active">{$h1}</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">{$h1} </h1>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            {form->Form class="form-control"}
            <ul>
                <li class="FormRow">   <label>C.I  </label>
                    {form->Input name="id_docente" disabled=true}

                <li class="FormRow">
                    <label>Nombres </label>
                    {form->Input name="nombres_docente"}
                </li>
                <li class="FormRow">
                    <label>Apellidos </label>
                    {form->Input name="apellidos_docente"}</li>
                <li class="FormRow">
                    <label>Fecha De Nacimiento </label>
                    {form->Input name="naci_docente"}</li>

                <li class="FormRow">
                    <label>Sexo </label>
                    {form->Select name="sexo_docente"}</li>

                <li class="FormRow">
                    <label>Direccion </label>
                    {form->Input name="direccion"}</li>
                <li class="FormRow">
                    <label>Nombre De Usuario </label>
                    {form->Input name="nomb_docente"}</li>



                <li class="FormRow text-center">{form->ButtonSubmit class="btn btn-success" value="<spam class='glyphicon glyphicon-send'></spam>Guardar"}</li>
            </ul>

            {/form->Form}


        </div>
        <div class="col-md-1 "></div>
    </div>



</div>