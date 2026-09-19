@props(['title' => null])

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#fbcfe8">

    <title>{{ $title ?? config('app.name', 'Feliz Cumpleaños Itza') }}</title>

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
