@extends('layouts.user')
@section('body')
<section class="pt-20">
    <div class="wrapper py-20">
        <h1 class="section-title">Outdoor Inready Wokrkgroup</h1>
        <ul class="block rounded border divide-y shadow w-full md:w-10/12 lg:w-8/12 mx-auto mb-20">
            <li class="grid grid-cols-2 py-3 px-4 hover:bg-gray-50">
                <span class="font-medium">
                    <i class="fas fa-calendar-days w-5"></i>
                    Tanggal Pelaksanaan
                </span>
                <span class="text-sm">28 Januari 2023 13:00 - 15:00 WITA</span>
            </li>
            <li class="grid grid-cols-2 py-3 px-4 hover:bg-gray-50">
                <span class="font-medium">
                    <i class="fas fa-map-pin w-5"></i>
                    Lokasi Kegiatan
                </span>
                <span class="text-sm">Bissoloro</span>
            </li>
            <li class="grid grid-cols-2 py-3 px-4 hover:bg-gray-50">
                <span class="font-medium">
                    <i class="fas fa-user w-5"></i>
                    Ketua Panitia
                </span>
                <span class="text-sm">Martis</span>
            </li>
            <li class="grid grid-cols-2 py-3 px-4 hover:bg-gray-50">
                <span class="font-medium">
                    <i class="fas fa-users w-5"></i>
                    Sasaran
                </span>
                <span class="text-sm">Angkatan Muda</span>
            </li>
            <li class="grid grid-cols-2 py-3 px-4 hover:bg-gray-50">
                <span class="font-medium">
                    <i class="fas fa-chart-simple w-5"></i>
                    Status
                </span>
                <div>
                    <span
                        class="text-sm h-min px-4 py-1 bg-teal-100 text-teal-500 rounded border border-teal-500">selesai</span>
                </div>
            </li>
        </ul>
        <article class="text-justify leading-8 text-inr-black grid gap-10">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus sequi adipisci, iste quo quos officia
                nesciunt magnam tempore obcaecati, qui debitis corrupti asperiores exercitationem tenetur illo
                temporibus neque. Tempora, laborum! Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Voluptatibus, natus nesciunt officiis rem facere accusamus doloribus deleniti? Laborum quae natus illo
                atque omnis aperiam laboriosam repellendus nam blanditiis possimus quam sit voluptatum nobis ab et
                corporis aspernatur fugit labore culpa ut porro, libero officia architecto. Ratione quod, inventore
                velit aliquid nesciunt provident explicabo harum rerum atque quidem cumque aut quae architecto debitis
                commodi necessitatibus soluta sequi molestiae incidunt facilis odit. Modi, tenetur cupiditate.
                Molestiae, doloremque numquam sed iusto doloribus, quisquam possimus praesentium odio dolorem saepe
                nostrum maxime, mollitia veniam voluptatem blanditiis dolores eveniet labore beatae illo quo rem placeat
                ipsam!</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores totam, iste expedita perspiciatis ut
                minus id a dicta? Nisi facere culpa earum. Aspernatur quibusdam voluptates dolorem dolorum.
                Reprehenderit, libero architecto! Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet
                asperiores dignissimos nam quia quos minima soluta deserunt, autem sed iusto vel odio illum eos. Debitis
                dolores vel quasi?</p>
        </article>
    </div>
</section>
<section class="bg-inr-black text-inr-white">
    <div class="wrapper py-20">
        <h1 class="section-title">Dokumentasi Kegiatan</h1>
        {{-- <span class="block py-5 text-center font-light bg-teal-100 text-teal-500 border border-teal-500 rounded">
                Belum ada foto yang diunggah pengurus.
            </span> --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @for($i = 0; $i < 9; $i++)
                <div class="w-full border border-white rounded overflow-hidden">
                    <img src="{{ asset('images/ui/news_2.png') }}" alt=""
                        class="h-56 object-cover w-full duration-300 hover:scale-125">
                </div>
            @endfor
        </div>
    </div>
</section>
<section>
    <div class="wrapper py-20">
        <h1 class="section-title">Kegiatan Lainnya</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @for($i = 0; $i < 3; $i++)
                <div class="shadow rounded">
                    <img class="rounded-t w-full object-cover h-60 md:h-36 xl:h-48 z-10"
                        src="{{ asset('images/ui/news_1.png') }}" alt="">
                    <div class="p-3">
                        <div class="mb-2 text-xs text-inr-black/40">
                            <span class="block mb-2">
                                <i class="fa-solid fa-calendar-days w-5"></i>28 Des 2022
                            </span>
                            <span class="block">
                                <i class="fas fa-user w-5"></i>Divisi Keorganisasian
                            </span>
                        </div>
                        <a href="{{ route('show_activity', ['slug' => 'first']) }}"
                            class="text-inr-black font-semibold mb-2 block hover:text-inr-yellow duration-150">
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
