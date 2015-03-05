    //$(document).ready(function() {
      $(".datatable").DataTable({

      });
      $(".accordion").accordion({
        
      });
    //});
    function addrow() {
      var numchars = Number($("#chartablebody tr:last-child").attr("name").replace(/\D/g,''));
      var chartbody = $("#chartablebody");
      var newrow = $("#chartablebody tr:last-child").clone();
      $(newrow).attr("name", "char" + (numchars + 1));
      $(newrow).attr("id", "char" + (numchars +1));
      $(newrow).find("input[type='text']").attr("name", "char" + (numchars + 1) + "name");
      $(newrow).find("input[type='number']").attr("name", "char" + (numchars + 1) + "init");
      $(newrow).find("input[type='text']").attr("id", "char" + (numchars + 1) + "name");
      $(newrow).find("input[type='number']").attr("id", "char" + (numchars + 1) + "init");
      $(chartbody).append(newrow);
    };
    
    $("#addCharButton").click(function() {
      addrow();
    });