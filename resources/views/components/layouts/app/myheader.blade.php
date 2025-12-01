<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    
    <body class="text-[#1b1b18] min-h-screen bg-white flex flex-col" >
        
        <header class="fixed top-0 left-0 w-full h-[60px] z-50">
            <x-layouts.partials.header />
        </header>
       
        <div class="lg:max-w-7xl mx-auto pt-[60px] w-full flex">
            
            <div class="w-full">
                {{ $slot }}
            </div>

        </div>
         
        @include('partials.footer')

        @livewireScripts
    </body>
</html>
