import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";
import tiltCard from "./alpine/tilt-card";
import countdown from "./alpine/countdown";
import loveNotes from "./alpine/love-notes";
import musicPlayer from "./alpine/music-player";
import scrollReveal from "./alpine/scroll-reveal";

window.Alpine = Alpine;

Alpine.plugin(intersect);

Alpine.data("love", () => ({
    opened: false,
}));

Alpine.data("tiltCard", tiltCard);
Alpine.data("countdown", countdown);
Alpine.data("loveNotes", loveNotes);
Alpine.data("musicPlayer", musicPlayer);
Alpine.data("scrollReveal", scrollReveal);

Alpine.start();
