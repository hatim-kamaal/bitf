﻿(function () {
    'use strict';

    //, 'ngFacebook'
    //, 'datatables', 'ngResource',, 'ngTable'
    angular
        .module('app', ['ngRoute', 'ngCookies', 'ngTable'])
        .config(config)
        .run(run);

    //, '$facebookProvider'
    config.$inject = ['$routeProvider', '$locationProvider'];
    function config($routeProvider, $locationProvider) {
    	
    	//$facebookProvider.setAppId('1564484997178485');
    	
        $routeProvider
            .when('/', {
                controller: 'HomeController',
                templateUrl: 'view/home.view.html',
                controllerAs: 'vm'
            })
            .when('/login', {
                controller: 'LoginController',
                templateUrl: 'view/login.view.html',
                controllerAs: 'vm'
            })
            /*
            .when('/home', {
                controller: 'HomeController',
                templateUrl: 'view/home.view.html',
                controllerAs: 'vm'
            })
            */
            /*
            
            .when('/register', {
                controller: 'RegisterController',
                templateUrl: 'view/register.view.html',
                controllerAs: 'vm'
            })
            
		  .when('/store', {
			templateUrl: 'partials/store.htm',
			controller: storeController 
		  }).
		  when('/products/:productSku', {
			templateUrl: 'partials/product.htm',
			controller: storeController
		  }).
		  when('/cart', {
			templateUrl: 'partials/shoppingCart.htm',
			controller: storeController
		  })
            */
			
            .otherwise({ redirectTo: '/login' });
    }

    run.$inject = ['$rootScope', '$location', '$cookieStore', '$http','$window'];
    function run($rootScope, $location, $cookieStore, $http, $window) {
		
    	/*
    	(function(){
    	     // If we've already installed the SDK, we're done
    	     if (document.getElementById('facebook-jssdk')) {return;}

    	     // Get the first script element, which we'll use to find the parent node
    	     var firstScriptElement = document.getElementsByTagName('script')[0];

    	     // Create a new script element and set its id
    	     var facebookJS = document.createElement('script'); 
    	     facebookJS.id = 'facebook-jssdk';

    	     // Set the new script's source to the source of the Facebook JS SDK
    	     facebookJS.src = '//connect.facebook.net/en_US/all.js';

    	     // Insert the Facebook JS SDK into the DOM
    	     firstScriptElement.parentNode.insertBefore(facebookJS, firstScriptElement);
    	   }());
		*/
        // keep user logged in after page refresh
        $rootScope.globals = $cookieStore.get('globals') || {};
        if ($rootScope.globals.currentUser) {
            $http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.globals.currentUser.authdata; // jshint ignore:line
        }

        $rootScope.$on('$locationChangeStart', function (event, next, current) {
            // redirect to login page if not logged in and trying to access a restricted page
        	//'/',
            var restrictedPage = $.inArray($location.path(), [ '/login', '/register']) === -1;
            var loggedIn = $rootScope.globals.currentUser;
            if (restrictedPage && !loggedIn) {
                $location.path('/login');
            }
        });
    }

})();