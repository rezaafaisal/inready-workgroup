@extends('layouts.user')
@section('styles')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
@endsection
@section('body')
<div class="fixed z-50 flex justify-center items-center bg-inr-black bg-opacity-50 h-screen w-full overflow-hidden">
    <div class="w-full m-10 md:w-8/12 lg:w-4/12 bg-inr-white rounded-lg">
        <div class="p-4 border-b border-slate-300 flex justify-between">
            <span>Sesuaikan Gambar</span>
            <button><i class="fas fa-xmark"></i></button>
        </div>
        <div class="p-4">
            <img src="{{ asset('images/ui/eren.jpeg') }}" class="croppie">
        </div>
        <div class="p-4 border-t border-slate-300 flex justify-end">
            <div class="flex gap-3">
                <button>Batal</button>
                <button>Terapkan</button>
            </div>
        </div>
    </div>
</div>
{{-- <script>
       document.documentElement.style.overflow = 'hidden';
</script> --}}
<section class="pt-20">
    <div class="wrapper py-20">
        <div class="flex">
            @include('partials.user.setting_sidebar')
            <div class="grow">
                <x-forms.profile-setting title="Profil Pengguna" route="{{ 'hg' }}">
                    <div class="group mb-7">
                        <span class="font-semibold block mb-2">Foto Diri</span>
                        <input type="file" x-ref="image" name="image" id="image" class="hidden"
                            x-on:change="alert('halo')">
                        <div class="flex gap-5">
                            <img src="{{ asset('images/ui/eren.jpeg') }}" alt=""
                                class="w-28 h-28 object-cover rounded">
                            <div>
                                <button @click="$refs.image.click()" type="button" class="btn-yellow text-sm">Pilih
                                    Foto</button>
                                <p class="font-extralight mt-4 text-sm max-w-md">Gambar Profile Anda sebaiknya memiliki
                                    rasio 1:1
                                    dan berukuran tidak lebih dari 2MB.</p>
                            </div>
                        </div>

                    </div>
                    <label for="" class="mb-7 block">
                        <span class="font-semibold block mb-2">Nama Lengkap <span class="text-rose-500">*</span></span>
                        <input type="text" class="form-control w-9/12">
                    </label>
                    <label for="" class="mb-7 block">
                        <span class="font-semibold block mb-2">Username <span class="text-rose-500">*</span></span>
                        <input type="text" class="form-control w-9/12">
                    </label>
                    <label for="" class="mb-7 block">
                        <span class="font-semibold block mb-2">Headline</span>
                        <input type="text" class="form-control w-9/12"
                            placeholder="Contoh : Software Enginer at Inready Workgroup">
                    </label>
                    <label for="" class="mb-7 block">
                        <span class="font-semibold block mb-2">Tentang Saya</span>
                        <textarea name="" id="" rows="3" class="form-control w-9/12 "
                            placeholder="Tulis sesuatu tentang anda"></textarea>
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
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
 
<script>
    $('.croppie').croppie({
    viewport: {
        width: 250,
        height: 250,
        type:'square'
    },
    boundary:{
        width: 300,
        height: 300
    }
});

</script>
@endsection
