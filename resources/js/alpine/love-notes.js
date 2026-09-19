// Small carousel used by the love-notes widget.
export default function loveNotes(notes = []) {
    return {
        notes,
        index: 0,

        next() {
            this.index = (this.index + 1) % this.notes.length;
        },

        prev() {
            this.index =
                (this.index - 1 + this.notes.length) % this.notes.length;
        },

        get current() {
            return this.notes[this.index] ?? "";
        },
    };
}
