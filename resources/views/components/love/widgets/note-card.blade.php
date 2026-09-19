@props(['notes' => []])

<x-love.widgets.card class="xl:col-span-4">
    <div x-data="loveNotes(@js($notes))">
        <p class="text-xs font-semibold uppercase tracking-wide text-pink-400">Nota de amor</p>
        <p class="mt-3 min-h-[4.5rem] font-script text-xl leading-relaxed text-pink-600" x-text="current"></p>
        <div class="mt-4 flex items-center justify-between">
            <button type="button" @click="prev()"
                class="h-8 w-8 rounded-full bg-pink-100 text-pink-500 transition hover:bg-pink-200">‹</button>
            <span class="text-xs text-pink-400" x-text="(index + 1) + ' / ' + notes.length"></span>
            <button type="button" @click="next()"
                class="h-8 w-8 rounded-full bg-pink-100 text-pink-500 transition hover:bg-pink-200">›</button>
        </div>
    </div>
</x-love.widgets.card>
