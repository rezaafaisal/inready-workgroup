<header class="bg-inr-black w-full fixed z-20">
    <div x-data="{nav:true}" class="wrapper flex justify-between items-center">
        <img src="{{ asset('images/ui/logo_yellow.png') }}" alt="logo" class="w-20 h-20">
        <ul :class="nav?'translate-y-0 opacity-100 fixed md:static':'-translate-y-full md:translate-y-0 opacity-0 absolute md:static'" class="p-5 h-screen top-0 bottom-0 left-0 right-0 w-full duration-300 ease-in-out md:h-auto md:top-auto md:bottom-auto md:left-auto md:right-auto md:w-auto bg-inr-black md:bg-transparent  md:flex md:items-center md:gap-7 text-white text-sm">
            <li class="md:hidden flex justify-between mb-5">
                <input type="search" name="" id="" placeholder="Apa yang Ingin Anda Cari?" class="text-sm font-light bg-inr-white rounded px-4 py-2 w-9/12 text-inr-black focus:outline-none">
                <button @click="nav=!nav" class="text-inr-white  w-12 h-10 rounded">
                    <i class="fas fa-xmark text-2xl"></i>
                </button>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline">
                    Beranda
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li x-data="{profile:false}" class="group">
                <span x-on:click="profile = !profile" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline cursor-pointer">
                    Profil
                    <i :class="profile?'-rotate-180':''" class="duration-300 ml-1 text-xs fas fa-angle-down"></i>
                </span>
                <ul  :class="profile?'h-56 md:visible':'h-0 md:invisible'"  class=" group-hover:visible block md:h-auto overflow-hidden transition-all duration-300 md:absolute text-sm md:mt-8 bg-[#292929] md:p-3 rounded">
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">Sejarah</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">AD-ART</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">JUKLAK JUKNIS</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">GBHO</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">Mantan Ketuan</a></li>
                    <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">Struktur Organisasi</a></li>
                </ul>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline">
                    Kegiatan
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline">
                    Karya
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline">
                    Angkatan
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                <a href="" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline">
                    Tentang Kami
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
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