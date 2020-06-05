<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
	protected $table='variant';
	protected $fillable =['price','product_id'];
	public function values(){
		return $this->belongsToMany('App\Models\Values','variant_values','variant_id','value_id');
	}
}

?>