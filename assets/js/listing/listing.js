var emApp = angular.module('emApp', []);

emApp.factory('sharedListing', ['$http', '$rootScope', function($http, $rootScope) {
	var list = [];

	return {
		getlist: function($params) {
			return $http({
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				url: base_url + 'node/getlistjson',
				method: "POST",
				data: $params,
			})
			.success(function(response) {
				list = response;
				$rootScope.$broadcast('handleListBroadcast', list);
				return list;
			});
		}
	};
}]);

emApp.config(function($provide, $routeProvider) {
	$provide.factory('$routeProvider', function () {
		return $routeProvider;
	});
}).run(function($routeProvider, $http) {
		$routeProvider.when('/', {
			templateUrl:  base_url + 'entity/listing',
			controller: 'ListingCtrl'
		}).when('/new', {
				templateUrl: base_url + 'entity',
				controller: 'addSiteController'
			}).when('/edit/:projectId', {
				templateUrl: base_url + 'sites/add',
				controller: 'editSiteController'
			}).when('/view/:projectId', {
				templateUrl: base_url + 'sites/view',
				controller: 'viewSiteController'
			}).otherwise({
				redirectTo: '/'
			});
	});

function ListingCtrl($scope, sharedListing) {
	//get all getListing
	$params = $.param({

	});

	$scope.total = 0;
	sharedListing.getlist($params).then(function(sharedListing) {
		$scope.list = sharedListing.data;
		angular.forEach($scope.list, function(value, key){
			$scope.total = $scope.total + parseInt(value.amount);
		});
	});
}