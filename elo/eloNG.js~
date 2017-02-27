//Angular for ELO.php
( function() {
    var app = angular.module ( 'eloModule', [ ] );		// create module - eloModule

    app.controller ( 'formController', function($scope, $http){
	    $http.get("fetchAllPublic.php").then( function (response) {
	        $scope.persons = response.data.records;
        });
		
		records = $scope.persons;
		
		sel1 = null;
		sel2 = null;
    });

})();
