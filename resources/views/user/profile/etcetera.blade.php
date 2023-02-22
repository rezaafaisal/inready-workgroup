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
                <x-forms.profile-setting title="Riwayat Pendidikan" route="">
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Sekolah Dasar</span>
                        <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                            <input type="text" class="form-control grow rounded-r" placeholder="Nama sekolah">
                            <input type="text" id="sd" class="form-control md:w-32" placeholder="Tahun sekolah">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Sekolah Lanjutan Tingkat Pertama</span>
                        <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                            <input type="text" class="form-control grow rounded-r" placeholder="Nama sekolah">
                            <input type="text" id="sltp" class="form-control md:w-32" autocomplete="off" placeholder="Tahun sekolah">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Sekolah Lanjutan Tingkat Atas</span>
                        <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                            <input type="text" class="form-control grow rounded-r" placeholder="Nama sekolah">
                            <input type="text" id="slta" class="form-control md:w-32" autocomplete="off" placeholder="Tahun sekolah">
                        </div>
                    </label>
                </x-forms.profile-setting>
                <x-forms.profile-setting title="Riwayat Organisasi" route="">
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Organisasi</span>
                        <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                            <input type="text" class="form-control grow rounded-r" placeholder="Nama Organisasi">
                            <input type="text" id="organization_1" class="form-control md:w-32" placeholder="Periode">
                        </div>
                    </label>
                    <div class="w-full mb-7">
                        <button @click="alert('halo')" type="button" class="text-xs px-3 py-1 rounded-full bg-gray-200">Tambah Kolom</button>
                    </div>
                </x-forms.profile-setting>
                <x-forms.profile-setting title="Sosial Media" route="">
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Instagram</span>
                        <div class="flex w-7/12">
                            <span class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-instagram"></i>
                            </span>
                            <input type="text" class="form-control-1 grow rounded-r">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Twitter</span>
                        <div class="flex w-7/12">
                            <span class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-twitter"></i>
                            </span>
                            <input type="text" class="form-control-1 grow rounded-r">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Facebook</span>
                        <div class="flex w-7/12">
                            <span class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-facebook-f"></i>
                            </span>
                            <input type="text" class="form-control-1 grow rounded-r">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">LinkedIn</span>
                        <div class="flex w-7/12">
                            <span class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-linkedin-in"></i>
                            </span>
                            <input type="text" class="form-control-1 grow rounded-r">
                        </div>
                    </label>
                </x-forms.profile-setting>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection
