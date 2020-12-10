var mysql = require('mysql');

var connection = mysql.createConnection({
	host:'127.0.0.1',
  user:'root',
  password:'',
  database: 'youtube_info'
});
connection.connect();

var sql= 'SELECT * FROM channels';
const name_list = [];
connection.query(sql, (err, rows, fields) => {
  if (err) {
    console.log(err);
  } else {
    for (var i=0; i<rows.length; i++) {
      name_list.push(rows[i].name);
    }
  }
});

console.log(name_list);
connection.end();