//Angular for ELO.php
( function() {
    var app = angular.module ( 'eloModule', [ ] );		// create module - eloModule

    app.controller ( 'formController', function($scope, $http){
	    $http.get("fetchAllPublic.php").then( function (response) {
	        $scope.persons = response.data.records;
        });

		// pass these values to the server (php) and let the server compute scores
		this.selA1 = null;
		this.selA2 = null;
		this.selB1 = null;
		this.selB2 = null;
		this.winnerA = null;		// which team won?
    });

})();
