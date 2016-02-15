'use strict';

var bcrypt = require('bcrypt');
var express = require('express');
var port = 9000;

var app = express();

app.get('/api/bcrypt', function(req, res) {
    var pwd = req.query.p;
    if (!pwd) {
        return res.status(400).json({message: "usage: /api/bcrypt?p=password&rounds=13"});
    }
    
    var rounds = parseInt(req.query.rounds);
    
    //default rounds to 13
    if (isNaN(rounds)) {
        rounds = 13;
    }
    
    //cap the rounds at 15 so that we don't
    //start something that will never end
    rounds = Math.min(rounds, 15);
    
    bcrypt.hash(pwd, rounds, function(err, hash) {
        res.json({
            hash: hash,
            rounds: rounds
        });
    });        
});

app.listen(port, function() {
    console.log('server listening on port %d', port);
});
