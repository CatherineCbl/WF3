angular.module('underscore', [])
.factory('_', function() {
  return window._; // assumes underscore has already been loaded on the page
});

angular.module('your_app_name', [
  'ionic',
  'ngSanitize',
  'your_app_name.views',
  'your_app_name.common.controllers',
  'your_app_name.common.directives',
  'your_app_name.common.config',

  'your_app_name.account.controllers',
  'your_app_name.account.services',

  'your_app_name.auth.controllers',
  'your_app_name.auth.services',

  'your_app_name.checkout.controllers',
  'your_app_name.checkout.services',

  'your_app_name.content.controllers',

  'your_app_name.feed.controllers',
  'your_app_name.feed.directives',
  'your_app_name.feed.filters',
  'your_app_name.feed.services',

  'your_app_name.sort.controllers',

  'your_app_name.filters.controllers',
  'your_app_name.filters.directives',

  'your_app_name.getting-started.controllers',
  'your_app_name.getting-started.directives',

  'your_app_name.search.controllers',
  'your_app_name.search.filters',
  'your_app_name.search.services',

  'your_app_name.shopping-cart.controllers',
  'your_app_name.shopping-cart.services',

  'underscore',
  'angularMoment',
  'ngRangeSlider',
  'angular-md5'
])

.run(function($ionicPlatform, amMoment, $rootScope, $ionicLoading) {
  $rootScope.previousView = [];

  $rootScope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams){
    var last_state = _.last($rootScope.previousView);

    if(last_state && (last_state.fromState === toState.name)){
      $rootScope.previousView.pop();
    }else{
      $rootScope.previousView.push({ "fromState": fromState.name, "fromParams": fromParams });
    }

    $ionicLoading.hide();
  });

  $rootScope.$on('$stateChangeStart', function () {
    console.log('please wait...');
    $ionicLoading.show({
      template:'<ion-spinner></ion-spinner>'
    });
  });

  $ionicPlatform.ready(function() {
    console.log("$ionicPlatform.ready");

    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);

    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }

    amMoment.changeLocale('en-gb');
  });
})

.config(function($ionicConfigProvider) {
  $ionicConfigProvider.tabs.position('bottom');
  $ionicConfigProvider.views.swipeBackEnabled(false);
  $ionicConfigProvider.form.checkbox('circle');

  if(!ionic.Platform.isWebView())
  {
    console.log("jsScrolling");
    $ionicConfigProvider.scrolling.jsScrolling(false);
  }
})

.config(function($stateProvider, $urlRouterProvider) {
  $stateProvider

  .state('intro', {
    url: '/intro',
    abstract: true,
    templateUrl: 'views/common/intro.html'
  })

      .state('intro.walkthrough-welcome', {
        url: '/walkthrough-welcome',
        views: {
          'intro-view@intro': {
            templateUrl: 'views/walkthrough/welcome.html'
          }
        }
      })

      .state('intro.walkthrough-learn', {
        url: '/walkthrough-learn',
        views: {
          'intro-view@intro': {
            templateUrl: 'views/walkthrough/learn.html',
            controller: 'GettingStartedCtrl'
          }
        }
      })

      .state('intro.auth-login', {
        url: '/auth-login',
        views: {
          'intro-view@intro': {
            templateUrl: 'views/auth/login.html',
            controller: 'LoginCtrl'
          }
        }
      })

      .state('intro.auth-signup', {
        url: '/auth-signup',
        views: {
          'intro-view@intro': {
            templateUrl: 'views/auth/signup.html',
            controller: 'SignupCtrl'
          }
        }
      })

      .state('intro.auth-forgot-password', {
        url: '/forgot-password',
        views: {
          'intro-view@intro': {
            templateUrl: 'views/auth/forgot-password.html',
            controller: 'ForgotPasswordCtrl'
          }
        }
      })

  .state('main', {
    url: '/main',
    abstract: true,
    templateUrl: 'views/common/main.html'
  })

      .state('main.app', {
        url: '/app',
        abstract: true,
        views: {
          'main-view@main': {
            templateUrl: 'views/common/app.html',
            controller: 'AppCtrl'
          }
        },
        resolve: {
          logged_user: function(AuthService){
            return AuthService.getLoggedUser();
          }
        }
      })

          .state('main.app.filters', {
            url: '/filters',
            views: {
              'main-view@main': {
                templateUrl: 'views/filters/filters.html',
                controller: 'FiltersCtrl'
              }
            }
          })

          .state('main.app.feed', {
            url: '/feed',
            views: {
              'app-feed@main.app': {
                templateUrl: 'views/feed/feed.html',
                controller: 'FeedCtrl'
              }
            }
          })

              .state('main.app.feed.featured', {
                url: '/fashion/featured',
                views: {
                  'category-feed@main.app.feed': {
                    templateUrl: 'views/feed/fashion.html',
                    controller: 'FashionCtrl'
                  }
                },
                resolve: {
                  products: function(FashionService){
                    console.log("resolving [featured] fashion products");
                    return FashionService.getProducts(1, 'title');
                  },
                  category: function(){
                    return undefined;
                  }
                }
              })
              .state('main.app.feed.women', {
                url: '/fashion/women',
                views: {
                  'category-feed@main.app.feed': {
                    templateUrl: 'views/feed/fashion.html',
                    controller: 'FashionCtrl'
                  }
                },
                resolve: {
                  products: function(FashionService){
                    console.log("resolving [women] fashion products");
                    return FashionService.getProducts(1, 'title', 'WOMEN');
                  },
                  category: function(){
                    return 'WOMEN'
                  }
                }
              })
              .state('main.app.feed.men', {
                url: '/fashion/men',
                views: {
                  'category-feed@main.app.feed': {
                    templateUrl: 'views/feed/fashion.html',
                    controller: 'FashionCtrl'
                  }
                },
                resolve: {
                  products: function(FashionService){
                    console.log("resolving [men] fashion products");
                    return FashionService.getProducts(1, 'title', 'MEN');
                  },
                  category: function(){
                    return 'MEN';
                  }
                }
              })
              .state('main.app.feed.kids', {
                url: '/fashion/kids',
                views: {
                  'category-feed@main.app.feed': {
                    templateUrl: 'views/feed/fashion.html',
                    controller: 'FashionCtrl'
                  }
                },
                resolve: {
                  products: function(FashionService){
                    console.log("resolving [kids] fashion products");
                    return FashionService.getProducts(1, 'title', 'KIDS');
                  },
                  category: function(){
                    return 'KIDS';
                  }
                }
              })
              .state('main.app.feed.fashion', {})

                  .state('main.app.feed.fashion.content', {
                    url: '/content/:productId',
                    views: {
                      'main-view@main': {
                        templateUrl: 'views/content/fashion.html',
                        controller: 'FashionContentCtrl'
                      }
                    },
                    resolve: {
                      product: function(FashionService, $stateParams){
                        return FashionService.getProductWithRelate($stateParams.productId);
                      },
                      reviews: function(FashionService, $stateParams){
                        return FashionService.getReviews($stateParams.productId);
                      },
                    }
                  })

          .state('main.app.search', {
            url: '/search',
            views: {
              'app-search@main.app': {
                templateUrl: 'views/search/search.html',
                controller: 'SearchCtrl'
              }
            },
          })

          .state('main.app.account', {
            url: '/account',
            views: {
              'app-account@main.app': {
                templateUrl: 'views/account/account.html'
              }
            }
          })

              .state('main.app.account.profile', {
                url: '/profile',
                views: {
                  'my-profile@main.app.account': {
                    templateUrl: 'views/account/profile.html',
                    controller: 'ProfileCtrl'
                  }
                },
                resolve: {
                  user: function(ProfileService){
                    return ProfileService.getUserData();
                  }
                }
              })

              .state('main.app.account.orders', {
                url: '/orders',
                views: {
                  'my-orders@main.app.account': {
                    templateUrl: 'views/account/orders.html',
                    controller: 'OrdersCtrl'
                  }
                },
                resolve: {
                  orders: function(OrderService){
                    return OrderService.getUserOrders();
                  }
                }
              })

          .state('main.app.shopping-cart', {
            url: '/shopping-cart',
            views: {
              'main-view@main': {
                templateUrl: 'views/shopping-cart/cart.html',
                controller: 'ShoppingCartCtrl'
              }
            },
            resolve: {
              products: function(ShoppingCartService){
                return ShoppingCartService.getProducts();
              }
            }
          })

          .state('main.app.checkout', {
            url: '/checkout',
            views: {
              'main-view@main': {
                templateUrl: 'views/checkout/checkout.html',
                controller: 'CheckoutCtrl'
              }
            },
            resolve: {
              products: function(ShoppingCartService){
                return ShoppingCartService.getProducts();
              }
            }
          })

              .state('main.app.checkout.address', {
                url: '/address',
                views: {
                  'main-view@main': {
                    templateUrl: 'views/checkout/address.html',
                    controller: 'CheckoutAddressCtrl'
                  }
                },
                resolve: {
                  user_shipping_addresses: function(CheckoutService){
                    return CheckoutService.getUserShippingAddresses();
                  }
                }
              })

              .state('main.app.checkout.card', {
                url: '/card',
                views: {
                  'main-view@main': {
                    templateUrl: 'views/checkout/card.html',
                    controller: 'CheckoutCardCtrl'
                  }
                },
                resolve: {
                  user_credit_cards: function(CheckoutService){
                    return CheckoutService.getUserCreditCards();
                  }
                }
              })

              .state('main.app.checkout.promo-code', {
                url: '/promo-code',
                views: {
                  'main-view@main': {
                    templateUrl: 'views/checkout/promo-code.html',
                    controller: 'CheckoutPromoCodeCtrl'
                  }
                }
              })

              .state('main.app.checkout.thanks', {
                url: '/thanks',
                views: {
                  'main-view@main': {
                    templateUrl: 'views/checkout/thanks.html'
                  }
                }
              })
  ;

  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/intro/walkthrough-welcome');
});
