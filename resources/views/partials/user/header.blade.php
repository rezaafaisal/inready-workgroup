@php
    $type = App\Http\Controllers\Admin\Ledger\DocumentController::type();
    $adart = App\Models\Document::where(['type' => $type[0], 'status' => true])->first()?->file;
    $juklis = App\Models\Document::where(['type' => $type[1], 'status' => true])->first()?->file;
    $gbho = App\Models\Document::where(['type' => $type[2], 'status' => true])->first()?->file;
    $data = [
        'ad-art' => asset('documents/'.$type[0].'/'.$adart),
        'juklat-juknis' => asset('documents/'.$type[1].'/'.$juklis),
        'ad-art' => asset('documents/'.$type[2].'/'.$gbho),
    ];

    $periods = App\Models\Period::orderBy('year', 'DESC')->with('structure')->get();

    // dd($organizer);
@endphp
<header class="bg-inr-black w-full fixed z-20">
    <div x-data="{nav:false}" class="wrapper flex justify-between items-center">
        <img src="{{ asset('images/ui/logo_yellow.png') }}" alt="logo" class="w-20 h-20">

        {{-- list tab - desktop --}}
        <ul class="hidden bg-inr-black md:flex items-center gap-7 text-white text-sm">
            <li>
                <a href="{{ route('home') }}" class="hover:text-inr-yellow{{ ($active == 'home') ? ' text-inr-yellow ' : ' ' }}duration-150 inline">Beranda</a>
            </li>
            @if (Auth::user())
            <li class="group">
                <span class="hover:text-inr-yellow py-0 cursor-pointer{{ ($active == 'history') ? ' text-inr-yellow' : '' }}">
                    Buku Besar
                </span>
                <ul class="group-hover:visible invisible group-hover:translate-y-0 translate-y-5 group-hover:opacity-100 opacity-0 group-hover:delay-100 delay-300  block h-auto ease-in-out duration-300 absolute text-sm mt-8 bg-[#292929] md:p-3 rounded">
                    <li><a href="{{ route('history') }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">Sejarah</a></li>
                    <li><a href="{{ asset('document/dokumen.pdf') }}" target="_blank" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">AD-ART</a></li>
                    <li><a href="{{ $data['juklat-juknis'] }}" target="_blank" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">JUKLAT JUKNIS</a></li>
                    <li><a href="{{ asset('document/dokumen.pdf') }}" target="_blank" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">GBHO</a></li>
                    <li><a href="{{ route('leader') }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">Mantan Ketua</a></li>
                </ul>
            </li>
            @endif

{{-- coming soon --}}
            {{-- <li>
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
            </li> --}}

            <li>
                <a href="{{ route('generation') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline{{ ($active == 'generation') ? ' text-inr-yellow' : '' }}">
                    Angkatan
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li class="group">
                <span class="hover:text-inr-yellow py-0 cursor-pointer{{ ($active == 'manager') ? ' text-inr-yellow' : '' }}">
                    Pengurus
                </span>
                <ul class="group-hover:visible invisible group-hover:translate-y-0 translate-y-5 group-hover:opacity-100 opacity-0 group-hover:delay-100 delay-300  block h-auto ease-in-out duration-300 absolute text-sm mt-8 bg-[#292929] md:p-3 rounded">
                    @foreach ($periods->take(4) as $period)
                        <li class="relative group/item">
                            <span class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light cursor-pointer delay-300 ease-in-out group-hover/item:bg-inr-yellow group-hover/item:text-inr-black">Periode {{ $period->year }}</span>
                            <ul class="group-hover/item:visible invisible absolute bg-[#292929] top-0 group-hover/item:translate-x-32 translate-x-24 delay-150 w-56 h-auto ease-out duration-300 text-sm md:p-3 rounded opacity-0 group-hover/item:opacity-100">
                                <li>
                                    <a href="{{ route('manager', ['year' => $period->year, 'division' => 'elder']) }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">Pembina</a>
                                </li>
                                <li>
                                    <a href="{{ route('manager', ['year' => $period->year, 'division' => 'dpo']) }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">DPO</a>
                                </li>
                                <li>
                                    <a href="{{ route('manager', ['year' => $period->year, 'division' => 'bph']) }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">Pengurus Harian</a>
                                </li>
                                @foreach ($period->structure?->where('type', 'bpo')->unique('division') ?? [] as $bpo)
                                    <li>
                                        <a href="{{ route('manager', ['year' => $period->year, 'division' => \Str::slug($bpo->division)]) }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">{{ $bpo->division }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ route('about') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 md:py-0 md:inline{{ ($active == 'about') ? ' text-inr-yellow' : '' }}">
                    Tentang Kami
                    <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                </a>
            </li>
            <li>
                @if (Auth::user())
                <div class="group">
                    <div class="flex items-center cursor-pointer">
                        <img src="{{ (Auth::user()->profile->image != null) ? asset('profiles/'.Auth::user()->profile->image) : asset('images/ui/user.png') }}" alt="" class="h-8 w-8 object-cover rounded-full ring-inr-yellow ring-2 ring-offset-2 ring-offset-inr-black">
                        <i class="fas fa-angle-down ml-3 group-hover:rotate-180 duration-300"></i>
                    </div>
                    <ul class="group-hover:visible invisible group-hover:translate-y-0 translate-y-5 group-hover:opacity-100 opacity-0 group-hover:delay-100 delay-200 -ml-20  block h-auto ease-in-out duration-300 absolute text-sm mt-3 bg-[#292929] rounded">
                        <li>
                            <a href="{{ route('user.profile') }}" class="py-3 px-5 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">
                                <i class="fas fa-user w-6 text-xs"></i>
                                <span>Profil</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.setting.profile') }}" class="py-3 px-5 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">
                                <i class="fas fa-gear w-5 text-xs"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="py-3 px-5 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">
                                <i class="fas fa-arrow-right-from-bracket w-5 text-xs text-red-500"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                @else
                    <a href="{{ route('login') }}" class="mt-4 w-full md:mt-0 md:w-auto btn-yellow">Masuk</a>
                @endif
            </li>
        </ul>

        {{-- list mobile --}}
        <div class="flex items-center gap-2 md:hidden">
            @if (Auth::user())
                <div class="group">
                    <div class="flex items-center cursor-pointer">
                        <img src="{{ (Auth::user()->profile->image != null) ? asset('profiles/'.Auth::user()->profile->image) : asset('images/ui/user.png') }}" alt="" class="h-8 w-8 object-cover rounded-full ring-inr-yellow ring-2 ring-offset-2 ring-offset-inr-black">
                        <i class="fas fa-angle-down ml-3 group-hover:rotate-180 duration-300"></i>
                    </div>
                    <ul class="group-hover:visible invisible group-hover:translate-y-0 translate-y-5 group-hover:opacity-100 opacity-0 group-hover:delay-100 delay-200 -ml-20  block h-auto ease-in-out duration-300 absolute text-sm mt-3 bg-[#292929] rounded">
                        <li>
                            <a href="{{ route('user.profile') }}" class="py-3 px-5 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">
                                <i class="fas fa-user w-6 text-xs"></i>
                                <span>Profil</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.setting.profile') }}" class="py-3 px-5 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">
                                <i class="fas fa-gear w-5 text-xs"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="py-3 px-5 w-full block hover:bg-inr-yellow duration-150 md:transition-none rounded text-inr-white hover:text-inr-black font-light">
                                <i class="fas fa-arrow-right-from-bracket w-5 text-xs text-red-500"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
            <ul  :class="nav?'translate-y-0 opacity-100 visible fixed':'-translate-y-10 opacity-0 invisible absolute'" class="md:hidden py-5 px-10 h-screen top-0 bottom-0 left-0 right-0 w-full duration-300 ease-in-out bg-inr-black text-white text-sm">
                <li class="md:hidden flex justify-between mb-5">
                    <input type="search" name="" id="" placeholder="Apa yang Ingin Anda Cari?" class="text-sm font-light bg-inr-white rounded px-4 py-2 w-9/12 text-inr-black focus:outline-none">
                    <button @click="nav=!nav" class="text-inr-white  h-10 rounded">
                        <i class="fas fa-xmark text-2xl"></i>
                    </button>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3">
                        Beranda
                        <i class="md:hidden fas fa-arrow-up rotate-45 text-xs"></i>
                    </a>
                </li>
                @if (Auth::user())
                    <li x-data="{profile:false}" class="group">
                        <span x-on:click="profile = !profile" class="md:hidden hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 cursor-pointer">
                            Buku Besar
                            <i :class="profile?'-rotate-180':''" class="duration-300 ml-1 text-xs fas fa-angle-down"></i>
                        </span>
                        <ul  :class="profile?'h-min':'h-0'"  class="block overflow-hidden ease-in-out duration-300 bg-[#292929] rounded">
                            <li>
                                <a href="{{ route('history') }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">Sejarah</a>
                            </li>
                            <li><a href="" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">AD-ART</a></li>
                            <li><a href="{{ asset('document/dokumen.pdf') }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">JUKLAK JUKNIS</a></li>
                            <li><a href="{{ asset('document/dokumen.pdf') }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">GBHO</a></li>
                            <li><a href="{{ route('leader') }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">Mantan Ketua</a></li>
                        </ul>
                    </li>
                @endif
    
                {{-- on progress --}}
                {{-- <li>
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
                </li> --}}


                <li>
                    <a href="{{ route('generation') }}" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3">
                        Angkatan
                        <i class="fas fa-arrow-up rotate-45 text-xs"></i>
                    </a>
                </li>
                
                {{-- pengurus --}}
                @php
                    $period = $periods[0];
                @endphp
                <li x-data="{profile:false}" class="group">
                    <span x-on:click="profile = !profile" class="md:hidden hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3 cursor-pointer">
                        Pengurus
                        <i :class="profile?'-rotate-180':''" class="duration-300 ml-1 text-xs fas fa-angle-down"></i>
                    </span>
                    <ul  :class="profile?'h-min':'h-0'"  class="block overflow-hidden ease-in-out duration-300 bg-[#292929] rounded">
                        <li>
                            <a href="{{ route('manager', ['year' => $period->year, 'division' => 'elder']) }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">Pembina</a>
                        </li>
                        <li>
                            <a href="{{ route('manager', ['year' => $period->year, 'division' => 'dpo']) }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">DPO</a>
                        </li>
                        <li>
                            <a href="{{ route('manager', ['year' => $period->year, 'division' => 'bph']) }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">Pengurus Harian</a>
                        </li>
                         @foreach ($period->structure?->where('type', 'bpo')->unique('division') ?? [] as $bpo)
                            <li>
                                <a href="{{ route('manager', ['year' => $period->year, 'division' => \Str::slug($bpo->division)]) }}" class="py-2 px-3 w-full block hover:bg-inr-yellow duration-150 rounded text-inr-white hover:text-inr-black font-light">
                                    {{ $bpo->division }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="" class="hover:text-inr-yellow flex justify-between items-center duration-150 w-full py-3">
                        Tentang Kami
                        <i class="fas fa-arrow-up rotate-45 text-xs"></i>
                    </a>
                </li>
                <li>
                    @if (Auth::user())
                        <a href="{{ route('logout') }}" class="mt-4 w-full block text-center md:mt-0 md:w-auto btn-red">Keluar</a>
                    @else
                        <a href="{{ route('login') }}" class="mt-4 w-full block text-center md:mt-0 md:w-auto btn-yellow">Masuk</a>
                    @endif
                </li>
            </ul>
            <button @click="nav = !nav" class="text-inr-yellow border border-inr-yellow w-12 h-10 rounded md:hidden ">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
</header>