$(document).ready(function () {
  $('#info').click(function () {
    $("#details").is(":visible") ? $("#details").fadeOut() : $("#details").fadeIn();
  });
});