<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cc\Mvc;

/**
 * Description of ExtendsControler
 *
 *
 */
class ExtendsController extends Controllers
{

    public function __construct(Autenticate $au, Cookie $cookie)
    {
        if (isset($cookie['mensaje']))
        {
            $this->Layaut->mensaje = $cookie['mensaje'];
            unset($cookie['mensaje']);
        }
        $this->Layaut->session = $au;
        $this->view->session = $au;
    }

}
