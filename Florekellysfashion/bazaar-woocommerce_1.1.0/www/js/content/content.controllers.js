angular.module('your_app_name.content.controllers', [])


.controller('FashionContentCtrl', function($scope, $state, $ionicPopup, $rootScope, product, reviews, ShoppingCartService, $ionicLoading, $sce) {
	$scope.goBack = function() {
		var previous_view = _.last($rootScope.previousView);
		$state.go(previous_view.fromState, previous_view.fromParams );
  };

	$scope.product = product.data;
	$scope.images = product.data.images;
	$scope.showcase_images = product.data.images.slice(1);
	$scope.reviews = reviews.data;
	$scope.description = $sce.trustAsHtml($scope.product.description);

	angular.forEach(product.data.attributes, function(attr) {
		if(attr.name === 'color'){
			$scope.colors = attr.options;
		}
		if(attr.name === 'size'){
			$scope.size = attr.options;
		}
	});

	$scope.addToCart = function(product) {
		$ionicLoading.show({
			template: 'Adding to cart',
			duration: 1000
		});

		product.qty = 1;
		product.color = $scope.chosen_color;
		product.size = $scope.chosen_size;
  	ShoppingCartService.addProduct(product);
  };

	var colorPopup = {},
			sizePopup = {};

	$scope.chosen_color = $scope.colors[0];
	$scope.chosen_size = $scope.size[0];

	$scope.openColorChooser = function(){
		colorPopup = $ionicPopup.show({
			cssClass: 'popup-outer color-chooser-view',
			templateUrl: 'views/content/fashion/color-chooser.html',
			scope: angular.extend($scope, {chosen_color: $scope.chosen_color}, {colors: $scope.colors}),
			title: 'Color',
			buttons: [
				{ text: 'Close', type: 'close-popup' }
			]
		});
	};

	$scope.openSizeChooser = function(){
		sizePopup = $ionicPopup.show({
			cssClass: 'popup-outer size-chooser-view',
			templateUrl: 'views/content/fashion/size-chooser.html',
			scope: angular.extend($scope, {chosen_size: $scope.chosen_size}, {size: $scope.size}),
			title: 'Size',
			buttons: [
				{ text: 'Close', type: 'close-popup' }
			]
		});
	};
})

;
