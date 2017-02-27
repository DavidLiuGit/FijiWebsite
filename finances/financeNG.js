//Angular for finance/index.html
( function() {
    var app = angular.module ( 'eloModule', [ ] );		// create module - eloModule

    app.controller ( 'tableController', function($scope, $http){

		// fetch finances table from DB;
	    $http.get("fetchAllPublic.php").then( function (response) {
	        $scope.persons = response.data.records;
        });

    });
})();
