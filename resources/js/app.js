import "./bootstrap";
import "flowbite";
import AOS from "aos";
import "aos/dist/aos.css";

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

window.addEventListener("load", () => {
  AOS.init({
    duration: 600,
    easing: "ease-out-cubic",
    once: true,
    mirror: false,
    offset: 0,
    disable: "mobile",
  });

  AOS.refreshHard();
});
