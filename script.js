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
  }
});
