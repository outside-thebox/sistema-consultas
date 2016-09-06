<?php namespace App\Api\Transformers;
use JuaGuz\ApiGenerator\BaseTransformer;
class CodpenalTransformer extends BaseTransformer
{

    /**
     * @param $item
     * @return array
     */
    public function transform($item)
    {
        return  [
            'DL_ARTCP'=>$item['DL_ARTCP'],
'DL_ART'=>$item['DL_ART'],
'DL_DESCRIP'=>$item['DL_DESCRIP'],
'DL_TIPIFI'=>$item['DL_TIPIFI'],

        ];
    }
}