<?php namespace App\Business\Repositories;
use App\Business\Entities\CodigoPenal;

/**
 * Created by PhpStorm.
 * User: damian
 * Date: 06/08/16
 * Time: 19:36
 */
class RepoCodigoPenal
{

    public function getModel()
    {
        return new CodigoPenal();
    }

}