<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cc\Mvc;

use Cc\Mvc;

class Autenticacion extends AuteticateUserDB
{

    protected function InfoUserDB()
    {
        $this->TablaDeUsuarios("docentes");
        $this->ColUserName('nomb_docente');
        $this->ColPassword('hash_docente');
        $this->ColUserType('type_user');
    }

    public function OnFailed()
    {
        switch ($this->IsFailed())
        {
            case self::FailedAuth:
                $this->Destroy();
                Mvc::App()->Redirec('user/');
                break;
            case self::DenyAccessForUser:
                return false;
        }
    }

}
