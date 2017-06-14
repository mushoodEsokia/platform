@extends('layoutFront.master')

@section('content')
    <h2>These are my emails.</h2>
    @foreach($emails as $email)
        <h5>FROM: {{$email->from}}</h5>
        <h5>TO: {{$email->to}}</h5>
        <h3>Subject: {{$email->subject}}</h3>
        <p>{!!$email->content!!}</p>
        <hr />
    @endforeach
@endsection

@section('script')
<script>
    $(document).ready(function(){
        
    })
</script>
@endsection