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
      $scope.creatureModel = function() {
          this.id = 0;
          this.attacks = [];
        };
      $scope.creature = new $scope.creatureModel();
      $scope.creatureSelect = 0;
      
      $scope.loadCreature = function(id) {
        if (id == undefined) {
          id = $("input[name='creature']:checked").val();
        }
        var load = loadpath.slice(0,-1) + id;
        $http.get(load).success(function(data) {
          $scope.creature = data;
        });
      }
      
      $scope.newChar = function() {
          $scope.creature = new $scope.creatureModel();
      }
      
      $scope.saveCreature = function() {
        var update = updatepath.slice(0,-1) + $scope.creature.id;
        $http.post(update, $scope.creature).success(function() {
          $scope.getAllCreatures();
        });
      }
      
      $scope.deleteCreature = function(id) {
        if (id == undefined) {
          id = $("input[name='creature']:checked").val();
        }
        var del = deletepath.slice(0,-1) + id;
        $http.get(del).success(function() {
          $scope.getAllCreatures();
        });
      }
      
      $scope.getAllCreatures = function() {
        $http.get(loadallpath).success(function(data) {
            $scope.creatures = data;
            var tabledata = [];
            for(var x = 0; x < $scope.creatures.length; x++) {
                tabledata.push([
                        "<input type='radio' name='creature' value='" + $scope.creatures[x].id + "' />",
                        $scope.creatures[x].name,
                        $scope.creatures[x].race,
                        $scope.creatures[x].classlevel,
                        $scope.creatures[x].background,
                        $scope.creatures[x].alignment
                ]);
            }
            if ($.fn.dataTable.isDataTable('.creatureLoad')) {
              var table = $('.creatureLoad').dataTable();
              table.fnClearTable();
              table.fnAddData(tabledata);
            }
            else {
              var table = $(".creatureLoad").dataTable({
                'data': tabledata,
                'columns': [
                  { title: "select" },
                  { title: "name" },
                  { title: "race" },
                  { title: "class/level" },
                  { title: "background" },
                  { title: "alignment" }
                ]
              });              
            }
        });
      }
      
      $scope.addAttack = function() {
        $scope.creature.attacks.push({attack: "", bonus: 0, damage: ""});
      }
      $scope.init = function() {
        $scope.getAllCreatures();
      }
    });
    
    dmTools.controller('encounterBuilder', function($scope, $http) {
      $scope.creatures = [];
      $scope.addCreature = function() {

        var id = $("input[name='creature']:checked").val();

        var load = loadpath.slice(0,-1) + id;
        $http.get(load).success(function(data) {
          $scope.creatures.push(data);
        });        
      }
      
      $scope.removeCreature = function(id) {
        $scope.creatures.splice(id,1);
      }
      
      $scope.tabify = function() {
        $(".statblock").tabs();
        setTimeout($scope.tabify,3000);
      }
      
      $scope.init = function() {
        $scope.tabify();          
      }

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