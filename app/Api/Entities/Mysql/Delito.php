<?php namespace App\Api\Entities\Mysql;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JuaGuz\ApiGenerator\ApiModelInterface;

class Delito extends Model implements ApiModelInterface{
	use SoftDeletes;
	protected $primaryKey = "HE_ADEPSUM";
	protected $fillable = ['HE_ADEPSUM','DE_ART','DE_TENTATI','DE_AUX1','DE_AUX2','DE_AUX3',];
	protected $dates = ['deleted_at'];
	protected $table = 'delito';
	protected $connection = 'mysql';

		
	public function getRules(){
		return [];
	}
    public function getErrorMessage(){
    	return [];
    }

    public function codpenal()
    {
        return $this->hasOne('App\Api\Entities\Mysql\Delito', 'DL_ART', 'DE_ART');
    }


}
