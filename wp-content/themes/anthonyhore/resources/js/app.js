import Alpine from "alpinejs";
import focus from "@alpinejs/focus";

// Custom
import "./custom/smooth-scroll";
import "./custom/animation";
import "./custom/video";

// Call Alpine
window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.start();
