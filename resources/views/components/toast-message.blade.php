<div 
    x-data="{
        show: false,
        message: '',
        type: 'success', // success | error
        showMessage(msg, msgType) {
            this.message = msg;
            this.type = msgType;
            this.show = true;
            setTimeout(() => this.show = false, 5000);
        }
    }"
    x-init="
        @if (session()->has('success'))
            showMessage('{{ session('success') }}', 'success');
        @endif

        @if (session()->has('error'))
            showMessage('{{ session('error') }}', 'error');
        @endif

        window.addEventListener('toast-success', e => {
            showMessage(e.detail.message, 'success');
        });

        window.addEventListener('toast-error', e => {
            showMessage(e.detail.message, 'error');
        });
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
            class="w-[600px] text-sm px-4 py-3 rounded shadow border"
            :class="{
                'bg-green-50 border-green-300 text-gray-900': type === 'success',
                'bg-red-50 border-red-300 text-gray-900': type === 'error'
            }"
        >
            <span x-text="message"></span>
        </div>
    </template>
</div>
