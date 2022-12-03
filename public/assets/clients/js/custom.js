//Sidebar items set state

$(function () {
  let url = window.location.href;
  $("a").each(function () {
    if (this.href === url) {
      $(this).parent().addClass("active-menu");
    }
  });
});
