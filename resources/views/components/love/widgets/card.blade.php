@props(['class' => ''])

<div x-data="tiltCard(8)" @mousemove="handleMove($event)" @mouseleave="reset()" @touchstart.passive="tap()"
    :style="style"
    {{ $attributes->merge(['class' => 'rounded-2xl border border-pink-200/60 bg-white/80 p-5 shadow-[0_10px_30px_-12px_rgba(244,114,182,0.35)] backdrop-blur transition-transform duration-200 ease-out sm:p-6 ' . $class]) }}>
    {{ $slot }}
</div>
