<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * 
 */
class Customer extends Authenticatable
{
	use Notifiable;
	
	protected $table='customer';
	protected $fillable=['name', 'email', 'password','phone','address'];
	public function order(){
		return $this->hasMany(Order::class,'customer_id','id');
	}
}
 ?>