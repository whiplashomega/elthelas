"use strict";

/*global angular*/
(function(ng) {
    var spotify = ng.module("spotify", []).controller("spotify-search", function($scope, $http) {
        //our query
        $scope.query = "";
        
        //artists take the form { image: string(uri), name: string, url: string(uri), popularity: int, genres: array} and are brought in as json from getArtists.php
        $scope.artists = [];
        
        //the genre list, compiled when the search results are returned.
        $scope.genres = [];
        
        //function attached to the 'submit' button's click event.  Triggers an asynchronous request to getArtists.php
        $scope.searchSpotify = function() {
            $scope.genres = [];
            if ($scope.query !== "") {
                $http.get("getArtists.php?q="+$scope.query).success(function(data) {
                   $scope.artists = data; 
                   $scope.artists.sort(function(a, b) {
                       if(a.name > b.name) {
                           return 1;
                       } else if(b.name > a.name) {
                           return -1;
                       } else if(a.popularity > b.popularity) {
                           return -1;
                       } else if(b.popularity > a.popularity) {
                           return 1;
                       }
                       return 0;
                   });
                   
                    //time to extract the genre information
                    var genrenames = [];
                    var genrecounts = [];
                    for(var x = 0; x < $scope.artists.length; x++) {
                       for(var y = 0; y < $scope.artists[x].genres.length; y++) {
                           var ind = genrenames.indexOf($scope.artists[x].genres[y]);
                           if(ind !== -1) {
                               genrecounts[ind] += 1;
                           } else {
                               genrenames.push($scope.artists[x].genres[y]);
                               genrecounts.push(1);
                           }
                       }
                   }
                   for(var y = 0; y < genrenames.length; y++) {
                       $scope.genres.push({name: genrenames[y], count: genrecounts[y]});
                   }
                }).error(function(data) {
                    console.log(data);
                });
            } else {
                $scope.artists = [];
            }
        };
        
        $scope.popularitySort = function() {
            $scope.artists.sort(function(a, b) {
                       if(a.popularity > b.popularity) {
                           return -1;
                       } else if(b.popularity > a.popularity) {
                           return 1;
                       } else if(a.name > b.name) {
                           return 1;
                       } else if(b.name > a.name) {
                           return -1;
                       }
                       return 0;
                   });
        };
        
        $scope.nameSort = function() {
            $scope.artists.sort(function(a, b) {
               if(a.name > b.name) {
                   return 1;
               } else if(b.name > a.name) {
                   return -1;
               } else if(a.popularity > b.popularity) {
                   return -1;
               } else if(b.popularity > a.popularity) {
                   return 1;
               }
               return 0;
            });            
        }
    });
})(angular);