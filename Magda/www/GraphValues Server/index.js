var app = require('express')();
var http = require('http').Server(app);
var io = require('socket-io')(http);


var value = 0;
var new_value=false;
app.get('/',function(req,res){
	res.sendFile(__dirname+'/main.html');
});
io.on('connection',function(socket)){
	while(1){
		setTimeout(function(){},1000);
		ReadFileLibrary = require('fs');
		ReadFileLibrary.readFile('values.txt',function(err,data){
			if(value!=data){
				value=data;
				socket.emit('new_value',value.toString());
			}
		});
	}
});
http.listen(3000,function(){
	console.log('Listen to *3000');
});
