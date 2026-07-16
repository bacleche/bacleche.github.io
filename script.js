// // Toggle du menu latéral sur mobile
// document.addEventListener("DOMContentLoaded", function () {
//   var btn = document.querySelector(".nav-toggle");
//   var body = document.querySelector(".nav-body");
//   if (btn && body) {
//     btn.addEventListener("click", function () {
//       body.classList.toggle("open");
//       btn.textContent = body.classList.contains("open")
//         ? "[ - ] fermer le menu"
//         : "[ + ] menu du cours";
//     });
//   }
// });
// Toggle du menu latéral sur mobile
document.addEventListener("DOMContentLoaded", function () {
  var btn = document.querySelector(".nav-toggle");
  var body = document.querySelector(".nav-body");

  if (btn && body) {
    btn.addEventListener("click", function () {
      body.classList.toggle("open");
      btn.textContent = body.classList.contains("open")
        ? "[ - ] fermer le menu"
        : "[ + ] menu du cours";
    });

    // Ferme le menu dès qu'un lien de navigation est cliqué (mobile uniquement)
    var navLinks = body.querySelectorAll(".nav-list a");
    navLinks.forEach(function (link) {
      link.addEventListener("click", function () {
        body.classList.remove("open");
        btn.textContent = "[ + ] menu du cours";
      });
    });
  }
});
