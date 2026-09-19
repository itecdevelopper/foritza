@props(['memories' => []])

<x-love.widgets.card class="xl:col-span-12">
    <div class="mx-auto max-w-4xl">
        <p class="text-xs font-semibold uppercase tracking-wide text-pink-400">Recuerdos</p>
        <div class="mt-3 grid grid-cols-2 gap-3 sm:grid-cols-3 xl:grid-cols-6">
            @foreach ($memories as $memory)
                <div
                    class="flex aspect-square items-center justify-center rounded-xl bg-linear-to-br from-pink-200 to-rose-300 text-lg text-white shadow-inner ring-1 ring-pink-100/80 transition-transform duration-200 hover:scale-[1.02]">
                    {{ $memory }}
                </div>
            @endforeach
        </div>
    </div>
</x-love.widgets.card>
