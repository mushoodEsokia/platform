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
<script src="http://localhost:3000/socket.io/socket.io.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
<script>
    $(document).ready(function(){
        $(function () {
            //var socket = io();
            var socket   = io.connect(':3000', {secure:false});
            
            //socket.emit('email message', "hello");
            socket.on('email message', function(msg){
                location.reload();
              //alert('New email received');
            });
        });
    });

</script>
@endsection