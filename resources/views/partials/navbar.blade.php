{{-- resources/views/layouts/navbar.blade.php --}}
<div class="fixed top-6 left-0 right-0 z-50 px-[2.5%] md:px-[7.5%]">
    <nav class="font-poppins bg-white rounded-full shadow-xl px-6 sm:px-8 py-3 flex justify-between items-center w-full max-w-7xl mx-auto">
    {{-- Logo --}}
    <div class="flex items-center space-x-3 flex-shrink-0">
        <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo Sekolah" class="h-10 sm:h-12 object-contain">
    </div>

    {{-- Desktop Menu --}}
    <ul class="items-center hidden md:flex space-x-6 lg:space-x-8 text-sm font-medium text-[#3C5148]">
        <li>
            <a href="{{ route('index') }}" class="hover:text-[#678E4D] transition-colors relative whitespace-nowrap {{ request()->is('/') ? 'text-[#678E4D]' : '' }}">
                Beranda
                @if(request()->is('/'))
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-[#678E4D] rounded-full"></span>
                @endif
            </a>
        </li>
        <li>
            <a href="{{ route('mitra.index') }}" class="hover:text-[#678E4D] transition-colors relative whitespace-nowrap {{ request()->is('mitra*') ? 'text-[#678E4D]' : '' }}">
                Mitra
                @if(request()->is('mitra*'))
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-[#678E4D] rounded-full"></span>
                @endif
            </a>
        </li>
        <li>
            <a href="{{ route('daftar-pkl.index') }}" class="hover:text-[#678E4D] transition-colors relative whitespace-nowrap {{ request()->is('daftar-pkl*') ? 'text-[#678E4D]' : '' }}">
            Daftar PKL
            @if(request()->is('daftar-pkl*'))
                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-[#678E4D] rounded-full"></span>
            @endif
            </a>
        </li>

        @auth
            @if (request()->routeIs('profile.index'))
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 lg:px-5 py-2 bg-[#3C5148] text-white rounded-full hover:bg-[#678E4D] transition-colors whitespace-nowrap">
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('profile.index') }}" class="hover:text-[#1B2727] text-[#3C5148]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="lucide lucide-user inline-block align-middle" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </a>
                </li>
            @endif
        @else
            <li>
                <a href="{{ route('login') }}" class="px-4 lg:px-5 py-2 bg-[#3C5148] text-white rounded-full hover:bg-[#678E4D] transition-colors whitespace-nowrap">
                    Login
                </a>
            </li>
        @endauth
    </ul>

    {{-- Mobile Hamburger --}}
    <button id="menu-toggle" class="md:hidden p-2 text-[#3C5148] hover:text-[#678E4D] transition-colors relative w-10 h-10 flex-shrink-0 mr-0">
        {{-- Wrapper biar icon tumpuk pas --}}
        <div class="relative w-7 h-7">
            {{-- Icon Menu --}}
            <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="lucide lucide-menu absolute inset-0 w-7 h-7 transition-all duration-300 ease-in-out"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="4" y1="8" x2="20" y2="8"/>
                <line x1="4" y1="16" x2="20" y2="16"/>
            </svg>

            {{-- Icon Close --}}
            <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="lucide lucide-x absolute inset-0 w-7 h-7 opacity-0 rotate-90 transition-all duration-300 ease-in-out"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </div>
    </button>
    </nav>
</div>

{{-- Mobile Menu --}}
<div id="mobile-menu" class="hidden fixed top-24 left-[2.5%] right-[2.5%] sm:left-auto sm:right-auto sm:mx-auto sm:max-w-md bg-white rounded-2xl shadow-2xl z-50 md:hidden">
    <ul class="flex flex-col py-6 px-6 space-y-2 text-[#3C5148]">
        <li>
            <a href="{{ url('/') }}" class="block py-3 px-4 hover:bg-gray-50 hover:text-[#678E4D] rounded-lg transition-colors relative {{ request()->is('/') ? 'text-[#678E4D] bg-gray-50' : '' }}">
                Beranda
                @if(request()->is('/'))
                    <span class="absolute bottom-2 left-4 right-4 h-0.5 bg-[#678E4D] rounded-full"></span>
                @endif
            </a>
        </li>
        <li>
            <a href="{{ url('/mitra') }}" class="block py-3 px-4 hover:bg-gray-50 hover:text-[#678E4D] rounded-lg transition-colors relative {{ request()->is('mitra*') ? 'text-[#678E4D] bg-gray-50' : '' }}">
                Mitra
                @if(request()->is('mitra*'))
                    <span class="absolute bottom-2 left-4 right-4 h-0.5 bg-[#678E4D] rounded-full"></span>
                @endif
            </a>
        </li>
        <li>
            <a href="{{ url('/daftar-pkl') }}" class="block py-3 px-4 hover:bg-gray-50 hover:text-[#678E4D] rounded-lg transition-colors relative {{ request()->is('daftar-pkl*') ? 'text-[#678E4D] bg-gray-50' : '' }}">
                Daftar PKL
                @if(request()->is('daftar-pkl*'))
                    <span class="absolute bottom-2 left-4 right-4 h-0.5 bg-[#678E4D] rounded-full"></span>
                @endif
            </a>
        </li>

        @auth
            <li>
                <a href="{{ route('profile.index') }}" class="block py-3 px-4 hover:bg-gray-50 hover:text-[#678E4D] rounded-lg transition-colors">
                    Profile
                </a>
            </li>
            <li class="pt-2 border-t border-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-center px-5 py-3 bg-[#3C5148] text-white rounded-full hover:bg-[#678E4D] transition-colors font-medium">
                        Logout
                    </button>
                </form>
            </li>
        @else
            <li class="pt-2 border-t border-gray-100">
                <a href="{{ route('login') }}" class="block w-full text-center px-5 py-3 bg-[#3C5148] text-white rounded-full hover:bg-[#678E4D] transition-colors font-medium">
                    Login
                </a>
            </li>
        @endauth
    </ul>
</div>

{{-- Script Toggle --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');

            // animasi fade + rotate
            if (menuIcon.classList.contains('opacity-100')) {
                menuIcon.classList.remove('opacity-100', 'rotate-0');
                menuIcon.classList.add('opacity-0', '-rotate-90');

                closeIcon.classList.remove('opacity-0', 'rotate-90');
                closeIcon.classList.add('opacity-100', 'rotate-0');
            } else {
                menuIcon.classList.remove('opacity-0', '-rotate-90');
                menuIcon.classList.add('opacity-100', 'rotate-0');

                closeIcon.classList.remove('opacity-100', 'rotate-0');
                closeIcon.classList.add('opacity-0', 'rotate-90');
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!menuToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuIcon.classList.remove('opacity-0', '-rotate-90');
                    menuIcon.classList.add('opacity-100', 'rotate-0');
                    closeIcon.classList.remove('opacity-100', 'rotate-0');
                    closeIcon.classList.add('opacity-0', 'rotate-90');
                }
            }
        });

        // initial state
        menuIcon.classList.add('opacity-100', 'rotate-0');
    });
</script>