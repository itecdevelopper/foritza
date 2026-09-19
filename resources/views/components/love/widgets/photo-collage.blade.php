{{-- Empty placeholder slots arranged like a photo collage. Swap each dashed box for an <img> once you have the pictures. --}}
@props(['class' => ''])

<div x-data="scrollReveal" x-intersect.once="reveal()"
    class="col-span-full relative flex min-h-88 items-center justify-center overflow-visible py-10 xl:col-span-8 {{ $class }}">

    <div x-show="shown" x-transition.opacity.duration.700ms class="relative h-72 w-full max-w-sm sm:max-w-md">
        <div
            class="absolute left-2 top-0 flex h-40 w-32 -rotate-6 items-center justify-center rounded-xl border-2 border-dashed border-pink-300 bg-white/70 text-3xl text-pink-300 shadow-lg sm:h-48 sm:w-36">
            📷
        </div>
        <div
            class="absolute right-4 top-6 flex h-44 w-32 rotate-6 items-center justify-center rounded-xl border-2 border-dashed border-pink-300 bg-white/70 text-3xl text-pink-300 shadow-lg sm:h-52 sm:w-36">
            📷
        </div>
        <div
            class="absolute left-10 top-28 flex h-40 w-32 rotate-3 items-center justify-center rounded-xl border-2 border-dashed border-pink-300 bg-white/70 text-3xl text-pink-300 shadow-lg sm:h-48 sm:w-36">
            📷
        </div>
        <div
            class="absolute right-8 top-36 flex h-44 w-32 -rotate-3 items-center justify-center rounded-xl border-2 border-dashed border-pink-300 bg-white/70 text-3xl text-pink-300 shadow-lg sm:h-52 sm:w-36">
            📷
        </div>
    </div>

    <div x-show="shown" x-cloak class="pointer-events-none absolute inset-0 overflow-hidden">
        <template x-for="particle in fireworks" :key="particle.id">
            <span class="firework-particle absolute bottom-0 text-2xl"
                :style="`left:${particle.left}%; animation-delay:${particle.delay}s;`" x-text="particle.emoji"></span>
        </template>
    </div>
</div>
