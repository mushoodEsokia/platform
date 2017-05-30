<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Job;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }
    
    public function search()
    {
        $search = request('search');
        $blogs = Blog::search($search)->get();
        $jobs = Job::search($search)->get();
        return view('search.index',compact('blogs','jobs'));
    }
}
