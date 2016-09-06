<?php namespace App\Http\Controllers\Api\Mysql;

use App\Api\Entities\Mysql\Hecho as Model;
use App\Api\Repositories\RepoHecho;
use App\Api\Transformers\HechoTransformer as Transformer;
use JuaGuz\ApiGenerator\Api;


class HechoController extends Api
{
    protected $model;
    protected $tranformer;
    protected $repository;

    public function __construct(Model $model,Transformer $transformer,RepoHecho $repository)
    {
        $this->repository = $repository;
        parent::__construct($model,$transformer);
        
    }

    public function getRelacionesValidas(){
        return [];
    }


    function getValidRelations()
    {
        return $this->repository->getRelacionesValidas();
    }

    public function getFields()
    {
        return $this->model->getFillable();
    }
}

