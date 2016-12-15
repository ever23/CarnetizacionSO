<?php

namespace Cc\Mvc;

use Cc\Mvc;

class Cestudiante extends ExtendsController implements ExtByController, AccessUserController
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

    public static function ExtAccept()
    {
        return [
            'accept' =>
            [
                'reportes' => 'pdf',
                'carnet' => 'pdf'
            ]
        ];
    }

    public function index(DBtabla $estudiante, $id_estu = NULL, $q = NULL)
    {
        $campos = ['seccion.grado_seccion as grado_estu', 'seccion.char_seccion as seccion_estu', 'estudiante.*'];
        if ($id_estu)
        {
            $estudiante->Select($campos, "id_estu=" . $id_estu . " and (id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", ['>seccion', '>docentes']);
        } elseif ($q)
        {
            $estudiante->Busqueda($q, ['cedula_estu', 'nombres_estu', 'apellidos_estu', 'sexo_estu'], $campos, "(id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", ['>seccion', '>docentes']);
        } else
        {
            $estudiante->Select($campos, "(id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", ['>seccion', '>docentes']);
        }
//echo $estudiante->sql;
        $this->view->estudiante = $estudiante;
        $this->LoadView('estudiante/index.tpl');
    }

    public function Carnet(Html $h, Config $c, DBtabla $estudiante, DBtabla $fotos, $id_estu = 0)
    {
        if ($h instanceof HtmlPDF)
        {
            $h->SetLayaut('mainPDF.tpl');
        }
        $this->view->dirPDf = self::SelfHref($_GET, ['extencion' => 'pdf']);
        $campos = ['seccion.grado_seccion as grado_estu', 'seccion.char_seccion as seccion_estu', 'estudiante.*'];
        $estudiante->Select($campos, "id_estu=" . $id_estu . " and (id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", ['>seccion', '>docentes']);
        if ($estudiante->num_rows != 1)
        {

            $this->HttpError(404);
            return;
        }
        $estu = $estudiante->fetch()->GetRow();
// $representante->Select("id_repre=" . $estu['id_repre']);
// $this->view->representante = $representante->fetch();

        $date = new \DateTime('now');
        $estu['edad'] = $date->diff(new \DateTime((string) $estu['nacimiento_estu']))->format("%y");
        $fotos->Select("id_foto=" . $estu['id_foto']);
//  $f = ;
        $carnet = new Carnet();

        $this->view->carnet = $carnet->From($estu, $fotos->fetch());
        $this->view->backcarnet = $carnet->Back($estu);
        $this->LoadView('estudiante/carnet.tpl', ['id_estu' => $id_estu]);
    }

    public function CompruevaCarnet()
    {
        $this->LoadView("estudiante/ScanerQr.tpl");
    }

    public function IsEstudianteExist(Json $j, DBtabla $representante, DBtabla $estudiante, $id)
    {
        $carnet = new Carnet();
        $id_estu = $carnet->GetId($id);
        if (is_null($id_estu))
        {
            $j['error'] = 'El Codigo Qr Es Invalido';
            return;
        }
        $campos = ['seccion.grado_seccion as grado_estu', 'seccion.char_seccion as seccion_estu', 'estudiante.*'];
        $estudiante->Select($campos, "id_estu=" . $id_estu . " ", ['>seccion', '>docentes']);
        if ($estudiante->num_rows != 1)
        {
            $j['error'] = 'Estudiante no existe';
            return;
        }
        $estu = $estudiante->fetch()->GetRow();
        $representante->Select("id_repre=" . $estu['id_repre']);
        $this->view->representante = $representante->fetch();

        $date = new \DateTime('now');
        $estu['edad'] = $date->diff(new \DateTime((string) $estu['nacimiento_estu']))->format("%y");
        $this->view->estudiante = $estu;
        $j['html'] = $this->FetchView('estudiante/info.tpl');
    }

    public function info(Html $h, DBtabla $representante, DBtabla $estudiante, $id_estu = 0)
    {
        $campos = ['seccion.grado_seccion as grado_estu', 'seccion.char_seccion as seccion_estu', 'estudiante.*'];
        $estudiante->Select($campos, "id_estu=" . $id_estu . " and (id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", ['>seccion', '>docentes']);
        if ($estudiante->num_rows != 1)
        {
            $h->AddError("El estudiante no existe <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
            $this->HttpError(404);
            return;
        }
        $estu = $estudiante->fetch()->GetRow();
        $representante->Select("id_repre=" . $estu['id_repre']);
        $this->view->representante = $representante->fetch();

        $date = new \DateTime('now');
        $estu['edad'] = $date->diff(new \DateTime((string) $estu['nacimiento_estu']))->format("%y");
        $this->view->estudiante = $estu;
        $this->LoadView('estudiante/info.tpl');
    }

    public function reportes(Html $h, DBtabla $estudiante, DBtabla $seccion, $type = NULL, $discapacidad = NULL)
    {
        $join = ['>seccion', '>docentes'];
        $campos = ['seccion.grado_seccion as grado_estu', 'seccion.char_seccion as seccion_estu', 'estudiante.*'];
        $seccion->Select(['grado_seccion', 'char_seccion'], "(id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", ['>docentes'], 'group by grado_seccion,char_seccion');
        $secciones = [];
        foreach ($seccion as $secc)
        {
            $secciones[] = $secc['grado_seccion'] . '-' . $secc['char_seccion'];
        }
        $this->view->secciones = $secciones;
        if ($type)
        {
            if ($type == 'NULL')
            {
                if ($discapacidad == '0')
                {
                    $estudiante->Select($campos, "discapacidad_estu is NULL and (id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", $join);
                } elseif ($discapacidad == 'true')
                {
                    $estudiante->Select($campos, " (discapacidad_estu is not NULL ) and (id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", $join);
                } else
                {
                    $estudiante->Select($campos, "(id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", $join);
                }
            } else
            {
                $x = explode('-', $type);
                if ($discapacidad == '0')
                {
                    $estudiante->Select($campos, "grado_seccion='" . $x[0] . "' and char_seccion='" . $x[1] . "' and discapacidad_estu is NULL and(id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", $join);
                } elseif ($discapacidad == 'true')
                {
                    $estudiante->Select($campos, "grado_seccion='" . $x[0] . "' and char_seccion='" . $x[1] . "' and discapacidad_estu is not NULL and (id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", $join);
                } else
                {
                    $estudiante->Select($campos, "grado_seccion='" . $x[0] . "' and char_seccion='" . $x[1] . "' and (id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", $join);
                }
            }
        } else
        {
            $estudiante->Select($campos, "(id_docente=" . $this->view->session['id_docente'] . " or '" . $this->view->session['type_user'] . "'='root')", $join);
        }

// echo $estudiante->sql;
        if ($h instanceof HtmlPDF)
        {
            $h->SetLayaut('mainPDF.tpl');
        }

        $this->view->dirPDf = self::SelfHref($_GET, ['extencion' => 'pdf']);
        $this->view->estudiante = $estudiante;

        $this->LoadView('estudiante/reporte.tpl');
    }

    public function insertar(Html $h, MySQLi $db, DBtabla $estudiante, DBtabla $seccion, DBtabla $fotos, Cookie $cookie, $id_repre = NULL)
    {
        $this->view->h1 = 'Insertar Estudiante';
        $this->view->type = 'agregar';

        $form = new FormEstudiante();
        if ($form->IsSubmited() && $form->IsValid())
        {
            $form['id_foto'] = $this->LoadFoto($fotos, $form->id_foto, 1);
            $seccion->Select("grado_seccion='" . $form['grado_estu'] . "' and char_seccion='" . $form['seccion_estu'] . "'");
            if ($seccion->num_rows == 1)
            {
                $form['id_seccion'] = $seccion->fetch()->id_seccion;
            } else
            {
                $seccion->Insert(NULL, $form['grado_estu'], $form['seccion_estu'], $form['id_docente']);
                $form['id_seccion'] = $seccion->AutoIncrement();
            }
            unset($form['grado_estu'], $form['id_docente'], $form['seccion_estu']);
            if (!$db->error && $estudiante->Insert($form))
            {

                $db->commit();

                $cookie['mensaje'] = "Se ha insertado un estudiante";
                $this->Redirec('estudiante/info' . ['id_estu' => $estudiante->AutoIncrement()]);
//$j['location'] = "estudiante/info?id_estu=" . $estudiante->AutoIncrement();
//  $this->Redirec('estudiante/index', ['id_estu' => $estudiante->AutoIncrement()]);
            } else
            {
                $db->rollback();
                $h->AddError("Ocurrio un error al insertar el estudiante");
            }
        }
        $form->DefaultValue('id_repre', $id_repre);
        $this->view->form = $form;

        $this->LoadView('estudiante/form.tpl');
    }

    public function guardar(ResponseConten $j, MySQLi $db, DBtabla $estudiante, DBtabla $seccion, DBtabla $fotos, Cookie $cookie, $id_estu = NULL, $id_repre = NULL, $type = 'insertar')
    {
        $form = new FormEstudiante(NULL, 'POST', false);
//$j['submit'] = $_POST;
        if ($form->IsSubmited() && $form->IsValid())
        {
            $db->begin_transaction();

            if ($type == 'insertar')
            {
                $form['id_foto'] = $this->LoadFoto($fotos, $form->id_foto, 1);
                $seccion->Select("grado_seccion='" . $form['grado_estu'] . "' and char_seccion='" . $form['seccion_estu'] . "'");
                if ($seccion->num_rows == 1)
                {
                    $form['id_seccion'] = $seccion->fetch()->id_seccion;
                } else
                {
                    $seccion->Insert(NULL, $form['grado_estu'], $form['seccion_estu'], $form['id_docente']);
                    $form['id_seccion'] = $seccion->AutoIncrement();
                }
                unset($form['grado_estu'], $form['id_docente'], $form['seccion_estu']);
                if (!$db->error && $estudiante->Insert($form))
                {

                    $db->commit();
                    $j['mensaje'] = "Se ha insertado un estudiante";
                    $j['location'] = "estudiante/info?id_estu=" . $estudiante->AutoIncrement();
                    return;
//  $this->Redirec('estudiante/index', ['id_estu' => $estudiante->AutoIncrement()]);
                } else
                {
                    $db->rollback();
                    $j['error'] = "Ocurrio un error al insertar el estudiante";
                    return;
                }
            } else
            {
                $estudiante->Select(['seccion.grado_seccion', 'seccion.id_docente', 'estudiante.*'], "id_estu=" . $id_estu . " and ( '" . $this->view->session['type_user'] . "'='root')", ['>seccion', '>docentes']);
                if ($estudiante->num_rows != 1)
                {
// $h->AddError("El Estudiante no existe <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
                    $this->HttpError(404);
                    return;
                }
// $db->begin_transaction();
                $estu = $estudiante->fetch();
                $db->begin_transaction();
                $form['id_foto'] = $this->LoadFoto($fotos, $form->id_foto, $estu['id_foto']);
                unset($form->id_estu);
                $seccion->Select("grado_seccion='" . $form['grado_estu'] . "' and char_seccion='" . $form['seccion_estu'] . "'");
                if ($seccion->num_rows == 1)
                {
                    $secc = $seccion->fetch();
                    $form['id_seccion'] = $secc->id_seccion;
                } else
                {
                    $seccion->Insert(NULL, $form['grado_estu'], $form['seccion_estu'], $form['id_docente']);
                    $form['id_seccion'] = $seccion->AutoIncrement();
                }
                unset($form['grado_estu'], $form['id_docente'], $form['seccion_estu']);
                if (!$db->error && $estudiante->Update($form, "id_estu=" . $id_estu))
                {
                    $db->commit();
                    $j['mensaje'] = "Se ha editado el estudiante";
                    $j['location'] = "estudiante/info?id_estu=" . $id_estu;
                    return;
                } else
                {
                    $db->rollback();
                    $j['error'] = "Ocurrio un error al editar el estudiante";
                    return;
                }
            }
        }
        $j['error'] = "No se recibio formulario";
        $j['form'] = $_POST;
        $j['s'] = $form->IsSubmited();
        $j['v'] = $form['turno_estu'];
    }

    public function editar(Html $h, MySQLi $db, DBtabla $estudiante, DBtabla $seccion, DBtabla $fotos, Cookie $cookie, $id_estu = 0)
    {
        $this->view->h1 = 'Editar Estudiante';
        $this->view->type = 'editar';
        $estudiante->Select(['seccion.grado_seccion', 'seccion.id_docente', 'estudiante.*'], "id_estu=" . $id_estu . " and ( '" . $this->view->session['type_user'] . "'='root')", ['>seccion', '>docentes']);
        if ($estudiante->num_rows != 1)
        {
            $h->AddError("El Estudiante no existe <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
            $this->HttpError(404);
            return;
        }
        $estu = $estudiante->fetch();
        $form = new FormEstudiante();
        if ($form->IsSubmited() && $form->IsValid())
        {
            $db->begin_transaction();
            $form['id_foto'] = $this->LoadFoto($fotos, $form->id_foto, $estu['id_foto']);
            unset($form->id_estu);
            $seccion->Select("grado_seccion='" . $form['grado_estu'] . "' and char_seccion='" . $form['seccion_estu'] . "'");
            if ($seccion->num_rows == 1)
            {
                $secc = $seccion->fetch();
                $form['id_seccion'] = $secc->id_seccion;
            } else
            {
                $seccion->Insert(NULL, $form['grado_estu'], $form['seccion_estu'], $form['id_docente']);
                $form['id_seccion'] = $seccion->AutoIncrement();
            }
            unset($form['grado_estu'], $form['id_docente'], $form['seccion_estu']);
            if (!$db->error && $estudiante->Update($form, "id_estu=" . $id_estu))
            {
                $db->commit();
                $cookie['mensaje'] = "Se ha editado un estudiante";
                $this->Redirec('estudiante/info', ['id_estu' => $id_estu]);
            } else
            {
                $db->rollback();
                $h->AddError("Ocurrio un error al editar el estudiante");
            }
        }
        $form->DefaultValue($estu);
        $this->view->form = $form;
        $this->view->id_estu = $id_estu;
        $this->LoadView('estudiante/form.tpl');
    }

    public function eliminar(Html $h, MySQLi $db, DBtabla $estudiante, DBtabla $fotos, Cookie $cookie, $id_estu = 0)
    {

        $estudiante->Select("id_estu=" . $id_estu . " and ( '" . $this->view->session['type_user'] . "'='root')", ['>seccion', '>docentes'], "group by id_estu");
        if ($estudiante->num_rows != 1)
        {
            $h->AddError("El Estudiante no existe <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
            $this->HttpError(404);
            return;
        }
        $db->begin_transaction();
        $estu = $estudiante->fetch();
        $fotos->Delete("id_foto" . $estu['id_foto']);
        if (!$db->error && $estu->Delete())
        {
            $db->commit();
            $cookie['mensaje'] = "Se ha Eliminado un estudiante";
            $this->Redirec('estudiante/index');
        } else
        {
            $db->rollback();
            $h->AddError("Ha ocurrido un error a eliminar el estudiante  <a href='$_SERVER[HTTP_REFERER]' class='btn btn-info'>Regresar</a>");
        }
    }

    private function LoadFoto(DBtabla $fotos, PostFiles $imagen, $id_foto = NULL)
    {
        $db = Mvc::App()->DataBase();
        $fotos->Select("id_foto='" . $id_foto . "'");
        if ($fotos->num_rows == 1 && $id_foto != 1)
        {
            $img = $fotos->fetch();
            $img['bin_foto'] = $imagen;
            $img['mime_type'] = $imagen['type'];
// $img['tam_img'] = $imagen->getSize();
            $img['update_foto'] = 'now';
            if (!$img->Update())
            {
                $db->rollBack();

                Mvc::App()->Response->AddError('Ocurrio un error al editar la imagen');

                exit;
            }
            return $id_foto;
        } else
        {
            if (!$fotos->Insert(NULL, $imagen, $imagen['type'], 'now'))
            {
                $db->rollBack();

                Mvc::App()->Response->AddError('Ocurrio un error al editar la imagen');


                exit;
            }
            return $fotos->AutoIncrement();
        }
    }

}
