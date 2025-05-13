document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("menu-toggle");
    const navList = document.getElementById("nav-list");

    toggle.addEventListener("click", function () {
        navList.classList.toggle("show");
        if (navList.classList.contains("show")) {
            toggle.style.display = "none";
        } else {
            toggle.style.display = "block";
        }
    });
});