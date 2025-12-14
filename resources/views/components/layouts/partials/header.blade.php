
<div class="bg-white border-b-1">
    <div class="border-t-3 border-orange-500">
        <div class="lg:max-w-7xl w-full mx-auto h-full flex items-center"> {{-- container --}}
           {{-- Logo --}}
           <div class="hover:bg-gray-200 rounded-sm transition-colors duration-200">
              <a class="lg:px-2 lg:py-[12px] md:px-[6px] md:py-2
              flex items-center font-light md:text-base lg:text-lg " href="/home">
                  
                  <img src="{{asset('Stackoverflow-Icon--Streamline-Svg-Logos.svg')}}" alt="logo-stack"
                  class="lg:size-8 md:size-6">
                  stack <span class="font-extrabold md:text-sm lg:text-lg pr-[2px] ">overflow</span>
                  
              </a>
           </div>
            
           {{-- List Items --}}
            <ol class="flex items-center justify-center">
                <li>
                    <a class="lg:px-[13px] lg:py-[7px] md:px-3 md:py-[6px] text-gray-600  hover:bg-gray-200 rounded-full transition-colors duration-200 md:text-[10px] lg:text-[13px] " href="#">About</a>
                </li>
                <li>
                    <a class="lg:px-[13px] lg:py-[7px] md:px-3 md:py-[6px] text-gray-600  hover:bg-gray-200 rounded-full transition-colors duration-200 md:text-[10px] lg:text-[13px] "  href="#">Products</a>
                
                </li>
                <li>
                    <a class="lg:px-[13px] lg:py-[7px] md:px-3 md:py-[6px] text-gray-600  hover:bg-gray-200 rounded-full transition-colors duration-200 md:text-[10px] lg:text-[13px]  " href="#">For Teams</a>
                </li>
            </ol>

            {{-- Search --}}
            
            <form class="flex flex-grow  mx-2">  
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
                        <svg class="md:size-[13px] lg:size-[18px] text-gray-900 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                </div>
                <input type="search" id="default-search" 
                                            class="block w-full ps-7 md:py-1 lg:py-2
                                            md:text-[11px] lg:text-xs text-gray-900 font-normal
                                            border border-gray-300 focus:outline-2 focus:outline-offset-2 focus:outline-sky-500
                                            rounded-md bg-white
                                            " placeholder="Search..." required 
                                        />
            </form>


            {{-- Authen --}}
            <div class="h-full ml-auto pr-3 overflow-x-auto flex items-center justify-center gap-1" >
                @guest
                    
                {{-- login --}}
                <div class="flex items-center">
                    <x-button 
                        href="{{ route('login') }}" 
                        text="Log in" 
                        variant="outline" 
                    />
                </div>
                
                {{-- sign in --}}
                <div class="flex items-center">
                    
                    <x-button 
                        href="{{ route('register') }}" 
                        text="Sing in" 
                        variant="primary" 
                    />
                </div>
                @endguest
                @auth
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="#"
                        @click.prevent="$el.closest('form').submit()"
                        class="text-gray-600 hover:text-red-600">
                            Logout
                        </a>
                    </form>
                @endauth

            </div>
            
            {{$slot}}
            
        </div>
    </div>
</div>   