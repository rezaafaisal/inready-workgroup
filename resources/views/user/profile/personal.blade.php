@extends('layouts.user')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/selectize.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
@endsection
@section('body')
{{-- {{ dd($data['profile']->whatsapp) }} --}}
<section class="pt-20">
    <div class="wrapper py-20">
        <div class="flex">
            @include('partials.user.setting_sidebar')
            <div class="grow">
                <x-forms.profile-setting title="Data Pribadi" route="{{ route('user.setting.setPersonal') }}">
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">No. Whatsapp</span>
                        <div class="flex w-9/12 @error('whatsapp') is-invalid @enderror">
                            <span
                                class="shrink-0 bg-gray-200 w-16 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                +62
                            </span>
                            <input type="text" name="whatsapp" class="rounded-l-none form-control-1 rounded-r grow" value="{{ old('whatsapp') ?? $data['profile']->whatsapp }}" placeholder="85XXXXXXX">
                        </div>
                        @error('whatsapp')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="block mb-7">
                        <span class="font-semibold mb-2 block">Kota Domisili</span>
                        <select class="city w-9/12 @error('current_place') is-invalid rounded @enderror" name="current_place" placeholder="Ketikkan kota anda">
                            <option value=""></option>
                            @foreach ($data['cities'] as $city)
                                <option {{ ($data['profile']->current_place == $city->id) ? 'selected' : '' }}  value="{{ $city->id }}">{{ $city->name }} - {{ $city->province->name }}</option>
                            @endforeach
                        </select>
                        @error('current_place')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="block mb-7">
                        <span class="font-semibold mb-2 block">Alamat Lengkap</span>
                        <textarea name="address" rows="3" class="form-control w-9/12 @error('address') is-invalid @enderror"
                            placeholder="Alamat anda saat ini">{{ $data['profile']->address }}</textarea>
                        @error('adress')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="block mb-7">
                        <span class="font-semibold mb-2 block">Tempat Lahir</span>
                        <select class="city w-9/12 @error('birth_place') is-invalid rounded @enderror" name="birth_place" placeholder="Ketikkan kota anda">
                            <option value=""></option>
                            @foreach ($data['cities'] as $city)
                                <option {{ ($data['profile']->birth_place == $city->id) ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }} - {{ $city->province->name }}</option>
                            @endforeach
                        </select>
                        @error('birth_place')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 w-9/12 gap-10 mb-7">
                        <label class="block mb-7">
                            <span class="font-semibold mb-2 block">Tanggal Lahir</span>
                            <div class="flex @error('birth_date') is-invalid @enderror">
                                <input type="text" name="birth_date" id="date" class="form-control-1 rounded-l w-full" readonly placeholder="Pilih tanggal lahir" value="{{ $data['profile']->birth_date }}">
                                <span
                                    class="shrink-0 cursor-pointer w-10 rounded-r flex items-center justify-center border border-slate-300 border-l-0 font-extralight">
                                    <i class="fas fa-calendar-day"></i>
                                </span>
                            </div>
                            @error('birth_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </label>
                        <div class="block mb-7 font-extralight">
                            <span class="font-semibold mb-2 block">Jenis Kelamin</span>
                            <label class="flex items-center mb-5 cursor-pointer">
                                <input {{ ($data['profile']->gender_id == 1) ? 'checked' : '' }} type="radio" name="gender" id="" value="1"
                                    class="appearance-none h-3 w-3 rounded-full checked:bg-inr-yellow ring-offset-2 ring-offset-white ring ring-inr-yellow">
                                <span class="ml-4">Laki-laki</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input {{ ($data['profile']->gender_id == 2) ? 'checked' : '' }} type="radio" name="gender" id="" value="2"
                                    class="appearance-none h-3 w-3 rounded-full checked:bg-inr-yellow ring-offset-2 ring-offset-white ring ring-inr-yellow">
                                <span class="ml-4">Perempuan</span>
                            </label>
                            @error('gender')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <label class="block mb-7">
                        <span class="font-semibold mb-2 block">Pekerjaan Saat Ini</span>
                        <input type="text" name="job" class="form-control w-9/12 @error('job') is-invalid @enderror" placeholder="Ketikkan pekerjaan anda" value="{{ old('job') ?? $data['profile']->job }}">
                        @error('job')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="block mb-7">
                        <span class="font-semibold mb-2 block">Perusahaan Saat Ini</span>
                        <input type="text" name="instance" class="form-control w-9/12 @error('instance') is-invalid @enderror"
                            placeholder="Ketikkan perusahaan tempat kerja anda" value="{{ old('instance') ?? $data['profile']->instance }}">
                        @error('instance')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </label>
                </x-forms.profile-setting>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.default.min.css" media="all"> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
    integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.city').selectize({})

</script>
@endsection
