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
                    <div class="box-title">Manage blogs</div>
                    <a href="/admin/blog/create">
                        <button>Create Blog</button>
                    </a>    
                </div>

                <div class="box-body">This is where you manage your blogs</div>
            </div>
            <div class="box box-default">
            @foreach($blogs as $blog)
                <h3>{{$blog->title}}</h3>
                <p>{{$blog->body}}</p>
            @endforeach
            </div>
        </div>
    </div>
@endsection
