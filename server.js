var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);


io.on('connection', function(socket){
  console.log('a user connected');
  socket.on('disconnect', function(){
    console.log('user disconnected');
  });

  socket.on('chat message', function(msg){
    console.log('Message received on server');
    io.emit('chat message', msg);
  });
  
  socket.on('email message', function(msg){
    console.log('Email received on server');
    io.emit('email message', msg);
  });
});

http.listen(3000, function(){
  console.log('listening on *:3000');
});

app.get('/',function(request,response){
    console.log('Email received on server');
    io.emit('email message', "hello");
});