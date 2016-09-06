<?php
/**
 * Created by PhpStorm.
 * User: damian
 * Date: 06/09/16
 * Time: 10:01
 */

namespace App\Api\Repositories;

use App\Api\Entities\Mysql\Hecho;

class RepoHecho extends RepoBase {

    public function __construct($data = array())
    {
    }

    function getModel()
    {
        return new Hecho();
    }

    public function getRelacionesValidas() {
        return [
            'delito'
        ];
    }




}