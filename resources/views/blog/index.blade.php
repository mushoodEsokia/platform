@extends('layoutFront.master')

@section('content')
    <h2>These are my blogs.</h2>
    @foreach($blogs as $blog)
        <h3>{{$blog->title}}</h3>
        <p>{{$blog->body}}</p>
    @endforeach
@endsection

@section('script')
<script>
    $(document).ready(function(){
        
    })
</script>
@endsection