$(document).ready(function () {
  $(".a-click").click(function () {
    if ($(".arrow").hasClass('.inversion')) {
      $(".a-contents").slideToggle(300);
      $(".arrow").removeClass(".inversion");
    } else {
      $(".a-contents").slideToggle(300);
      $(".arrow").addClass(".inversion");
    }
  });
});
