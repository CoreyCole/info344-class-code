'use strict';

//Mongoose is a library that sits on top of the native MongoDB driver
//providing schema validation and a few other things that you normally
//get with a relational database
var mongoose = require('mongoose');

//load the configuration info: we only need a `url` property
//with the MongoDB URL
var dbConfig = require('./secret/config-mongo.json');

//declare a new schema for our Story objects
//each story will have a url, number of votes, and a createdOn date
//all MongoDB objects also get an _id property with a database-assigned
//unique key, so you don't have to declare that yourself
var storySchema = new mongoose.Schema({
    url: String,
    votes: {type: Number, default: 0},
    createdOn: {type: Date, default: Date.now} 
});

var Story = mongoose.model('Story', storySchema);
var id;

mongoose.connect(dbConfig.url);
mongoose.connection.on('error', function(err) {
    console.error(err); 
});

var newStory = {
    url: 'http://asdf.com'
}

Story.create(newStory)
    .then(function(story) {
        id = story._id;
        console.log('inserted new story!');
    })
    .then(function() {
//create the model based on this schema
//this is like a class that you can use to create
//new story instances, or you can use static methods
//on it to insert, find, update, and delete directly 
var Story = mongoose.model('Story', storySchema);

//connect to MongoDB
mongoose.connect(dbConfig.url);

//if there's an error connecting, show it
mongoose.connection.on('error', function(err) {
    console.error(err);
});

//a new story object
//default values for votes and createdOn
//will be automatically applied by mongoose
var newStory = {
    url: 'http://www.google.com'
};

//id of new document
var id;

//insert the new story
Story.create(newStory)
    .then(function(story) {
        //save the new id
        id = story._id;
        console.log('inserted new story!');
        console.log(story);
    })
    .then(function() {
        //find the story given its id
        return Story.findById(id).exec();
    })
    .then(function(story) {
        console.log('found story!');
        console.log(story);
        //update the story by incrementing the votes value
        //the $inc tells Mongo to increment the votes property
        //which allows multiple users to do this all at the same
        //time with everyone's votes being counted
        //the {new: true} tells Mongo to return th updated version
        //of the document so that we can see the updated votes value
        Story.findByIdAndRemove(id);
        //this removes the document from the database and returns
        //the document as it was before it was deleted
        //use .remove() to just remove it without returning it
        return Story.findByIdAndRemove(id);
    })
    .then(function() {
        console.log('story deleted!');
    })
    .then(null, function(err) {
        console.log(err);
    })
    .then(function() {
        mongoose.connection.close(); 
    });