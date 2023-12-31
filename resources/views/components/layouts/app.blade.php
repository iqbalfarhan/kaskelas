<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }} - {{ config('app.tagline') }}</title>
        <link rel="shortcut icon" href="{{ url('YouFi.png') }}" type="image/x-icon">

        @livewireStyles

        @vite('resources/css/app.css')
    </head>
    <body>
        @auth
            <div class="drawer lg:drawer-open min-h-screen bg-base-200">
                <input id="drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content overflow-x-auto">
                    @livewire('partial.navbar')
                    <div class="container mx-auto max-w-6xl p-6">
                        {{ $slot }}

                        @livewire('partial.footer')
                    </div>
                </div> 
                <div class="drawer-side">
                    <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                    @livewire('partial.sidebar')
                </div>
            </div>
        @endauth
        @guest
            <div class="bg-base-200 min-h-screen flex justify-center items-center p-6">
                {{ $slot }}
            </div>
        @endguest

        @livewireScripts

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
    </body>
</html>
