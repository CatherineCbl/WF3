angular.module('your_app_name.account.services', [])

.service('OrderService', function ($http, $q, appConfig){

  this.getUserOrders = function(){
    var dfd = $q.defer();
    //If we have more than one customer, add customer property into params
    $http.get( appConfig.DOMAIN_URL + '/wp-json/wc/v1/orders', {
      params: { consumer_key: appConfig.KEY,
              consumer_secret: appConfig.SECRET_KEY,
              per_page: 24,
              }
            })
            .then(function(orders){
              dfd.resolve(orders);
            }, function(error){
              dfd.reject(error);
            })
    return dfd.promise;
  };

  this.getProductImage = function(productId){
    var deferred = $q.defer();
    $http.get( appConfig.DOMAIN_URL + '/wp-json/wc/v1/products/' + productId, {
    params: { consumer_key: appConfig.KEY,
              consumer_secret: appConfig.SECRET_KEY
            }
    })
    .then(function(res){
      deferred.resolve(res.data.images[0].src);
    }, function(error){
      deferred.reject(error);
    })
    return deferred.promise;
  };

  this.getOrderProducts = function(order){
    var dfd = $q.defer();

    $http.get('fashion_db.json').success(function(database) {
      //add product data to this order
      var products = _.map(order.products, function(product){
        return _.find(database.products, function(p){ return p.id == product.id; });
      });
      dfd.resolve(products);
    });

    return dfd.promise;
  };

})



.service('ProfileService', function ($http, $q){
  this.getUserData = function(){
    var dfd = $q.defer();
    $http.get('logged_user_db.json').success(function(database) {
      dfd.resolve(database.user);
    });
    return dfd.promise;
  };
})

;
