<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 06/08/16
 * Time: 19:21
 */

namespace App\Http\Controllers\Api;


use App\Business\Entities\CodigoPenal;
use App\Business\Repositories\RepoCodigoPenal;
use Illuminate\Routing\Controller;

class ApiControllerBusqueda extends Controller
{
    private $codigoPenal;

    public function __construct(CodigoPenal $codigoPenal)
    {
        $this->codigoPenal = $codigoPenal;
    }


    public function getData()
    {
        return json_encode($this->codigoPenal->all());
    }
}