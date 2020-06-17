<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Json;
use App\Photo;
use App\Tag;
Use App\Category;
use App\PhotoDescription;
use App\Taggable;
class PhotoController extends Controller
{
	function index(){
		$photos = Photo::all();
		return view('admin.photos.index',['photos'=>$photos]);
    }
    function create(){
    	$tags = Tag::all();
    	$categories = Category::all();
    	return view('admin.photos.create',['tags'=>$tags,'categories'=>$categories]);
    }
    function store(Request $request){
    	$title = $request->title;
    	$cate = $request->category;
        $request->descrition;
        $tag_id = $request->tags;
        $input['tag_id']= implode(',', $tag_id);
        $file =$request->file('image')->store("public");

        $photo = new Photo;
        $photo->title =$title;
        $photo->category_id =$cate;
        $photo->image =$file;
        $photo->save();

        $descrition = new PhotoDescription;
        $descrition->photo_id =$photo->id;
        $descrition->content = $request->descrition;
        $descrition->save();

        for($i = 0; $i<count($tag_id);$i++){
            $taggable = new Taggable;
            $taggable->photo_id =$photo->id;
            $taggable->tag_id = $tag_id[$i];
            $taggable->save();
        }
        return redirect('/photo/index');

    }
    function destroy($id){
    	$tag = Photo::find($id);
    	$tag->delete();
    	return redirect('/photo/index');
    }
    function edit($id){
    	$photos = Photo::find($id);
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.photos.edit',['photoEdit'=>$photos,'tags'=>$tags,'categories'=>$categories]);
    }
    function update(Request $request,$id){
    	$title = $request->title;
        $cate = $request->category;
        $request->descrition;
        $tag_id = $request->tags;
        $input['tag_id']= implode(',', $tag_id);
        $file =$request->file('image')->store("public");

        $photo = Photo::find($id);
        $photo->title =$title;
        $photo->category_id =$cate;
        $photo->image =$file;
        $photo->save();

        $descrition = new PhotoDescription;
        $descrition->photo_id =$photo->id;
        $descrition->content = $request->descrition;
        $descrition->save();

        for($i = 0; $i<count($tag_id);$i++){
            $taggable = new Taggable;
            $taggable->photo_id =$photo->id;
            $taggable->tag_id = $tag_id[$i];
            $taggable->save();
        }
        return redirect('/photo/index');
    }
}
