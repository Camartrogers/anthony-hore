import { gsap } from "gsap";
import Observer from "gsap/dist/Observer";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(Observer);
gsap.registerPlugin(ScrollTrigger);

let header = document.getElementById("main-header");

Observer.create({
  target: window, // can be any element (selector text is fine)
  type: "wheel,touch,pointer,scroll", // comma-delimited list of what to listen for ("wheel,touch,scroll,pointer")
  onUp: () => {
    header.classList.add("top-0");
    header.classList.remove("-top-12");
  },
  onDown: () => {
    header.classList.add("-top-12");
    header.classList.remove("top-0");
  },
});

const revealArr = document.getElementsByClassName("scroll-reveal");

for (let i = 0; i < revealArr.length; i++) {
  gsap.fromTo(
    revealArr[i],
    { autoAlpha: 0 },
    {
      autoAlpha: 1,
      duration: 1,
      scrollTrigger: {
        trigger: revealArr[i],
        toggleActions: "play none none none",
        start: "top 80%",
      },
    }
  );
}

// Add yellow to header bg when scroll passed the banner on home page only
const scrollTargets = document.querySelectorAll(".scroll-bg-yellow");
scrollTargets.forEach((scrollTarget) => {
  gsap.to(scrollTarget, {
    scrollTrigger: {
      trigger: "#work", // Track this element
      start: "top 100vh", // Trigger when the viewport has scrolled 100vh
      toggleClass: { targets: scrollTarget, className: "bg-white" },
    },
  });
});
