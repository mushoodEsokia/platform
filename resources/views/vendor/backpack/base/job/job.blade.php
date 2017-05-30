@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Blog
      </h1>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Manage jobs</div>
                    <a href="/admin/job/create">
                        <button>Create Job</button>
                    </a>    
                </div>

                <div class="box-body">This is where you manage your jobs</div>
            </div>
            <div class="box box-default">
            @foreach($jobs as $job)
                <h3>{{$job->title}}</h3>
                <p>{{$job->description}}</p>
            @endforeach
            </div>
        </div>
    </div>
@endsection
