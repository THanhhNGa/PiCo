<?php
namespace App\Http\Controllers\backend;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Variant;
use App\Models\Values;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProductController extends Controller{

 	public function index(){
 		// dd(attr_values(Product::find(1)->values()->get()));
 		$product= Product::paginate(3);
 		return view('backend.product.list_product',compact('product'));
 	}
 	public function add_pro(){
 		$attrs=Attribute::all();
 		$category=Category::all();
 		return view ('backend.product.add_product',compact('attrs','category'));
 	}
 	public function post_add_pro(Request $req){
 		$this->validate($req,[
			'name'=>'required',
			'slug'=>'required|unique:product,slug',
			'price'=>'required',
		],[
			'name.required'=>'Tên SP không được để rỗng',
			'slug.required'=>'Slug không được để rỗng',
			'slug.unique'=>'Slug đã tồn tại trong CSDL',
			'price.required'=>'Giá SP không được để rỗng '
		]);
		// dd($req->all());
		// $img= str_replace(url('uploads').'/', '', $req->image);
		$img=$req->image;
		$req->merge(['image'=>$img]);
		$category=$req->category;
		$req->merge(['category_id'=>$category]);
		 // dd($req->all());

		$product = Product::create($req->all());
		// dd($product);
		$mang= array();
		foreach($req->attr as $value){
			foreach($value as $item){
				$mang[]=$item;
			}
		}
		$product->values()->Attach($mang);
		$variant =get_combinations($req->attr);
		foreach($variant as $var){
			$vari= new Variant;
			$vari->product_id =$product->id;
			$vari->save();
			$vari->values()->Attach($var);
		}
		return redirect('admin/product/add_variant/'.$product->id);
		// return redirect()->route('index_pro');
 	}
 	public function edit_pro($id){
 		$product =Product::find($id);
 		$category=Category::all();
 		$attrs= Attribute::all();
 		return view('backend.product.edit_product',compact('product','category','attrs'));
 	}
 	public function post_edit_pro(Request $request,$id){
 		$product=Product::find($id);
 	// 	$this->validate($request,[
		// 	'name'=>'required',
		// 	'slug'=>'required|unique:product,slug',
		// 	'price'=>'required',
		// ],[
		// 	'name.required'=>'Tên SP không được để rỗng',
		// 	'slug.required'=>'Slug không được để rỗng',
		// 	'slug.unique'=>'Slug đã tồn tại trong CSDL',
		// 	'price.required'=>'Giá SP không được để rỗng '
		// ]);
		$img=$request->image;
		$request->merge(['image'=>$img]);
		$category=$request->category;
		$request->merge(['category_id'=>$category]);

		Product::find($id)->update([
			'name'=>$request->name,
			'product_code'=>$request->product_code,
			'slug'=>$request->slug,
			'image'=>$request->image,
			'image_list'=>$request->image_list,
			'price'=>$request->price,
			'sale_price'=>$request->sale_price,
			'info'=>$request->info,
			'category_id'=>$request->category_id,
			'status'=>$request->status
		]);
		$product =Product::find($id);
		// dd($request->all());
		$mang= array();
		foreach($request->attr as $value){
			foreach($value as $item){
				$mang[]=$item;
			}
		}
		$product->values()->Sync($mang);

		$variant=get_combinations($request->attr);

		foreach($variant as $var)
		   {
		      if(check_var($product,$var))
		      {
		      $vari=new variant;
		      $vari->product_id=$product->id;
		      $vari->save();
		      $vari->values()->Attach($var);
		      }
		      
		   }
		
		return redirect()->route('index_pro');
 	}
 	public function del_pro($id){
 		Product::find($id)->delete();
 		return redirect()->back();
 	}
 	//thuộc tính
 	public function DetailAttr(){
 		$attrs=Attribute::all();
 		return view ('backend.attribute.attr',compact('attrs'));
 	}
 	public function AddAttr(Request $req){
 		$this->validate ($req,[
 			'attr_name'=>'required|unique:attribute,name'
 		],[
 			'attr_name.required'=>'Tên thuộc tính k đc để rỗng',
 			'attr_name.unique'=>'Tên thuộc tính đã tồn tại trong csdl',
 		]);
 		// Attribute::create($req->all());
 		$attr= new Attribute;
 		$attr->name=$req->attr_name;
 		$attr->save();
 		return redirect()->back();
 		// echo $req->attr_name;
 	}
 	public function EditAttr($id){
 		$attr=Attribute::find($id);

 		return view('backend.attribute.edit_attr',compact('attr'));
 	}
 	public function Post_EditAttr(Request $req,$id){
 		$this->validate ($req,[
 			'attr_name'=>'required|unique:attribute,name'
 		],[
 			'attr_name.required'=>'Tên thuộc tính k đc để rỗng',
 			'attr_name.unique'=>'Tên thuộc tính đã tồn tại trong csdl',
 		]);
 		$attr= Attribute::find($id);
 		$attr->name=$req->attr_name;
 		$attr->save();
 		return redirect()->route('detail_attr');
 	}
 	public function DelAttr($id){
 		Attribute::find($id)->delete();
		return  redirect()->back();
 	}
 	//giá trị thuộc tính
 	public function AddValue(Request $req){
 		$this->validate ($req,[
 			'value_name'=>'required|unique:values,value'
 		],[
 			'value_name.required'=>'Tên giá trị thuộc tính k đc để rỗng',
 			'value_name.unique'=>'Tên giá trị thuộc tính đã tồn tại trong csdl',
 		]);
 		$value= new Values;
 		$value->attr_id=$req->attr_id;
 		$value->value=$req->value_name;
 		$value->save();
 		return redirect()->back();

 	}
 	public function EditValue($id){
 		$val=Values::find($id);
 		return view('backend.attribute.edit_value',compact('val'));
 	}
 	public function Post_EditValue(Request $req,$id){
 		$this->validate ($req,[
 			'value_name'=>'required|unique:values,value'
 		],[
 			'value_name.required'=>'Tên giá trị thuộc tính k đc để rỗng',
 			'value_name.unique'=>'Tên giá trị thuộc tính đã tồn tại trong csdl',
 		]);
 		$value= new Values;
 		$value->attr_id=$req->attr_id;
 		$value->value=$req->value_name;
 		$value->save();
 		return redirect()->route('detail_attr');
 	}
 	//biến thể
 	public function AddVariant($id){
 		$product= Product::find($id);
 		return view('backend.variant.add_variant',compact('product'));
 	}
 	public function PostAddVariant(Request $request){
 		foreach($request->variant as $key=>$value){
 			$vari=Variant::find($key);
 			$vari->price=$value;
 			$vari->save();
 		}
 		return redirect()->route('index_pro');
 	}
 	public function EditVariant($id){
 		$product =Product::find($id);
 		return view('backend.variant.edit_variant',compact('product'));
 	}
 	public function PostEditVariant(Request $request, $id){
 		foreach($request->variant as $key=>$value){
 			$vari=Variant::find($key);
 			$vari->price=$value;
 			$vari->save();
 		}
 		return redirect()->route('index_pro');
 	}
 	public function DelVariant($id){
 		Variant::destroy($id);
 		return redirect('backend.product.index_pro');
 	}
 }
?>
