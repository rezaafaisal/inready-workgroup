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
                        <span for="" class="font-semibold mb-2 block">Email</span>
                        <div>
                            <input type="email" class="form-control w-7/12" placeholder="email@domain.com">
                        </div>
                        <span class="block mt-2 font-extralight text-sm">Email akan berubah ketika Anda sudah menekan link verifikasi yang dikirimkan ke email baru Anda.</span>
                    </label>
                </x-forms.profile-setting>
            </div>
        </div>
    </div>
</section>
@endsection
