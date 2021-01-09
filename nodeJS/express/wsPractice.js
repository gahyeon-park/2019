var ws = require("express");
var app = ws();

app.use(ws.static('myFiles'));

app.get('/', function(req, res) {
	res.send("할라");
});
app.get('/images', function(req, res) {
	res.send("My Image, <img src='1.jpg'>");
});
app.listen(8070, function() {
	console.log("open 8070 ort!");
});
