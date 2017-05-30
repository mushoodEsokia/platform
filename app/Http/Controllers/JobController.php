<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::all();
        return view('job.index',compact('jobs'));
    }
    
    public function create(){
        return view('vendor.backpack.base.job.create');
    }
    
    public function store(){
        $job = new Job();
        $job->title = request('title');
        $job->description = request('description');
        $job->opening = request('opening');
        $job->save();
        
        return redirect("/admin/job");
    }
    
    public function indexAdmin(){
        $jobs = Job::all();
        return view('vendor.backpack.base.job.job',compact('jobs'));
    }
}
