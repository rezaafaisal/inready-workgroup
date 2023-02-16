@extends('layouts.user')
@section('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
@endsection
@section('body')
<section class="pt-20">
    <div class="wrapper py-20">
        <div class="flex">
            @include('partials.user.setting_sidebar')
            <x-forms.profile-setting title="Data Pribadi" route="">
                <label class="block mb-7">
                    <span for="" class="font-semibold mb-2 block">No. Whatsapp</span>
                    <div class="flex w-9/12">
                        <span class="shrink-0 bg-gray-200 w-20 rounded-l flex items-center justify-center border border-r-0 font-extralight">
                            +62
                        </span>
                        <input type="text" class="form-control grow rounded-l-none">
                    </div>
                </label>
                <label class="block mb-7">
                    <span class="font-semibold mb-2 block">Kota Domisili</span>
                    <input type="text" class="form-control w-9/12" placeholder="Ketikkan kota anda">
                </label>
                <label class="block mb-7">
                    <span class="font-semibold mb-2 block">Alamat Lengkap</span>
                    <textarea name="" rows="3" class="form-control w-9/12" placeholder="Alamat anda saat ini"></textarea>
                </label>
                <label class="block mb-7">
                    <span class="font-semibold mb-2 block">Tempat Lahir</span>
                    <input type="text" class="form-control w-9/12" placeholder="Ketikkan kota anda">
                </label>
                <div class="grid grid-cols-1 md:grid-cols-2 w-9/12 gap-10 mb-7">
                    <label class="block mb-7">
                        <span class="font-semibold mb-2 block">Tanggal Lahir</span>
                        <input type="date" name="" id="" class="form-control w-full">
                    </label>
                    <div class="block mb-7 font-extralight">
                        <span class="font-semibold mb-2 block">Jenis Kelamin</span>
                        <label class="flex items-center mb-5 cursor-pointer">
                            <input type="radio" name="gender" id="" class="appearance-none h-3 w-3 rounded-full checked:bg-inr-yellow ring-offset-2 ring-offset-white ring ring-inr-yellow">
                            <span class="ml-4">Laki-laki</span>
                        </label>
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" name="gender" id="" class="appearance-none h-3 w-3 rounded-full checked:bg-inr-yellow ring-offset-2 ring-offset-white ring ring-inr-yellow">
                            <span class="ml-4">Perempuan</span>
                        </label>
                    </div>
                </div>
            </x-forms.profile-setting>
        </div>
    </div>
</section>
@endsection
