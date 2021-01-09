var mysql = require('mysql');

var conn = mysql.createConnection({
	host: "localhost",
	user: "st07",
	password: "c9st07"
});

conn.connect(function(err) {
	if(err) throw err;
	console.log("Connected!");
});
