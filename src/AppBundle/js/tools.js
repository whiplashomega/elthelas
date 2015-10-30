(function($, ng) {
    var dmTools = ng.module('dmTools', []);
    
    //We'll go ahead and use jQuery and jQuery UI to initialize our layout space before we get into the meat of the various angular controllers.
    $("#content").tabs();
    $("#main").addClass("col-md-12").removeClass("col-md-10");
    $("#sidebar").addClass("hidden");
    
    dmTools.controller('creatureCreator', function($scope, $http) {
      $scope.creatures = [];
      $scope.creatureModel = function() {
          this.id = 0;
          this.attacks = [];
        };
      $scope.creature = new $scope.creatureModel();
      $scope.creatureSelect = 0;
      $scope.alertcontent = "";
      $scope.loadCreature = function(id) {
        if (id == undefined) {
          id = $("input[name='creature']:checked").val();
        }
        var load = loadpath.slice(0,-1) + id;
        $http.get(load).success(function(data) {
          $scope.alertcontent = "Loaded Successfully!";
          $scope.creature = data;
          setTimeout(function() {
            $scope.alertcontent = "";
          }, 10000);
        });
      }
      
      $scope.newChar = function() {
          $scope.creature = new $scope.creatureModel();
      }
      
      $scope.saveCreature = function() {
        var update = updatepath.slice(0,-1) + $scope.creature.id;
        $http.post(update, $scope.creature).success(function() {
          $scope.alertcontent = "Saved Successfully!";
          $scope.getAllCreatures();
          SetTimeout(function() {
            $scope.alertcontent = "";
          }, 10000);
        });
      }
      
      $scope.deleteCreature = function(id) {
        if (id == undefined) {
          id = $("input[name='creature']:checked").val();
        }
        var del = deletepath.slice(0,-1) + id;
        $http.get(del).success(function() {
          $scope.alertcontent = "Deleted Successfully!";
          $scope.getAllCreatures();
          SetTimeout(function() {
              $scope.alertcontent = "";
            }, 10000);
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
                  { width: '10%', title: "select" },
                  { width: '20%', title: "name" },
                  { width: '20%', title: "race" },
                  { width: '20%', title: "class/level" },
                  { width: '15%', title: "background" },
                  { width: '15%', title: "alignment" }
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
      
      $scope.refreshList = function() {
        $http.get(loadallpath).success(function (creatures) {
            var tabledata = [];
            for(var x = 0; x < creatures.length; x++) {
                tabledata.push([
                        "<input type='radio' name='creature' value='" + creatures[x].id + "' />",
                        creatures[x].name,
                        creatures[x].race,
                        creatures[x].classlevel,
                        creatures[x].background,
                        creatures[x].alignment
                ]);
            }
          var table = $("#encounterTable").dataTable();
          table.fnClearTable();
          table.fnAddData(tabledata);          
        })

      }
      
      $scope.init = function() {
        $scope.tabify();          
      }

    });

    dmTools.controller('referenceManual', function($scope, $http) {
      $scope.spelllist = spells;

      $scope.loadspell = function() {
        var index = $("input[name='spellselect']:checked").val();
        $scope.content = $("#selectedspell").html(marked($scope.spelllist[index][2]));
      }
      $scope.loadtaglist = function(tag) {
        
      }
      $scope.loadspells = function() {
        var tabledata = [];
        for(x in $scope.spelllist) {
            $scope.spelllist[x][1] = $scope.spelllist[x][1].replace("[","").replace("]","");
            $scope.spelllist[x][1] = $scope.spelllist[x][1].split(',');
            tabledata.push([
               "<input type='radio' name='spellselect' value='" + x + "' />",
               $scope.spelllist[x][0],
               $scope.spelllist[x][1].join(),
               $scope.spelllist[x][1][$scope.spelllist[x][1].length-1]
            ]);
        }
        var table = $("#spelltable").dataTable({
            'data': tabledata,
            'columns': [
                { width: '10%', title: "select" },
                { width: '40%', title: "title" },
                { width: '25%', title: "tags" },
                { width: '15%', title: "level"}
            ]
        });
      };
      $scope.init = function() {
        $("#refdiv").tabs();
        $scope.loadspells();
      };
    });
    
    dmTools.controller('charBuilder', function($scope, $http) {
      $scope.character = {
        charclass: {
            name: "",
            hitdie: 6,
            saves: [],
            features: [
              { level: 1, text: "" }
            ]
          },
        special: {
            name: "",
            features: [
              { level: 1, text: "" }
            ]
          },
        race: {
          name: "",
          str: 0,
          dex: 0,
          con: 0,
          intel: 0,
          wis: 0,
          cha: 0,
          size: "",
          speed: 0,
          otherspeed: 0,
          otherspeedtype: "",
          damageresistances: "",
          immunities: "",
          senses: "",
          traits: [
            ""
          ]          
        },
        background: {
          name: "",
          features: [
            ""
          ]
        },
        level: 1,
        str: 8,
        dex: 8,
        con: 8,
        intel: 8,
        wis: 8,
        cha: 8,
        skillproficiencies: [],
        armor: {
            name: "None",
            ac: 10,
            type: "light",          
        },
        shield: false,
      };
        $scope.creatureentry = {
          id: 0,
          name: "",
          race: "",
          classlevel: "",
          background: "",
          alignment: "",
          str: 0,
          dex: 0,
          con: 0,
          intel: 0,
          wis: 0,
          cha: 0,
          strsave: 0,
          dexsave: 0,
          consave: 0,
          intsave: 0,
          wissave: 0,
          chasave: 0,
          hpmax: 0,
          hitdice: 0,
          passiveperception: 0,
          acrobatics: 0,
          animalhandling: 0,
          arcana: 0,
          athletics: 0,
          deception: 0,
          history: 0,
          insight: 0,
          intimidation: 0,
          investigation: 0,
          medicine: 0,
          nature: 0,
          perception: 0,
          performance: 0,
          persuasion: 0,
          religion: 0,
          slightofhand: 0,
          stealth: 0,
          survival: 0,
          ac: 0,
          speed: "",
          attacks: [],
          possessions: "",
          features: "",
          physicaldescription: "",
          experience: 0,
          cr: 0,
          proficiencybonus: 0,
          damageresistances: "",
          immunities: "",
          senses: "",
          languages: ""
        }
      $scope.races = [
        {
          id: 0,
          name: "Celestial Aasimar",
          race: {
            name: "Celestial Aasimar",
            str: 0,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 2,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision 60ft",
            traits: [
              "6th Sense: Your connection to angelic beings gives you a sense for evil, like an itch at the back of your mind. Whenever someone within 60 ft of you is planning an evil deed to happen within the next 10 minutes, you can sense that such thoughts are taking place. However, you cannot tell who is thinking said thoughts or what they are planning from this sense alone. You do not need to be able to see or perceive the person thinking those thoughts to get the sense, and you do not get these feelings from creatures with an intelligence score of less than 3.",
              "Keen senses: You have advantage on perception checks.",
              "Godly Connection: You know the light cantrip from the cleric list, and can cast it at will. You also know one first level spell from the cleric list, after you cast it, you must complete a short or long rest before you can cast it again. Wisdom is your casting stat for this spell."
            ]
          }
        },
        {
          id: 1,
          name: "Child of Molton",
          race: {
            name: "Child of Molton",
            str: 0,
            dex: 2,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 2,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "fire",
            immunities: "",
            senses: "Darkvision 120ft",
            traits: [
              "Embodiment of Lust: You have advantage on charisma checks involved in a romantic encounter.",
            ]
          }
        },
        {
          id: 2,
          name: "Sorceron Blooded",
          race: {
            name: "Sorceron Blooded",
            str: 0,
            dex: 0,
            con: 0,
            intel: 2,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              "Natural Spellcaster: Choose two cantrips from the wizard spell list, you can cast these cantrips at will using Intelligence as your spellcasting stat. Additionally choose one 1st level spell from the wizard spell list, you know that spell inherently, however, once you cast it you must complete a short rest before you can cast it again.",
              "Master of the Arcane: You have advantage on Intelligence (Arcana) and Intelligence (History) checks."
            ]
          }
        },
        {
          id: 3,
          name: "Black/Copper Dragonborn",
          race: {
            name: "Black/Copper Dragonborn",
            str: 2,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "acid",
            immunities: "",
            senses: "",
            traits: [
              "Draconic Ancestry: You have draconic ancestry. Choose one type of dragon from the Draconic Ancestry table. Your breath weapon and damage resistance are determined by the dragon type, as shown in the table.",
              "Acid Breath Weapon: 5 by 30ft line, Dex Save.  You can use your action to exhale destructive energy. Your draconic ancestry determines the size, shape, and damage type of an exhalation. When you use your breath weapon, each creature in the area of the exhalation must make a saving throw, the type of which is determined by your draconic ancestry. The DC for this saving throw equals 8 + your Constitution modifier + your proficiency bonus. A creature takes 2d6 damage on a failed save, and half as much damage on a successful one. The damage increases to 3d6 at 6th level, 4d6 at 11th level, and 5d6 at 16th level. After you use your breath weapon you cannot use it again until after you complete a short or long rest.",
            ]
          }
        },
        {
          id: 4,
          name: "Blue/Bronze Dragonborn",
          race: {
            name: "Blue/Bronze Dragonborn",
            str: 2,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "lightning",
            immunities: "",
            senses: "",
            traits: [
              "Draconic Ancestry: You have draconic ancestry. Choose one type of dragon from the Draconic Ancestry table. Your breath weapon and damage resistance are determined by the dragon type, as shown in the table.",
              "Lightning Breath Weapon: 5 by 30ft line, Dex Save.  You can use your action to exhale destructive energy. Your draconic ancestry determines the size, shape, and damage type of an exhalation. When you use your breath weapon, each creature in the area of the exhalation must make a saving throw, the type of which is determined by your draconic ancestry. The DC for this saving throw equals 8 + your Constitution modifier + your proficiency bonus. A creature takes 2d6 damage on a failed save, and half as much damage on a successful one. The damage increases to 3d6 at 6th level, 4d6 at 11th level, and 5d6 at 16th level. After you use your breath weapon you cannot use it again until after you complete a short or long rest.",
            ]
          }
        },
        {
          id: 5,
          name: "Brass Dragonborn",
          race: {
            name: "Brass Dragonborn",
            str: 2,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "fire",
            immunities: "",
            senses: "",
            traits: [
              "Draconic Ancestry: You have draconic ancestry. Choose one type of dragon from the Draconic Ancestry table. Your breath weapon and damage resistance are determined by the dragon type, as shown in the table.",
              "Fire Breath Weapon: 5 by 30ft line, Dex Save.  You can use your action to exhale destructive energy. Your draconic ancestry determines the size, shape, and damage type of an exhalation. When you use your breath weapon, each creature in the area of the exhalation must make a saving throw, the type of which is determined by your draconic ancestry. The DC for this saving throw equals 8 + your Constitution modifier + your proficiency bonus. A creature takes 2d6 damage on a failed save, and half as much damage on a successful one. The damage increases to 3d6 at 6th level, 4d6 at 11th level, and 5d6 at 16th level. After you use your breath weapon you cannot use it again until after you complete a short or long rest.",
            ]
          }
        },
        {
          id: 6,
          name: "Gold/Red Dragonborn",
          race: {
            name: "Gold/Red Dragonborn",
            str: 2,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "fire",
            immunities: "",
            senses: "",
            traits: [
              "Draconic Ancestry: You have draconic ancestry. Choose one type of dragon from the Draconic Ancestry table. Your breath weapon and damage resistance are determined by the dragon type, as shown in the table.",
              "Fire Breath Weapon: 15 ft cone, Dex Save.  You can use your action to exhale destructive energy. Your draconic ancestry determines the size, shape, and damage type of an exhalation. When you use your breath weapon, each creature in the area of the exhalation must make a saving throw, the type of which is determined by your draconic ancestry. The DC for this saving throw equals 8 + your Constitution modifier + your proficiency bonus. A creature takes 2d6 damage on a failed save, and half as much damage on a successful one. The damage increases to 3d6 at 6th level, 4d6 at 11th level, and 5d6 at 16th level. After you use your breath weapon you cannot use it again until after you complete a short or long rest.",
            ]
          }
        },
        {
          id: 7,
          name: "Green Dragonborn",
          race: {
            name: "Green Dragonborn",
            str: 2,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "poison",
            immunities: "",
            senses: "",
            traits: [
              "Draconic Ancestry: You have draconic ancestry. Choose one type of dragon from the Draconic Ancestry table. Your breath weapon and damage resistance are determined by the dragon type, as shown in the table.",
              "Poison Breath Weapon: 15 ft cone, Con Save.  You can use your action to exhale destructive energy. Your draconic ancestry determines the size, shape, and damage type of an exhalation. When you use your breath weapon, each creature in the area of the exhalation must make a saving throw, the type of which is determined by your draconic ancestry. The DC for this saving throw equals 8 + your Constitution modifier + your proficiency bonus. A creature takes 2d6 damage on a failed save, and half as much damage on a successful one. The damage increases to 3d6 at 6th level, 4d6 at 11th level, and 5d6 at 16th level. After you use your breath weapon you cannot use it again until after you complete a short or long rest.",
            ]
          }
        },
        {
          id: 8,
          name: "Silver/White Dragonborn",
          race: {
            name: "Silver/White Dragonborn",
            str: 2,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "cold",
            immunities: "",
            senses: "",
            traits: [
              "Draconic Ancestry: You have draconic ancestry. Choose one type of dragon from the Draconic Ancestry table. Your breath weapon and damage resistance are determined by the dragon type, as shown in the table.",
              "Cold Breath Weapon: 15 ft cone, Con Save.  You can use your action to exhale destructive energy. Your draconic ancestry determines the size, shape, and damage type of an exhalation. When you use your breath weapon, each creature in the area of the exhalation must make a saving throw, the type of which is determined by your draconic ancestry. The DC for this saving throw equals 8 + your Constitution modifier + your proficiency bonus. A creature takes 2d6 damage on a failed save, and half as much damage on a successful one. The damage increases to 3d6 at 6th level, 4d6 at 11th level, and 5d6 at 16th level. After you use your breath weapon you cannot use it again until after you complete a short or long rest.",
            ]
          }
        },
        {
          id: 9,
          name: "Deep Dwarf",
          race: {
            name: "Deep Dwarf",
            str: 0,
            dex: 0,
            con: 1,
            intel: 0,
            wis: 2,
            cha: 0,
            size: "medium",
            speed: 25,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "poison",
            immunities: "",
            senses: "Darkvision 90 ft",
            traits: [
              "Your speed is not reduced by wearing heavy armor",
              "Dwarven Resilience: You have advantage on saving throws against poison, and you have resistance against poison damage.",
              "Dwarven Combat Training: You have proficiency with the battleaxe, handaxe, throwing hammer, and warhammer.",
              "Tool Proficiency: You gain proficiency with the artisan's tools of your choice: smith's tools, brewer's supplies, or mason's tools.",
              "Stonecunning: Whenever you make an intelligence(history) check related to the origin of stonework, you are considered proficient in the history skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus.",
              "Noble Blood: You gain proficiency in one skill of your choice choosing from persuasion, performance, intimidation, or deception."
            ]
          }
        },
        {
          id: 10,
          name: "Hill Dwarf",
          race: {
            name: "Hill Dwarf",
            str: 0,
            dex: 0,
            con: 2,
            intel: 0,
            wis: 1,
            cha: 0,
            size: "medium",
            speed: 25,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "poison",
            immunities: "",
            senses: "Darkvision 60 ft",
            traits: [
              "Your speed is not reduced by wearing heavy armor",
              "Dwarven Resilience: You have advantage on saving throws against poison, and you have resistance against poison damage.",
              "Dwarven Combat Training: You have proficiency with the battleaxe, handaxe, throwing hammer, and warhammer.",
              "Tool Proficiency: You gain proficiency with the artisan's tools of your choice: smith's tools, brewer's supplies, or mason's tools.",
              "Stonecunning: Whenever you make an intelligence(history) check related to the origin of stonework, you are considered proficient in the history skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus.",
              "Dwarven Toughness: Your hit point maximum increases by 1 per character level."
            ]
          }
        },
        {
          id: 11,
          name: "Morrind Dwarf",
          race: {
            name: "Morrind Dwarf",
            str: 0,
            dex: 0,
            con: 2,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "poison",
            immunities: "",
            senses: "Darkvision 60 ft",
            traits: [
              "Your speed is not reduced by wearing heavy armor",
              "Dwarven Resilience: You have advantage on saving throws against poison, and you have resistance against poison damage.",
              "Dwarven Combat Training: You have proficiency with the battleaxe, handaxe, throwing hammer, and warhammer.",
              "Tool Proficiency: You gain proficiency with the artisan's tools of your choice: smith's tools, brewer's supplies, or carpenter's tools.",
              "Seacunning: Whenever you make an intelligence(nature) check related to the sea, you are considered proficient in the history skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus.",
              "Natural Sailor: You are considered proficient and may add double your proficiency bonus to any acrobatics check on board a ship, a survival check made to navigate a sea, or an athletics check made to swim, you also gain proficiency with water based vehicles."
            ]
          }
        },
        {
          id: 12,
          name: "Plains Dwarf",
          race: {
            name: "Plains Dwarf",
            str: 2,
            dex: 0,
            con: 2,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 25,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "poison",
            immunities: "",
            senses: "Darkvision 60 ft",
            traits: [
              "Your speed is not reduced by wearing heavy armor",
              "Dwarven Resilience: You have advantage on saving throws against poison, and you have resistance against poison damage.",
              "Dwarven Combat Training: You have proficiency with the battleaxe, handaxe, throwing hammer, and warhammer.",
              "Tool Proficiency: You gain proficiency with the artisan's tools of your choice: smith's tools, brewer's supplies, or mason's tools.",
              "Stonecunning: Whenever you make an intelligence(history) check related to the origin of stonework, you are considered proficient in the history skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus.",
              "Dwarven Armor Training: You have proficiency with light and medium armor."
            ]
          }
        },
        {
          id: 13,
          name: "High Elf",
          race: {
            name: "High Elf",
            str: 0,
            dex: 2,
            con: 0,
            intel: 1,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision 60 ft",
            traits: [
              "Keen Senses: You have proficiency in the perception skill.",
              "Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.",
              "Trance: Elves don't need to sleep. Instead they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is 'trance') While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.",
              "Elf Weapon Training: You have proficiency with the longsword, shortsword, shortbow, and longbow.",
              "Cantrip: You know one cantrip of your choice from the wizard spell list. Intelligence is your spellcasting ability for it.",
              "Extra Language: You can speak, read, and write one extra language of your choice."
            ]
          }
        },
        {
          id: 14,
          name: "Moon Elf",
          race: {
            name: "Moon Elf",
            str: 0,
            dex: 2,
            con: 1,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 35,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision 60 ft",
            traits: [
              "Keen Senses: You have proficiency in the perception skill.",
              "Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.",
              "Trance: Elves don't need to sleep. Instead they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is 'trance') While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.",
              "Elf Weapon Training: You have proficiency with the longsword, shortsword, shortbow, and longbow.",
              "Nomad: You have proficiency with the survival skill, and add double your proficiency bonus to Wisdom(survival) checks."
            ]
          }
        },
        {
          id: 15,
          name: "Wild Elf",
          race: {
            name: "Wild Elf",
            str: 0,
            dex: 2,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 35,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision 60 ft",
            traits: [
              "Keen Senses: You have proficiency in the perception skill.",
              "Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.",
              "Trance: Elves don't need to sleep. Instead they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is 'trance') While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.",
              "Elf Weapon Training: You have proficiency with the longsword, shortsword, shortbow, and longbow.",
              "Cantrip: You know one cantrip of your choice from the wizard spell list. Charisma is your spellcasting ability for it."
            ]
          }
        },
        {
          id: 16,
          name: "Wood Elf",
          race: {
            name: "Wood Elf",
            str: 0,
            dex: 2,
            con: 0,
            intel: 0,
            wis: 1,
            cha: 0,
            size: "medium",
            speed: 35,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision 60 ft",
            traits: [
              "Keen Senses: You have proficiency in the perception skill.",
              "Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.",
              "Trance: Elves don't need to sleep. Instead they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is 'trance') While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.",
              "Elf Weapon Training: You have proficiency with the longsword, shortsword, shortbow, and longbow.",
              "Mask of the Wild: You can attempt to hide even when you are only lightly obscured by foliage, heavy rain, falling snow, mist, and and other natural phenomena."
            ]
          }
        },
        {
          id: 17,
          name: "Faelin",
          race: {
            name: "Faelin",
            str: 0,
            dex: 2,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 2,
            size: "small",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              "you can also climb up rough surfaces such as trees and rough-hewn walls without making Athletics checks at a speed of 20 feet.",
              "Fey: You have advantage on saving throws against being charmed, and magic can't put you to sleep.",
              "Cantrip: choose one cantrip from the druid spell list. Charisma is your stat for casting this spell.",
            ]
          }
        },
        {
          id: 18,
          name: "Fey'ri",
          race: {
            name: "Fey'ri",
            str: 0,
            dex: 1,
            con: 0,
            intel: 2,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 40,
            otherspeedtype: "fly",
            damageresistances: "fire",
            immunities: "",
            senses: "Darkvision 60 ft",
            traits: [
              "You also have wings and starting at 6th level you have a base fly speed of 40 ft",
              "Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.",
              "Trance: Fey'ri don't need to sleep. Instead they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is 'trance') While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.",
            ]
          }
        },
        {
          id: 19,
          name: "Air Genasi",
          race: {
            name: "Air Genasi",
            str: 0,
            dex: 1,
            con: 2,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              "Unending Breath. You can hold your breath indefinitely while you’re not incapacitated.",
              "Mingle with the Wind. You can cast the levitate spell once with this trait, requiring no material components, and you regain the ability to cast it this way when you finish a long rest. Constitution is your spellcasting ability for this spell."
            ]
          }
        },
        {
          id: 20,
          name: "Earth Genasi",
          race: {
            name: "Earth Genasi",
            str: 1,
            dex: 0,
            con: 2,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              "Earth Walk. You can move across difficult terrain made of earth or stone without expending extra movement.",
              "Merge with Stone. You can cast the pass without trace spell once with this trait, requiring no material components, and you regain the ability to cast it this way when you finish a long rest. Constitution is your spellcasting ability for this spell."
            ]
          }
        },
        {
          id: 21,
          name: "Fire Genasi",
          race: {
            name: "Fire Genasi",
            str: 0,
            dex: 0,
            con: 2,
            intel: 1,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "fire",
            immunities: "",
            senses: "Darkvision 60ft",
            traits: [
              "Reach to the Blaze. You know the produce flame cantrip. Once you reach 3rd level, you can cast the burning hands spell once with this trait as a 1st-level spell, and you regain the ability to cast it this way when you finish a long rest. Constitution is your spellcasting ability for these spells."
            ]
          }
        },
        {
          id: 22,
          name: "Water Genasi",
          race: {
            name: "Water Genasi",
            str: 0,
            dex: 0,
            con: 2,
            intel: 0,
            wis: 1,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 30,
            otherspeedtype: "swim",
            damageresistances: "acid",
            immunities: "",
            senses: "",
            traits: [
              "Amphibious. You can breathe air and water.",
              "Call to the Wave. You know the shape water cantrip (see chapter 2). When you reach 3rd level, you can cast the create or destroy water spell as a 2nd-level spell once with this trait, and you regain the ability to cast it this way when you finish a long rest. Constitution is your spellcasting ability for these spells."
            ]
          }
        },
        {
          id: 23,
          name: "Elathian Gnome",
          race: {
            name: "Elathian Gnome",
            str: 0,
            dex: 1,
            con: 0,
            intel: 2,
            wis: 0,
            cha: 0,
            size: "small",
            speed: 25,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "Gnome Cunning: You have advantage on all Intelligence, Wisdom, and Charisma saving throws against magic.",
              "Natural Illusionist: You know the minor illusion cantrip. Intelligence is your magic ability for it.",
              "Speak with Small Beasts: Through sounds and gestures, you can communicate simple ideas with Small or smaller beasts."
            ]
          }
        },
        {
          id: 24,
          name: "Stagen Gnome",
          race: {
            name: "Stagen Gnome",
            str: 0,
            dex: 0,
            con: 1,
            intel: 2,
            wis: 0,
            cha: 0,
            size: "small",
            speed: 25,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "Gnome Cunning: You have advantage on all Intelligence, Wisdom, and Charisma saving throws against magic.",
              "Artificer's Lore: You have advantage on Intelligence checks related to alchemy, magic items, and technological devices.",
              "Tinker: You have artisan's tools. Using those tools, you can spend 10 minutes to construct a Tiny clockwork device (AC 5, 1 hp). The device ceases to function after 24 hours. You can have up to three such devices active at a time. When you create a device, choose one of the following options: Clockwork Toy: This toy is a clockwork animal or person, such as a frog, mouse, bird, or soldier. When placed on the ground, the toy moves 5 feet across the ground on each of your turns in a random direction. It makes noise as appropriate to the creature it represents. Fire Starter: The device produces a miniature flame, which you can use to light something like a candle, torch, or campfire. Using the device requires your action. Music Box: When opened, this music box plays a single song at a moderate volume. The box stops playing when it reaches the song's end or when it is closed."
            ]
          }
        },
        {
          id: 25,
          name: "Goblin",
          race: {
            name: "Goblin",
            str: 1,
            dex: 2,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "small",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "Powerful Build: You count as one size larger when determining your carrying capacity and the weight you can push, drag, or lift.",
              "Big Weapons: You can wield heavy weapons without penalty, and otherwise wield weapons as a medium size character.",
              "Nimble Escape: The goblin can take the Disengage or Hide action as a bonus action on each of its turns."
            ]
          }
        },
        {
          id: 26,
          name: "Goliath",
          race: {
            name: "Goliath",
            str: 2,
            dex: 0,
            con: 1,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              "Powerful Build: You count as one size larger when determining your carrying capacity and the weight you can push, drag, or lift.",
              "Natural Athlete: You have proficiency in the athletics skill.",
              "Stone's Endurance: You can focus yourself to occasionally shrug off injury. When you take damage, you can use your reaction to roll a d12. Add your Constitution modifier to the number rolled, and reduce the damage by that total. After you use this trait, you can’t use it again until you finish a short or long rest.",
              "Mountain Born: You’re acclimated to high altitude, including elevations above 20,000 feet. You’re also naturally adapted to cold climates, as described in chapter 5 of the Dungeon Master’s Guide."
            ]
          }
        },
        {
          id: 27,
          name: "Half-Dwarf",
          race: {
            name: "Half-Dwarf",
            str: 0,
            dex: 0,
            con: 1,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 25,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "poison",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "make one additional ability score increase of your choice",
              "Your speed is not reduced by wearing heavy armor.",
              "Dwarven Resilience: You have advantage on saving throws against poison, and you have resistance against poison damage.",
              "Feat: You gain one feat of your choice."
            ]
          }
        },
        {
          id: 28,
          name: "Half-Elf",
          race: {
            name: "Half-Elf",
            str: 0,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 2,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "two other ability scores of your choice increase by 1",
              "Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.",
              "Skill Versatility: You gain proficiency in two skills of your choice.",
            ]
          }
        },
        {
          id: 29,
          name: "Lightfoot Halfling",
          race: {
            name: "Lightfoot Halfling",
            str: 0,
            dex: 2,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "small",
            speed: 25,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "Lucky: When you roll a 1 on an attack roll, ability check, or saving throw, you can reroll the die and must use the new roll.",
              "Brave: You have advantage on saving throws against being frightened.",
              "Hafling Nimbleness: You can move through the space of any creature of a size larger than yours. You can attempt to hide even when you are obscured only by a creature that is at least one size larger than you.",
            ]
          }
        },
        {
          id: 30,
          name: "Strongheart Halfling",
          race: {
            name: "Strongheart Halfling",
            str: 0,
            dex: 2,
            con: 1,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "small",
            speed: 25,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "poison",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "Lucky: When you roll a 1 on an attack roll, ability check, or saving throw, you can reroll the die and must use the new roll.",
              "Brave: You have advantage on saving throws against being frightened.",
              "Hafling Nimbleness: You can move through the space of any creature of a size larger than yours.",
              "You have advantage on saving throws against poison, and you have resistance against poison damage."
            ]
          }
        },
        {
          id: 31,
          name: "Tallfellow Halfling",
          race: {
            name: "Tallfellow Halfling",
            str: 1,
            dex: 2,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "Lucky: When you roll a 1 on an attack roll, ability check, or saving throw, you can reroll the die and must use the new roll.",
              "Brave: You have advantage on saving throws against being frightened.",
            ]
          }
        },
        {
          id: 32,
          name: "Deran Human",
          race: {
            name: "Deran Human",
            str: 0,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              "Ability Score Increase: Three different ability scores of your choice each increase by 1.",
              "Skills: You gain proficiency in one skill of your choice",
              "Draconic Heritage: You gain resistance to damage of one type: electric, fire, or cold.",
              "Trust of Dragons: You have a +5 bonus to Charisma checks made against a dragon."
            ]
          }
        },
        {
          id: 33,
          name: "Hisru Human",
          race: {
            name: "Hisru Human",
            str: 0,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              "Ability Score Increase: Two different ability scores of your choice each increase by 1.",
              "Skills: You gain proficiency in Animal Handling. You have advantage on Animal Handling checks made to ride or train mounts.",
              "Enchantment Resistance: The hisru people, after centuries of living under the effects of enchantment, have developed a natural resistance to magic of the enchantment school. You have advantage on saving throws against enchantment spells.",
              "Feat: You gain one feat of your choice from the following list: Athlete, Charger, Heavy Armor Master, Mageslayer, Magic Initiate, Medium Armor Master, Mobile, Polearm Master, Savage Attacker, Sharpshooter, Skilled, Tough, War Caster, or Weapon Master."
            ]
          }
        },
        {
          id: 34,
          name: "Imperial Human",
          race: {
            name: "Imperial Human",
            str: 1,
            dex: 1,
            con: 1,
            intel: 1,
            wis: 1,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              ""
            ]
          }
        },
        {
          id: 35,
          name: "Neran Human",
          race: {
            name: "Neran Human",
            str: 0,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              "Ability Score Increase: Three different ability scores of your choice each increase by 1.",
              "Affinity for the Dead: +1 to the saving throw DC of all necromancy spells you cast, you always add your proficiency bonus to the saving throw DC and attack rolls for necromancy spells, even if you do not have your spell focus.",
              "Skills: You gain proficiency in one skill of your choice.",
              "Extra Channel Divinity: Clerics and paladins gain 1 extra use of channel divinity before they need to rest.",
              "Undead Fighting Training: You have advantage on attack rolls, skill checks, and saving throws, made against or relating to the undead."
            ]
          }
        },
        {
          id: 36,
          name: "Staelic Human",
          race: {
            name: "Staelic Human",
            str: 0,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              "Ability Score Increase: Two different ability scores of your choice each increase by 1.",
              "Skills: You gain proficiency in one skill of your choice.",
              "Feat: You gain one feat of your choice.",              
            ]
          }
        },
        {
          id: 37,
          name: "Grunt Orc",
          race: {
            name: "Grunt Orc",
            str: 2,
            dex: 0,
            con: 1,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "Menacing: You gain proficiency in the intimidation skill.",
              "Relentless Endurance: When you are reduced to 0 hit points but not killed outright, you can drop to 1 hit point instead. You can't use this feature again until you finish a long rest.",
              "Savage Attacks: When you score a critical hit with a melee weapon attack, you can roll one of the weapon's damage dice one additional time and add it to the extra damage of the critical hit.",
              "Blood Scent: When an opponent is reduced to half or fewer hitpoints, the scent of the blood can send you into a sort of frenzy. Attacks against foes with half or fewer hit points do an extra 2 damage."
            ]
          }
        },
        {
          id: 38,
          name: "High Orc",
          race: {
            name: "High Orc",
            str: 2,
            dex: 0,
            con: 0,
            intel: 0,
            wis: 0,
            cha: 1,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "Menacing: You gain proficiency in the intimidation skill.",
              "Relentless Endurance: When you are reduced to 0 hit points but not killed outright, you can drop to 1 hit point instead. You can't use this feature again until you finish a long rest.",
              "Commanding Presence: You have been born and bred for leadership. You have advantage on all Charisma (Persuasion) and Charisma (Intimidation) checks."
            ]
          }
        },
        {
          id: 39,
          name: "Sand Orc",
          race: {
            name: "Sand Orc",
            str: 2,
            dex: 0,
            con: 2,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "fire",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "Menacing: You gain proficiency in the intimidation skill.",
              "Relentless Endurance: When you are reduced to 0 hit points but not killed outright, you can drop to 1 hit point instead. You can't use this feature again until you finish a long rest.",
            ]
          }
        },
        {
          id: 40,
          name: "Tiefling",
          race: {
            name: "Tiefling",
            str: 0,
            dex: 0,
            con: 0,
            intel: 1,
            wis: 0,
            cha: 2,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "fire",
            immunities: "",
            senses: "Darkvision: 60 feet",
            traits: [
              "Infernal Legacy: You know the thaumatergy cantrip. Once you reach 3rd level, you can cast the hellish rebuke spell once per day as a 2nd-level spell. Once you reach 5th level you can cast the darkness spell once per day. Charisma is your spellcasting ability for these spells."
            ]
          }
        },
        {
          id: 41,
          name: "Trollkin",
          race: {
            name: "Trollkin",
            str: 1,
            dex: 0,
            con: 2,
            intel: 0,
            wis: 0,
            cha: 0,
            size: "medium",
            speed: 30,
            otherspeed: 0,
            otherspeedtype: "",
            damageresistances: "",
            immunities: "",
            senses: "",
            traits: [
              "Styptic Skin: You have advantage on checks to become stable when you are at 0 hit points.",
              "Tough as Nails: Your hit point maximum increases by 1 per character level.",
              "Face of a Troll: Trollkin have disadvantage on any charisma check except intimidation checks made to influence an NPC who is not a Trollkin or Troll.",
              "Clawed Hands: Your unarmed strikes naturally do 1d4 slashing damage. Trollkin Monks can choose to do bludgeoning or slashing damage with their unarmed strikes",
              "Powerful Build: You count as one size larger when determining your carrying capacity and the weight you can push, drag, or lift.",
              "Trollkin Weaponry: You start with one of the following weapons: Greatclub, Mace, Spear, Battleaxe, Flail, Longsword, Morningstar, War pick, or Warhammer. This weapon is too big for most medium creatures to wield, but for you can be treated as a medium size weapon. It does an extra damage die of damage, so if it would do 1d6 damage, it instead does 2d6, and if it would do 1d8 it instead does 2d8 damage. You cannot wield large weapons created for truly large creatures, but it is possible to obtain a new Trollkin weapon (of a type listed above) from a smith trained in making them, or any trollkin weapon smith. A trollkin weapon costs and weighs twice as much as a medium sized weapon of that type."
            ]
          }
        },
      ];
      $scope.classes = [
        {
          id: 0,
          name: "Barbarian",
          charclass: {
            name: "Barbarian",
            hitdie: 12,
            saves: ["str", "con"],
            features: [
              { level: 1, text: "" }
            ]
          }
        }
      ];
      $scope.specials = [
        {
          id: 0,
          name: "Totem Barbarian",
          special: {
            name: "Totem",
            features: [
              { level: 1, text: "" }
            ]
          }
        }
      ];
      $scope.backgrounds = [
        {
          id: 0,
          name: "Soldier",
          background: {
            name: "",
            features: [
              ""
            ]
          }
        }
      ];
      $scope.armors = [
        {
          id: 0,
          name: "Padded",
          armor: {
            name: "Padded",
            ac: 11,
            type: "light",
          }
        },
        {
          id: 1,
          name: "Leather",
          armor: {
            name: "Leather",
            ac: 11,
            type: "light",
          }
        },
        {
          id: 2,
          name: "Studded Leather",
          armor: {
            name: "Studded Leather",
            ac: 12,
            type: "light",
          }
        },
        {
          id: 3,
          name: "Hide",
          armor: {
            name: "Hide",
            ac: 12,
            type: "medium",
          }
        },
        {
          id: 4,
          name: "Chain shirt",
          armor: {
            name: "Chain shirt",
            ac: 13,
            type: "medium",
          }
        },
        {
          id: 5,
          name: "Scale mail",
          armor: {
            name: "Scale mail",
            ac: 13,
            type: "medium",
          }
        },
        {
          id: 6,
          name: "Breastplate",
          armor: {
            name: "Breastplate",
            ac: 14,
            type: "medium",
          }
        },
        {
          id: 7,
          name: "Half plate",
          armor: {
            name: "Half plate",
            ac: 15,
            type: "medium",
          }
        },
        {
          id: 8,
          name: "Ring mail",
          armor: {
            name: "Ring mail",
            ac: 14,
            type: "heavy",
          }
        },
        {
          id: 9,
          name: "Chain mail",
          armor: {
            name: "Chain mail",
            ac: 16,
            type: "heavy",
          }
        },
        {
          id: 10,
          name: "Splint",
          armor: {
            name: "Splint",
            ac: 17,
            type: "heavy",
          }
        },
        {
          id: 11,
          name: "Plate",
          armor: {
            name: "Plate",
            ac: 18,
            type: "heavy",
          }
        },
      ];
      $scope.updatechar = function() {
        $scope.creatureentry.classlevel = $scope.character.special.name + " " + $scope.character.charclass.name + " " + $scope.character.level;
        $scope.creatureentry.race = $scope.character.race.size + " " + $scope.character.race.name;
        $scope.creatureentry.background = $scope.character.background.name;
        $scope.creatureentry.str = $scope.character.str + $scope.character.race.str;
        $scope.creatureentry.dex = $scope.character.dex + $scope.character.race.dex;
        $scope.creatureentry.con = $scope.character.con + $scope.character.race.con;
        $scope.creatureentry.intel = $scope.character.intel + $scope.character.race.intel;
        $scope.creatureentry.wis = $scope.character.wis + $scope.character.race.wis;
        $scope.creatureentry.cha = $scope.character.cha + $scope.character.race.cha;
        $scope.creatureentry.proficiencybonus = Math.ceil($scope.character.level / 4.0) + 1;
        var strbonus = (Math.floor($scope.creatureentry.str / 2) - 5);
        var dexbonus = (Math.floor($scope.creatureentry.dex / 2) - 5);
        var conbonus = (Math.floor($scope.creatureentry.con / 2) - 5);
        var intbonus = (Math.floor($scope.creatureentry.intel / 2) - 5);
        var wisbonus = (Math.floor($scope.creatureentry.wis / 2) - 5);
        var chabonus = (Math.floor($scope.creatureentry.cha / 2) - 5);
        if ($scope.character.charclass.saves.indexOf("str") != -1) {
          $scope.creatureentry.strsave = $scope.creatureentry.proficiencybonus + strbonus;
        }
        else {
          $scope.creatureentry.strsave = strbonus;        
        }
        if ($scope.character.charclass.saves.indexOf("dex") != -1) {
          $scope.creatureentry.dexsave = $scope.creatureentry.proficiencybonus + dexbonus;
        }
        else {
          $scope.creatureentry.dexsave = dexbonus;       
        }
        if ($scope.character.charclass.saves.indexOf("con") != -1) {
          $scope.creatureentry.consave = $scope.creatureentry.proficiencybonus + conbonus;
        }
        else {
          $scope.creatureentry.consave = conbonus;        
        }
        if ($scope.character.charclass.saves.indexOf("int") != -1) {
          $scope.creatureentry.intsave = $scope.creatureentry.proficiencybonus + intbonus;
        }
        else {
          $scope.creatureentry.intsave = intbonus;        
        }
        if ($scope.character.charclass.saves.indexOf("wis") != -1) {
          $scope.creatureentry.wissave = $scope.creatureentry.proficiencybonus + wisbonus;
        }
        else {
          $scope.creatureentry.wissave = wisbonus;        
        }
        if ($scope.character.charclass.saves.indexOf("cha") != -1) {
          $scope.creatureentry.chasave = $scope.creatureentry.proficiencybonus + chabonus;
        }
        else {
          $scope.creatureentry.chasave = chabonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("acrobatics") != -1) {
          $scope.creatureentry.acrobatics = $scope.creatureentry.proficiencybonus + dexbonus;
        }
        else {
          $scope.creatureentry.acrobatics = dexbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("animalhandling") != -1) {
          $scope.creatureentry.animalhandling = $scope.creatureentry.proficiencybonus + wisbonus;
        }
        else {
          $scope.creatureentry.animalhandling = wisbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("arcana") != -1) {
          $scope.creatureentry.arcana = $scope.creatureentry.proficiencybonus + intbonus;
        }
        else {
          $scope.creatureentry.arcana = intbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("athletics") != -1) {
          $scope.creatureentry.athletics = $scope.creatureentry.proficiencybonus + strbonus;
        }
        else {
          $scope.creatureentry.athletics = strbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("deception") != -1) {
          $scope.creatureentry.deception = $scope.creatureentry.proficiencybonus + chabonus;
        }
        else {
          $scope.creatureentry.deception = chabonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("history") != -1) {
          $scope.creatureentry.history = $scope.creatureentry.proficiencybonus + intbonus;
        }
        else {
          $scope.creatureentry.history = intbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("insight") != -1) {
          $scope.creatureentry.insight = $scope.creatureentry.proficiencybonus + wisbonus;
        }
        else {
          $scope.creatureentry.insight = wisbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("intimidation") != -1) {
          $scope.creatureentry.intimidation = $scope.creatureentry.proficiencybonus + chabonus;
        }
        else {
          $scope.creatureentry.intimidation = chabonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("investigation") != -1) {
          $scope.creatureentry.investigation = $scope.creatureentry.proficiencybonus + intbonus;
        }
        else {
          $scope.creatureentry.investigation = intbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("medicine") != -1) {
          $scope.creatureentry.medicine = $scope.creatureentry.proficiencybonus + wisbonus;
        }
        else {
          $scope.creatureentry.medicine = wisbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("nature") != -1) {
          $scope.creatureentry.nature = $scope.creatureentry.proficiencybonus + intbonus;
        }
        else {
          $scope.creatureentry.nature = intbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("perception") != -1) {
          $scope.creatureentry.perception = $scope.creatureentry.proficiencybonus + wisbonus;
        }
        else {
          $scope.creatureentry.perception = wisbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("performance") != -1) {
          $scope.creatureentry.performance = $scope.creatureentry.proficiencybonus + chabonus;
        }
        else {
          $scope.creatureentry.performance = chabonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("persuasion") != -1) {
          $scope.creatureentry.persuasion = $scope.creatureentry.proficiencybonus + chabonus;
        }
        else {
          $scope.creatureentry.persuasion = chabonus;        
        } 
        if ($scope.character.skillproficiencies.indexOf("religion") != -1) {
          $scope.creatureentry.religion = $scope.creatureentry.proficiencybonus + intbonus;
        }
        else {
          $scope.creatureentry.religion = intbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("slightofhand") != -1) {
          $scope.creatureentry.slightofhand = $scope.creatureentry.proficiencybonus + dexbonus;
        }
        else {
          $scope.creatureentry.slightofhand = dexbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("stealth") != -1) {
          $scope.creatureentry.stealth = $scope.creatureentry.proficiencybonus + dexbonus;
        }
        else {
          $scope.creatureentry.stealth = dexbonus;        
        }
        if ($scope.character.skillproficiencies.indexOf("survival") != -1) {
          $scope.creatureentry.survival = $scope.creatureentry.proficiencybonus + wisbonus;
        }
        else {
          $scope.creatureentry.survival = wisbonus;
        }
        var speed = $scope.character.race.speed + " ft"
        if($scope.character.race.otherspeedtype !== "") {
          speed += $scope.character.race.otherspeed + " " + $scope.character.race.otherspeedtype;
        }
        if ($scope.character.charclass.name === "Monk" && $scope.character.level > 1) {
          speed += (Math.ceil(($scope.character.level - 1)/4) * 5) + 5;
        } else if ($scope.character.charclass.name === "Barbarian" && $scope.character.level >= 5) {
          speed += 10;
        }
        $scope.creatureentry.speed = speed;
        $scope.creatureentry.hpmax = $scope.character.charclass.hitdie + ($scope.character.level-1)*Math.ceil($scope.character.charclass.hitdie/2) + ($scope.character.level * conbonus);
        //TODO add racial hit point bonuses
        $scope.creatureentry.hitdice = $scope.character.level;
        $scope.creatureentry.passiveperception = 10 + $scope.creatureentry.perception;
        $scope.creatureentry.senses = $scope.character.race.senses;
        var featurestring = "";
        for(var x = 0; x < $scope.character.race.traits.length; x++) {
          featurestring += $scope.character.race.traits[x] + "\n";
        }
        for(var x = 0; x < $scope.character.background.features.length; x++) {
          featurestring += $scope.character.background.features[x] + "\n";
        }
        for(var x = 0; x < $scope.character.charclass.features.length; x++) {
          if ($scope.character.charclass.features[x].level <= $scope.character.level) {           
            featurestring += $scope.character.charclass.features[x].text + "\n";
          }
        }
        for(var x = 0; x < $scope.character.special.features.length; x++) {
          if ($scope.character.special.features[x].level <= $scope.character.level) {           
            featurestring += $scope.character.special.features[x].text + "\n";
          }
        }
        $scope.creatureentry.features = featurestring;
        $scope.creatureentry.damageresistances = $scope.character.race.damageresistances;
        $scope.creatureentry.immunities = $scope.character.race.immunities;
        $scope.creatureentry.ac = $scope.character.armor.ac;
        if ($scope.character.armor.type === "light") {
          $scope.creatureentry.ac += dexbonus;
        }
        else if ($scope.character.armor.type === "medium") {
          if (dexbonus < 2) {
            $scope.creatureentry.ac += dexbonus;
          }
          else {
            $scope.creatureentry.ac += 2;
          }
        }
        if ($scope.character.shield) {
          $scope.creatureentry.ac += 2;
        }
        if ($scope.creatureentry.ac < 5) {
          $scope.creatureentry.ac = 10 + dexbonus;
        }
        setTimeout($scope.updatechar, 5000);
      }
      $scope.savechar = function() {
        var update = updatepath.slice(0,-1) + $scope.creature.id;
        $http.post(update, $scope.creature).success(function() {
        });
      }
      $scope.init = function() {
        $scope.updatechar();
      }

    });
    
    dmTools.controller('initTracker', function($scope, $http) {
      
    });
    
    dmTools.controller('dmJournal', function($scope, $http) {
      
      $scope.journals = [];
      
      var Month = function(id, name) {
        this.id = id,
        this.name = name
      }
      
      $scope.months =  [
        new Month(1, 'Dorunor'),
        new Month(2, 'Trimalan'),
        new Month(3, 'Sylvanus'),
        new Month(4, 'Gaiana'),
        new Month(5, 'Maridia'),
        new Month(6, 'Moltyr'),
        new Month(7, 'Saris'),
        new Month(8, 'Tockra'),
        new Month(9, 'Amatherin')
      ];
      
      $scope.elDate = function(day, month, year) {
        this.day = Number(day);
        this.month = month;
        this.year = Number(year);
        this.toString = function() {
          return this.month.name + " " + this.day + ", " + this.year;
        }
      }
      
      $scope.thisJournal = {
        date: new $scope.elDate(1, $scope.months[1], 1844),
        text: ""
      };
      
      function convertdatestring(date) {
        var months = ["Dorunor", "Trimalan", "Sylvanus", "Gaiana", "Maridia", "Moltyr", "Saris", "Tockra", "Amatherin"];
        var chars = /^[a-zA-Z]+/;
        var month = date.match(chars);
        month = months.indexOf(month[0]);
        var year = date.substr(date.length - 4);
        var day = date.slice(-8, -5).match(/[0-9]+/);
        return [Number(year), month, Number(day[0])];
      }
      
      function sortdate(date1, date2) {
        var numdate1 = convertdatestring(date1.date);
        var numdate2 = convertdatestring(date2.date);
        if (numdate1[0] > numdate2[0]) {
          return -1;
        } else if (numdate1[0] < numdate2[0]) {
          return 1;
        } else if(numdate1[1] > numdate2[1]){
          return -1;
        } else if (numdate1[1] < numdate2[1]) {
          return 1;
        } else if (numdate1[2] > numdate2[2]) {
          return -1;
        } else if (numdate1[2] < numdate2[2]) {
          return 1;
        } else {
          return 0;
        }
      }
      
      $scope.deleteJournal = function(id) {
        var path = deleteJournalRoute.slice(0, -1) + id;
        $http.get(path).success(function() {
          $scope.getJournals();
        });
        var journalId = $scope.journals.indexOf()
        $scope.journals.splice($scope.journals.map(function(e) { return e.id; }).indexOf(id), 1);
      }
      
      $scope.getJournals = function() {
        $http.get(getJournalsRoute).success(function(data) {
          $scope.journals = data.sort(sortdate);
        });
      }
    
      
      $scope.addJournal = function() {
        var date = $scope.thisJournal.date.toString();
        $http.post(addJournalRoute, {"date": date, "text": $scope.thisJournal.text }).success(function() {
          $scope.getJournals();
        });
      }
      
      $scope.init = function() {
        $scope.getJournals();
      }
    });
    
    dmTools.controller('diceRoller', function($scope, $http) {
      $scope.numD2 = 0;
      $scope.numD4 = 0;
      $scope.numD6 = 0;
      $scope.numD8 = 0;
      $scope.numD10 = 0;
      $scope.numD12 = 0;
      $scope.numD20 = 0;
      $scope.numD100 = 0;
      $scope.staticMod = 0;
      $scope.results = "";
      
      $scope.rollDice = function() {
        var total = 0;
        for(var x = 0; x < $scope.numD2; x++) {
          total += Math.floor(Math.random()*2)+1;
        }
        for(var x = 0; x < $scope.numD4; x++) {
          total += Math.floor(Math.random()*4)+1;
        }
        for(var x = 0; x < $scope.numD6; x++) {
          total += Math.floor(Math.random()*6)+1;
        }
        for(var x = 0; x < $scope.numD8; x++) {
          total += Math.floor(Math.random()*8)+1;
        }
        for(var x = 0; x < $scope.numD10; x++) {
          total += Math.floor(Math.random()*10)+1;
        }
        for(var x = 0; x < $scope.numD12; x++) {
          total += Math.floor(Math.random()*12)+1;
        }
        for(var x = 0; x < $scope.numD20; x++) {
          total += Math.floor(Math.random()*20)+1;
        }
        for(var x = 0; x < $scope.numD100; x++) {
          total += Math.floor(Math.random()*100)+1;
        }
        $scope.results = total + $scope.staticMod;
      }
      $scope.rollChar = function() {
        var result = "";
        for(var x = 0; x < 6; x++) {
          var dice = [0, 0, 0, 0];
          for(var y = 0; y < dice.length; y++) {
            dice[y] = Math.floor(Math.random()*6)+1;
          }
          dice.sort();
          var num = dice[1] + dice[2] + dice[3];
          result += num.toString() + " ";
        }
        $scope.results = result;
      }
    });
    
    dmTools.controller('dungeonMap', function($scope, $http) {
      
    });
})(jQuery, angular);