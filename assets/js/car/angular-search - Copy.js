var roundtripApp = angular.module('roundtripApp', [])

roundtripApp.factory('cabsFact', ['$http', '$rootScope', function($http, $rootScope) {
	var sites = [];

	return {
		getCars: function($params) {
			return $http({
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				url: base_url + 'car/getjson',
				method: "POST",
				data: $params,
			})
				.success(function(addData) {
					sites = addData;
					$rootScope.$broadcast('handleProjectsBroadcast', sites);
				});
		}
	};
}]);

roundtripApp.controller('listingCtrl', function($scope, $http) {
	$scope.cabs = [];
	$scope.search = [];
	$scope.total_capacity = [];
	$scope.air_condition = $scope.stereo = false;
	var temp_flag  = false;

	$scope.init = function($params) {
		carsFact.getProjects().then(function(projects) {
			$scope.projects = projects;
		});
		/*
		$http({
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			url: base_url + 'car/getjson',
			method: "POST",
			data: $.param($params),
		})
		.success(function(response) {
				$scope.cabs = response;
		});
		*/
	}

	$scope.predicate = '-title';
	$scope.reverse = true;

	$scope.capacityFilter = function(cab) {
		//console.log(cab);
		var flag = false;
		var filter_check = true;

		//capacity check
		if ($scope.total_capacity.length) {
			filter_check = false;
		}

		if ($scope.air_condition) {
			filter_check = false;
		}

		if ($scope.stereo) {
			filter_check = false;
			//f (s_cap.type == 'stereo') {
				//flag = true;
			//}
		}


		if (filter_check) {
			return true;
		}
		else {
			temp_flag  = true;
			if ($scope.total_capacity.length) {
				angular.forEach($scope.total_capacity, function(s_cap) {
					if (s_cap == cab.capacity) {
						temp_flag  = false;
					}
					else {
						temp_flag  = true;
					}
				});
			}
			if ($scope.air_condition) {
				//temp_flag  = true;
				if (cab.type == 'aircondition') {
					temp_flag  = false;
				}
				else {
					temp_flag  = true;
				}
			}

			if (!temp_flag) {
				//console.log(cab);
				return true;
			}
		}



	}

	/** capacity add remove for filter start **/
	$scope.change_capacity = function($field, $cap) {
		if ($scope[$field]) {
			$scope.total_capacity.push($cap);
		}
		else {
			var old_capacity = $scope.total_capacity;
			$scope.total_capacity = [];
			angular.forEach(old_capacity, function(s_cap) {
				if (s_cap != $cap) {
					$scope.total_capacity.push(s_cap);
				}
			});
		}
	};
	/** capacity add remove for filter end **/


	/** amenities add remove for filter start
	$scope.change_amenities = function($field) {
		if ($scope[$field]) {
			$scope.total_capacity.push($cap);
		}
		else {
			var old_capacity = $scope.total_capacity;
			$scope.total_capacity = [];
			angular.forEach(old_capacity, function(s_cap) {
				if (s_cap != $cap) {
					$scope.total_capacity.push(s_cap);
				}
			});
		}
	};
	 **/
	/** amenities add remove for filter end **/


});

