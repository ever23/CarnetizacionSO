<?php

namespace Cc\Mvc;

use Cc\Mvc;

/**
 * Description of Cimages
 *
 * @author usuario
 */
class Cfotos extends ExtendsController implements AccessUserController
{

    public static function AccessUser()
    {
        return [

            'root' =>
            [
                'Access' => ['*']
            ],
            'docente' => [
                'Access' => ['*']
            ],
        ];
    }

    /**
     * 
     * @return array
     * @see ExtByController::ExtAccept()
     */
    public function index(DBtabla $fotos, $id_foto)
    {

        $fotos->Select(['bin_foto', 'mime_type', 'update_foto'], "id_foto='" . $id_foto . "'");

        if ($fotos->num_rows == 1)
        {
            $img = $fotos->fetch();


            // Router::HeadersReponseFiles($time, $img->mime_img, '+1 day');
            $this->ChangeContenType($img->mime_type);

            // Mvc::App()->Response->ActiveCache(true, 3600 * 24, (new \DateTime($img->update_img))->getTimestamp());

            echo $img->bin_foto;
        } else
        {
            Mvc::App()->LoadError(404, 'imagen no existe');
        }
    }

}
