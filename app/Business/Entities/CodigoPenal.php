<?php namespace App\Business\Entities;

use Illuminate\Database\Eloquent\Model;

class CodigoPenal extends Model
{
    protected $fillable = ['DL_ARTCP','DL_ART','DL_DESCRIP','DL_TIPIFI'];
    protected $table = 'codpenal';
    protected $connection = 'mysql';


}
?>