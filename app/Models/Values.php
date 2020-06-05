<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Values extends Model
{
	protected $table='values';
	protected $fillable =['value','attr_id'];
	public function attribute(){
		return $this->belongsTo('App\Models\Attribute','attr_id','id');
	}
}

?>