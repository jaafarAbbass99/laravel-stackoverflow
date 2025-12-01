<div 
        x-data="{ show:false, message:'' }"
        x-on:vote-error.window="
            message = $event.detail.message;
            show = true;
            setTimeout(() => show = false, 6000);
        "
        class="fixed top-4 left-1/2 -translate-x-1/2 z-50"
    >
        <template x-if="show">
            <div 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-3"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-3"
                class="w-[600px] bg-red-50 border border-red-300 text-gray-900 text-sm px-4 py-2 rounded shadow"
            >
                <span x-text="message" class="flex justify-center"></span>
            </div>
        </template>
</div>
