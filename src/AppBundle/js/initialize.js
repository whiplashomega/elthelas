$('.dropdown-toggle').dropdown();

$('.accordion').accordion({
    active: false
  });
$(".racediv").hide();
$(".racebutton").click(function() {
  var race = $(this).attr("href");
  $(".racediv").fadeOut();
  $(race).fadeIn();
  $(".datatable").DataTable();
});