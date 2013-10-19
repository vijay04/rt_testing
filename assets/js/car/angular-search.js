var roundtripApp = angular.module('roundtripApp', ['ui.slider'])

roundtripApp.factory('cabsFact', ['$http', '$rootScope', function($http, $rootScope) {
	var cabs = [];

	return {
		getCars: function($params) {
			return $http({
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				url: base_url + 'car/getjson',
				method: "POST",
				data: $params,
			})
			.success(function(addData) {
				cabs = addData;
				$rootScope.$broadcast('handleProjectsBroadcast', cabs);
			});
		}
	};
}]);

roundtripApp.controller('listingCtrl', function(cabsFact, $scope) {

	$scope.init = function($params) {
		$scope.filter = $params;
		cabsFact.getCars($.param($params)).then(function(cabs) {
			$scope.cars = cabs.data;
		});
	}

	$scope.total_capacity = [];
	//default sort by
	$scope.predicate = '-title';
	$scope.total_price = {
		price_range: [0, 150000]
	};


	$scope.carFilter = function(car) {

		var flag = true;
		var temp_flag = false;
		//console.log(car.capacity);
		if ($scope.total_capacity.length) {
			flag = false;
			var keepGoing = true;
			angular.forEach($scope.total_capacity, function(tc) {
				//no break like php so use if with flag

				if(keepGoing) {

					console.log(tc);
					if (car.capacity == tc) {
						temp_flag = true;
						keepGoing = false;
					}
				}
			});
		}

		//check if aircondition checkbox enabled
		if ($scope.aircondition) {
			//check if any previous conditions
			if (!flag) {
				//if previous condition true then check for current one
				if (temp_flag) {

					if (car.aircondition == "1") {
						temp_flag = true;
					}
					else {
						//if this condition is false then make temp_flag false
						temp_flag = false;
					}
				}
			}
			else {
				flag = false;
				if (car.aircondition == "1") {
					temp_flag = true;
				}
			}

		}


		//check if stereo checkbox enabled
		if ($scope.stereo) {
			//check if any previous conditions
			if (!flag) {
				//if previous condition true then check for current one
				if (temp_flag) {
					if (car.stereo == "1") {
						temp_flag = true;
					}
					else {
						//if this condition is false then make temp_flag false
						temp_flag = false;
					}
				}
			}
			else {
				flag = false;
				if (car.stereo == "1") {
					temp_flag = true;
				}
			}

		}

		//check if total price enabled
		if ($scope.total_price) {
			//check if any previous conditions
			if (!flag) {
				//if previous condition true then check for current one
				if (temp_flag) {
					if ($scope.total_price.price_range[0] < car.price && car.price < $scope.total_price.price_range[1]) {
						temp_flag = true;
					}
					else {
						//if this condition is false then make temp_flag false
						temp_flag = false;
					}
				}
			}
			else {
				flag = false;
				if ($scope.total_price.price_range[0] < car.price && car.price < $scope.total_price.price_range[1]) {
					temp_flag = true;
				}
			}

		}

		if (flag) {
			return true;
		}
		else {
			return temp_flag;
		}
	}




	/** capacity add remove for filter start **/
	$scope.capacityFilter = function(capacity_model, cap) {

		//if model true then add to total_capacity
		if ($scope[capacity_model]) {
			$scope.total_capacity.push(cap);
		}
		else {
			//if model false then remove from total_capacity
			var old_total_capacity = $scope.total_capacity;
			$scope.total_capacity = [];
			angular.forEach(old_total_capacity, function(tc) {
				if (tc != cap) $scope.total_capacity.push(tc);
			});
		}

	}
	/** capacity add remove for filter end **/





});

