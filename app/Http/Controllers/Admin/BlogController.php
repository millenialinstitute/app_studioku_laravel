<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Blog;

class BlogController extends Controller
{
    /**
      * route: /admin/blog/create
      * method: get
      * params: null
      * description: 
        * this method for createing blog
      * return : @view
    */
    public function create () 
    {
    	return view('admin.blog-create');
    }


    
    
    /**
      * route: /admin/blog/store
      * method: get
      * params: null
      * description: 
        * this method for store blog
      * return : @var array
    */
    public function store (Request $request) 
    {
      $request->validate([
        'title'     => 'required|string|min:4|max:20',
        'category'  => 'required|string|min:3|max:20',
        'content'   => 'required',
        'thumbnail' => 'required|file',
      ]);

      $thumbnail = $request->thumbnail;
      $nameThumbnail  = Str::random('30') . '.' . $thumbnail->getClientOriginalName();
      Storage::putFileAs('public/blogs' , new File($thumbnail) , $nameThumbnail);

      Blog::create([
            'title'     => $request->title,
            'thumbnail' => $nameThumbnail,
            'category'  => $request->category,
            'content'   => $request->content,
      ]);

      return redirect(url('/admin/blog/list'))->with('add' , 'Blog berhasil dipublish');
    }


    
    
    /**
      * route: /admin/blog/list
      * method: get
      * params: null
      * description: 
        * this method for show list blog
      * return : @view
    */
    public function list () 
    {
        $blogs = Blog::select('title' , 'thumbnail' , 'id' , 'created_at')->latest()->paginate(5);
        return view('admin.blogs' , [
                        'user' => Auth::user(),
                        'blogs' => $blogs,
                  ]);
    }


    
    
    /**
      * route: /admin/blog/destroy/{id}
      * method: delete
      * params: id
      * description: 
        * this method for destroy blog
      * return : @redirect
    */
    public function destroy (Request $request , $id) 
    {
        $blog = Blog::find($id);
        if($blog->thumbnail !== 'thumbnail.jpg') {
            Storage::delete('public/blogs/' . $blog->thumbnail);
        }
        Blog::destroy($id);

        return redirect(url()->previous())->with('delete' , 'Blog berhasil dihapus!');
    }
      
        
    	
    	
}
