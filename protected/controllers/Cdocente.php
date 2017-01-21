<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cc\Mvc;

/**
 * Description of Cdocente
 *
 * 
 */
class Cdocente extends ExtendsController implements AccessUserController
{

    public static function AccessUser()
    {
        return [
            'NoAuth' => [],
            'root' => [
                'Access' => ['*']
            ],
            'docente' => [
                'NoAccess' => ['insertar', 'eliminar', 'index']
            ],
        ];
    }

    public function index(DBtabla $docentes, Request $r, $q = NULL, $id_docente = NULL)
    {

        if ($id_docente)
        {
            $docentes->Select("id_docente=" . $id_docente);
        } elseif ($q)
        {
            $docentes->Busqueda($q, ['id_docente', 'nombres_docente', 'apellidos_docente']);
        }
        $this->view->docente = $docentes;
        $this->LoadView('docente/index.tpl');
    }

    public function info(Html $h, DBtabla $docentes, DBtabla $estudiante, $id_docente = 0)
    {
        $docentes->Select("id_docente=" . $id_docente);
        if ($docentes->num_rows != 1)
        {
            $h->AddError("El docente no existe <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
            $this->HttpError(404);
            return;
        }
        $campos = ['seccion.grado_seccion as grado_estu', 'seccion.char_seccion as seccion_estu', 'estudiante.*'];

        $estudiante->Select($campos, "id_docente=" . $id_docente, ['>seccion', '>docentes']);
        $this->view->docente = $docentes->fetch();
        $this->view->estudiantes = $estudiante;
        $this->LoadView('docente/info.tpl');
    }

    public function insertar(Html $h, Autenticacion $docentes)
    {
        $this->view->h1 = "Insertar Docente";
        //  $this->view->type = 'agregar';
        $form = new FormDocente();
        if ($form->IsSubmited() && $form->IsValid())
        {

            if ($docentes->CreteUser($form->hash_docente, $form))
            {
                $this->Redirec('docente/index', ['id_docente' => $form->id_docente]);
            } else
            {
                $h->AddError("El docente no se ha insertado");
            }
        }
        $this->view->form = $form;
        $this->LoadView('docente/form.tpl');
    }

    public function editar(Html $h, DBtabla $docentes, $id_docente = 0)
    {

        $docentes->Select("id_docente=" . $id_docente);
        if ($docentes->num_rows != 1)
        {
            $h->AddError("El docente no existe <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
            $this->HttpError(404);
            return;
        }
        $docente = $docentes->fetch();
        $this->view->h1 = "Editar Docente";
        //  $this->view->type = 'agregar';
        $form = new FormDocenteEditar();
        if ($form->IsSubmited() && $form->IsValid())
        {
            if ($docentes->Update($form, "id_docente=" . $id_docente))
            {

                $this->Redirec('docente/index', ['id_docente' => $id_docente]);
            } else
            {
                $h->AddError("El docente no se ha editado");
            }
        }
        $form->DefaultValue($docente);
        $this->view->form = $form;
        $this->LoadView('docente/formEditar.tpl');
    }

    public function eliminar(Html $h, MySQLi $db, DBtabla $docentes, DBtabla $seccion, Cookie $cookie, $id_docente = 0)
    {
        $db->beginTransaction();
        $docentes->Select("id_docente=" . $id_docente);
        if ($docentes->num_rows != 1)
        {
            $h->AddError("El docente no existe <a href='" . $_SERVER['HTTP_REFERER'] . "' class='btn btn-info'>Regresar</a>");
            $this->HttpError(404);
            return;
        }
        $seccion->Delete("id_docente=" . $id_docente);
        if (!$db->error && $docentes->fetch()->Delete())
        {
            $db->commit();
            $cookie['mensaje'] = 'EL docente fue eliminado';
            $this->Redirec('docente/index');
        } else
        {
            $db->rollback();
            $h->AddError("Ocurrio un error al eliminar al docente es posible que aun tenga alumnos registrados  <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
        }
    }

    public function CambiarContrasena(Html $h, Autenticacion $docentes)
    {
        $form = new FormDocenteEditarContrasena();
        if ($form->IsSubmited() && $form->IsValid())
        {
            if ($docentes->UpdatePassword($form->pass, $form->pass1))
            {
                $this->Redirec('user/');
            } else
            {
                $h->AddError("No se ha cambiado la contraseña ");
            }
        }
        $this->view->form = $form;
        $this->LoadView("docente/contrasena.tpl");
    }

}
