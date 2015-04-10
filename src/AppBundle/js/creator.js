var currentchar;

function fillform(creature) {
  $("#charform").removeClass("hidden");
  for(trait in creature) {
    $("#" + trait).val(creature[trait]);
    currentchar = creature;
  }
  
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
  var charid = $("#id").val();
  if (charid === "NOCHARLOADED") {
    alert("you must create a new character or load an existing character before you can save.");
  } else {
    for(trait in currentchar) {
      currentchar.trait = $("#" + trait).val();
    }
    var correctpath = updatepath.slice(0, -1) + currentchar.id;
    $.post(correctpath, JSON.stringify(currentchar), function() {
      $("#charform").addClass("hidden");        
      loadlist();
    });
  }
}

function deletechar() {
  //delete the character currently selected  in the dropdown.  CONFIRM WITH USER FIRST.
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

loadlist();