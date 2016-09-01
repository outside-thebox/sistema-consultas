<?php namespace App\Api\Entities\Mysql;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JuaGuz\ApiGenerator\ApiModelInterface;

class Hecho extends Model implements ApiModelInterface{
	use SoftDeletes;
	protected $primaryKey = "HE_ADEPSUM";
	protected $fillable = ['HE_ADEPSUM','HE_DEPEN','HE_NUMSUM','HE_FECHINI','HE_FECHFIN','HE_HORAINI','HE_HORAFIN','HE_DILIJUD','HE_ACTANT','HE_ACTORIG','HE_ACTGIR','HE_MODALI','HE_PROV','HE_LOCALI','HE_LUGHECH','HE_MEDIOEM','HE_GIS','HE_DICE1','HE_DICE2','HE_DICE3','HE_DICE4','HE_TIPOHEC','HE_COLISIO','HE_UBICACI','HE_LUGVIA','HE_ESTVIA','HE_ESTCLIM','HE_CALLE','HE_CALLENU','HE_INTERSE','HE_CIRC','HE_SUPER','HE_USER','HE_MES','HE_DIA','HE_FRAHOR','HE_HORA','HE_ANO','HE_ACCIDEN','HE_MODALI2','HE_FECHCAR','HE_HORACAR','HE_JUEZ','HE_SECRE','HE_ESCLA','HE_ERROSE','HE_IDLUGHE','HE_IDMEDIO','HE_IDMODA1','HE_IDMODA2','HE_DEPTO','HE_AUX1','HE_AUX2','HE_AUX3','HE_FECHDEN','HE_MOTIVO','HE_CARATU','HE_FISCALI','HE_EXPTE','HE_SUMORIG','HE_OTRAFUE','HE_SEGPRIV','HE_MODESCA','HE_PRIVADA','HE_ALARMA','HE_CAMARA','HE_DESFUER',];
	protected $dates = ['deleted_at'];
	protected $table = 'hecho';
	protected $connection = 'mysql';

		
	public function getRules(){
		return [];
	}
    public function getErrorMessage(){
    	return [];
    }


}
