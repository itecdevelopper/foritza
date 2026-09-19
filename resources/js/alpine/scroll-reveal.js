// Generic "reveal with a burst of fireworks" used for scroll-triggered sections.
const EMOJIS = ["🎆", "🎇", "✨", "🎉"];

export default function scrollReveal() {
    return {
        shown: false,
        fireworks: [],

        reveal() {
            if (this.shown) {
                return;
            }

            this.shown = true;
            this.fireworks = Array.from({ length: 16 }, (_, id) => ({
                id,
                left: Math.random() * 100,
                delay: Math.random() * 1.2,
                emoji: EMOJIS[Math.floor(Math.random() * EMOJIS.length)],
            }));
        },
    };
}
