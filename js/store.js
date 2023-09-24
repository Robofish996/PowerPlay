// Toggle the sidebar menu
const hamburgerMenu = document.getElementById("hamburger-menu");
const sidebar = document.getElementById("sidebar");
const body = document.body;

hamburgerMenu.addEventListener("click", () => {
  sidebar.classList.toggle("active");
});
body.addEventListener("click", (e) => {
  if (!sidebar.contains(e.target) && !hamburgerMenu.contains(e.target)) {
    sidebar.classList.remove("active");
  }
});


