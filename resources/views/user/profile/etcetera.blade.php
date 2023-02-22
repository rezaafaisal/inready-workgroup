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
                            <input type="text" id="sltp" class="form-control md:w-32" autocomplete="off"
                                placeholder="Tahun sekolah">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Sekolah Lanjutan Tingkat Atas</span>
                        <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                            <input type="text" class="form-control grow rounded-r" placeholder="Nama sekolah">
                            <input type="text" id="slta" class="form-control md:w-32" autocomplete="off"
                                placeholder="Tahun sekolah">
                        </div>
                    </label>
                </x-forms.profile-setting>
                <x-forms.profile-setting title="Riwayat Organisasi"
                    route="{{ route('user.etcetera.organization') }}">
                    <div x-data="{count: 1}">
                        {{-- <template x-for="i in count">
                            <label class="block mb-7">
                                <span for="" class="font-semibold mb-2 block">Organisasi <span x-text="i"></span></span>
                                <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                                    <input type="text" :name="'organization_'+count" class="form-control grow rounded-r" placeholder="Nama Organisasi">
                                    <input type="text" :name="'organization_'+count+'_year'" :id="'organization_'+count" class="form-control md:w-32" placeholder="2002 - 2003" autocomplete="off">
                                </div>
                            </label>
                        </template> --}}
                        <label class="block mb-7">
                            <span for="" class="font-semibold mb-2 block">Organisasi 1</span>
                            <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                                <input type="text" name="organization_1" class="form-control grow rounded-r"
                                    placeholder="Nama Organisasi">
                                <input type="text" name="organization_1_year" id="organization_1"
                                    class="form-control md:w-32" placeholder="2002 - 2003" autocomplete="off">
                            </div>
                        </label>
                        <label :class="count > 1 ? 'block' : 'hidden'" class="mb-7">
                            <span for="" class="font-semibold mb-2 block">Organisasi 2</span>
                            <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                                <input type="text" name="organization_2" class="form-control grow rounded-r"
                                    placeholder="Nama Organisasi">
                                <input type="text" name="organization_2_year" id="organization_2"
                                    class="form-control md:w-32" placeholder="2002 - 2003" autocomplete="off">
                            </div>
                        </label>
                        <label :class="count > 2 ? 'block' : 'hidden'" class="mb-7">
                            <span for="" class="font-semibold mb-2 block">Organisasi 3</span>
                            <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                                <input type="text" name="organization_3" class="form-control grow rounded-r"
                                    placeholder="Nama Organisasi">
                                <input type="text" name="organization_3_year" id="organization_3"
                                    class="form-control md:w-32" placeholder="2002 - 2003" autocomplete="off">
                            </div>
                        </label>
                        <label :class="count > 3 ? 'block' : 'hidden'" class="mb-7">
                            <span for="" class="font-semibold mb-2 block">Organisasi 4</span>
                            <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                                <input type="text" name="organization_4" class="form-control grow rounded-r"
                                    placeholder="Nama Organisasi">
                                <input type="text" name="organization_4_year" id="organization_4"
                                    class="form-control md:w-32" placeholder="2002 - 2003" autocomplete="off">
                            </div>
                        </label>
                        <label :class="count > 4 ? 'block' : 'hidden'" class="mb-7">
                            <span for="" class="font-semibold mb-2 block">Organisasi 5</span>
                            <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                                <input type="text" name="organization_5" class="form-control grow rounded-r"
                                    placeholder="Nama Organisasi">
                                <input type="text" name="organization_5_year" id="organization_5"
                                    class="form-control md:w-32" placeholder="2002 - 2003" autocomplete="off">
                            </div>
                        </label>
                        <label :class="count > 5 ? 'block' : 'hidden'" class="mb-7">
                            <span for="" class="font-semibold mb-2 block">Organisasi 6</span>
                            <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                                <input type="text" name="organization_6" class="form-control grow rounded-r"
                                    placeholder="Nama Organisasi">
                                <input type="text" name="organization_6_year" id="organization_6"
                                    class="form-control md:w-32" placeholder="2002 - 2003" autocomplete="off">
                            </div>
                        </label>
                        <label :class="count > 6 ? 'block' : 'hidden'" class="mb-7">
                            <span for="" class="font-semibold mb-2 block">Organisasi 7</span>
                            <div class="flex flex-col md:flex-row w-full md:w-8/12 gap-2">
                                <input type="text" name="organization_7" class="form-control grow rounded-r"
                                    placeholder="Nama Organisasi">
                                <input type="text" name="organization_7_year" id="organization_7"
                                    class="form-control md:w-32" placeholder="2002 - 2003" autocomplete="off">
                            </div>
                        </label>
                        <div class="w-full mb-7">
                            <button @click="count++" type="button"
                                class="text-xs px-3 py-1 rounded-full bg-gray-200">Tambah Kolom</button>
                        </div>
                    </div>
                </x-forms.profile-setting>
                <x-forms.profile-setting title="Sosial Media" route="">
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Instagram</span>
                        <div class="flex w-7/12">
                            <span
                                class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-instagram"></i>
                            </span>
                            <input type="text" class="form-control-1 grow rounded-r">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Twitter</span>
                        <div class="flex w-7/12">
                            <span
                                class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-twitter"></i>
                            </span>
                            <input type="text" class="form-control-1 grow rounded-r">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Facebook</span>
                        <div class="flex w-7/12">
                            <span
                                class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                                <i class="fab fa-facebook-f"></i>
                            </span>
                            <input type="text" class="form-control-1 grow rounded-r">
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">LinkedIn</span>
                        <div class="flex w-7/12">
                            <span
                                class="shrink-0 bg-gray-200 w-10 rounded-l flex items-center justify-center border border-r-0 font-extralight">
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
{{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#satu').AirDatepicker();
        })
    </script> --}}

@endsection
