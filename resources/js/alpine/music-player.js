// Minimal audio player used by the birthday card widget.
export default function musicPlayer(src) {
    return {
        src,
        playing: false,
        loop: true,
        shuffle: false,
        progress: 0,
        duration: 0,

        init() {
            this.$refs.audio.loop = this.loop;

            this.$refs.audio.addEventListener("timeupdate", () => {
                this.duration = this.$refs.audio.duration || 0;
                this.progress = this.duration
                    ? (this.$refs.audio.currentTime / this.duration) * 100
                    : 0;
            });
        },

        play() {
            this.$refs.audio.play().catch(() => {});
        },

        toggle() {
            if (this.$refs.audio.paused) {
                this.play();
            } else {
                this.$refs.audio.pause();
            }
        },

        restart() {
            this.$refs.audio.currentTime = 0;
            this.play();
        },

        seek() {
            if (this.duration) {
                this.$refs.audio.currentTime =
                    (this.progress / 100) * this.duration;
            }
        },

        loopToggle() {
            this.loop = !this.loop;
            this.$refs.audio.loop = this.loop;
        },

        shuffleToggle() {
            this.shuffle = !this.shuffle;
        },
    };
}
