
<div class="w-full flex justify-center" >
    
    <div class="w-2/3 mr-4 p-5 mb-60 ml-27">
        <header class="flex items-center justify-between my-5">
            <h2 class="text-2xl font-bold">Ask question</h2>
            <div class="flex items-center">
                <h6 class="text-xs text-gray-500">Required fields </h6>
                <span class="text-red-600 ml-1">*</span>
            </div>
        </header>
        
        <form wire:submit.prevent="save" class="space-y-4 ">            
            <div>
                <div class="flex items-center">
                    <label class="block font-semibold">Title</label>
                    <span class="text-red-600 ml-1">*</span>
                </div>
                <p class="text-xs text-gray-500 py-1">Be specific and imagine you’re asking a question to another person. Min 15 characters.</p>
                <input type="text" wire:model="title" class="w-full ps-2 md:py-1 lg:py-2 
                md:text-[11px] lg:text-xs text-gray-900 font-normal
                border border-gray-300 focus:outline-2 focus:outline-offset-2 focus:outline-sky-500
                rounded-md bg-white
                ">
                @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
    
            <div>
                <div class="flex items-center">
                    <label class="block font-semibold">Body</label>
                    <span class="text-red-600 ml-1">*</span>
                </div>
                <p class="text-xs text-gray-500 py-1">Include all the information someone would need to answer your question. Min 220 characters.</p>
                <textarea wire:model="description" class="w-full border rounded p-2 h-32
                md:text-[11px] lg:text-xs text-gray-900 font-normal
                 border-gray-300 focus:outline-2 focus:outline-offset-2 focus:outline-sky-500
                 bg-white
                "></textarea>
                @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
    
            <div class="mb-6">
                <div class="flex items-center">
                    <label class="block font-semibold">Tags</label>
                    <span class="text-red-600 ml-1">*</span>
                </div>
                <p class="text-xs text-gray-500 py-1">
                    Add up to 5 tags to describe what your question is about. Start typing to see suggestions.
                </p>
    
                <livewire:tag-search />
                {{-- <x-search-input placeholder="e.g.(php)" /> --}}
    
                @error('tags') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
    
            <button type="submit"
                    class="w-auto md:px-2 md:py-1 lg:px-[10px] lg:py-[6px]
                    rounded-md font-light md:text-[10px] lg:text-[13px] transition-colors duration-200
                    text-white bg-sky-600 border border-sky-600 hover:bg-sky-700">
                Post your question
            </button>
            
        </form>

    </div>
    
    <div class="bg-gray-100 w-1/3">
        
        <div class="h-full mx-5 mt-24 text-sm flex flex-col items-start justify-start ">
            <div class="mb-2">
                <h2 class="font-bold text-lg">Draft your question</h2>
                <p>The community is here to help you with specific coding, algorithm, or language problems.</p>                
            </div>
            <div class="mb-2">
                <div x-data="{ open: false }" >

                    <button type="button" class="w-[300px] py-3 px-3 rounded active:border-2 active:border-black  cursor-pointer flex justify-between" 
                        @click="open = !open"
                    >
                        <div  class="font-bold" >
                            <span class="text-sky-500 mr-1">1.</span>
                            <span>Summarize the problem</span>
                        </div>
                        <x-lucide-chevron-up x-show="open"  class="w-5 h-5 max-w-5 shrink-0 mx-1 text-gray-800" />
                        <x-lucide-chevron-down x-show="!open"  class="w-5 h-5 max-w-5 shrink-0 mx-1 text-gray-800" />
                    </button>
                    <div  x-show="open" 
                        x-transition  
                        class="ml-2 mb-2">
                        <ul class="list-disc list-inside m-2">
                            <li>Include details about your goal</li>
                            <li>Describe expected and actual results</li>
                            <li>Include any error messages</li>
                        </ul>
                    </div>
                </div>

                <div x-data="{open:false}">

                    <button type="button" class="w-[300px] p-3 rounded active:border-2 active:border-black cursor-pointer flex justify-between"
                        @click="open = !open"
                    >
                        <div class="font-bold">
                            <span class="text-sky-500 mr-1">2.</span>
                            <span>Describe what you’ve tried</span>
                        </div>
                        <div>
                            <x-lucide-chevron-up x-show="open"  class="w-5 h-5 max-w-5 shrink-0 mx-1 text-gray-800" />
                            <x-lucide-chevron-down x-show="!open"  class="w-5 h-5 max-w-5 shrink-0 mx-1 text-gray-800" />
                        </div>
                    </button>
                    <div 
                        x-show="open"
                        x-transition 
                        class="ml-2 mb-2"
                    >
                        <p class="m-2">Show what you’ve tried and tell us what you found (on this site or elsewhere) and why it didn’t meet your needs. You can get better answers when you provide research.</p>
                    </div>
        
                </div>
                <div x-data="{open:false}">
                    <button type="button" class="w-[300px]  p-3 rounded active:border-2 active:border-black cursor-pointer flex justify-between" @click="open = !open" >
                        <div class="font-bold">
                            <span class="text-sky-500 mr-1">3.</span>
                            <span>Show some code</span>
                        </div>
                        <div>
                            <x-lucide-chevron-up x-show="open"  class="w-5 h-5 max-w-5 shrink-0 mx-1 text-gray-800" />
                            <x-lucide-chevron-down x-show="!open" class="w-5 h-5 max-w-5 shrink-0 mx-1 text-gray-800" />
                        </div>
                    </button>
                    <div x-show="open" class="ml-2 mb-2">
                        <p class="m-2">When appropriate, share the minimum amount of code others need to reproduce your problem (also called a minimum, reproducible example)</p>
                    </div>
                </div>
                
            </div>    
            
        </div>
    </div>
</div>

