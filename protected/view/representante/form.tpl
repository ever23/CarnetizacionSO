
<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li><a href="representante/">Representantes</a></li>
    <li class="active">{$h1}</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">{$h1} </h1>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            {form->Form class="form-control"}
            <ul>
                <li class="FormRow">   <label>C.I  </label>{form->Input name="id_repre"}

                <li class="FormRow">
                    <label>Nombres </label>
                    {form->Input name="nombres_repre"}
                </li>
                <li class="FormRow">
                    <label>Apellidos </label>
                    {form->Input name="apellidos_repre"}</li>
                <li class="FormRow">
                    <label>Telefono </label>
                    {form->Input name="telefono_repre"}</li>

                <li class="FormRow text-center">{form->ButtonSubmit class="btn btn-success" value="<spam class='glyphicon glyphicon-send'></spam>Guardar"}</li>
            </ul>

            {/form->Form}


        </div>
        <div class="col-md-1 "></div>
    </div>



</div>