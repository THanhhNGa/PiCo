<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table='product';
	protected $fillable =['name','product_code','slug','price','sale_price','image','status','category_id','image_list','info'];
	public function category(){
		return $this->hasOne('App\Models\Category','id','category_id');
	}
	public function values(){
		return $this->belongsToMany('App\Models\Values','values_product','product_id','value_id');
	}
	public function variant(){
		return $this->hasMany('App\Models\Variant','product_id','id');
	}
}

?>