@extends('layouts.user')
@section('body')
<section class="banner bg-inr-black w-full h-screen overflow-auto flex items-center mb-24">
    <div class="wrapper text-center md:text-left">
        <h1 class="text-inr-white font-bold text-3xl md:text-5xl mb-7">Dengan Hitam Emas</h1>
        <div class="md:grid md:grid-cols-2 gap-2 items-center">
            <div class="">
                <h1 class="text-inr-yellow font-bold text-3xl md:text-5xl mb-16">Kita Berkarya</h1>
                <p class="text-inr-white w-10/12 md:w-10/12 m-auto md:m-0 text-justify">Inready Workgroup adalah study club yang berada dilingkup Universitas Islam Negeri Aladdin Makassa. Study club ini fokus pada keilmuan Teknologi Informasi seperti Mobile Development, Web Development, dan UI/UX Design.</p>
                <button class="mt-10 btn-yellow">Lihat Kegiatan Kami</button>
            </div>
            <img src="{{ asset('images/ui/banner.png') }}" alt="" class="hidden md:block">
        </div>
    </div>
</section>
<section class="mb-20">
    <div class="wrapper">
        <h2 class="font-semibold text-3xl mb-10"><span class="border-b-4 border-b-inr-black">Fokus</span> Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            <div class="flex justify-center" data-aos="fade-up">
                <img src="{{ asset('images/ui/web.png') }}" alt="" srcset="">
            </div>
            <div class="flex justify-center" data-aos="fade-up">
                <img src="{{ asset('images/ui/mobile.png') }}" alt="" srcset="">
            </div>
            <div class="flex justify-center" data-aos="fade-up">
                <img src="{{ asset('images/ui/desain.png') }}" alt="" srcset="">
            </div>
        </div>
    </div>
</section>


{{-- on progress --}}
<section class="bg-inr-black py-20">
    <div class="wrapper py-20">
        <div class="text-center flex justify-center">
            <iframe src="https://embed.lottiefiles.com/animation/78289"></iframe>
        </div>
        <h1 class=" text-inr-white text-5xl text-center block">Coming Soon as Possible :)</h1>
        
    </div>
</section>

{{-- temporary --}}
{{-- <section class="bg-inr-black py-20">
    <div class="wrapper">
        <h2 class="font-semibold text-3xl mb-20 text-white">
            <span class="border-b-4 border-b-inr-yellow">Berita</span>
            Terkini
        </h2>
        <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.swip, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: true,
            breakpoints: {
                640: {
                slidesPerView: 2,
                },
                768: {
                slidesPerView: 3,
                },
                1024: {
                slidesPerView: 4,
                },
            },
        })" class="relative w-full mx-auto flex flex-row">
            <div class="absolute inset-y-0 left-0 z-10 flex items-center">
                <button @click="swiper.slidePrev()"
                    class="bg-inr-yellow -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                    <i class="fas fa-angle-left"></i>
                </button>
            </div>

            <div class="swiper-container swiper" x-ref="swip">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @for($i = 0; $i < 4; $i++)
                        <div class="swiper-slide">
                            <div class="border border-white/20 rounded">
                                <img class="rounded-t w-full object-cover h-60 md:h-36 xl:h-48"
                                    src="{{ asset('images/ui/news_'.$i.'.png') }}"
                                    alt="">
                                <div class="p-3">
                                    <span class="block text-xs text-inr-white/40 mb-2">28 Des 2022</span>
                                    <a href="" class="text-inr-white text-sm font-semibold mb-2 block">
                                        Pengumuman Calon Angkatan Muda yang berhasil lolos ke Tahap Selanjutnya
                                    </a>
                                    <p class="text-inr-white/70 text-xs text-justify font-light">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsa quasi
                                        consectetur cum cupiditate...
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endfor
                    <div class="swiper-slide">
                        <div class="border border-white/20 rounded">
                            <img class="rounded-t w-full object-cover h-60 md:h-36 xl:h-48"
                                src="{{ asset('images/ui/news_'.$i.'.png') }}"
                                alt="">
                            <div class="p-3">
                                <span class="block text-xs text-inr-white/40 mb-2">28 Des 2022</span>
                                <a href="" class="text-inr-white text-sm font-semibold mb-2 block">
                                    Pengumuman Calon Angkatan Muda yang berhasil lolos ke Tahap Selanjutnya
                                </a>
                                <p class="text-inr-white/70 text-xs text-justify font-light">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsa quasi
                                    consectetur cum cupiditate. onsectetur adipisicing elit. Sed ipsa quasi
                                    consectetur cum cupiditate.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 z-10 flex items-center">
                <button @click="swiper.slideNext()"
                    class="bg-inr-yellow -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                    <i class="fas fa-angle-right"></i>
                </button>
            </div>
        </div>
        <div class="mt-10 flex justify-center">
            <div class="swiper-pagination"></div>
            <a href="{{ route('news') }}" class="btn-yellow text-sm">Lihat Berita Lainnya</a>
        </div>
    </div>
</section>
<section class="py-20">
    <div class="wrapper">
        <h2 class="font-semibold text-3xl mb-10"><span class="border-b-4 border-b-inr-black">Kegiatan</span></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20">
            <div class="rounded-xl bg-inr-yellow ">
                <img src="{{ asset('images/ui/activity.jpg') }}" alt=""
                    class="h-52 w-full object-cover rounded-t-xl">
                <div class="p-10 text-center">
                    <h4 class="font-semibold text-2xl">Presentase Karya</h4>
                    <p class="text-justify mt-3 text-sm text-inr-black">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis explicabo provident, eos nemo fugit reiciendis, ab nostrum ut itaque aspernatur officia modi ullam! Quos libero illo itaque sequi neque ipsam.</p>
                    <span class="block mt-5 text-inr-white drop-shadow-lg font-bold text-sm">Acara Dimulai dalam : </span>
                    <div class="flex text-white mt-5 justify-between drop-shadow-lg">
                        <div>
                            <span class="text-3xl font-bold">7</span>
                            <span class="text-sm">Hari</span>
                        </div>
                        <div>
                            <span class="text-3xl font-bold">10</span>
                            <span class="text-sm">Jam</span>
                        </div>
                        <div>
                            <span class="text-3xl font-bold">35</span>
                            <span class="text-sm">Menit</span>
                        </div>
                        
                        <div>
                            <span class="text-3xl font-bold">7</span>
                            <span class="text-sm">Detik</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-center font-bold text-2xl mb-10">Kegiatan Lainnya</h3>
                <ul class="border border-inr-black/20 rounded divide-y divide-inr-black/20">
                    <li>
                        <a href="" class="block w-full px-5 py-3 hover:bg-slate-100 duration-100 rounded">
                            <span class="font-medium block mb-1">Kegiatan pertama</span>
                            <span class="block text-xs">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                20 September 2022
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="block w-full px-5 py-3 hover:bg-slate-100 duration-100 rounded">
                            <span class="font-medium block mb-1">Kegiatan pertama</span>
                            <span class="block text-xs">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                20 September 2022
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="block w-full px-5 py-3 hover:bg-slate-100 duration-100 rounded">
                            <span class="font-medium block mb-1">Kegiatan pertama</span>
                            <span class="block text-xs">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                20 September 2022
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="block w-full px-5 py-3 hover:bg-slate-100 duration-100 rounded">
                            <span class="font-medium block mb-1">Kegiatan pertama</span>
                            <span class="block text-xs">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                20 September 2022
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="block w-full px-5 py-3 hover:bg-slate-100 duration-100 rounded">
                            <span class="font-medium block mb-1">Kegiatan pertama</span>
                            <span class="block text-xs">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                20 September 2022
                            </span>
                        </a>
                    </li>
                    <li class="bg-inr-yellow text-inr-black text-center py-2">
                        <a href="" class="text-xs hover:text-inr-black/70 duration-150">Tampilkan lebih banyak <i class="fas fa-arrow-right ml-1"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section> --}}

@endsection
