<?php namespace App\Api\Transformers;
use JuaGuz\ApiGenerator\BaseTransformer;
class DelitoTransformer extends BaseTransformer
{

    /**
     * @param $item
     * @return array
     */
    public function transform($item)
    {
        return  [
            'HE_ADEPSUM'=>$item['HE_ADEPSUM'],
'DE_ART'=>$item['DE_ART'],
'DE_TENTATI'=>$item['DE_TENTATI'],
'DE_AUX1'=>$item['DE_AUX1'],
'DE_AUX2'=>$item['DE_AUX2'],
'DE_AUX3'=>$item['DE_AUX3'],

        ];
    }
}