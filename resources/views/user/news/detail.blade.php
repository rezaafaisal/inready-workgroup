@extends('layouts.user')
@section('body')
<section class="pt-20 divide-y divide-black">
    <div class="wrapper py-20">
        <h1 class="font-semibold text-3xl text-center mb-5">Pengumuman Calon Angkatan Muda yang berhasil lolos ke Tahap
            Selanjutnya</h1>
        <div class="mb-10">
            <span class="block text-sm">Reza Faisal - Pengurus</span>
            <span class="text-inr-black/50 text-xs">Jumat, 27 Jan 2023 17:15 WIB</span>
        </div>
        <div class="mb-5">
            <img src="{{ asset('images/ui/news_3.png') }}" alt="" class="object-cover w-full h-60 md:h-[300px] lg:h-[400px] rounded">
        </div>
        <p class="text-inr-black/70 text-justify leading-relaxed mb-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est magnam ullam incidunt possimus sit officiis rem
            perspiciatis impedit molestias ipsam. Et, labore beatae. Accusamus similique reiciendis dolorem ex fuga
            natus et consequatur doloremque! Consequatur recusandae ex consectetur unde alias eum vel velit, illo itaque
            quaerat, quasi facere iusto nam a voluptatum expedita ipsum rem omnis non suscipit fugit earum? Dignissimos
            magnam voluptatum non harum fugit nihil quam eveniet cum exercitationem, quis minus ad! Optio vitae deleniti
            pariatur neque aperiam suscipit deserunt sit culpa eaque veniam, debitis alias necessitatibus natus
            accusantium accusamus! Blanditiis a ipsa repellendus doloremque voluptates necessitatibus autem debitis.
        </p>
        <p class="text-inr-black/70 text-justify leading-relaxed mb-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est magnam ullam incidunt possimus sit officiis rem
            perspiciatis impedit molestias ipsam. Et, labore beatae. Accusamus similique reiciendis dolorem ex fuga
            natus et consequatur doloremque! Consequatur recusandae ex consectetur unde alias eum vel velit, illo itaque
            quaerat, quasi facere iusto nam a voluptatum expedita ipsum rem omnis non suscipit fugit earum? Dignissimos
            magnam voluptatum non harum fugit nihil quam eveniet cum exercitationem, quis minus ad! Optio vitae deleniti
            pariatur neque aperiam suscipit deserunt sit culpa eaque veniam, debitis alias necessitatibus natus
            accusantium accusamus! Blanditiis a ipsa repellendus doloremque voluptates necessitatibus autem debitis.
        </p>
        <p class="text-inr-black/70 text-justify leading-relaxed mb-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est magnam ullam incidunt possimus sit officiis rem
            perspiciatis impedit molestias ipsam. Et, labore beatae. Accusamus similique reiciendis dolorem ex fuga
            natus et consequatur doloremque! Consequatur recusandae ex consectetur unde alias eum vel velit, illo itaque
            quaerat, quasi facere iusto nam a voluptatum expedita ipsum rem omnis non suscipit fugit earum? Dignissimos
            magnam voluptatum non harum fugit nihil quam eveniet cum exercitationem, quis minus ad! Optio vitae deleniti
            pariatur neque aperiam suscipit deserunt sit culpa eaque veniam, debitis alias necessitatibus natus
            accusantium accusamus! Blanditiis a ipsa repellendus doloremque voluptates necessitatibus autem debitis.
        </p>
    </div>
</section>
<section>
    <div class="wrapper py-20">
        <h2 class="font-semibold text-2xl text-center mb-10">Berita Lainnya</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="border border-inr-black/20 rounded">
                <img class="rounded-t w-full object-cover h-60 md:h-36 xl:h-48 z-10"
                    src="{{ asset('images/ui/news_1.png') }}" alt="">
                <div class="p-3">
                    <span class="block text-xs text-inr-black/40 mb-2">28 Des 2022</span>
                    <a href="{{ route('show_news', ['slug' => 'first']) }}"
                        class="text-inr-black text-sm font-semibold mb-2 block hover:text-inr-yellow duration-150">
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
