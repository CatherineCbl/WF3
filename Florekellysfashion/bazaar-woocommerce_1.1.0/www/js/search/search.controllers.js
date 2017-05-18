angular.module('your_app_name.search.controllers', [])

.controller('SearchCtrl', function($scope, SearchService, $ionicLoading, $timeout) {

	$scope.search = {};
	$scope.search.query = '';
	$scope.products = [];
	$scope.currentSearch = '';
	$scope.totalPages = 0;
	$scope.page = 1;

	$scope.doSearch = function(){
		$scope.totalPages = 0;
		$scope.page = 1;
		$scope.currentSearch = $scope.search.query;
		$ionicLoading.show({
      template: 'Loading...'
    });
		SearchService.getProducts($scope.currentSearch, $scope.page)
		.then(function(res){
			$scope.products = res.products.data;
			$scope.totalPages = res.pages;
			$ionicLoading.hide();
			if($scope.products.length === 0)
			{
				$scope.search_error = "No products found for that query";
				// Hide after 3 seconds
				$timeout(function(){
					$scope.search_error = '';
				}, 3000);
			}
		}, function(error){
			console.log(error);
			$scope.search_error = "There was an error";
			// Hide after 3 seconds
			$timeout(function(){
				$scope.search_error = '';
			}, 3000);
			$ionicLoading.hide();
		})
	};


	$scope.loadMoreData = function(){
	 $scope.page += 1

	 SearchService.getProducts($scope.currentSearch, $scope.page)
	 .then(function(data){

		 $scope.products = $scope.products.concat(data.products.data);

		 $scope.$broadcast('scroll.infiniteScrollComplete');
	 });
 };

	$scope.moreDataCanBeLoaded = function(){
			return $scope.totalPages >= $scope.page;
	}
})


;
