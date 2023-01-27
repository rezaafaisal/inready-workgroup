@extends('layouts.user')
@section('body')
<section class="pt-20">
    <div class="wrapper py-20">
        <h2 class="font-semibold text-3xl mb-10">Kagiatan Akan Datang</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @for ($i = 0; $i < 6; $i++)
            <div class="shadow rounded">
                <img class="rounded-t w-full object-cover h-60 md:h-36 xl:h-48 z-10"
                    src="{{ asset('images/ui/news_1.png') }}" alt="">
                <div class="p-3">
                    <div class="mb-2 text-sm text-inr-black/40">
                        <span class="block mb-2">
                            <i class="fa-solid fa-calendar-days w-5"></i>28 Des 2022
                        </span>
                        <span class="block">
                            <i class="fas fa-user w-5"></i>Divisi Keorganisasian
                        </span>
                    </div>
                    <a href="{{ route('show_news', ['slug' => 'first']) }}" class="text-inr-black font-semibold mb-2 block hover:text-inr-yellow duration-150">
                        Pengumuman Calon Angkatan Muda yang berhasil lolos ke Tahap Selanjutnya
                    </a>
                </div>
                <div class="p-2 text-sm font-light text-end bg-gray-100 border-t border-inr-black/10 rounded-b">
                    5 Hari Lagi
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>
@endsection
