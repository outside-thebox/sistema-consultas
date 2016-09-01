<?php namespace App\Api\Entities\Mysql;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JuaGuz\ApiGenerator\ApiModelInterface;

class Personas extends Model implements ApiModelInterface{
	use SoftDeletes;
	protected $primaryKey = "HE_ADEPSUM";
	protected $fillable = ['HE_ADEPSUM','PE_SEXO','PE_PERJUDI','PE_ZONA','PE_EDAD','PE_MENVIVE','PE_GIS','PE_APELLID','PE_NOMBRE','PE_TIPODOC','PE_NUMDOC','PE_ESTCIV','PE_NACION','PE_OCUPAC','PE_RESIDEN','PE_VIVIEN','PE_ESTUDIO','PE_ESTADO','PE_CONDICI','PE_MOVILIZ','PE_DETFAMI','PE_DETENID','PE_CARAC1','PE_CARAC2','PE_CARAC3','PE_CARAC4','PE_SEGURID','PE_CLASE','PE_CALLE','PE_CALLENU','PE_INTERSE','PE_TIPOPER','PE_LEGAJO','PE_JERAR','PE_DEPEN','PE_FUNCION','PE_AUX1','PE_AUX2','PE_AUX3','PE_APODO','PE_IDIOMA','PE_BANDA','PE_BANDADE','PE_HRENTRA','PE_HRSALI','PE_FHENTRA','PE_FHSALI','PE_DISPUSO','PE_ANTECE','PE_DEPTO','PE_UTIARMA','PE_DISPARO','PE_CANBALA','PE_MOTDISP',];
	protected $dates = ['deleted_at'];
	protected $table = 'personas';
	protected $connection = 'mysql';

		
	public function getRules(){
		return [];
	}
    public function getErrorMessage(){
    	return [];
    }


}
