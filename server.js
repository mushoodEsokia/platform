var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/chat', function(req, res){
    res.send({
        status: 200,
        response: 'Params sent and client loaded successfully'
    });
});

io.on('connection', function(socket){
  console.log('a user connected');
  socket.on('disconnect', function(){
    console.log('user disconnected');
  });

  socket.on('chat message', function(msg){
      console.log('Message received on server');
    io.emit('chat message', msg);
  });
});

http.listen(3000, function(){
  console.log('listening on *:3000');
});