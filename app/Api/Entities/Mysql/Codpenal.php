<?php namespace App\Api\Entities\Mysql;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JuaGuz\ApiGenerator\ApiModelInterface;

class Codpenal extends Model implements ApiModelInterface{
	use SoftDeletes;
	protected $primaryKey = "DL_ARTCP";
	protected $fillable = ['DL_ARTCP','DL_ART','DL_DESCRIP','DL_TIPIFI',];
	protected $dates = ['deleted_at'];
	protected $table = 'codpenal';
	protected $connection = 'mysql';

		
	public function getRules(){
		return [];
	}
    public function getErrorMessage(){
    	return [];
    }


}
