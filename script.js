$( document ).ready(function() {
    $("#infoTable tbody tr").click(function() {
      var selected = $(this).hasClass("highlight");
      $("#infoTable tr").removeClass("highlight");
      if (!selected)
        $(this).addClass("highlight");
    });
  });