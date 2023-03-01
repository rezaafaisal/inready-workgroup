@extends('layouts.user')
@section('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
@endsection
@section('body')
<section class="pt-20">
    <div class="wrapper py-20">
        <div class="flex">
            @include('partials.user.setting_sidebar')
            <div class="grow grid grid-cols-1 gap-10">
                <x-forms.profile-setting title="Riwayat Pendidikan" route="{{ route('user.etcetera.education') }}">
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Sekolah Dasar</span>
                        <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                            <input type="text" name="sd" class="form-control grow rounded-r" placeholder="Nama sekolah" value="{{ $data['sd']['name'] ?? '' }}">
                            <input type="text" id="sd" name="sd_period" class="form-control md:w-32" placeholder="Tahun sekolah" readonly value="{{ $data['sd']['period'] ?? '' }}">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Sekolah Lanjutan Tingkat Pertama</span>
                        <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                            <input type="text" name="sltp" class="form-control grow rounded-r" placeholder="Nama sekolah" value="{{ $data['sltp']['name'] ?? '' }}">
                            <input type="text" name="sltp_period" id="sltp" class="form-control md:w-32" autocomplete="off"
                                placeholder="Tahun sekolah" readonly value="{{ $data['sltp']['period'] ?? '' }}">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Sekolah Lanjutan Tingkat Atas</span>
                        <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                            <input type="text" name="slta" class="form-control grow rounded-r" placeholder="Nama sekolah" value="{{ $data['slta']['name'] ?? '' }}">
                            <input type="text" name="slta_period" id="slta" class="form-control md:w-32" autocomplete="off"
                                placeholder="Tahun sekolah" readonly value="{{ $data['slta']['period'] ?? '' }}">
                        </div>
                    </label>
                </x-forms.profile-setting>
                <x-forms.profile-setting title="Riwayat Organisasi"
                    route="{{ route('user.etcetera.organization') }}">
                    <div x-data="{count: localStorage.getItem('count')}" x-init="$watch('count', (val) => localStorage.setItem('count', val))">
                        @for ($i = 1; $i <= 10; $i++)
                            <label :class="count >= {{ $i-1 }} || {{ $i }} == 1 ? 'block' : 'hidden'" class="mb-7">
                                <span class="font-semibold mb-2 block">Organisasi {{ $i }}</span>
                                <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                                    <input type="text" name="organization_{{ $i }}" class="form-control grow rounded-r"
                                    placeholder="Nama Organisasi" value="{{ $data['organization'][$i-1]['name'] ?? '' }}">
                                    <input type="text" readonly name="organization_{{ $i }}_year" id="organization_{{ $i }}"
                                    class="form-control md:w-32" placeholder="Periode" autocomplete="off" value="{{ $data['organization'][$i-1]['period'] ?? null }}">
                                    <input type="hidden" name="organization_{{ $i }}_id" value="{{ $data['organization'][$i-1]['id'] ?? null }}">
                                </div>
                            </label>
                        @endfor
                        <div :class="count == 10-1 ? 'hidden':'block'" class="w-full mb-7">
                            <button @click="count++" type="button"
                                class="text-xs px-3 py-1 rounded-full bg-gray-200">Tambah Kolom</button>
                        </div>
                    </div>
                </x-forms.profile-setting>
                <x-forms.profile-setting title="Sosial Media" route="{{ route('user.etcetera.social') }}">
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Instagram</span>
                        <div class="flex w-full lg:w-7/12">
                            <span
                                class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-instagram"></i>
                            </span>
                            <input type="text" name="instagram" class="form-control-1 grow rounded-r" placeholder="username" value="{{ $data['social']['instagram'] }}">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Twitter</span>
                        <div class="flex w-full lg:w-7/12">
                            <span
                                class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-twitter"></i>
                            </span>
                            <input type="text" name="twitter" class="form-control-1 grow rounded-r" placeholder="username" value="{{ $data['social']['twitter'] }}">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Facebook</span>
                        <div class="flex w-full lg:w-7/12">
                            <span
                                class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-facebook-f"></i>
                            </span>
                            <input type="text" name="facebook" class="form-control-1 grow rounded-r" placeholder="username" value="{{ $data['social']['facebook'] }}">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">LinkedIn</span>
                        <div class="flex w-full lg:w-7/12">
                            <span
                                class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-linkedin-in"></i>
                            </span>
                            <input type="text" name="linkedin" class="form-control-1 grow rounded-r" placeholder="username"  value="{{ $data['social']['linkedin'] }}">
                        </div>
                    </label>
                </x-forms.profile-setting>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    @php
        $count = count($data['organization']);
        // dd($count);
        // $count = 5;
        if($count == 0) $count = 1;
    @endphp
    <script>
        localStorage.setItem('count', {{ $count-1 }});
        let count = localStorage.getItem('count');
    </script>
@endsection