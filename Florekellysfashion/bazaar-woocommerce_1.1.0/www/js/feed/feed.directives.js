angular.module('your_app_name.feed.directives', [])

.directive('slidingList', function($ionicScrollDelegate, $rootScope, $state) {
	return {
		restrict: 'E',
		transclude: true,
		scope: {},
		controller: function($scope, $element, $attrs) {
			var items = $scope.items = [],
					active_class = $scope.active_class = "",
					utils = this;

			var stateChangeListener = $scope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams){

				if(fromState.name.indexOf('main.app.feed')==-1 && toState.name.indexOf('main.app.feed')>=0)
				{
					var selected_item = utils.getSelectedItem(),
							previous_item = utils.getItem(toState.name);

					if(selected_item.state != previous_item.state)
					{
						$scope.$broadcast("item-selected", previous_item);
					}
					else
					{
						// Then, we should not re animate the sliding tabs
					}
				}
			});

			$scope.$on('$destroy', function() {
			  // Do cleanup work
				//destroing feed directives scope, should clean up
				stateChangeListener();
			});

			this.selectItem = function(item){
				angular.forEach(items, function(item) {
					item.selected = false;
				});
				item.selected = true;
				$scope.active_class = item.state;
				console.log("item selected", item.state);
			};

			$scope.$on("item-selected", function(event, item){
				utils.selectItem(item);

				var scroll = $element[0].querySelector('.scroll');
				var vw = scroll.clientWidth,
						scroll_to = (item.position.left - ((vw/2) - (item.position.width/2)));
				$ionicScrollDelegate.$getByHandle('sliding-list-scroll').scrollTo(scroll_to, 0, true);

				console.log("fixing safari lazy repaint bug");
				// Hack to prevent white screen on safari ios caused by safari lazy repaint bug
				$element[0].style.display='none';
				$element[0].offsetHeight; // no need to store this anywhere, the reference is enough
				$element[0].style.display='block';
			});

			this.addItem = function(item) {
				if (items.length === 0) {
					console.log("The state is: ", $state.current.name);
				}
				item.index = items.length || 0;
				items.push(item);
				// Check if item is current state
				if($state.current.name == item.state)
				{
					console.log("The item is the same as the state. ITEM => ", item);
					$scope.$broadcast("item-selected", item);
				}
			};

			this.getItem = function(item_state){
				var selected_item = {};
				angular.forEach(items, function(item) {
					if(item.state == item_state)
					{
						selected_item = item;
					}
				});
				return selected_item;
			};

			this.getSelectedItem = function(){
				var selected_item = {};
				angular.forEach(items, function(item) {
					if(item.selected)
					{
						selected_item = item;
					}
				});
				return selected_item;
			};
		},
		link: function(scope, element, attr, slidingListCtrl) {},
		templateUrl: 'views/feed/templates/sliding-list.html'
	};
})

.directive('centerEdges', function(){
	return {
		priority: 100,
		scope: {},
		link: function(scope, element, attr){
			var list_items = element.children(),
					list_items_count = list_items.length,
					first_child = list_items[0],
					last_child = list_items[list_items_count-1],
					before = angular.element('<li/>'),
					after = angular.element('<li/>');

			before.css('width', 'calc(50vw - '+(first_child.clientWidth/2)+'px)');
			after.css('width', 'calc(50vw - '+(last_child.clientWidth/2)+'px)');
			element.prepend(before);
			element.append(after);
		},
		restrict: 'A'
	};
})

.directive('slidingItem', function($ionicPosition, $timeout) {
	return {
		restrict: 'E',
		require: '^slidingList',
		transclude: true,
		replace: true,
		scope: {
			state: '@'
		},
		controller: function($scope, $element, $attrs) {
			$scope.select = function(item){
				$scope.$emit("item-selected", item);
			};
		},
		link: function(scope, element, attr, slidingListCtrl) {
			// Get position and add the item to the parent's controller
			var list_item = element,
					item_position = {};
			$timeout(function(){
				item_position = $ionicPosition.position(list_item);
				scope.position = item_position;
				slidingListCtrl.addItem(scope);
			}, 0);

		},
		templateUrl: 'views/feed/templates/sliding-item.html'
	};
})



;
