<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    
    <body class="text-[#1b1b18] min-h-screen bg-white flex flex-col" >
        
        <header class="fixed top-0 left-0 w-full h-[60px] z-50">
            <x-layouts.partials.header />
        </header>
       
        <div class="lg:max-w-7xl m-auto pt-[60px] w-full flex">
            <aside class="w-[13%] h-screen sticky top-[60px] self-start">
                @include('partials.sidebar')
            </aside>
            
            <div class="w-[87%] p-6">
                {{ $slot }}
            </div>

        </div>
         
        @include('partials.footer')

        @livewireScripts
    </body>
</html>
