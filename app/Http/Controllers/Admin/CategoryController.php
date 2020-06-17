<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
	function index(){
		$category = Category::all();
		return view('admin.categories.index',['categories'=>$category]);
	}
	function create(){
		return view('admin.categories.create');
	}
	function store(Request $request){
		$category = $request->category;
		$cate = new Category;
		$cate->name =$category;
		$cate->save();
		return redirect('/category/index');

	}
	function destroy($id){
		$cate = Category::find($id);
		$cate->delete();
		return redirect('/category/index');
	}
	function edit($id){
		$cate = Category::find($id);
		return view('admin.categories.edit',['cateEdit'=>$cate]);
	}
	function update(Request $request,$id){
		$category = $request->category;
		$cate = Category::find($id);
		$cate->name =$category;
		$cate->save();
		return redirect('/category/index');
	}
}
