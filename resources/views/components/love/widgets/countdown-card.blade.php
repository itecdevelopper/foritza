@props(['target', 'label' => null, 'message' => 'Aquí comienza el mejor festejo de cumpleaños.'])

<x-love.widgets.card class="relative overflow-hidden md:col-span-2 xl:col-span-8">
    <div x-data="countdown('{{ $target }}')" x-init="init()">
        @if ($label)
            <p class="text-lg font-bold text-pink-600 text-center sm:text-xl">
                {{ $label }}
            </p>
        @endif

        <p class="mt-1 text-xs font-semibold uppercase tracking-wide text-pink-400">Cuenta regresiva para tu día especial
        </p>

        <template x-if="!reached">
            <div class="mt-3 flex items-center justify-center gap-2 sm:justify-start">
                <div class="flex flex-col items-center">
                    <span
                        class="flex h-12 min-w-12 items-center justify-center rounded-lg bg-pink-900 px-2 text-2xl font-bold tabular-nums text-white sm:text-3xl"
                        x-text="String(days).padStart(2, '0')"></span>
                    <span class="mt-1 text-[10px] font-semibold uppercase tracking-wide text-pink-400">Días</span>
                </div>
                <span class="pb-4 text-xl font-bold text-pink-300">:</span>
                <div class="flex flex-col items-center">
                    <span
                        class="flex h-12 min-w-12 items-center justify-center rounded-lg bg-pink-900 px-2 text-2xl font-bold tabular-nums text-white sm:text-3xl"
                        x-text="String(hours).padStart(2, '0')"></span>
                    <span class="mt-1 text-[10px] font-semibold uppercase tracking-wide text-pink-400">Horas</span>
                </div>
                <span class="pb-4 text-xl font-bold text-pink-300">:</span>
                <div class="flex flex-col items-center">
                    <span
                        class="flex h-12 min-w-12 items-center justify-center rounded-lg bg-pink-900 px-2 text-2xl font-bold tabular-nums text-white sm:text-3xl"
                        x-text="String(minutes).padStart(2, '0')"></span>
                    <span class="mt-1 text-[10px] font-semibold uppercase tracking-wide text-pink-400">Min</span>
                </div>
                <span class="pb-4 text-xl font-bold text-pink-300">:</span>
                <div class="flex flex-col items-center">
                    <span
                        class="flex h-12 min-w-12 items-center justify-center rounded-lg bg-pink-900 px-2 text-2xl font-bold tabular-nums text-white sm:text-3xl"
                        x-text="String(seconds).padStart(2, '0')"></span>
                    <span class="mt-1 text-[10px] font-semibold uppercase tracking-wide text-pink-400">Seg</span>
                </div>
            </div>
        </template>

        <template x-if="reached">
            <p class="mt-3 text-2xl font-bold text-pink-600 sm:text-3xl">
                ¡Felicidades! Oficialmente es o fue tu cumpleaños 🎂
            </p>
        </template>

        <p class="mt-3 text-sm text-pink-400/80" x-show="!reached">{{ $message }}</p>

        {{-- fireworks celebration, only shown once the target date is reached --}}
        <div x-show="reached" x-cloak class="pointer-events-none absolute inset-0 overflow-hidden">
            <template x-for="particle in fireworks" :key="particle.id">
                <span class="firework-particle absolute bottom-0 text-2xl"
                    :style="`left:${particle.left}%; animation-delay:${particle.delay}s;`"
                    x-text="particle.emoji"></span>
            </template>
        </div>
    </div>
</x-love.widgets.card>
