@props(['memories' => []])

<x-love.widgets.card class="xl:col-span-12">
    <div class="mx-auto max-w-4xl">

        {{-- Título --}}
        <div class="mb-4 text-center">
            <p class="text-xs font-semibold uppercase tracking-wide text-pink-400">
                Recuerdo especial
            </p>

            <h2 class="mt-1 text-2xl font-bold text-gray-800">
                Feliz Cumpleaños Mich ❤️
            </h2>
        </div>

        {{-- Contenedor del video --}}
        <div class="relative overflow-hidden rounded-2xl bg-black shadow-lg ring-1 ring-pink-100">
            <video id="birthdayVideo" class="block w-full" preload="metadata" playsinline controls>
                <source src="{{ asset('Feliz_cumple_mich.mp4') }}" type="video/mp4">

                Tu navegador no soporta la reproducción de video.
            </video>
        </div>

        {{-- Información --}}
        <div class="mt-4 flex items-center justify-center">
            <span class="inline-flex items-center rounded-full bg-pink-100 px-3 py-1 text-xs font-medium text-pink-700">
                ❤️ Un recuerdo especial
            </span>
        </div>

    </div>
</x-love.widgets.card>
