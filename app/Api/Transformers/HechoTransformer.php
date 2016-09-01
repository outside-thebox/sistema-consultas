<?php namespace App\Api\Transformers;
use JuaGuz\ApiGenerator\BaseTransformer;
class HechoTransformer extends BaseTransformer
{

    /**
     * @param $item
     * @return array
     */
    public function transform($item)
    {
        return  [
            'HE_ADEPSUM'=>$item['HE_ADEPSUM'],
'HE_DEPEN'=>$item['HE_DEPEN'],
'HE_NUMSUM'=>$item['HE_NUMSUM'],
'HE_FECHINI'=>$item['HE_FECHINI'],
'HE_FECHFIN'=>$item['HE_FECHFIN'],
'HE_HORAINI'=>$item['HE_HORAINI'],
'HE_HORAFIN'=>$item['HE_HORAFIN'],
'HE_DILIJUD'=>$item['HE_DILIJUD'],
'HE_ACTANT'=>$item['HE_ACTANT'],
'HE_ACTORIG'=>$item['HE_ACTORIG'],
'HE_ACTGIR'=>$item['HE_ACTGIR'],
'HE_MODALI'=>$item['HE_MODALI'],
'HE_PROV'=>$item['HE_PROV'],
'HE_LOCALI'=>$item['HE_LOCALI'],
'HE_LUGHECH'=>$item['HE_LUGHECH'],
'HE_MEDIOEM'=>$item['HE_MEDIOEM'],
'HE_GIS'=>$item['HE_GIS'],
'HE_DICE1'=>$item['HE_DICE1'],
'HE_DICE2'=>$item['HE_DICE2'],
'HE_DICE3'=>$item['HE_DICE3'],
'HE_DICE4'=>$item['HE_DICE4'],
'HE_TIPOHEC'=>$item['HE_TIPOHEC'],
'HE_COLISIO'=>$item['HE_COLISIO'],
'HE_UBICACI'=>$item['HE_UBICACI'],
'HE_LUGVIA'=>$item['HE_LUGVIA'],
'HE_ESTVIA'=>$item['HE_ESTVIA'],
'HE_ESTCLIM'=>$item['HE_ESTCLIM'],
'HE_CALLE'=>$item['HE_CALLE'],
'HE_CALLENU'=>$item['HE_CALLENU'],
'HE_INTERSE'=>$item['HE_INTERSE'],
'HE_CIRC'=>$item['HE_CIRC'],
'HE_SUPER'=>$item['HE_SUPER'],
'HE_USER'=>$item['HE_USER'],
'HE_MES'=>$item['HE_MES'],
'HE_DIA'=>$item['HE_DIA'],
'HE_FRAHOR'=>$item['HE_FRAHOR'],
'HE_HORA'=>$item['HE_HORA'],
'HE_ANO'=>$item['HE_ANO'],
'HE_ACCIDEN'=>$item['HE_ACCIDEN'],
'HE_MODALI2'=>$item['HE_MODALI2'],
'HE_FECHCAR'=>$item['HE_FECHCAR'],
'HE_HORACAR'=>$item['HE_HORACAR'],
'HE_JUEZ'=>$item['HE_JUEZ'],
'HE_SECRE'=>$item['HE_SECRE'],
'HE_ESCLA'=>$item['HE_ESCLA'],
'HE_ERROSE'=>$item['HE_ERROSE'],
'HE_IDLUGHE'=>$item['HE_IDLUGHE'],
'HE_IDMEDIO'=>$item['HE_IDMEDIO'],
'HE_IDMODA1'=>$item['HE_IDMODA1'],
'HE_IDMODA2'=>$item['HE_IDMODA2'],
'HE_DEPTO'=>$item['HE_DEPTO'],
'HE_AUX1'=>$item['HE_AUX1'],
'HE_AUX2'=>$item['HE_AUX2'],
'HE_AUX3'=>$item['HE_AUX3'],
'HE_FECHDEN'=>$item['HE_FECHDEN'],
'HE_MOTIVO'=>$item['HE_MOTIVO'],
'HE_CARATU'=>$item['HE_CARATU'],
'HE_FISCALI'=>$item['HE_FISCALI'],
'HE_EXPTE'=>$item['HE_EXPTE'],
'HE_SUMORIG'=>$item['HE_SUMORIG'],
'HE_OTRAFUE'=>$item['HE_OTRAFUE'],
'HE_SEGPRIV'=>$item['HE_SEGPRIV'],
'HE_MODESCA'=>$item['HE_MODESCA'],
'HE_PRIVADA'=>$item['HE_PRIVADA'],
'HE_ALARMA'=>$item['HE_ALARMA'],
'HE_CAMARA'=>$item['HE_CAMARA'],
'HE_DESFUER'=>$item['HE_DESFUER'],

        ];
    }
}