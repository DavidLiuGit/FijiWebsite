// Angular for ELO.php
( function() {
	var app = angular.module ( 'eloModule', [ ] );		// create module - eloModule
	
	app.controller ( 'formController', function(){
		$http.get("fetchAllPublic.php")
   		.then(function (response) {$scope.persons = response.data.records;});
	});
	
	
	
})();