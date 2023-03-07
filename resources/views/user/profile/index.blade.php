@extends('layouts.user')
@section('body')
<section class="pt-20 bg-inr-black text-inr-white">
    <div class="wrapper py-20 border-b border-gray-200">
        <div class="flex items-start lg:items-center flex-col md:flex-row gap-12 ">
            <div class="flex justify-center shrink-0">
                <div class="relative">
                    <img src="{{ asset('profiles/'.Auth::user()->profile->image) }}" alt=""
                        class="h-40 w-40 lg:h-60 lg:w-60 object-cover rounded-full shadow-lg">
                    <div class="absolute bottom-2 lg:bottom-4 left-32 lg:left-48">
                        <a href="{{ route('user.setting.profile') }}" class="rounded-full p-5 justify-center items-center bg-inr-yellow flex w-10 border-2 text-inr-black border-inr-black h-10">
                            <i class="las la-pen text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="">
                <h3 class="text-5xl font-extralight">{{ $data->name }}</h3>
                <div class="mt-8">
                    {{ $data->profile->headline }}
                </div>
                <div class="mt-3 font-light first-line flex gap-5">
                    <span><i class="fas fa-certificate text-teal-500"></i> Angkatan {{ $data->profile->generation->name }}</span>
                    <span><i class="fas fa-location-dot text-rose-500"></i> {{ $data->profile->currentPlace?->name ?? 'Belum ditentukan' }}</span>
                </div>
            </div>
        </div>
        <div class="mt-10 lg:mt-6 lg:ml-72">
            <h4 class="font-bold mb-3">Tentang Saya</h4>
            <p class="text-justify font-light">
                {{ $data->profile->biography }}
            </p>
        </div>
    </div>
</section>
<section class=" ">
    <div class="wrapper py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- <div class="rounded p-5 bg-white shadow-md">
                <h3 class="font-bold mb-5">Sosial Media</h3>
                <ul class="flex flex-col gap-3">
                    <li>
                        <a href="#" class="flex items-center">
                            <i class="fab fa-facebook-f bg-blue-500 w-5 h-5 flex items-center justify-center text-white rounded"></i>
                            <span class="ml-2">eren jeager</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center">
                            <i class="fab fa-facebook-f bg-blue-500 w-5 h-5 flex items-center justify-center text-white rounded"></i>
                            <span class="ml-2">eren jeager</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center">
                            <i class="fab fa-facebook-f bg-blue-500 w-5 h-5 flex items-center justify-center text-white rounded"></i>
                            <span class="ml-2">eren jeager</span>
                        </a>
                    </li>
                </ul>
            </div> --}}
            <div class="rounded p-5 bg-white shadow-md">
                <h3 class="font-bold mb-5">Riwayat Pendidikan</h3>
                <ul class="list-disc ml-4 flex flex-col gap-2">
                    <li>SDN 1 Paradise (2023-2222)</li>
                    <li>SDN 1 Paradise (2023-2222)</li>
                    <li>SDN 1 Paradise (2023-2222)</li>
                </ul>
            </div>
            <div class="rounded p-5 bg-white shadow-md">
                <h3 class="font-bold mb-5">Riwayat Organisasi</h3>
                <ul class="list-disc ml-4 flex flex-col gap-2">
                    <li>Become Titan (2023-2222)</li>
                    <li>Pramuka (2023-2222)</li>
                    <li>PMR (2023-2222)</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
