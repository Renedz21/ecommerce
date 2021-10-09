<style>
    #navigation-menu {
        height: calc(100vh - 4rem);
    }

    .navigation-link:hover .navigation-submenu {
        display: block !important;
    }

</style>

<header class="bg-trueGray-500 sticky top-0" x-data="dropdown()">
    <div class="container flex items-center h-16">
        <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto" />
        </a>
        <a :class="{'bg-opacity-100 text-orange-500' : open}" x-on:click="show()"
            class="flex flex-col items-center justify-center px-4 mr-5 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm">Categorias</span>
        </a>

        @livewire('search')

        <div class="mx-6 relative">
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>

            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class='bx bxs-user-circle text-white text-4xl cursor-pointer mx-auto'></i>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>

                    </x-slot>
                </x-jet-dropdown>

            @endauth
        </div>

        @livewire('dropdown-cart')


    </div>

    <nav id="navigation-menu" :class="{'block': open, 'hidden': !open}" x-show="open"
        class="bg-trueGray-700 bg-opacity-25 w-full absolute hidden">
        <div class="container h-full">
            <div x-on:click.away="open=false" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categoria as $item)
                        <li class="navigation-link text-trueGray-500 hover:bg-orange-500 hover:text-white">
                            <a href="" class="py-2 px-4 text-sm flex items-center">

                                <span class="flex justify-center w-9">
                                    {!! $item->icon !!}
                                </span>

                                {{ $item->name }}
                            </a>
                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 top-0 right-0 h-full hidden">
                                <x-navigation-subcategories :category="$item" />
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$item->first()" />
                </div>
            </div>

        </div>
    </nav>
</header>
