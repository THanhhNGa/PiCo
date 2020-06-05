<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    function GetCate(){
        // $data['category']=Category::all()->toarray();
        $data['category']=Category::all();
        // dd($data);
        return view('backend.category.category',$data);
    }
    function PostCate(CategoryRequest $r)
    {
        $cate=new Category;
        $cate->name=$r->name;
        $cate->slug = Str::slug($r->name, '-');
        $cate->parent=$r->parent;
        $cate->save();
        return redirect()->back()->with('thongbao','Đã thêm danh mục thành công!');
    }
    function getEditCategory($id)
    {
        $data['cate']=Category::find($id);
        $data['category']=Category::all();
        return view('backend.category.editcategory',$data);
    }
    function postEditCategory($id,CategoryRequest $r)
    {
        $cate=Category::findOrFail($id);
        $cate->name=$r->name;
        $cate->slug = Str::slug($r->name, '-');

        $cate->parent=$r->parent;

        $cate->save();
        return redirect()->back()->with('thongbao','Đã sửa thành công!');
    }


    function delCategory($idCate){
        //tim danh muc muon xoa
        $cate=Category::find($idCate);
        //Lấy parent danh mục xóa
        $parent=$cate->parent;
        //cập nhật parent của danh muc con- parnet của danh mục xóa
        Category::where('parent',$cate->id)->update(['parent'=>$parent]);
        //Xóa danh mục

        Category::destroy($idCate);
        return redirect()->back();
    }
}
