var express = require('express');
var cors = require('cors');
var app = express();
var mysql = require('mysql');

var config = require('./config.json')

var corsOptions = {
    origin: 'http://www.nhawdge.net',
    methods: "GET,POST",
    optionsSuccessStatus: 200 // some legacy browsers (IE11, various SmartTVs) choke on 204 
}

app.options('/', cors());

app.get('/', cors(corsOptions), function (req, res, next) {
    res.json({
        messsage: "Hit Get"
    })
    console.log("Get Hit");
})

app.post('/', cors(corsOptions), function (req, res, next) {
    var con = mysql.createConnection({
        host: config.host,
        user: config.user,
        password: config.password
    });
    var toDB = {};
    req.on('data', function (d) {
        var data = JSON.parse(d);
        console.log(data);

        toDB.Title = data.Title;        
        toDB.Author = data.Author;        
        toDB.Text = data.Text;
        toDB.Date = data.Date;
    })

    con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    var query = "use nhawdge; INSERT INTO Blog VALUES( UUID(), '" 
        + toDB.Author + "', '" 
        + toDB.Text + "', '"
        + toDB.Date + "', '"
        + toDB.Title + "'); ";
        console.log("Running: ", query);
    con.query(query, function (err, result) {
    if (err) throw err;
        console.log("1 record inserted");
  });
});


    res.json({
        Success: true
    })
    console.log("post hit");
})

app.get('/Blog/:id', cors(corsOptions), function (req, res, next) {

    res.json({
        msg: 'blog'
    })
})

app.listen(1122, function () {
    console.log('CORS-enabled web server listening on port 1122')
})