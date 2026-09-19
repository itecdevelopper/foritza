@props([
    'title' => null,
    'description' => 'Una sorpresa de cumpleaños hecha con mucho amor.',
])

@php
    $pageTitle = $title ?? config('app.name', 'Feliz Cumpleaños');
    $shareImage = asset('og-cake.png');
    $canonicalUrl = url()->current();
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#fbcfe8">

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="512x512">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_MX">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $shareImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:alt" content="Pastel rosa de cumpleaños con velas encendidas">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $shareImage }}">
    <meta name="twitter:image:alt" content="Pastel rosa de cumpleaños con velas encendidas">

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body
    class="min-h-screen overflow-x-hidden bg-linear-to-br from-pink-50 via-rose-100 to-pink-200 font-sans text-pink-900 antialiased">
    {{-- Soft decorative glow, purely visual --}}
    <div
        class="pointer-events-none fixed inset-0 -z-10 bg-[radial-gradient(circle_at_20%_20%,rgba(255,255,255,0.6),transparent_45%),radial-gradient(circle_at_80%_0%,rgba(251,207,232,0.7),transparent_40%),radial-gradient(circle_at_50%_100%,rgba(253,164,175,0.35),transparent_45%)]">
    </div>

    {{ $slot }}
</body>

</html>
