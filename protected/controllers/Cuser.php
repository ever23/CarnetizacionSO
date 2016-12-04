<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cc\Mvc;

/**
 * Description of Cuser
 *
 * 
 */
class Cuser extends ExtendsController
{

    public function index(Html $h, Autenticacion $session)
    {
        if ($session->IsUser())
        {
            $this->Redirec('index');
        }
        $form = new LoginFormModel();
        if ($form->IsSubmited() && $form->IsValid())
        {
            if ($session->Login($form->user, $form->pass))
            {
                $this->Redirec('');
            } else
            {
                $h->AddError("EL nombre de usuario o contraseña son invalidos");
            }
        }
        $this->view->form = $form;
        $this->LoadView('user/login.tpl');
    }

    public function Close(Autenticacion $session)
    {
        $session->Destroy();
        $this->Redirec('user/');
    }

}
