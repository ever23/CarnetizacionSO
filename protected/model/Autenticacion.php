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
        return [
            self::TablaUsers => 'docentes',
            self::CollUser => 'nomb_docente',
            self::CollPassword => 'hash_docente',
            self::CollUserType => 'type_user'
        ];
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
