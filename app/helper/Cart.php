<?php 
namespace App\helper;
/**
 * 
 */


class Cart 
{
	
	public $items=[];
	public $total_quantity=0;
	public $total_price=0;
	function __construct(){
		$this->items = session('cart') ? session('cart') :[] ;
		$this->total_quantity = $this->get_total_quantity();
		$this->total_price = $this->get_total_price();

	}
	//thêm mới vào giỏ hàng
	public function add($product,$quantity =1){

		$item=[
			'id'=>$product->id,
			'name'=>$product->name,
			'image'=>$product->image,
			'price'=>$product->sale_price ? $product->sale_price :$product->price,
			'quantity'=>$quantity
		];
		if(isset($this->items[$product->id])){

			$this->items[$product->id]['quantity'] +=$quantity;
		}
		else{
			$this->items[$product->id] =$item;
		}
		session(['cart'=>$this->items]);
		
	}
	//cập nhật giỏ hàng
	public function update($id, $quantity){
		// dd($quantity);
		if(isset($this->items[$id])){
				if($quantity==0){
				unset($this->items[$id]);
				}
				else{
					$this->items[$id]['quantity']=$quantity;
				}
				
		}
		session(['cart'=>$this->items]);
	}
	//xóa
	public function delete($id){
		if(isset($this->items[$id])){
			unset($this->items[$id]);
		}
		session(['cart'=>$this->items]);
	}
	public function deleteAll(){
		session(['cart'=>'']);
	}
	private function get_total_quantity(){
		$sum =0;
		foreach ($this->items as $value) {
			$sum +=$value['quantity'];
		}
		return $sum;
	}
	private function get_total_price(){
		$sum =0;
		foreach ($this->items as $value) {
			$sum +=$value['price']*$value['quantity'];
		}
		return $sum;
	}
}
 ?>