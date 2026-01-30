import "./bootstrap";
import "flowbite";
import AOS from "aos";
import "aos/dist/aos.css";

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

AOS.init({
  disable: "mobile",
  duration: 800,
  once: true,
});

window.addEventListener("load", () => {
  AOS.refresh();
});
