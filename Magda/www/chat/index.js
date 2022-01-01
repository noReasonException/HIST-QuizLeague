var app = require('express')(); //εισαγωγή του express
var http = require('http').Server(app); // εισαγωγη του node.js
var io = require('socket.io')(http); //εισαγωγη του socket.io
console.log('Start EncuptedChat v0.1 Server') //Μύνημα Εκκίνησης
var id=0; // Μετρητής αναθεσής id's
var users = ['ΝΟ_USER']; // πινακας ενεργών Users
var messages = []; // πίνακας μυνημάτων 
app.get('/',function(req,res){ // σε περιπτώση εισερχομενου ετοιματός 
	res.sendFile(__dirname+'/main.html'); // αποστολή αρχείου main.html


});
var NewMessageExist=false // Flag 
io.on('connection',function(socket){ // Σε περίπτωση σύνδεσης 
	for(var i=1;i<messages.length;i++){ // Αποστολή όλων των μυνημάτων
		socket.emit('msg',messages[i]); 
	}
	//console.log('A User Connected');
	//socket.on('Status',function(code){
	//	console.log('User Status',code);
	//});
	var myId = null;
	socket.on('defineUsername',function(name){ // δηλώση ονοματος χρηστη
		if(!users.indexOf(name)){ // αν δεν  υπάρχει ονομα χρήστη
			id+=1; // τοτε αυξήσε το id κατα 1
			myId=id; // δωσε του το καινουριο id
			console.log('username->',name,'connected with id',id); // Μύνημα σύνδεσης
			socket.emit('id',id); // αποστολή του id στον χρήστη
			users.push(name); // εισαγωγή του username στον πίνακα
		}
		else{
			myId=users.indexOf(name); // αν υπάρχει ηδη αυτο το username απλα δωσε του το id που του εχει ανατεθει 
		}
		
	});

	socket.on('chat message',function(msg){ // σε περιπτωση εκπομπης μυνήματος 
		console.log(msg); // μυνημα εισερχομενου μυνηματος 
		messages.push(msg);
		//console.log('Message Push to all users');
	});


	//check why reconnect
	//socket.on('disconnect',function(){
	//	console.log('user disconnected');
	//});
});
console.log('Load Complete');
http.listen(4000,function(){
	console.log('listen on *4000');
});