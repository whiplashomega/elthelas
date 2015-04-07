var days = ["Godsday", "Elvesday", "Gnomesday", "Dragonsday", "Mansday", "Dwarvesday", "Trollsday", "Orcsday"];
var months = ["Dorunor", "Trimalan", "Sylvanus", "Gaiana", "Maridia", "Moltyr", "Saris", "Tockra", "Amatherin"];

function getJournals() {
$.get(getallroute, function(journals) {
    var entries = $("#journalentries");
    entries.html(" ");
    for (var x = 0; x < journals.length; x++) {
      entries.append("<p>" + journals[x].date + "<br />\n" + journals[x].text + "</p>");
      convertdatestring(journals[x].date);
      var deletebutton = $("<input type='button' value='Delete' />");
      deletebutton.attr("data-journal-id", journals[x].id);
      $(deletebutton).click(function() {
        var thisdeleteroute = deleteroute.slice(0, -1) + $(this).attr("data-journal-id");
        $.post(thisdeleteroute, function(t) {
            if (t == "1") {
              getJournals();
            } else {
              alert("Error: Could not Delete");
            }
          });
      });
      entries.append(deletebutton);
      entries.append("<br /><hr />");
    }
  }, "json");
}

function convertdatestring(date) {
  var chars = /^[a-zA-Z]+/;
  var month = date.match(chars);
  month = String(months.indexOf(month[0]));
  console.log(month);
  var year = date.substr(date.length - 4);
  console.log(year);
  var day = date.slice(-8, -5).match(/[0-9]+/);
  console.log(day);
  console.log(year + month + day[0]);
}

function sortdate(date1, date2) {
  var numdate1 = convertdatestring(date1);
  var numdate2 = convertdatestring(date2);
  if (numdate1 > numdate2) {
    return 1;
  } else if (numdate1 < numdate2) {
    return -1;
  } else {
    return 0;
  }
}
getJournals();

$("#addjournal").click(function() {
  var month = $("#month").find(":selected").val();
  var day = $("#day").find(":selected").val();
  var year = $("#year").find(":selected").val();
  var date = month + " " + day + ", " + year;
  var text = $("#text").val();
  console.log(date);
  console.log(text);
  $.post(addroute, {"date": date, "text": text }, function(t) {
    if (t == "1") {
      console.log("success");
      getJournals();
    }
  }, "text");
});



