import Lenis from "lenis";
import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollToPlugin);

document.addEventListener("DOMContentLoaded", () => {
  // Get the current URL's search parameters
  const params = new URLSearchParams(window.location.search);

  // Check if 'work' query parameter is set to 'true'
  if (params.get("work") == "true") {
    console.log("Search query work=true is present");
    gsap.to(window, {
      duration: 1,
      scrollTo: { y: "#work", offsetY: 70 },
    });
  }
});

document.querySelector("#work-button").addEventListener("click", () => {
  if (document.getElementById("work")) {
    gsap.to(window, {
      duration: 1,
      scrollTo: { y: "#work", offsetY: 70 },
    });
  } else {
    window.location.href = "/?work=true";
  }
});

const lenis = new Lenis();

lenis.on("scroll", (e) => {});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);
