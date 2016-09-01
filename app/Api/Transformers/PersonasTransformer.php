<?php namespace App\Api\Transformers;
use JuaGuz\ApiGenerator\BaseTransformer;
class PersonasTransformer extends BaseTransformer
{

    /**
     * @param $item
     * @return array
     */
    public function transform($item)
    {
        return  [
            'id'=>$item['HE_ADEPSUM'],
'PE_SEXO'=>$item['PE_SEXO'],
'PE_PERJUDI'=>$item['PE_PERJUDI'],
'PE_ZONA'=>$item['PE_ZONA'],
'PE_EDAD'=>$item['PE_EDAD'],
'PE_MENVIVE'=>$item['PE_MENVIVE'],
'PE_GIS'=>$item['PE_GIS'],
'PE_APELLID'=>$item['PE_APELLID'],
'PE_NOMBRE'=>$item['PE_NOMBRE'],
'PE_TIPODOC'=>$item['PE_TIPODOC'],
'PE_NUMDOC'=>$item['PE_NUMDOC'],
'PE_ESTCIV'=>$item['PE_ESTCIV'],
'PE_NACION'=>$item['PE_NACION'],
'PE_OCUPAC'=>$item['PE_OCUPAC'],
'PE_RESIDEN'=>$item['PE_RESIDEN'],
'PE_VIVIEN'=>$item['PE_VIVIEN'],
'PE_ESTUDIO'=>$item['PE_ESTUDIO'],
'PE_ESTADO'=>$item['PE_ESTADO'],
'PE_CONDICI'=>$item['PE_CONDICI'],
'PE_MOVILIZ'=>$item['PE_MOVILIZ'],
'PE_DETFAMI'=>$item['PE_DETFAMI'],
'PE_DETENID'=>$item['PE_DETENID'],
'PE_CARAC1'=>$item['PE_CARAC1'],
'PE_CARAC2'=>$item['PE_CARAC2'],
'PE_CARAC3'=>$item['PE_CARAC3'],
'PE_CARAC4'=>$item['PE_CARAC4'],
'PE_SEGURID'=>$item['PE_SEGURID'],
'PE_CLASE'=>$item['PE_CLASE'],
'PE_CALLE'=>$item['PE_CALLE'],
'PE_CALLENU'=>$item['PE_CALLENU'],
'PE_INTERSE'=>$item['PE_INTERSE'],
'PE_TIPOPER'=>$item['PE_TIPOPER'],
'PE_LEGAJO'=>$item['PE_LEGAJO'],
'PE_JERAR'=>$item['PE_JERAR'],
'PE_DEPEN'=>$item['PE_DEPEN'],
'PE_FUNCION'=>$item['PE_FUNCION'],
'PE_AUX1'=>$item['PE_AUX1'],
'PE_AUX2'=>$item['PE_AUX2'],
'PE_AUX3'=>$item['PE_AUX3'],
'PE_APODO'=>$item['PE_APODO'],
'PE_IDIOMA'=>$item['PE_IDIOMA'],
'PE_BANDA'=>$item['PE_BANDA'],
'PE_BANDADE'=>$item['PE_BANDADE'],
'PE_HRENTRA'=>$item['PE_HRENTRA'],
'PE_HRSALI'=>$item['PE_HRSALI'],
'PE_FHENTRA'=>$item['PE_FHENTRA'],
'PE_FHSALI'=>$item['PE_FHSALI'],
'PE_DISPUSO'=>$item['PE_DISPUSO'],
'PE_ANTECE'=>$item['PE_ANTECE'],
'PE_DEPTO'=>$item['PE_DEPTO'],
'PE_UTIARMA'=>$item['PE_UTIARMA'],
'PE_DISPARO'=>$item['PE_DISPARO'],
'PE_CANBALA'=>$item['PE_CANBALA'],
'PE_MOTDISP'=>$item['PE_MOTDISP'],

        ];
    }
}