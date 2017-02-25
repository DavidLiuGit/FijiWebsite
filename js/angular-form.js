// JavaScript Document
(function() {
	var app = angular.module('formValid', [ ] );		// form validation module; no dependencies
	
	app.controller ('formController', function(){
		this.message = {};								// init to blank message
		this.message.name = "Your Name *";
		this.message.email = "Your E-mail *";
		this.message.body = "Your Message *";
	});
	
	
})();