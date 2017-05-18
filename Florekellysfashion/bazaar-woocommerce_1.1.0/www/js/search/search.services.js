angular.module('your_app_name.search.services', [])

.service('SearchService', function ($http, $q, appConfig){

  this.getProducts = function(query, actual_page){
    var dfd = $q.defer();
    $http.get( appConfig.DOMAIN_URL + '/wp-json/wc/v1/products/', {
      params: { consumer_key: appConfig.KEY,
                consumer_secret: appConfig.SECRET_KEY,
                per_page: 6,
                page: actual_page,
                search: query
              }
      })
      .then(function(res){
        var products = {products: res,
                        pages: res.headers('X-WP-TotalPages')}
        dfd.resolve(products);
      }, function(error){
        dfd.reject(error);
      });

    return dfd.promise;
  }
})

;
