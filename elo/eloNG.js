//Angular for ELO.php
( function() {
    var app = angular.module ( 'eloModule', [ ] );		// create module - eloModule

    app.controller ( 'formController', function($scope, $http){
		
	    $http.get("fetchAllPublic.php").then( function (response) {
	        $scope.persons = response.data.records;
        });

		// pass these values to the server (php) and let the server compute scores
		$scope.selA1 = null;
		$scope.selA2 = null;
		$scope.selB1 = null;
		$scope.selB2 = null;
		$scope.winnerA = null;		// which team won?
		
		
		
		// make http request to PHP
		$scope.newMatch = function () {
			
			var data = $.param({
                selA1: $scope.selA1,
                selB1: $scope.selB1,
				selA2: $scope.selA2,
                selB2: $scope.selB2,
				winnerA: $scope.winnerA
            });
			
			var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };
	
			$http.post('update.php', data, config).then( function (data) {
				console.log(data);		// print PHP data in console
			});
		};
    });
})();
