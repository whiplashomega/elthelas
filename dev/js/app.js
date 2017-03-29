/*globals jQuery angular */
"use strict";

(function($, ng) {
    var elthelas = ng.module('elthelas' ,['ui.router']);
    
    elthelas.config(function($stateProvider, $urlRouterProvider) {
       $stateProvider.state('app', {
           url:'/',
           views: {
               'header': {
                   templateUrl: '/html/partials/header.html',
               },
               'footer': {
                   templateUrl: '/html/partials/footer.html',
               },
               'content': {
                   templateUrl: '/html/home.html',
               }
           }
       });
    });
        
    
})(jQuery, angular);