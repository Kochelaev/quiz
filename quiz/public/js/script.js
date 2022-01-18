/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
var i = 1;
var div;
var ch;

while (div = document.getElementById('div' + i)) {
  div.count = i;
  div.addEventListener("click", function () {
    ch = document.getElementById('ch' + this.count);
    ch.click();
  });
  i++;
}
/******/ })()
;