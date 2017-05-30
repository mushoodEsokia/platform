@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Create Job
      </h1>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">New job</div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    {!! Form::open(['url' => 'admin/job/create']) !!}
    
    <div class="form-group">
    {!! Form::label('title', 'Title'); !!}
    {!! Form::text('title'); !!}
    </div>
    
    <div class="form-group">
    {!! Form::label('description', 'Description'); !!}
    {!! Form::textarea('description'); !!}
    </div>
    
    <div class="form-group">
    {!! Form::label('opening', 'Opening'); !!}
    {!! Form::number('opening'); !!}
    </div>
    {!! Form::submit('Click Me!'); !!}
    {!! Form::close() !!}
</div>
@endsection
