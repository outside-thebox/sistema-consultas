<?php namespace App\Http\Controllers\Api\Mysql;

use App\Api\Entities\Mysql\Delito as Model;
use App\Api\Transformers\DelitoTransformer as Transformer;
use JuaGuz\ApiGenerator\Api;


class DelitoController extends Api
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

    
}

