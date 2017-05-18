angular.module('your_app_name.feed.controllers', [])

.controller('FeedCtrl', function($scope,  $ionicScrollDelegate, ShoppingCartService) {
	$scope.getProductsInCart = function(){
		return ShoppingCartService.getProducts().length;
	};
})

.controller('FashionCtrl', function($scope, $stateParams, products, category, FashionService) {
	$scope.filters = $stateParams.filters;

	$scope.products = products.products.data;

	$scope.page = 1;

	$scope.loadMoreData = function(){
	 $scope.page += 1

	 FashionService.getProducts($scope.page, 'title', category)
	 .then(function(data){

		 $scope.products = $scope.products.concat(data.products.data);

		 $scope.$broadcast('scroll.infiniteScrollComplete');
	 });
 };

	$scope.moreDataCanBeLoaded = function(){
		return products.pages >= $scope.page;
	}
})

;
