angular.module('your_app_name.feed.services', [])


.service('FashionService', function ($http, $q, appConfig){

  this.getProducts = function(actual_page, sort, category){

    var dfd = $q.defer();
    $http.get( appConfig.DOMAIN_URL + '/wp-json/wc/v1/products/', {
      params: { consumer_key: appConfig.KEY,
                consumer_secret: appConfig.SECRET_KEY,
                per_page: 6,
                page: actual_page,
                orderby: sort,
                order: 'asc',
                category: appConfig.CATEGORIES[category]

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
  };

  this.getProduct = function(productId){
    var dfd = $q.defer();
    var service = this;

    $http.get( appConfig.DOMAIN_URL + '/wp-json/wc/v1/products/' + productId, {
    params: { consumer_key: appConfig.KEY,
              consumer_secret: appConfig.SECRET_KEY
            }
    })
    .then(function(res){
      dfd.resolve(res);
    }, function(error){
      dfd.reject(error);
    });
    return dfd.promise;
  };

  this.getReviews = function(productId){
    var deferred = $q.defer();
    $http.get( appConfig.DOMAIN_URL + '/wp-json/wc/v1/products/' + productId + '/reviews' , {
    params: { consumer_key: appConfig.KEY,
              consumer_secret: appConfig.SECRET_KEY
            }
    })
    .then(function(res){
      deferred.resolve(res);
    }, function(error){
      deferred.reject(error);
    })
    return deferred.promise;
  }

  this.getProductWithRelate = function(productId){
    var dfd = $q.defer();
    var service = this;

    $http.get( appConfig.DOMAIN_URL + '/wp-json/wc/v1/products/' + productId, {
    params: { consumer_key: appConfig.KEY,
              consumer_secret: appConfig.SECRET_KEY
            }
    })
    .then(function(res){
      service.getRelatedProducts(res.data.related_ids)
      .then(function(related_products){
        res.data.related_products = related_products;
        dfd.resolve(res);
      },function(error){
        dfd.reject(error);
      })
    }, function(error){
      dfd.reject(error);
    });
    return dfd.promise;
  };

  this.getRelatedProducts = function(ids){
    var dfd = $q.defer(),
    service = this,
    related_promises = [],
    for_length = Math.min(2, ids.length);


    for(var i = 0; i<for_length ; i++){
      var product_promise = service.getProduct(ids[i]);
      related_promises.push(product_promise);
    }

    $q.all(related_promises)
    .then(function(products){
      dfd.resolve(products);
    },function(error){
      dfd.reject(error)
    })
    return dfd.promise;
  };
})

;
