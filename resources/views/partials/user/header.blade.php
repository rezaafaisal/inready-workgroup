<header class="bg-inr-black w-full">
    <div x-data="{nav:false}" class="wrapper flex justify-between items-center">
        <img src="{{ asset('images/ui/logo_yellow.png') }}" alt="logo" class="w-20 h-20">
        <ul x-show="nav" :class="nav?mt-auto:-mt-52" class="absolute p-5 top-0 bottom-0 left-0 right-0 w-full duration-150 md:top-auto md:bottom-auto md:left-auto md:right-auto md:w-auto bg-inr-black md:bg-transparent h-screen md:flex md:items-center md:gap-7 text-white">
            <li class="md:hidden flex justify-between">
                <input type="search" name="" id="" placeholder="Apa yang Ingin Anda Cari?" class="text-sm font-light bg-inr-white rounded px-4 py-2 w-9/12 text-inr-black focus:outline-none">
                <button @click="nav=!nav" class="text-inr-yellow border border-inr-yellow w-12 h-10 rounded">
                    <i class="fas fa-xmark text-xl"></i>
                </button>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow duration-150">Beranda</a>
            </li>
            <li x-data="{profile:false}" class="">
                <span x-on:click="profile = !profile" class="hover:text-inr-yellow duration-150 cursor-pointer">Profil <i :class="profile?'-rotate-180':''" class="duration-150 ml-1 text-sm fas fa-angle-down"></i></span>
                <ul @click.outside="profile=false" x-show="profile" class="absolute text-sm mt-8 text-cyan-600 bg-inr-white/10 p-3 rounded">
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">Sejarah</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">AD-ART</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">JUKLAK JUKNIS</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">GBHO</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">Mantan Ketuan</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">Struktur Organisasi</a></li>
                </ul>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow duration-150">Kegiatan</a>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow duration-150">Karya</a>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow duration-150">Angkatan</a>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow duration-150">Tentang Kami</a>
            </li>
            <li>
                <button class="btn-yellow">Masuk</button>
            </li>
        </ul>
        <button @click="nav = !nav" class="text-inr-yellow border border-inr-yellow w-12 h-10 rounded">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
</header>