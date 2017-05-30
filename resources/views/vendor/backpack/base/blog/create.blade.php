@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Create Blog
      </h1>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">New blog</div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    {!! Form::open(['url' => 'admin/blog/create']) !!}
    
    <div class="form-group">
    {!! Form::label('title', 'Title'); !!}
    {!! Form::text('title'); !!}
    </div>
    
    <div class="form-group">
    {!! Form::label('body', 'Body'); !!}
    {!! Form::textarea('body'); !!}
    </div>
    
    <div class="form-group">
    {!! Form::label('status', 'Status'); !!}
    {!! Form::number('status'); !!}
    </div>
    {!! Form::submit('Click Me!'); !!}
    {!! Form::close() !!}
</div>
@endsection
