'use strict';

var i = 4;
add2(i);

function add2() {
    new Promise(function(resolve, reject) {
        resolve(i);  
    })
    .then(function() {
        return i += 1;
    })
    .then(function() {
        return i += 1;
    })
    .then(function() {
        console.log(i);
    })
};


var http = require('http');

function get(url) {
  // Return a new promise.
  return new Promise(function(resolve, reject) {
    // Do the usual request stuff
    http.get(url, function(res) {
        var body = '';
        res.on('data', function(chunk) {
            body += chunk;
        });
        res.on('end', function() {
            resolve(body);
        });
    }).on('error', function(err) {
        reject(err);
    });
  });
}


getMovie("tt0120737");

function getMovie(movieId) {
    get('http://www.omdbapi.com/?i=' + movieId + '&plot=short&r=json')
    .then(function(response) {
        return JSON.parse(response);
    })
    .then(function(response) {
        console.log(response);
    })
    .catch("failed");
};



function getThreeMovies(id1, id2, id3) {
    getMovie("tt0120737")
    .then(function(response) {

    })
    .then(function(response) {

    })
    .catch("failed");
}