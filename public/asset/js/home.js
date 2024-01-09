"use strict";

const h2Element = document.querySelector(".presentacion > h2");
const articleElement = document.querySelector(".presentacion > article");

if (h2Element != null) {
  setTimeout(() => {
    h2Element.classList.add("mostrar");
  }, 4000);
}
if (articleElement != null) {
  setTimeout(() => {
    articleElement.classList.add("mostrar");
  }, 5000);
}
