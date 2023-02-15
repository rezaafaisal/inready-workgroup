@extends('layouts.user')
@section('body')
<section class="pt-20">
    <div class="wrapper py-20">
        <div class="flex">
            @include('partials.user.setting_sidebar')
            <div class="w-9/12 rounded bg-white border p-5">
                <h3 class="text-xl font-light pb-5 border-b">Profil Pengguna</h3>
                <form action="" method="post" class="py-5">
                    <div class="group mb-7">
                        <span class="font-semibold block mb-2">Foto Diri</span>
                        <input type="file" x-ref="image" name="image" id="image" class="hidden">
                        <div class="flex gap-5">
                            <img src="{{ asset('images/ui/eren.jpeg') }}" alt=""
                                class="w-28 h-28 object-cover rounded">
                            <div>
                                <button @click="$refs.image.click()" type="button" class="btn-yellow">Pilih Foto</button>
                                <p class="font-extralight mt-4 text-sm max-w-md">Gambar Profile Anda sebaiknya memiliki rasio 1:1
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
                        <input type="text" class="form-control w-9/12" placeholder="Contoh : Software Enginer at Inready Workgroup">
                    </label>
                    <label for="" class="mb-7 block">
                        <span class="font-semibold block mb-2">Tentang Saya</span>
                        <textarea name="" id="" rows="3" class="form-control w-9/12" placeholder="Tulis sesuatu tentang anda"></textarea>
                    </label>
                    <button class="btn-yellow">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
