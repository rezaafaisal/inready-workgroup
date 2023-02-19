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
                <x-forms.profile-setting title="Riwayat Hidup" route="">
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Instagram</span>
                        <div class="flex w-7/12">
                            <input type="text" class="form-control grow rounded-r">
                            <input type="text" id="date" class="form-control">
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
                </x-forms.profile-setting>
            </div>
        </div>
    </div>
</section>
@endsection
