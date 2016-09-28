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
    protected $hidden = ['created_at','updated_at','deleted_at'];
	protected $connection = 'mysql';

		
	public function getRules(){
		return [];
	}
    public function getErrorMessage(){
    	return [];
    }

    public function delito()
    {
        return $this->hasOne('App\Api\Entities\Mysql\Delito', 'HE_ADEPSUM', 'HE_ADEPSUM');
    }

    public function getFillable()
    {
        $array = [
            'HE_ADEPSUM' => 'Adep sum',
            'HE_DEPEN' => 'Dependencia',
            'HE_NUMSUM' => 'Num sum',
            'HE_FECHINI' => 'Fecha de inicio',
            'HE_FECHFIN' => 'Fecha de fin',
            'HE_HORAINI' => 'Hora de inicio',
            'HE_HORAFIN' => 'Hora de fin',
            'HE_DILIJUD' => 'Dilijud',
            'HE_ACTANT' => 'Act ant',
            'HE_ACTORIG' => 'Acto rig',
            'HE_ACTGIR' => 'Act gir',
            'HE_MODALI' => 'Modalidad',
            'HE_PROV' => 'Provincia',
            'HE_LOCALI' => 'Localidad',
            'HE_LUGHECH' => 'Lugar del hecho',
            'HE_MEDIOEM' => 'Medio em',
            'HE_GIS' => 'Gis',
            'HE_DICE1' => 'Dice 1',
            'HE_DICE2' => 'Dice 2',
            'HE_DICE3' => 'Dice 3',
            'HE_DICE4' => 'Dice 4',
            'HE_TIPOHEC' => 'Tipo de hecho',
            'HE_COLISIO' => 'Colisio',
            'HE_UBICACI' => 'Ubicacion',
            'HE_LUGVIA' => 'Lugar via',
            'HE_ESTVIA' => 'Est via',
            'HE_ESTCLIM' => 'Est clim',
            'HE_CALLE' => 'Calle',
            'HE_CALLENU' => 'Calle nu',
            'HE_INTERSE' => 'Interseccion',
            'HE_CIRC' => 'Circ',
            'HE_SUPER' => 'Super',
            'HE_USER' => 'Usuario',
            'HE_MES' => 'Mes',
            'HE_DIA' => 'Dia',
            'HE_FRAHOR' => 'Fra hor',
            'HE_HORA' => 'Hora',
            'HE_ANO' => 'Año',
            'HE_ACCIDEN' => 'Accidente',
            'HE_MODALI2' => 'Modalidad 2',
            'HE_FECHCAR' => 'Fecha car',
            'HE_HORACAR' => 'Hora car',
            'HE_JUEZ' => 'Juez',
            'HE_SECRE' => 'Secre',
            'HE_ESCLA' => 'Escla',
            'HE_ERROSE' => 'Errose',
            'HE_IDLUGHE' => 'Idlughe',
            'HE_IDMEDIO' => 'Idmedio',
            'HE_IDMODA1' => 'Idmoda1',
            'HE_IDMODA2' => 'Idmoda2',
            'HE_DEPTO' => 'Depto',
            'HE_AUX1' => 'Aux1',
            'HE_AUX2' => 'Aux2',
            'HE_AUX3' => 'Aux3',
            'HE_FECHDEN' => 'Fech den',
            'HE_MOTIVO' => 'Motivo',
            'HE_CARATU' => 'Caratula',
            'HE_FISCALI' => 'Fiscalia',
            'HE_EXPTE' => 'Expediente',
            'HE_SUMORIG' => 'Sumorig',
            'HE_OTRAFUE' => 'Otrafue',
            'HE_SEGPRIV' => 'Segpriv',
            'HE_MODESCA' => 'Modesca',
            'HE_PRIVADA' => 'Privada',
            'HE_ALARMA' => 'Alarma',
            'HE_CAMARA' => 'Camara',
            'HE_DESFUER' => 'Desfuer'];
        return $array;
    }



}
