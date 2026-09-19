@php
    $from = 'Pablo';
    $to = 'Itza';
    // Edit this to the exact birthday date/time you want the countdown to hit zero on.
    $birthday = '2026-09-21T00:00:00';
    $birthdayLabel = \Carbon\Carbon::parse($birthday)->format('d/m/Y');
    $notes = [
        'Cada día contigo es mi lugar favorito. 💕',
        'Gracias por elegirme una y otra vez.',
        'Contigo hasta lo simple se vuelve mágico.',
        'Eres mi persona favorita en este mundo.',
        '💕Hoy en este día celebro tu vida y tu fortaleza como
            madre y como esposa, este es un cumpleaños diferente
            en el cual inicias una nueva etapa siendo esta la mejor
            de tu vida. Espero con ansias verte feliz cada día de
            mi vida y que juntos disfrutemos de este gran regalo
            llamado Ivanna. Feliz cumpleaños Te amamos ❤',
    ];
    $memories = ['📸', '🌹', '🎡', '🍰', '🌙', '🎶'];
    $birthdayImage = asset(rawurlencode('cumpleaños.jpg'));
    $birthdaySong = asset(rawurlencode('Las mañanitas.mp3'));
@endphp

<x-love.layout :title="$to">
    <div x-data="love">
        <x-love.envelope :from="$from" :to="$to" />

        <x-love.dashboard :from="$from" :to="$to" :image="$birthdayImage" :song="$birthdaySong">
            <x-love.widgets.countdown-card :target="$birthday" :label="$birthdayLabel" />
            <x-love.widgets.question-card />
            <x-love.widgets.photo-collage />
            <x-love.widgets.note-card :notes="$notes" />
            <x-love.widgets.gallery-card :memories="$memories" />
        </x-love.dashboard>
    </div>
</x-love.layout>
