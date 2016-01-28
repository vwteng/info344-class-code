'use strict';

var express = require('express');   //sub-routers 
var request = require('request');   //request URLs
var cheerio = require('cheerio');   //parse HTML

module.exports.Router = function(stories) {
    //create a new Express Router
    //an Express application is a router, but we can also
    //create sub-routers that we can add to the application
    //this router will handle all routes related to stories
    var router = express.Router();
    
    //GET /stories
    router.get('/stories', function(req, res, next) {
        //return the first page of stories from the database
        //TODO: support offset and limit as query string parameters
        //so the clients can page through all stories
        stories.getAll()
            .then(function(rows) {
                res.json(rows);
            })
            .catch(next);
    });
    
    //POST /stories
    router.post('/stories', function(req, res, next) {
        //insert a new story into the database
        //and return the data with default values
        //applied
        
        //TODO: validate that req.body.url exists and is a valid URL
        
        //fetch the HTML for the new URL
        request.get(req.body.url, function(err, response, body) {
            if (err) {
                //if there is a problem, just use the URL as the title
                //and continue--articles behind a paywall or login
                //are inaccessible to us
                req.body.title = req.body.url;
            }
            else {
                //parse the HTML using cheerio
                //same API as jQuery once it's parsed
                var $ = cheerio.load(body);
                //grab the text of the title element within the head element
                req.body.title = $('head title').text();                
            }
            
            //insert the new story
            stories.insert(req.body)
                .then(function(row) {
                    //echo back the story with all default values applied
                    res.json(row);
                })
                .catch(next); //forwards the error to Express
        });
        
         
    });
    
    //POST /stories/1234/votes
    //the :id is like a wildcard--it matches any value
    //and express will make the value it matches available as req.params.id
    router.post('/stories/:id/votes', function(req, res, next) {
        //upvote the story and return the
        //full story with current number of votes
        //the property on req.params will have the same name as whatever
        //you had following the : in the URL
        stories.upVote(req.params.id)
            .then(function(row) {
                res.json(row);
            })
            .catch(next);
    });
    
    return router;
};
