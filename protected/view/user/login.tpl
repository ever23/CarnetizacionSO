
<div class="container">
    <h1 class="header2 text-center">Iniciar Session</h1>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            {form->Form class="form-control"}
            <ul>
                <li class="FormRow">   <label>Usuario </label>{form->Input name="user"}

                <li class="FormRow">
                    <label>Contraseña </label>
                    {form->Input name="pass"}
                </li>

                <li class="FormRow text-center">{form->ButtonSubmit class="btn btn-success" value="<spam class='glyphicon glyphicon-send'></spam>Ingresar"}</li>
            </ul>

            {/form->Form}


        </div>
        <div class="col-md-1 "></div>
    </div>



</div>