console.log('Graph Values Server version:0.1');
var http = require('http'); // include node.js framework
var RequestsPerMinute = 0;
Values = require('fs'); // read files library
var exec = require('child_process').exec,child;
child = exec('start GraphValuesUpdater.py',function(error,stdout,stderr){console.log('Starting Bot...');});

http.createServer(function(request,responce){ // createServer function witch in every request fires anonymous function
	responce.writeHead(200,{"context-type":"text/plain"}); //type of data

	Values.readFile('values.txt','ascii',function(err,data){ // read values.txt file
		if(err){
			console.log('[ERR]Values File not open'); // in case of error
			console.log(err);//print error log
		}
		else{
			console.log('Value Send'+data.toString()); //else print value
			RequestsPerMinute = data.toString(); //assign new value to RequestsPerMinute value
		}
		responce.write(RequestsPerMinute);//responce
		responce.end();
	});

}).listen(8888);
