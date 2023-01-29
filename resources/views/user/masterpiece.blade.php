@extends('layouts.user')
@section('body')
    <section class="pt-20">
        <div class="wrapper py-20">
            <h1 class="section-title text-center">Karya Terbaik Periode 2022-2023</h1>
            <div class="grid grid-cols-1 gap-20">
                <div class="grid grid-cols-2 items-center w-full md:w-10/12 mx-auto mt-20 gap-5 md:gap-10">
                    <div class="rounded-lg bg-inr-yellow">
                        <img src="{{ asset('images/ui/karya.jpg') }}" alt="" class="h-40 w-40 translate-x-5 translate-y-10 md:h-80 md:w-full object-cover rounded-lg">
                    </div>
                    <div class="p-3 text-right">
                        <h2 class="text-lg lg:text-xl font-semibold mb-5">Mobile Android</h2>
                        <ul class="grid grid-rows-4 gap-2 text-sm md:text-base lg:text-lg">
                            <li class="grid grid-cols-2 font-light">
                                <span class="">Judul Karya</span>
                                <span>Aplikasiku</span>
                            </li>
                            <li class="grid grid-cols-2 font-light">
                                <span class="Nama">Nama</span>
                                <span>Aplikasiku</span>
                            </li>
                            <li class="grid grid-cols-2 font-light">
                                <span class="">Deskripsi</span>
                                <span>Aplikasiku</span>
                            </li>
                            <li class="grid grid-cols-2 font-light">
                                <span class="">Link Karya :</span>
                                <span>Aplikasiku</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="grid grid-cols-2 items-center w-full md:w-10/12 mx-auto mt-20 gap-5 md:gap-10">
                    <div class="rounded-lg bg-inr-black order-last">
                        <img src="{{ asset('images/ui/karya.jpg') }}" alt="" class="h-40 w-40 -translate-x-5 translate-y-10 md:h-80 md:w-full object-cover rounded-lg">
                    </div>
                    <div class="p-3 text-left">
                        <h2 class="text-lg lg:text-xl font-semibold mb-5">Website Developer</h2>
                        <ul class="grid grid-rows-4 gap-2">
                            <li class="grid grid-cols-2 font-light">
                                <span class="">Judul Karya :</span>
                                <span>Aplikasiku</span>
                            </li>
                            <li class="grid grid-cols-2 font-light">
                                <span class="Nama">Nama</span>
                                <span>Aplikasiku</span>
                            </li>
                            <li class="grid grid-cols-2 font-light">
                                <span class="">Deskripsi</span>
                                <span>Aplikasiku</span>
                            </li>
                            <li class="grid grid-cols-2 font-light">
                                <span class="">Link Karya</span>
                                <a href="#" class="text-inr-yellow font-bold underline underline-offset-2">github.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20">
        <div class="wrapper">
            <h1 class="section-title text-inr-black text-center">Karya Keren Lainnya</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                @for ($i = 0; $i < 6; $i++)
                <div class="rounded overflow-hidden bg-inr-white shadow">
                    <img src="{{ asset('images/ui/karya.jpg') }}" alt="" class="h-80 md:h-40 object-cover w-full">
                    <ul class="p-4 grid grid-cols-1 gap-2 text-base md:text-sm">
                        <li class="flex justify-between">
                            <span class="font-bold">Nama saya</span>
                            <span class="px-2 py-1 rounded bg-inr-yellow/20 text-inr-bla border border-inr-yellow text-xs">Mobile Apps</span>
                        </li>
                        <li>
                            <span class="">Judul karya saya</span>
                        </li>
                        <li>
                            <a href="" class="font-semibold underline underline-offset-2 text-inr-black">Link figma</a>
                        </li>
                    </ul>
                </div>
                @endfor
            </div>
            <div class="text-center">
                <a href="#" class="btn-yellow">Lihat Karya Lainnya</a>
            </div>
        </div>
    </section>
@endsection