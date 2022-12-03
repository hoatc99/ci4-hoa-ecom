/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

//Sidebar toggle set state

let value = localStorage.getItem("sidebarToggle");

if (value == "false") {
  $("body").addClass("sidebar-mini");
}

$("#sidebarToggle").click(function () {
  value = $("body").hasClass("sidebar-mini");
  localStorage.setItem("sidebarToggle", value);
});

//Sidebar items set state

$(function () {
  let url = window.location.href;
  $("a").each(function () {
    if (this.href === url) {
      $(this).parent().addClass("active");
      $(this).closest(".dropdown").addClass("active");
    }
  });
});

$().ready(() => {
  new Cleave(".currency", {
    numeral: true,
    // numeralDecimalMark: ",",
    // delimiter: ".",
    numeralDecimalScale: 0,
    numeralThousandsGroupStyle: "thousand",
  });
  new Cleave(".numeric", {
    numeral: true,
  });
});
