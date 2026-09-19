// 3D tilt on mouse move (desktop) and a quick tap bounce on touch devices.
export default function tiltCard(strength = 10) {
    return {
        rotateX: 0,
        rotateY: 0,
        scale: 1,

        handleMove(event) {
            const rect = this.$el.getBoundingClientRect();
            const px = (event.clientX - rect.left) / rect.width - 0.5;
            const py = (event.clientY - rect.top) / rect.height - 0.5;

            this.rotateY = px * strength * 2;
            this.rotateX = -py * strength * 2;
        },

        reset() {
            this.rotateX = 0;
            this.rotateY = 0;
            this.scale = 1;
        },

        tap() {
            this.scale = 0.95;
            setTimeout(() => {
                this.scale = 1;
            }, 200);
        },

        get style() {
            return `transform: perspective(1000px) rotateX(${this.rotateX}deg) rotateY(${this.rotateY}deg) scale(${this.scale});`;
        },
    };
}
