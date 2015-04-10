var currentchar;

function fillform(creature) {
  $("#charform").removeClass("hidden");
  for(trait in creature) {
    $("#" + trait).val(creature[trait]);
    currentchar = creature;
  }
  $("#charid").val(creature["id"]);
  
}


function loadlist() {
  $.get(loadallpath, {}, function(characters) {
      var select = $("#charselect");
      select.children().detach();
      for (var x = 0; x < characters.length; x++) {
        var option = $("<option></option>").val(characters[x].id).html(characters[x].name);
        option.appendTo(select);
      }
      var newchar = $("<option></option>").val("new").html("New Character");
      newchar.appendTo(select);
    });
};

function loadchar() {
  var selected = $("#charselect").find(":selected").val();
  if (selected == "new") {
    $.post(addpath, function(creature) {
        fillform(creature);
        loadlist();
      });
  } else {
    var correctpath = loadpath.slice(0, -1) + $("#charselect").find(":selected").val();
    $.get(correctpath, function(creature) {
      fillform(creature);
    });
  }
}

function savechar() {
  var charid = $("#charid").val();
  if (charid === "NOCHARLOADED") {
    alert("you must create a new character or load an existing character before you can save.");
  } else {
    var newchar = {};
    for(trait in currentchar) {
      newchar[trait] = $("#" + trait).val();
      console.log(newchar.trait);
    }
    newchar.id = $("#charid").val();
    var correctpath = updatepath.slice(0, -1) + newchar.id;
    $.post(correctpath, JSON.stringify(newchar), function() {
      $("#charform").addClass("hidden");        
      loadlist();
    });
  }
}

function deletechar() {
  var charid = $("#charselect").find(":selected").val();
  if (charid !== "new" && charid !== "") {
    var correctpath = deletepath.slice(0, -1) + charid;
    $.post(correctpath, function() {
        loadlist();
        $("#charform").addClass("hidden");
      });
  }
}

function addAttack() {
  
}

function deleteAttack(btn) {
  
}

//implement our callbacks, then load the list
$("#loadchar").click(function() {
  loadchar();
});
$("#savechar").click(function() {
  savechar();  
});
$("#deletechar").click(function() {
  deletechar();  
});

$("#addattack").click(function() {
  addAttack();
});

$(".deleteattack").click(function() {
  deleteAttack(this);
});
loadlist();