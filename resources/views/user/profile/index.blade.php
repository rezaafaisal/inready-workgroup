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
                <h3 class="text-5xl font-extralight">{{ $data['user']->name }}</h3>
                <div class="mt-8">
                    {{ $data['user']->profile->headline }}
                </div>
                <div class="mt-3 font-light first-line flex gap-5">
                    <span><i class="fas fa-certificate text-teal-500"></i> Angkatan {{ $data['user']->profile->generation->name }}</span>
                    <span><i class="fas fa-location-dot text-rose-500"></i> {{ $data['user']->profile->currentPlace?->name ?? 'Belum ditentukan' }}</span>
                </div>
            </div>
        </div>
        <div class="mt-10 lg:mt-6 lg:ml-72">
            <h4 class="font-bold mb-3">Tentang Saya</h4>
            <p class="text-justify font-light">
                {{ $data['user']->profile->biography }}
            </p>
        </div>
    </div>
</section>
<section class=" ">
    <div class="wrapper py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="rounded p-5 bg-white shadow-md">
                <h3 class="font-bold mb-5">Riwayat Pendidikan</h3>
                @if ($data['sd'] == null || $data['sltp'] == null || $data['slta'] == null)
                    <span class="block text-center p-4 bg-yellow-100 text-yellow-500 ">Data masih kosong</span>
                @endif
                <ul class="list-disc ml-4 flex flex-col gap-2">
                    @if ($data['sd'])
                        <li>{{ $data['sd']->name }} ({{ $data['sd']->period }})</li>
                    @endif
                    @if ($data['sltp'])
                        <li>{{ $data['sltp']->name }} ({{ $data['sltp']->period }})</li>
                    @endif
                    @if ($data['slta'])
                        <li>{{ $data['slta']?->name." ( ".$data['slta']?->period." )" }}</li>
                    @endif
                </ul>
            </div>
            <div class="rounded p-5 bg-white shadow-md">
            <h3 class="font-bold mb-5">Riwayat Organisasi</h3>
                @if ($data['organization'])
                    <span class="block text-center p-4 bg-yellow-100 text-yellow-500 ">Data masih kosong</span>
                @endif
                <ul class="list-disc ml-4 flex flex-col gap-2">
                    @foreach ($data['organization'] as $item)
                        <li>{{ $item->name }} ({{ $item->period }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
