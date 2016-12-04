<?php

namespace Cc\Mvc;

use Cc\Mvc;

/**
 * controlador index sera ejecutado al llamar a / o a index/
 */
class Cindex extends ExtendsController implements AccessUserController
{

    public static function AccessUser()
    {
        return [
            'Access' => ['*' => '*']
        ];
    }

    public function index()
    {
        $this->LoadView('index.tpl');
    }

}
