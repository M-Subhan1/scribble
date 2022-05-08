const hamburger = document.getElementById("dashboard-hamburger");
const navbar = document.getElementById("dashboard-nav");

hamburger.addEventListener("click", (e) => {
    navbar.classList.toggle("nav-collapse");
    console.log(navbar);
});
