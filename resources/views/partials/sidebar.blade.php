
<div class="h-lvh bg-white border-r-1 ">
    <ol class="py-6">
        <li>
            <x-sidebar-link href="/home" icon="home" :active="request()->is('home')">
                Home
            </x-sidebar-link>
        </li>
        <li>
            <x-sidebar-link href="/questions" icon="message-square" :active="request()->is('questions')">
                Questions
            </x-sidebar-link>
            
        </li>
        <li>
            <x-sidebar-link href="/tags" icon="tags" :active="request()->is('tags')">
                Tags
            </x-sidebar-link>
            
        </li>
        <li>
            <x-sidebar-link href="/users" icon="users" :active="request()->is('users')">
                Users
            </x-sidebar-link>
            
        </li>
    </ol>
    
</div>
