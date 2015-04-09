function loadlist() {
  $.get(loadallpath, {}, function(characters) {
      var select = $("#charselect");
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
    //tell the server to create a new character for this user with name 'newchar' and get back the ID number, on success insert the name and id number
    //into the form.
  } else {
    //retreive the selected character from the server and load the data into the form
  }
}

function savechar() {
  var charid = $("#charid").val();
  if (charid === "NOCHARLOADED") {
    alert("you must create a new character or load an existing character before you can save.");
  } else {
    //post the character to the server using update method
    loadlist();
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