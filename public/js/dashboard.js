const hamburger = document.getElementById("dashboard-hamburger");
const navbar = document.getElementById("dashboard-nav");
const dashboardCotent = document.getElementById("dashboard-content");

hamburger.addEventListener("click", (e) => {
    navbar.classList.toggle("nav-collapse");
    dashboardCotent.classList.toggle("dashboard-collapse-content");
});
