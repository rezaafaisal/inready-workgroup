@extends('layouts.user')
@section('body')
<section class="banner bg-inr-black w-full h-[calc(100vh-80px)] overflow-auto flex items-center mb-24">
    <div class="wrapper text-center md:text-left">
        <h1 class="text-inr-white font-bold text-3xl md:text-5xl mb-7">Dengan Hitam Emas</h1>
        <div class="md:grid md:grid-cols-2 gap-2 items-center">
            <div class="">
                <h1 class="text-inr-yellow font-bold text-3xl md:text-5xl mb-16">Kita Berkarya</h1>
                <p class="text-inr-white w-10/12 md:w-10/12 m-auto md:m-0 text-justify">Inready Workgroup adalah Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit. Pharetra egestas sit feugiat at euismod tellus
                    scelerisque enim lorem. Morbi faucibus ipsum, ut cursus viverra egestas.</p>
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
<section class="bg-inr-black mb-20 py-20">
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
            <button class="btn-yellow text-sm">Lihat Berita Lainnya</button>
        </div>
    </div>
</section>

@endsection
