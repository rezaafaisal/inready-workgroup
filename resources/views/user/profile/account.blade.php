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
                <x-forms.profile-setting title="Ubah Email" route="">
                    <x-slot:submit>Ubah Email</x-slot:submit>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Email</span>
                        <input type="email" class="form-control w-7/12" placeholder="email@domain.com">
                        <span class="block mt-2 font-extralight text-sm">Email akan berubah ketika Anda sudah menekan link verifikasi yang dikirimkan ke email baru Anda.</span>
                    </label>
                </x-forms.profile-setting>
                <x-forms.profile-setting title="Ubah Password" route="">
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Password Baru</span>
                        <div class="flex" x-data="{show:false}">
                            <input :type="(show?'text':'password')" class="form-control-1 rounded-l w-7/12" placeholder="Ketikkan password baru">
                            <button @click="show = !show" type="button" class="border rounded-r px-3 border-slate-300 border-l-0 hover:bg-gray-200 duration-150 focus:ring focus:bg-gray-200 focus:ring-gray-400 outline-none"><i class="las text-lg" :class="(show?'la-eye-slash':'la-eye')"></i></button>
                        </div>
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Konfirmasi Password Baru</span>
                        <div class="flex" x-data="{show:false}">
                            <input :type="(show?'text':'password')" class="form-control-1 rounded-l w-7/12" placeholder="Konfirmasi password">
                            <button @click="show = !show" type="button" class="border rounded-r px-3 border-slate-300 border-l-0 hover:bg-gray-200 duration-150 focus:ring focus:bg-gray-200 focus:ring-gray-400 outline-none"><i class="las text-lg" :class="(show?'la-eye-slash':'la-eye')"></i></button>
                        </div>
                    </label>
                </x-forms.profile-setting>
            </div>
        </div>
    </div>
</section>
@endsection
