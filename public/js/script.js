$(function () {
  $(".a-click").click(function () {
    if ($(".arrow").hasClass('.active')) {
      $(".a-contents").slideToggle(300);
      $(".arrow").removeClass(".active");
      $(".arrow").css("transform", "rotateX(0deg)");
    } else {
      $(".a-contents").slideToggle(300);
      $(".arrow").addClass(".active");
      $(".arrow").css("transform", "rotateX(180deg)");
    }
  });
});
