
var express = require('express');
var app = express();
var server = require('http').createServer(app);

const io = require("socket.io")(server, 
    {  cors: {    
        origin: "http://localhost",    
        methods: ["GET", "POST"],    
        allowedHeaders: ["my-custom-header"],    
        credentials: true  
    }
});

var port = process.env.PORT || 3000;
server.listen(port, function () {
    console.log('Server listening at port %d', port);
});


io.on("connection", (socket) => {
  socket.on("new_message", (data) => {
      console.log(data);
      io.sockets.emit( 'new_message', {
          message: data.message,
          date: data.date,
          msgcount: data.msgcount
      });
  });

  socket.on("ticket", (data) => {
    console.log(data);
    io.sockets.emit( 'ticket', {
        message: data
    });
});

});