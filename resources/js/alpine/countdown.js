// Live countdown to a target date/time, celebrates once it's reached.
export default function countdown(targetDate) {
    return {
        days: 0,
        hours: 0,
        minutes: 0,
        seconds: 0,
        reached: false,
        fireworks: [],
        timer: null,

        init() {
            this.calculate();
            this.timer = setInterval(() => this.calculate(), 1000);
        },

        calculate() {
            const diff = new Date(targetDate) - new Date();

            if (diff <= 0) {
                this.days = this.hours = this.minutes = this.seconds = 0;

                if (!this.reached) {
                    this.reached = true;
                    this.generateFireworks();
                }

                return;
            }

            this.days = Math.floor(diff / 86400000);
            this.hours = Math.floor((diff % 86400000) / 3600000);
            this.minutes = Math.floor((diff % 3600000) / 60000);
            this.seconds = Math.floor((diff % 60000) / 1000);
        },

        generateFireworks() {
            const emojis = ["🎆", "🎇", "✨", "🎉"];

            this.fireworks = Array.from({ length: 18 }, (_, id) => ({
                id,
                left: Math.random() * 100,
                delay: Math.random() * 1.2,
                emoji: emojis[Math.floor(Math.random() * emojis.length)],
            }));
        },

        destroy() {
            clearInterval(this.timer);
        },
    };
}
