@extends('layoutFront.master')

@section('content')
    <h2>These are my jobs.</h2>
    @foreach($jobs as $job)
        <h3>{{$job->title}}</h3>
        <p>{{$job->description}}</p>
    @endforeach
@endsection

@section('script')
<script>
    $(document).ready(function(){
        
    })
</script>
@endsection