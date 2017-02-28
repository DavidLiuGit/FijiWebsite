//Angular for finance/index.html
( function() {
    var app = angular.module ( 'eloModule', [ ] );		// create module - eloModule

    app.controller ( 'tableController', function($scope, $http){

		// fetch undergrad finances table from DB;
	    $http.get("fetchUndergradPublic.php").then( function (response) {
	        $scope.UGpersons = response.data.records;
        });
		
		// fetch grad finances table from DB;
	    $http.get("fetchGradPublic.php").then( function (response) {
	        $scope.Gpersons = response.data.records;
        });
		
		$scope.tab = 1;				// undergrads is the default tab to show
		
		// set new tab
		$scope.setTab = function ( _tab ){
			$scope.tab = _tab;
		};
		
		

    });
})();
