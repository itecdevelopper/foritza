@props(['text' => '¿Estás lista?', 'class' => ''])

<div x-data="scrollReveal" x-intersect.once="reveal()"
    class="col-span-full relative flex justify-center overflow-visible py-8 xl:col-span-4 {{ $class }}">
    <p x-show="shown" x-transition.opacity.duration.500ms class="dance font-script text-3xl text-pink-600 sm:text-4xl">
        {{ $text }}
    </p>

    {{-- fireworks celebration triggered the moment this scrolls into view --}}
    <div x-show="shown" x-cloak class="pointer-events-none absolute inset-0 overflow-hidden">
        <template x-for="particle in fireworks" :key="particle.id">
            <span class="firework-particle absolute bottom-0 text-2xl"
                :style="`left:${particle.left}%; animation-delay:${particle.delay}s;`" x-text="particle.emoji"></span>
        </template>
    </div>
</div>
