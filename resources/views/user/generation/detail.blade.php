@extends('layouts.user')
@section('body')
    <section class="pt-20">
        <div class="wrapper py-20">
            <h1 class="section-title">Keluarga Besar Inready Workgroup</h1>
            {{-- <ul class="flex gap-2 mb-10">
                <li>
                    <a href="">Beranda /</a>
                </li>
                <li>
                    <a href="">Angkatan /</a>
                </li>
                <li>
                    <span href="">Angkatan Pendiri</span>
                </li>
            </ul> --}}
            <h2 class="text-xl text-inr-black font-light mb-20">Angkatan Pendiri</h2>
            <div class="flex justify-end mb-10">
                <div>
                    <input class="rounded px-4 py-2 lg:w-60 outline-none ring-2 ring-inr-yellow" type="search" name="" id="">
                    <button class="px-4 py-2 rounded bg-inr-yellow border-2 border-inr-yellow">Cari</button>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @for ($i = 0; $i < 20; $i++)
                <div class="overflow-hidden">
                    <img src="{{ asset('images/ui/eren.jpeg') }}" alt="" class="rounded-xl h-80 lg:h-60 w-full object-cover">
                    <div class="py-3">
                        <span class="block font-semibold">Eren Jeager</span>
                        <span class="block font-light mt-1">Ketua Titan</span>
                        <div class="flex gap-3 mt-3 text-inr-white">
                            <a href="" class="flex justify-center items-center bg-gray-300 w-7 h-7 rounded-full">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="" class="flex justify-center items-center bg-gray-300 w-7 h-7 rounded-full">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>
@endsection