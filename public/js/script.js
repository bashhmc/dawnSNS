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

  $(".post-edit").each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $(".inner-contents").on('click', event => {
    event.stopPropagation();
  })
  $(".inner").on('click', function () {
    $('.edit-modal').fadeOut();
    return false;
  })
});
