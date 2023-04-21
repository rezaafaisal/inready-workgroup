@extends('layouts.user')
@section('body')
    <section class="pt-20">
        <div class="wrapper py-20">
            <h1 class="section-title">Keluarga Besar Inready Workgroup</h1>
            <div class="flex justify-between items-start">
                <h2 class="text-xl text-inr-black font-light mb-20">Angkatan {{ ($data['generation'] == 0) ? 'Pendiri' : $data['generation'] }}</h2>
                <a href="{{ route('generation') }}" class="block py-1 px-4 bg-inr-yellow rounded hover:bg-inr-yellow-1 duration-150"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="flex justify-end mb-10">
                <form action="{{ route('show_generation', ['generation' => $data['generation']]) }}" method="get">
                    <input class="rounded px-4 py-2 lg:w-60 outline-none ring-2 ring-inr-yellow @error('keyword') is-invalid @enderror" type="search" name="keyword" id="keyword" value="{{ old('keyword') }}">
                    @error('keyword')
                        <span class="text-xs text-rose-500">
                            {{ $message }}
                        </span>
                    @enderror
                    <button class="px-4 py-2 rounded bg-inr-yellow border-2 border-inr-yellow">Cari</button>
                </form>
            </div>
            @if ($data['members']->count() == 0)
                <span class="block bg-sky-200 text-sky-500 p-10 text-center rounded">
                    Belum ada anggota, silahkan hubungi pengurus untuk penambahan data anggota baru
                </span>
            @endif
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @foreach ($data['members'] as $member)
                    <div class="overflow-hidden" data-aos="fade-up">
                        <img src="{{ asset('profiles/'.$member->image) }}" alt="" class="rounded-xl h-80 lg:h-60 w-full object-cover">
                        <div class="py-3">
                            <span class="block font-semibold">{{ $member->user->name }}</span>
                            <span class="block font-light mt-1">{{ $member->user?->structures->first()?->division ?? 'Anggota' }}</span>
                            <div class="flex gap-3 mt-3 text-inr-white">
                                @if ($member->facebook )
                                    <a href="{{ $member->facebook }}" target="_blank" class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    
                                @endif
                                @if ($member->instagram )
                                    <a href="{{ $member->instagram }}" target="_blank" class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    
                                @endif
                                @if ($member->linkedin)
                                    <a href="{{ $member->linkedin }}" target="_blank" class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                @endif
                                @if ($member->twitter)
                                    <a href="{{ $member->twitter }}" target="_blank" class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection