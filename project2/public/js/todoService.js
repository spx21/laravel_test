var app = angular.module('Productervice', []);

app.factory('Productervice', ['$http', function($http) {
	var api_v1 = 'api/v1/';
	return {
		add: function (todoName) {
			var model = {
				TodoName: todoName
			}
			return $http.post(api_v1+'Product', model);
		},
		getAllCompletedProduct: function() {
			return $http.get(api_v1+'Product/completed');
		},
		getActiveProduct: function () {
			return $http.get(api_v1+'Product/active');
		},
		get: function () {
			return $http.get(api_v1+'Product');
		},
		update: function(id, isDone, todoName) {
			var model = {
				TodoName: todoName,
				IsDone: isDone
			}
			return $http.put(api_v1+'Product/'+id, model);
		}
	};
}]);