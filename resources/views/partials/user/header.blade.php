<header class="bg-inr-black w-full">
    <div class="wrapper flex justify-between">
        <img src="{{ asset('images/ui/logo_yellow.png') }}" alt="logo" class="w-20 h-20">
        <ul class="flex items-center gap-7 text-white">
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
    </div>
</header>