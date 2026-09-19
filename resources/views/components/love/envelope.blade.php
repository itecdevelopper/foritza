@props(['from' => 'Tú', 'to' => 'Tu amor'])

<section x-show="!opened" x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
    class="flex min-h-screen w-full flex-col items-center justify-center px-4 py-12 sm:py-16">
    <div class="relative w-full max-w-xs sm:max-w-sm">
        {{-- paper letter peeking out from behind, sells the "envelope" illusion --}}
        <div
            class="absolute inset-x-5 -bottom-3 h-10 rounded-b-2xl bg-white/80 shadow-[0_10px_25px_-8px_rgba(219,39,119,0.35)] sm:inset-x-7">
        </div>

        <div x-data="tiltCard(14)" @mousemove="handleMove($event)" @mouseleave="reset()" @touchstart.passive="tap()"
            @click="tap(); opened = true; $dispatch('love-opened')" :style="style"
            class="group relative cursor-pointer select-none overflow-hidden rounded-3xl border-2 border-pink-300 bg-linear-to-b from-white/90 to-pink-100/70 p-8 shadow-[0_25px_60px_-15px_rgba(219,39,119,0.55)] backdrop-blur transition-transform duration-200 ease-out sm:p-10">
            {{-- envelope flap, drawn as a crisp bordered triangle --}}
            <svg class="pointer-events-none absolute inset-x-0 top-0 h-24 w-full sm:h-28" viewBox="0 0 100 40"
                preserveAspectRatio="none">
                <polygon points="0,0 100,0 50,34" fill="#f472b6" stroke="#db2777" stroke-width="2" />
                <polyline points="0,0 50,34 100,0" fill="none" stroke="#be185d" stroke-width="1"
                    stroke-opacity="0.4" />
            </svg>
            {{-- soft seam shadow where the flap meets the envelope body --}}
            <div
                class="pointer-events-none absolute inset-x-0 top-0 h-24 [clip-path:polygon(0_0,100%_0,50%_100%)] bg-linear-to-b from-transparent via-transparent to-black/10 sm:h-28">
            </div>

            <div class="relative flex flex-col items-center gap-3 pt-12 text-center sm:gap-4 sm:pt-14">
                <span
                    class="animate-pulse-heart flex h-14 w-14 items-center justify-center rounded-full bg-pink-400 text-2xl text-white shadow-lg shadow-pink-300/60">
                    ♥
                </span>

                <p class="font-script text-2xl text-pink-500 sm:text-3xl">Para: {{ $to }}</p>
                <span class="h-px w-24 bg-pink-300/70"></span>
                <p class="font-script text-2xl text-pink-500 sm:text-3xl">De: {{ $from }}</p>

                <p class="mt-4 flex items-center gap-2 text-xs font-medium text-pink-400/80 sm:mt-6 sm:text-sm">
                    Toca para abrir
                    <svg class="h-4 w-4 animate-bounce" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m0 0l-6-6m6 6l6-6" />
                    </svg>
                </p>
            </div>
        </div>
    </div>
</section>
