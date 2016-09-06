<?php namespace App\Http\Controllers\Api\Mysql;

use App\Api\Entities\Mysql\Codpenal as Model;
use App\Api\Transformers\CodpenalTransformer as Transformer;
use JuaGuz\ApiGenerator\Api;


class CodpenalController extends Api
{
    protected $model;
    protected $tranformer;
    public function __construct(Model $model,Transformer $transformer)
    {
        parent::__construct($model,$transformer);
        
    }

    public function getRelacionesValidas(){
        return [];
    }

    function getValidRelations()
    {
//        return $this->repository->getRelacionesValidas();
    }
    
}

