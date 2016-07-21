var mraa = require("mraa"); // Initializing library
var express = require('express');
var app = express();
var enablePins = [];//creating an array to hold enable Pins
var pwmPins = [];//creating an array to hold pwm Pins
/*
var dimmingInterval = []; //creating a var for dimming interval
var dimmingInterval[0] = false; //creating a var for dimming interval
var dimmingInterval[1] = false; //creating a var for dimming interval
*/
var transitionInterval = []; //creating a var for transition interval
transitionInterval[0] = false; //transition interval for strip 1
transitionInterval[1] = false; //transition interval for strip 2
//initializing Enable pins
enablePins[0] = new mraa.Gpio(1); //enable pin for led strip 1
enablePins[1] = new mraa.Gpio(2); //enable pin for led strip 2
enablePins[0].dir(mraa.DIR_OUT);
enablePins[1].dir(mraa.DIR_OUT);
//add more if needed

pwmPins[0] = new mraa.Pwm(5); //initializing LED brightness control (PWM) pin on pin 5
pwmPins[0].enable(true);
pwmPins[0].period_us(2000);
pwmPins[1] = new mraa.Pwm(6); //initializing LED brightness control (PWM) pin on pin 6
pwmPins[1].enable(true);
pwmPins[1].period_us(2000); //set the period in microseconds.

function enableStrip (stripNumber, isEnabled){ //function to turn led strip on/off
	if (isEnabled) {
		enablePins[stripNumber].write(1);
	} else {
		enablePins[stripNumber].write(0);
	}
}

function setBrightness (stripNumber, brightnessLevel){ //function to set brightness level
	if (brightnessLevel == 0) { //automatically turn on/off enable pin
		enablePins[stripNumber].write(0);
	} else {
		enablePins[stripNumber].write(1);
		pwmPins[stripNumber].write(brightnessLevel);
	}
}

/*
//testing stuff
enableStrip(0, true);
enableStrip(1, false);
setBrightness(0, 0.25);
setBrightness(1, 0.10);
setDimTimer (100);
*/

var server = app.listen(3000,  function () { //listen to commands on port 3000

  var host = server.address().address
  var port = server.address().port


  console.log('Example app listening at http://%s:%s', host, port)
})



app.get('/', function (req, res) {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
    res.header('Access-Control-Allow-Headers', 'Content-Type');
  if(req.query.temp === 'on'){
	  temp = temp.toString();
    res.send(temp);
  } else
  
  if(req.param('stripNumber')&&req.param('brightness')){
	  var stripNumber = parseInt(req.param('stripNumber'));
	  var brightness = parseFloat(req.param('brightness'));
	  setTransitionInterval(stripNumber, brightness, 0.5);
	 
	  
			res.send('Success');
  } else
  if(req.param('timer')){
	  var timeToTurnOff = parseInt(req.param('timer'));
	  setDimTimer (timeToTurnOff);
	 
	  
			res.send('Success! Timer set');
  } else { //if no control calls, return html page
  fs = require('fs');
  fs.readFile('lights.htm', 'utf8', function (err,data) { //read it from the file
  if (err) {
    return console.log(err);
  }
  res.send(data); //return html
  
});
  }
})

//Old set dimmer
/*
function setDimTimer (time){
	//find max brightness at this time
	if(dimmingInterval != false){ //check if timer has been already set
			clearInterval(dimmingInterval); //if yes, than cancel the old timer
			dimmingInterval=false;
	}
	var maxValue = pwmPins[0].read(); // 
	if(maxValue < pwmPins[1].read()){
		maxValue = pwmPins[1].read();
	}
	var numberOfSteps = Math.round(maxValue*100)*10; //find max number of steps to turn lights off. We gonna be stepping 0.01 at a time
	console.log("Number of steps: " + numberOfSteps);
	var timeInterval = Math.round(time*1000/numberOfSteps); //find time between each step
	console.log("Interval: " + timeInterval);
	console.log("pwm value 1 : " + pwmPins[0].read() + "pwm value 2 : " + pwmPins[1].read());
	dimmingInterval = setInterval(function (e) { 
	console.log("pwm value 1 : " + pwmPins[0].read() + "pwm value 2 : " + pwmPins[1].read());
		if(pwmPins[0].read() < 0.01 && pwmPins[1].read() < 0.01){
			clearInterval(dimmingInterval);
			dimmingInterval=false;
			setBrightness (0, 0);
			setBrightness (1, 0);
		} else {
			reduceBrightness (0, 1);
			reduceBrightness (1, 1);
		}
	}, timeInterval);
	
}
*/
function setDimTimer (time){
	setTransitionInterval (0, 0, time);
	setTransitionInterval (1, 0, time);
}
function setTransitionInterval (stripNumber, brightnessLevel, time){
	//find max brightness at this time
	if(transitionInterval[stripNumber] != false){ //check if transition has been already set
			clearInterval(transitionInterval[stripNumber]); //if yes, than cancel the old transition
			transitionInterval[stripNumber]=false;
	}
	var maxValue = pwmPins[stripNumber].read(); // 
	if (time < 5){
			step = 5;
		} else {
			step = 1;
		}
	var numberOfSteps = Math.round((maxValue - brightnessLevel)*1000/step); //find max number of steps to turn lights off. We gonna be stepping 0.005 at a time
	var reduce = true;
	if (numberOfSteps < 0){
		numberOfSteps = numberOfSteps*(-1);
		reduce = false;
	}
	console.log("Number of steps: " + numberOfSteps);
	var timeInterval = Math.round(time*1000/numberOfSteps); //find time between each step
	console.log("Interval: " + timeInterval);
	console.log("pwm value : " + pwmPins[stripNumber].read());
	transitionInterval[stripNumber] = setInterval(function (e) { 
	console.log("pwm value 1 : " + pwmPins[stripNumber].read());
		if((pwmPins[stripNumber].read() + 0.01) >  brightnessLevel && (pwmPins[stripNumber].read() - 0.01) <  brightnessLevel ){
			clearInterval(transitionInterval[stripNumber]);
			transitionInterval[stripNumber]=false;
			setBrightness (stripNumber, brightnessLevel);
		} else {
			if(reduce){
			reduceBrightness (stripNumber, step);
			} else {
			increaseBrightness (stripNumber, step);
			}
		}
	}, timeInterval);
	
}
function reduceBrightness (stripNumber, step){
	currentValue = pwmPins[stripNumber].read();
	currentValue = currentValue - 0.001*step;
	setBrightness (stripNumber, currentValue);
}
function increaseBrightness (stripNumber, step){
	currentValue = pwmPins[stripNumber].read();
	currentValue = currentValue + 0.001*step;
	setBrightness (stripNumber, currentValue);
}
