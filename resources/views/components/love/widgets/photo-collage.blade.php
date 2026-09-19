{{-- Collage de fotografías --}}
@props(['class' => ''])

<div x-data="scrollReveal" x-intersect.once="reveal()"
    class="col-span-full relative flex min-h-[680px] items-center justify-center overflow-visible py-10 xl:col-span-8 {{ $class }}">
    <div x-show="shown" x-transition.opacity.duration.700ms class="relative h-[650px] w-[560px] max-w-[94vw]">

        {{-- ========================================= --}}
        {{-- FOTO 1 - SUPERIOR IZQUIERDA --}}
        {{-- ========================================= --}}
        <div
            class="absolute left-2 top-2 z-10 h-52 w-40 -rotate-6 overflow-hidden rounded-xl border-4 border-white bg-white shadow-xl transition-all duration-300 hover:z-50 hover:scale-105 sm:left-4 sm:h-60 sm:w-48">
            <img src="{{ asset('1.jpeg') }}" alt="Recuerdo 1" class="h-full w-full object-cover" loading="lazy">
        </div>


        {{-- ========================================= --}}
        {{-- FOTO 2 - SUPERIOR DERECHA --}}
        {{-- ========================================= --}}
        <div
            class="absolute right-2 top-2 z-10 h-52 w-40 rotate-6 overflow-hidden rounded-xl border-4 border-white bg-white shadow-xl transition-all duration-300 hover:z-50 hover:scale-105 sm:right-4 sm:h-60 sm:w-48">
            <img src="{{ asset('2.jpeg') }}" alt="Recuerdo 2" class="h-full w-full object-cover" loading="lazy">
        </div>


        {{-- ========================================= --}}
        {{-- FOTO 5 - CENTRO --}}
        {{-- ========================================= --}}
        <div
            class="absolute left-1/2 top-[205px] z-30 h-56 w-44 -translate-x-1/2 rotate-2 overflow-hidden rounded-xl border-4 border-white bg-white shadow-2xl transition-all duration-300 hover:z-50 hover:scale-105 sm:top-[220px] sm:h-64 sm:w-52">
            <img src="{{ asset('5.jpeg') }}" alt="Recuerdo 5" class="h-full w-full object-cover" loading="lazy">
        </div>


        {{-- ========================================= --}}
        {{-- FOTO 3 - INFERIOR IZQUIERDA --}}
        {{-- ========================================= --}}
        <div
            class="absolute bottom-2 left-2 z-10 h-52 w-40 rotate-5 overflow-hidden rounded-xl border-4 border-white bg-white shadow-xl transition-all duration-300 hover:z-50 hover:scale-105 sm:bottom-4 sm:left-4 sm:h-60 sm:w-48">
            <img src="{{ asset('3.jpeg') }}" alt="Recuerdo 3" class="h-full w-full object-cover" loading="lazy">
        </div>


        {{-- ========================================= --}}
        {{-- FOTO 4 - INFERIOR DERECHA --}}
        {{-- ========================================= --}}
        <div
            class="absolute bottom-2 right-2 z-10 h-52 w-40 -rotate-5 overflow-hidden rounded-xl border-4 border-white bg-white shadow-xl transition-all duration-300 hover:z-50 hover:scale-105 sm:bottom-4 sm:right-4 sm:h-60 sm:w-48">
            <img src="{{ asset('4.jpeg') }}" alt="Recuerdo 4" class="h-full w-full object-cover" loading="lazy">
        </div>

    </div>


    {{-- ========================================= --}}
    {{-- FIREWORKS --}}
    {{-- ========================================= --}}
    <div x-show="shown" x-cloak class="pointer-events-none absolute inset-0 overflow-hidden">
        <template x-for="particle in fireworks" :key="particle.id">
            <span class="firework-particle absolute bottom-0 text-2xl"
                :style="`left:${particle.left}%; animation-delay:${particle.delay}s;`" x-text="particle.emoji"></span>
        </template>
    </div>

</div>
