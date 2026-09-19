@props(['from' => 'Tú', 'to' => 'Tu amor', 'image' => null, 'song' => null])

<section x-cloak x-show="opened" x-transition:enter="transition ease-out duration-700"
    x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0"
    class="mx-auto w-full max-w-6xl px-4 py-10 sm:px-6 sm:py-12 lg:px-8">
    <header class="mb-8 flex flex-col items-center gap-2 text-center sm:mb-12">
        <button type="button" @click="opened = false"
            class="mb-4 inline-flex items-center gap-1 rounded-full border border-pink-200 bg-white/70 px-4 py-1.5 text-xs font-medium text-pink-500 shadow-sm transition hover:bg-pink-50 sm:text-sm">
            &larr; Volver al sobre
        </button>
        <h1 class="font-script text-3xl text-pink-500 sm:text-4xl">{{ $to }}</h1>
        <p class="max-w-md text-sm text-pink-400/80 sm:text-base">
            ❤️Feliz cumpleaños, mi amor.❤️
        </p>
    </header>

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-12">
        @if ($image && $song)
            <x-love.widgets.birthday-card :image="$image" :song="$song" />
        @endif

        {{ $slot }}
    </div>
</section>
