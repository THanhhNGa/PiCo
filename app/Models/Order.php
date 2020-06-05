<?php 
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
	/**
	 * 
	 */
	class Order extends Model
	{
		
		protected $table ='orders';
		protected $fillable =['customer_id','name','phone','address','total_price','status'];
		public function detail_order(){
			return $this->hasMany(Order_detail::class,'order_id','id');
		}

		//1 order có 1 khách hàng
		public function us(){
			return $this->hasOne('App\Models\Customer','id','customer_id');
		}
	}
 ?>