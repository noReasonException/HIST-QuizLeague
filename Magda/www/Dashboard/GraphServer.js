console.log("Graph Server version 0.1");
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var value = 0;
app.get('/',function(req,res){
	res.send('0');
});
io.on('connection',function(socket){
	console.log('Connected')
	socket.on('request_value',function(data){
		ReadFileObject = require('fs');
		ReadFileObject.readFile('values.txt',function(err,data){
		if(value.toString!=data.toString()){
			value = parseInt(data);
			socket.emit('new_value',data.toString());
		}
		else{socket.emit('new_value','old');}
		//setInterval(3000,function(){});
		});
		
	});
		
});
http.listen(3000,function(){
	console.log('Listening on *3000');
});