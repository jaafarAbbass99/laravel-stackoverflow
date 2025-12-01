<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
         <!-- Styles -->
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col" --}}
    @include('partials.header') 
    
    <body class="text-[#1b1b18] min-h-screen flex flex-col" >
        
        <main class="lg:max-w-7xl m-auto pt-[60px] w-full flex"> 
            @include('partials.sidebar') 
            <article class="flex-1 p-6"> 
                @yield('content') 
            </article> 
        </main> 
        @include('partials.footer')

        @livewireScripts
    </body>

</html>
