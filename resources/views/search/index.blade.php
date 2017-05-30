@extends('layoutFront.master')

@section('content')
    <h2>These are my search results.</h2>
    <hr />
    <h3>Blog Results</h3>
    @foreach($blogs as $blog)
        <h4>{{$blog->title}}</h4>
        <p>{{$blog->body}}</p>
    @endforeach
    <hr />
    <h3>Job Results</h3>
    @foreach($jobs as $job)
        <h4>{{$job->title}}</h4>
        <p>{{$job->description}}</p>
    @endforeach
@endsection

@section('script')
<script>
    $(document).ready(function(){
        
    })
</script>
@endsection