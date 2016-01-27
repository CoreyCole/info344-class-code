'use strict';

//node caches re used modules
var express = require('express');
var request = require('request');
var cheerio = require('cheerio');

module.exports.Router = function(Story) {
    var router = express.Router();
    
    router.get('/stories', function(req, res, next) {
        //return all stories from the db
        Story.getAll()
            .then(function(rows) {
                res.json(rows);
            })
            .catch(next);
    });
    
    router.post('/stories', function(req, res, next) {
        //insert a new story into the database
        //return data with default values applied
        //req.body from bodyparser in server.js
        request.get(req.body.url, function(err, response, body) {
            if (err) {
                req.body.title = req.body.url;
            } else {
                var $ = cheerio.load(body);
                req.body.title = $('head title').text();    
            }
            console.log(req.body);
            Story.insert(req.body)
                .then(function(row) {
                    res.json(row);
                })
                .catch(next);
        });    
    });
    
    router.post('/stories/:id/votes', function(req, res, next) {
        //upvote the story
        //return the story with the current number of votes
        Story.upVote(req.params.id)
            .then(function(row) {
                res.json(row);
            })
            .catch(next);
    });
    
    return router;
};