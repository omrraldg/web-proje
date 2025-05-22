document.addEventListener("DOMContentLoaded", function () {
    let carouselElement = document.querySelector("#sehrimSlider");
    let carousel = new bootstrap.Carousel(carouselElement, {
        interval: 2000, // 2 saniyede bir geçiş
        ride: "carousel"
    });
});

document.querySelectorAll(".nav-link").forEach(link => {
    link.addEventListener("click", function () {
        document.querySelectorAll(".nav-link").forEach(nav => nav.classList.remove("active"));
        this.classList.add("active");
    });
});