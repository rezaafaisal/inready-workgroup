@extends('layouts.user')
@section('body')
<section class="pt-20">
    <div class="wrapper py-20">
        <div class="flex">
            <div class="w-3/12">
                <h3 class="text-3xl font-light">Pengaturan</h3>
                <ul class="mt-5 font-extralight">
                    <li class="text-xl">
                        <a href="#" class="py-4 px-7 block hover:bg-gray-200 rounded">
                            <i class="las la-user w-8 text-2xl"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li class="text-xl">
                        <a href="#" class="py-4 px-7 block hover:bg-gray-200 rounded">
                            <i class="las la-user-cog w-8 text-2xl"></i>
                            <span>Data Pribadi</span>
                        </a>
                    </li>
                    <li class="text-xl">
                        <a href="#" class="py-4 px-7 block hover:bg-gray-200 rounded">
                            <i class="las la-user-shield w-8 text-2xl"></i>
                            <span>Akun</span>
                        </a>
                    </li>
                </ul>
            </div>
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
                    <label for="">
                        <span class="font-semibold block mb-2">Nama Lengkap</span>
                        <input type="text">
                    </label>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
