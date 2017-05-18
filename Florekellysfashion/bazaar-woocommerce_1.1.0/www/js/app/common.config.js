angular.module('your_app_name.common.config', [])

.constant('appConfig', {
    DOMAIN_URL: 'YOUR_WOOCOMMERCE_DOMAIN_URL_GOES_HERE',
	  KEY: 'YOUR_KEY_GOES_HERE',
	  SECRET_KEY: 'YOUR_SECRET_KEY_GOES_HERE',
    CATEGORIES: {"WOMEN": 9, "MEN": 11, "KIDS": 25} // these are our categories, you should replace them with yours
})