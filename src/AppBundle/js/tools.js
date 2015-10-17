(function($, ng) {
    var dmTools = ng.module('dmTools', []);
  
    dmTools.controller('appMenu', function($scope, $http) {
    
      $scope.loadCreatureCreator = function() {
        $(".app").hide();
        $("#creatureCreator").toggle('slide', {direction: 'right', duration: 500});
        $(".AppMenuButton").removeClass("btn-primary");
        $("#loadCreatureCreator").addClass("btn-primary");
      }
      
      $scope.loadEncounterBuilder = function() {
        $(".app").hide();
        $("#encounterBuilder").toggle('slide', {direction: 'right', duration: 500});
        $(".AppMenuButton").removeClass("btn-primary");
        $("#loadEncounterBuilder").addClass("btn-primary");
      }
      
      $scope.loadReferenceManual = function() {
        $(".app").hide();
        $("#referenceManual").toggle('slide', {direction: 'right', duration: 500});
        $(".AppMenuButton").removeClass("btn-primary");
        $("#loadReferenceManual").addClass("btn-primary");
      }
      
      $scope.loadInitTracker = function() {
        $(".app").hide();
        $("#initTracker").toggle('slide', {direction: 'right', duration: 500});
        $(".AppMenuButton").removeClass("btn-primary");
        $("#loadInitTracker").addClass("btn-primary");
      }
      
      $scope.loadDmJournal = function() {
        $(".app").hide();
        $("#dmJournal").toggle('slide', {direction: 'right', duration: 500});
        $(".AppMenuButton").removeClass("btn-primary");
        $("#loadDmJournal").addClass("btn-primary");
      }
      
      $scope.loadDiceRoller = function() {
        $(".app").hide();
        $("#diceRoller").toggle('slide', {direction: 'right', duration: 500});
        $(".AppMenuButton").removeClass("btn-primary");
        $("#loadDiceRoller").addClass("btn-primary");
      }
      
      $scope.loadDungeonMap = function() {
        $(".app").hide();
        $("#dungeonMap").toggle('slide', {direction: 'right', duration: 500});
        $(".AppMenuButton").removeClass("btn-primary");
        $("#loadDungeonMap").addClass("btn-primary");
      }
      
      $scope.init = function() {
        //Assign callbacks
        $("#sidebar").addClass('hidden');
        $("#main").removeClass('col-md-10').addClass('col-md-12');
        $("#loadCreatureCreator").click($scope.loadCreatureCreator);
        $("#loadEncounterBuilder").click($scope.loadEncounterBuilder);
        $("#loadReferenceManual").click($scope.loadReferenceManual);
        $("#loadInitTracker").click($scope.loadInitTracker);
        $("#loadDmJournal").click($scope.loadDmJournal);
        $("#loadDiceRoller").click($scope.loadDiceRoller);
        $("#loadDungeonMap").click($scope.loadDungeonMap);
      }
    });
    
    dmTools.controller('creatureCreator', function($scope, $http) {
      $scope.creatures = [];
      $scope.creature = {};
      
      $scope.getAllCreatures = function() {
        $http.get(loadallpath).success(function(data) {
            $scope.creatures = JSON.parse(data);
            $("#creatureLoad").dataTable({
                    'data': $scope.creatures,
                });
        });
      }
      $scope.init = function() {
        $scope.getAllCreatures();
      }
    });
    
    dmTools.controller('encounterBuilder', function($scope, $http) {
      
    });
    
    dmTools.controller('referenceManual', function($scope, $http) {
      
    });
    
    dmTools.controller('initTracker', function($scope, $http) {
      
    });
    
    dmTools.controller('dmJournal', function($scope, $http) {
      
    });
    
    dmTools.controller('diceRoller', function($scope, $http) {
      
    });
    
    dmTools.controller('dungeonMap', function($scope, $http) {
      
    });
})(jQuery, angular);