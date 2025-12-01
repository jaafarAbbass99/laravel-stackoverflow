
<div class="min-h-screen flex flex-col">
    <header class="fixed top-0 left-0 w-full h-[60px] z-50">
        <x-layouts.partials.header />
    </header>
    
    <div class="pt-[60px] ">

        <x-layouts.auth.card :title="$title ?? null">
            {{ $slot }}
        </x-layouts.auth.card>
    </div>
</div>
