<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky sticky-top">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Inicio') }}
                    </x-jet-nav-link>
                     @if(Auth::user()->empresa->catalogo == 1)
                     <x-jet-nav-link href="" :active="request()->routeIs('catalogo.subir')">
                        {{ __('Subir Catalogo') }}
                        </x-jet-nav-link>
                     @elseif(Auth::user()->empresa->catalogo == 0)
                     <x-jet-nav-link href="{{ route('catalogo.subir')}}" :active="request()->routeIs('catalogo.subir')" >
                        {{ __('Subir Catalogo') }}
                    </x-jet-nav-link>
                     @endif
                      
                        <x-jet-nav-link class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" :active="request()->routeIs('importar.balance','estados.ver')">
                         {{ __('Estados Financieros') }}
                       </x-jet-nav-link>
                         <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('importar.balance') }}" >Subir Estado Financiero</a></li>
                            <li><a class="dropdown-item" href="{{ route('estados.ver') }}" >Ver Estados Financieros</a></li>
                        </ul>
                      <x-jet-nav-link class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" :active="request()->routeIs('ratios.comparar','ratios.calcular','ratios.ver','analisis.inicio')">
                         {{ __('Ratios') }}
                       </x-jet-nav-link>
                         <ul class="dropdown-menu">
                            <li><a class="dropdown-item " href="{{ route('ratios.calcular') }}" >Calcular Ratios</a></li>
                            <li><a class="dropdown-item" href="{{ route('ratios.ver') }}">Ver Ratios</a></li>
                           
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('ratios.comparar') }}" >Comparar Ratios</a></li>
                               <li><a class="dropdown-item" href="{{ route('analisis.inicio') }}" >Analisis V y H</a></li>
                        </ul>

                        
                  
                      <x-jet-nav-link href="{{ route('catalogos.inicio') }}" :active="request()->routeIs('catalogos.inicio')">
                        {{ __('Tablas Catalogo') }}
                    </x-jet-nav-link>
                    
                    
                    <x-jet-nav-link href="{{ route('cuentas.variacion') }}" :active="request()->routeIs('cuentas.variacion')">
                        {{ __('Variacion Cuentas') }}
                    </x-jet-nav-link>
                    
                    
                    @if (Auth::user()->permisoSi(12))
                        <x-jet-nav-link href="{{ route('permisos.inicio') }}" :active="request()->routeIs('permisos.inicio')">
                            {{ __('Permisos') }}
                        </x-jet-nav-link>
                    @endif
                    
                 
                      
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
               

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">                          
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Ajustes de cuenta') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
           
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

               

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                
            </div>
        </div>
    </div>
</nav>
