angular.module('your_app_name.checkout.services', [])

.service('CheckoutService', function ($http, $q, appConfig){

  this.getUserCreditCards = function(){
    var dfd = $q.defer();
    $http.get('logged_user_db.json').success(function(database) {
      dfd.resolve(database.user.credit_cards);
    });
    return dfd.promise;
  };

  this.getUserShippingAddresses = function(){
    var dfd = $q.defer();
    $http.get('logged_user_db.json').success(function(database) {
      dfd.resolve(database.user.shipping_addresses);
    });
    return dfd.promise;
  };

  this.saveUserSelectedCard = function(card){
    window.localStorage.your_app_name_selected_card = JSON.stringify(card);
  }
  this.saveUserSelectedAddress = function(address){
    window.localStorage.your_app_name_selected_address = JSON.stringify(address);
  }
  this.getUserSelectedCard = function(){
    return JSON.parse(window.localStorage.your_app_name_selected_card || '[]');
  };
  this.getUserSelectedAddress = function(){
    return JSON.parse(window.localStorage.your_app_name_selected_address || '[]');
  };

  this.order = function(products, address, tax, total){
    var dfd = $q.defer();
    var clientId = 2;
    var items =[];
    for(var i = 0 ; i<products.length ; i++){
      var item = {product_id: products[i].id,
                  quantity: products[i].qty,
                  price: products[i].price,
                };
      items.push(item);
    }

    $http({
    method: 'POST',
    url: appConfig.DOMAIN_URL + '/wp-json/wc/v1/orders' ,
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    paramSerializer: '$httpParamSerializerJQLike',
    params: {
          consumer_key: appConfig.KEY,
          consumer_secret: appConfig.SECRET_KEY,
          line_items: items,
          customer_id: clientId,
          total: total,
          status: 'completed',
          shipping: {
              first_name: address.full_name,
              address_1: address.street,
              city: address.city,
              postcode: address.postal_code,
              state: address.state
            },
          shipping_lines: [
            {
              method_id: 'flat_rate',
              method_title: 'Flat Rate',
              total: tax
            }
          ]
        }
    })
    .then(function(res){
      dfd.resolve(res);
    }, function(error){
      dfd.reject(error);
    })
    return dfd.promise;
  }
})

;
