<?php 

namespace App\Http\Controllers\backend;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
	/**
	 * 
	 */
	class OrderController extends Controller
	{
		//đơn chưa xử lý
		public function list(Request $r){
			if($r->date_from!=''){
				$orders= Order::where('status',0)->orWhere('status',1)->whereBetween('created_at',[$r->date_from,$r->date_to])->paginate(3);
			}
			else{
				$orders= Order::where('status',0)->orWhere('status',1)->paginate(3);
			}
			// $orders= Order::where('status',0)->paginate(3);
			// if(request()->date_from && request()->date_to){
			// 	orders= Order::where('status',0)->whereBetween('created_at',[request()->date_from,request()->date_to])->get();
			// }
			return view('backend.order.list',compact('orders'));

		}
		//tìm kiếm đơn chưa xử lý
		public function search(Request $r){
			$search= $r->get('search');
			$orders= Order::where('status',0)->where('name','like','%'.$search.'%')->paginate(3);
			return view('backend.order.list',compact('orders'));
		}
		//đơn đã xử lý
		public function processed(Request $r){
			if($r->date_from!=''){
				$orders= Order::where('status',2)->whereBetween('created_at',[$r->date_from,$r->date_to])->paginate(3);
			}
			else{
				$orders= Order::where('status',2)->paginate(3);
			}
			return view('backend.order.processed',compact('orders'));
		}
		public function search_processed(Request $r){
			$search= $r->get('search');
			$orders= Order::where('status',2)->where('name','like','%'.$search.'%')->paginate(3);
			return view('backend.order.processed',compact('orders'));
		}

		public function order_detail($id){
			$order=Order::find($id);
			$user=Customer::find($order->account_id);
			$pro=Order_detail::where('order_id',$id)->get();
			return view('backend.order.show',compact('order','user','pro'));
		}
		public function update_order(Request $req){
			Order::find($req->id)->update(['status'=>$req->status]);
			return redirect()->route('order_list');
		}
	}
 ?>