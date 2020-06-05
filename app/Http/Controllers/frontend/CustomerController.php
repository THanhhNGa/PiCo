<?php 
namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use App\helper\Cart;
use Illuminate\http\Request;
use Auth;
/**
 * 
 */
class CustomerController extends Controller
	{
		
		public function login(){
			return view('frontend.login');
		}
		public function post_login(Request $request){
			$this->validate($request,[
				'email'=>'required|email',
				'password'=>'required'
			],[
				'email.required'=>'email không được để rỗng',
				'email.email'=>'email không đúng ',
				'password.required'=>'pass không được để rỗng',
			]);
			if(Auth::guard('cus')->attempt($request->only('email','password'))){
				return redirect()->route('index');
			}
			else{
				return redirect()->back();
			}

		}
		//logout
		public function logout(){
			Auth::guard('cus')->logout();
			Session(['cart'=>[]]);
			return redirect()->route('index');
		}

		public function register(){
			return view('frontend.register');
		}
		public function post_register(Request $request){
			Customer::create([
				'name'=>$request->name,
				'email'=>$request->email,
				'password'=>bcrypt($request->password),
				'phone'=>$request->phone,
				'address'=>$request->address
			]);
			return redirect()->route('login_cus');
		}
		//Info_cus
		// public function info_cus(Cart $cart, $id){
		// 	$acc= Customer::where('id',$id)->first();
		// 	$or=Order::where('customer_id',$id)->get();
			
		// 	// dd($or);
		// 	// $or_detail=Order_detail::where('order_id',$or->id)->get();
		// 	return view('customer.info_customer',compact('acc','or'));
		// }
		// public function detail($id){
		// 	$order=Order::find($id);
		// 	$pro=Order_detail::where('order_id',$id)->get();
		// 	return view('customer.info_cus_detail',compact('pro'));
		// }
	}
 ?>