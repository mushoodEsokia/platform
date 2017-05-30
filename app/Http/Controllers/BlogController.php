<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('blog.index',compact('blogs'));
    }
    
    public function create(){
        return view('vendor.backpack.base.blog.create');
    }
    
    public function store(){
        $blog = new Blog();
        $blog->title = request('title');
        $blog->body = request('body');
        $blog->status = request('status');
        $blog->save();
        
        return redirect("/admin/blog");
    }
    
    public function indexAdmin(){
        $blogs = Blog::all();
        return view('vendor.backpack.base.blog.blog',compact('blogs'));
    }
}
