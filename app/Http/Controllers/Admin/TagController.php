<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
class TagController extends Controller
{
    function index(){
    	$tags = Tag::all();
      return view('admin.tags.index',["tags"=>$tags]);
    }
     function create(){
    	return view('admin.tags.create');
    }
  function store(Request $request){
		$tagname = $request->tag;
		$tag = new Tag;
		$tag->name =$tagname;
		$tag->save();
		return redirect('/tag/index');

	}
	function destroy($id){
		$tag = Tag::find($id);
		$tag->delete();
		return redirect('/tag/index');
	}
	function edit($id){
		$tag = Tag::find($id);
		return view('admin.tags.edit',["tagEdit"=>$tag]);
	}
	function update(Request $request,$id){
		$tagname = $request->tag;
		$tag = Tag::find($id);
		$tag->name =$tagname;
		$tag->save();
		return redirect('/tag/index');
	}
}
