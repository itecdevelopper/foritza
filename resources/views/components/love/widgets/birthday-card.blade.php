@props([
    'image',
    'song',
    'title' => 'Hoy cumple años',
    'subtitle' => 'Una persona muy especial',
    'message' => 'Celebramos tu vida...',
    'signature' => 'Tu familia unida',
])

<div x-data="musicPlayer('{{ $song }}')" x-init="$watch('opened', (value) => { if (value) restart(); })" x-on:love-opened.window="restart()"
    class="col-span-full mx-auto flex w-full max-w-md flex-col items-center gap-4 rounded-3xl border border-pink-200/60 bg-white/85 p-6 text-center shadow-[0_15px_40px_-15px_rgba(244,114,182,0.4)] backdrop-blur sm:p-8">
    <audio x-ref="audio" src="{{ $song }}" preload="auto"></audio>

    <img src="{{ $image }}" alt="Feliz cumpleaños"
        class="h-32 w-32 shrink-0 rounded-2xl object-cover shadow-lg sm:h-40 sm:w-40">

    <div class="flex flex-1 flex-col items-center gap-1">
        <p class="text-xs font-semibold uppercase tracking-wide text-pink-400">{{ $title }}</p>
        <p class="font-script text-3xl text-pink-600 sm:text-4xl">{{ $subtitle }}</p>
        <p class="text-sm text-pink-500/80">{{ $message }}</p>
        <p class="text-sm font-medium text-pink-500">{{ $signature }} ♥</p>

        <div class="mt-4 w-full max-w-sm">
            <input type="range" min="0" max="100" step="0.1" x-model.number="progress" @input="seek()"
                class="h-1 w-full cursor-pointer appearance-none rounded-full bg-pink-200 accent-pink-500">

            <div class="mt-3 flex items-center justify-center gap-4">
                <button type="button" @click="shuffleToggle()" :class="shuffle ? 'text-pink-600' : 'text-pink-300'"
                    class="transition hover:text-pink-600" aria-label="Aleatorio">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="16 3 21 3 21 8" />
                        <line x1="4" y1="20" x2="21" y2="3" />
                        <polyline points="21 16 21 21 16 21" />
                        <line x1="15" y1="15" x2="21" y2="21" />
                        <line x1="4" y1="4" x2="9" y2="9" />
                    </svg>
                </button>

                <button type="button" @click="restart()" class="text-pink-500 transition hover:text-pink-600"
                    aria-label="Reiniciar">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <polygon points="19 20 9 12 19 4 19 20" />
                        <rect x="4" y="4" width="2" height="16" />
                    </svg>
                </button>

                <button type="button" @click="toggle()"
                    class="flex h-11 w-11 items-center justify-center rounded-full border-2 border-pink-400 text-pink-500 transition hover:bg-pink-50"
                    aria-label="Reproducir o pausar">
                    <svg x-show="!playing" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <polygon points="5 3 19 12 5 21 5 3" />
                    </svg>
                    <svg x-show="playing" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <rect x="6" y="4" width="4" height="16" />
                        <rect x="14" y="4" width="4" height="16" />
                    </svg>
                </button>

                <button type="button" @click="restart()" class="text-pink-500 transition hover:text-pink-600"
                    aria-label="Reiniciar">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <polygon points="5 4 15 12 5 20 5 4" />
                        <rect x="18" y="4" width="2" height="16" />
                    </svg>
                </button>

                <button type="button" @click="loopToggle()" :class="loop ? 'text-pink-600' : 'text-pink-300'"
                    class="transition hover:text-pink-600" aria-label="Repetir">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="17 1 21 5 17 9" />
                        <path d="M3 11V9a4 4 0 0 1 4-4h14" />
                        <polyline points="7 23 3 19 7 15" />
                        <path d="M21 13v2a4 4 0 0 1-4 4H3" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
