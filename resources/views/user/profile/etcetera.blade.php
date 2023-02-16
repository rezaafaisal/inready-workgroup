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
            </x-forms.profile-setting>
        </div>
    </div>
</section>
@endsection
