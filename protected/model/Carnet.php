<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cc\Mvc;

use Cc\Mvc;
use Cc\Security;

include('phpqrcode/qrlib.php');

/**
 * Description of Carnet
 *
 * @author enyerber
 */
class Carnet
{

    protected $estudiante;
    private $Llave = 'bJAi8092Ngy';

    public function __construct()
    {
        
    }

    public function From($estu, $f)
    {
        // $estu = $this->estudiante;
        $carnet = new \Cc\ImageGD(Mvc::Config()->App['app'] . 'carnet.jpg');

        $foto = new \Cc\ImageGD($f['bin_foto']);
        //$carnet->CopyResample($carnet, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h)
        //$carnet->CopyResample($foto, 56, 90, 0, 0, 110, 90, $foto->w, $foto->h);
        $foto->Resize(110, 90);
        $carnet->Copy($foto, 56, 90, 0, 0, 110, 90);
        unset($foto);
        $carnet->LoadTtf('arial', 'src/fonts/arial.ttf');
        $carnet->TextTtf(ucwords($estu['cedula_estu']), 7, 0, 20, 215, [0, 0, 0], 'arial');
        $carnet->TextTtf(ucwords($estu['nombres_estu'] . ' ' . $estu['apellidos_estu']), 7, 0, 20, 238, [0, 0, 0], 'arial');
        $carnet->TextTtf(ucwords($estu['grado_estu']), 7, 0, 20, 258, [0, 0, 0], 'arial');
        $carnet->TextTtf(ucwords($estu['seccion_estu']), 7, 0, 22, 281, [0, 0, 0], 'arial');
        $carnet->TextTtf(ucwords($estu['turno_estu']), 7, 0, 22, 305, [0, 0, 0], 'arial');
        $carnet->TextTtf(ucwords($estu['discapacidad_estu'] ? $estu['discapacidad_estu'] : 'No Posee'), 7, 0, 22, 327, [0, 0, 0], 'arial');
        $carnet->To('image/png');

        return $carnet->OutputBase64(true);
    }

    public function Back($estu)
    {
        $carnet = new \Cc\ImageGD(Mvc::Config()->App['app'] . 'carnet_1.jpg');
        $url = json_encode(['id_estu' => $estu['id_estu']]);
        $encript = new Security();
        $data = $encript->encrypt($url, $this->Llave, true);

        // ob_start();
        $dateCode = \QRcode::raw($data, false, QR_ECLEVEL_M, 3, 0);
        //var_dump($dateCode);
        // $Qrcode = new \Cc\ImageGD(ob_get_contents());
        //  ob_end_clean();
        // header('Content-type: ' . Mvc::App()->Content_type);
        $carnet->PrintBinary($dateCode, 4, 60, 200, 100, 100, [223, 1, 9]);
        // $carnet->Copy($Qrcode, 60, 200, 0, 0, 100, 100);
        //unset($Qrcode);
        $carnet->To('image/png');

        return $carnet->OutputBase64(true);
    }

    public function GetId($id)
    {
        $encript = new Security();
        $json = $encript->decrypt($id, $this->Llave, true);
        $j = new Json($json);
        return $j['id_estu'];
    }

}
