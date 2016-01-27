'use strict';

var mysql = require('mysql');
var bluebird = require('bluebird');

//load our connection info from the secret directory
var dbConfig = require('./secret/config-maria.json');

var conn = bluebird.promisifyAll(mysql.createConnection(dbConfig));
//id of our newly inserted row
var id;

function logRow(row) {
    console.log(row);
}

function logRows(rows) {
    rows.forEach(logRow);
}

conn.queryAsync('insert into stories (url) values (?)', ['http://asdf.com'])
    .then(function(results) {
        console.log('row inserted, new id = ' + results.insertId); 
        id = results.insertId;
        return conn.queryAsync('select * from stories where id=?', [id]);
    })
    .then(function(rows) {
        logRow(rows[0]);
        return conn.queryAsync('update stories set votes=votes+1 where id=?', [id]);
    })
    .then(function(results) {
        console.log('rows affected: ' + results.affectedRows);
        return conn.queryAsync('select * from stories where id=?', [id]);
    })
    .then(logRows)
    .then(function() {
        return conn.queryAsync('delete from stories where id=?', [id]);
    })
    .then(function(results) {
        console.log('rows affected: ' + results.affectedRows);
    })
    .then(function() {
        conn.end();
    })
    .catch(function(err) {
          
    });

// conn.query('select * from stories', function(err, rows) {
//     if (err) {
//         console.error(err);
//     } else {
//         console.log('rows returned: ' + rows.length);
//         rows.forEach(function(row) {
//             console.log(row); 
//         });
//     }
//     conn.end();
// });