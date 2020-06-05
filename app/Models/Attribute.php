<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
	protected $table='attribute';
	protected $fillable =['name'];
	public function values(){
		return $this->hasMany('App\Models\Values','attr_id','id');
	}
}

?>