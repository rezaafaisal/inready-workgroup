<header class="bg-inr-black w-full fixed z-20">
    <div x-data="{nav:false}" class="wrapper flex justify-between items-center">
        <img src="{{ asset('images/ui/logo_yellow.png') }}" alt="logo" class="w-20 h-20">

        {{-- list tab - desktop --}}
        <ul class="hidden bg-inr-black md:flex items-center gap-7 text-white text-sm">
            <li>
                <a href="{{ route('index') }}" class="hover:text-inr-yellow duration-150 inline">Beranda</a>
            </li>
            <li class="group">
                <span class="hover:text-inr-yellow py-0 cursor-pointer">
                    Profil
                </span>
                <ul class="group-hover:visible invisible group-hover:translate-y-0 translate-y-5 group-hover:opacity-100 opacity-0 group-hover:delay-100 delay-300  block h-auto ease-in-out duration-300 absolute text-sm mt-8 bg-[#292929] md:p-3 rounded">
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">Sejarah</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">AD-ART</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">JUKLAK JUKNIS</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">GBHO</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">Mantan Ketua</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">Struktur Organisasi</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('activity') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline">
                    Kegiatan
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('masterpiece') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline">
                    Karya
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('generation') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline">
                    Angkatan
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline">
                    Tentang Kami
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <button class="mt-4 w-full md:mt-0 md:w-auto btn-yellow">Masuk</button>
            </li>
        </ul>

        {{-- list mobile --}}
        <ul :class="nav?'translate-y-0 opacity-100 visible fixed':'-translate-y-10 opacity-0 invisible absolute'" class="md:hidden py-5 px-10 h-screen top-0 bottom-0 left-0 right-0 w-full duration-300 ease-in-out bg-inr-black text-white text-sm">
            <li class="md:hidden flex justify-between mb-5">
                <input type="search" name="" id="" placeholder="Apa yang Ingin Anda Cari?" class="text-sm font-light bg-inr-white rounded px-4 py-2 w-9/12 text-inr-black focus:outline-none">
                <button @click="nav=!nav" class="text-inr-white  h-10 rounded">
                    <i class="fas fa-xmark text-2xl"></i>
                </button>
            </li>
            <li>
                <a href="{{ route('index') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3">
                    Beranda
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li x-data="{profile:false}" class="group">
                <span x-on:click="profile = !profile" class="md:hidden hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 cursor-pointer">
                    Profil
                    <i :class="profile?'-rotate-180':''" class="duration-300 ml-1 text-xs fas fa-angle-down"></i>
                </span>
                <span class="hidden hover:text-inr-yellow py-0 md:inline cursor-pointer">
                    Profil
                    {{-- <i class="group-hover:-rotate-180 duration-300 ml-1 text-xs fas fa-angle-down"></i> --}}
                </span>
                <ul  :class="profile?'h-56':'h-0'"  class="block overflow-hidden ease-in-out duration-300 bg-[#292929] rounded">
                    <li>
                        <a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">Sejarah</a>
                    </li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">AD-ART</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">JUKLAK JUKNIS</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">GBHO</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">Mantan Ketua</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">Struktur Organisasi</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('activity') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3">
                    Kegiatan
                    <i class="fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('masterpiece') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3">
                    Karya
                    <i class="fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3">
                    Angkatan
                    <i class="fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3">
                    Tentang Kami
                    <i class="fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <button class="mt-4 w-full md:mt-0 md:w-auto btn-yellow">Masuk</button>
            </li>
        </ul>
        <button @click="nav = !nav" class="text-inr-yellow border border-inr-yellow w-12 h-10 rounded md:hidden ">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
</header>