const open = document.querySelector(".hamburger");
const close = document.querySelector(".close");
const expandNav = document.querySelector(".expand-nav");

open.addEventListener("click", () => {
    expandNav.style.display = "flex";
    expandNav.style.transform = "translateX(0)";
});

close.addEventListener("click", () => {
    expandNav.style.transform = "translateX(400px)";
});
