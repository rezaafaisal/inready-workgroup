@extends('layouts.user')
@section('body')
<section class="pt-20">
    <div class="wrapper py-20">
        <h2 class="font-semibold text-3xl mb-10">Berita Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="border border-inr-black/20 rounded">
                <img class="rounded-t w-full object-cover h-60 md:h-36 xl:h-48 z-10"
                    src="{{ asset('images/ui/news_1.png') }}" alt="">
                <div class="p-3">
                    <span class="block text-xs text-inr-black/40 mb-2">28 Des 2022</span>
                    <a href="{{ route('show_news', ['slug' => 'first']) }}" class="text-inr-black text-sm font-semibold mb-2 block hover:text-inr-yellow duration-150">
                        Pengumuman Calon Angkatan Muda yang berhasil lolos ke Tahap Selanjutnya
                    </a>
                    <p class="text-inr-black/70 text-xs text-justify font-light">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsa quasi
                        consectetur cum cupiditate. o
                    </p>
                </div>
            </div>
            <div class="border border-inr-black/20 rounded">
                <img class="rounded-t w-full object-cover h-60 md:h-36 xl:h-48 z-10"
                    src="{{ asset('images/ui/news_1.png') }}" alt="">
                <div class="p-3">
                    <span class="block text-xs text-inr-black/40 mb-2">28 Des 2022</span>
                    <a href="" class="text-inr-black text-sm font-semibold mb-2 block">
                        Pengumuman Calon Angkatan Muda yang berhasil lolos ke Tahap Selanjutnya
                    </a>
                    <p class="text-inr-black/70 text-xs text-justify font-light">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsa quasi
                        consectetur cum cupiditate. onsectetur adipisicing elit. Sed ipsa quasi
                        consectetur cum cupiditate.
                    </p>
                </div>
            </div>
            <div class="border border-inr-black/20 rounded">
                <img class="rounded-t w-full object-cover h-60 md:h-36 xl:h-48 z-10"
                    src="{{ asset('images/ui/news_1.png') }}" alt="">
                <div class="p-3">
                    <span class="block text-xs text-inr-black/40 mb-2">28 Des 2022</span>
                    <a href="" class="text-inr-black text-sm font-semibold mb-2 block">
                        Pengumuman Calon Angkatan Muda yang berhasil lolos ke Tahap Selanjutnya
                    </a>
                    <p class="text-inr-black/70 text-xs text-justify font-light">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsa quasi
                        consectetur cum cupiditate. onsectetur adipisicing elit. Sed ipsa quasi
                        consectetur cum cupiditate.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
