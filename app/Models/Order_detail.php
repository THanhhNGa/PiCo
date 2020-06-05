<?php 
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
	/**
	 * 
	 */
	class Order_detail extends Model
	{
		
		protected $table ='order_detail';
		protected $fillable =['order_id','product_id','price','quantity'];
		// public function detail_order(){
		// 	return $this->hasMany(Order_detail::class,'order_id','id');
		// }
		public function pro(){
			return $this->hasOne(Product::class,'id','product_id');
		}
	}
 ?>