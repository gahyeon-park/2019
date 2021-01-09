var express = require("express");
var myApp = express();

myApp.use(express.static('public'));

myApp.get('/', function(req, res) {
	res.send('<p>Line</p>');
});

myApp.get('/dynamic', function(req, res) {
	var lis = '';

	for(var i = 0; i < 5; i++) {
		lis = lis + "<li>Beautiful Coding</li>";
	}

	var time = Date();
	var output = `
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8">
				<title>HAPPY</title>
			</head>
			<body>
				Hello, Dynamic!
				<ul>
					${lis}
				</ul>
				${time}
			</body>
		</html>
	`;
	res.sesnd(output);
});

myApp.get('/images', function(req, res) {
	res.send('My Image, <img src="/route.png">');
});

myApp.get('/Member', function(req, res) {
	res.send('<h1>Member Only</h1>');
});

myApp.listen(8070, function() {
	console.log("Connected 8070 port!");
});
