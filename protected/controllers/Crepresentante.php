<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cc\Mvc;

/**
 * Description of Crepresentante
 *
 * 
 */
class Crepresentante extends ExtendsController implements AccessUserController
{

    public static function AccessUser()
    {

        return [
            'root' =>
            [
                'Access' => ['*']
            ],
            'docente' => [
                'NoAccess' => ['editar', 'eliminar']
            ],
        ];
    }

    public function index(DBtabla $representante, $q = NULL, $id_repre = NULL)
    {
        $join = ['>estudiante' => 'id_repre', '>seccion', '>docentes'];
        if ($id_repre)
        {
            $representante->Select("id_repre=" . $id_repre . " and (id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", $join, "group by id_repre");
        } elseif ($q)
        {
            $representante->Busqueda($q, ['id_repre', 'nombres_repre', 'apellidos_repre'], "(id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", "group by id_repre");
        } else
        {
            $representante->Select(" (id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", $join, "group by id_repre");
        }
        //  echo $representante->sql;
        $this->view->representante = $representante;
        $this->LoadView('representante/index.tpl');
    }

    public function info(Html $h, DBtabla $representante, DBtabla $estudiante, $id_repre = 0)
    {
        $representante->Select("id_repre=" . $id_repre);
        if ($representante->num_rows != 1)
        {
            $h->AddError("El representante no existe <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
            $this->HttpError(404);
            return;
        }
        $campos = ['seccion.grado_seccion as grado_estu', 'seccion.char_seccion as seccion_estu', 'estudiante.*'];

        $estudiante->Select($campos, "id_repre=" . $id_repre, ['>seccion']);
        $this->view->representante = $representante->fetch();
        $this->view->estudiantes = $estudiante;
        $this->LoadView('representante/info.tpl');
    }

    public function insertar(Html $h, DBtabla $representante, $ref = 'representante/index')
    {
        $this->view->h1 = "Insertar Representante";
        //  $this->view->type = 'agregar';
        $form = new FormRepresentante();
        if ($form->IsSubmited() && $form->IsValid())
        {
            if ($representante->Insert($form))
            {

                $this->Redirec($ref, ['id_repre' => $form->id_repre]);
            } else
            {
                $h->AddError("El representante no se ha insertado");
            }
        }
        $this->view->form = $form;
        $this->LoadView('representante/form.tpl');
    }

    public function editar(Html $h, DBtabla $representante, $id_repre = 0)
    {

        $representante->Select("id_repre=" . $id_repre);
        if ($representante->num_rows != 1)
        {
            $h->AddError("El representante no existe <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
            $this->HttpError(404);
            return;
        }
        $repre = $representante->fetch();
        $this->view->h1 = "Editar Representante";
        //  $this->view->type = 'agregar';
        $form = new FormRepresentante();
        if ($form->IsSubmited() && $form->IsValid())
        {
            if ($representante->Update($form, "id_repre=" . $id_repre))
            {

                $this->Redirec('representante/index', ['id_repre' => $id_repre]);
            } else
            {
                $h->AddError("El representante no se ha editado");
            }
        }
        $form->DefaultValue($repre);
        $this->view->form = $form;
        $this->LoadView('representante/form.tpl');
    }

    public function eliminar(Html $h, DBtabla $representante, Cookie $cookie, $id_repre = 0)
    {

        $representante->Select("id_repre=" . $id_repre);
        if ($representante->num_rows != 1)
        {
            $h->AddError("El representante no existe <a href='" . $_SERVER['HTTP_REFERER'] . "' class='btn btn-info'>Regresar</a>");
            $this->HttpError(404);
            return;
        }
        if ($representante->fetch()->Delete())
        {
            $cookie['mensaje'] = 'EL representante fue eliminado';
            $this->Redirec('representante/index');
        } else
        {
            $h->AddError("Ocurrio un error al eliminar al representante es posible que aun tenga alumnos registrados  <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
        }
    }

}
