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
                @if ($data['sending'])
                @php
                    $key = \App\Models\VerifyKey::where([
                        'user_id' => Auth::id(),
                        'type' => 'verify'
                    ])->first()->token;

                    $email = explode('|',\Crypt::decryptString($key))[0];
                @endphp
                    <div class="rounded-lg bg-white border p-5 text-inr-black">
                        <h3 class="text-xl font-light pb-5 border-b">Ubah Email</h3>
                        <div class="p-5 mt-5 rounded bg-yellow-100">
                            <p class="text-yellow-800 mb-5 leading-8 break-words">
                                Anda memiliki permintaan perubahan email yang belum Anda verifikasi. Mohon cek email verifikasi yang telah kami kirim ke <span class="font-semibold">{{ $email ?? "" }}</span>
                            </p>
                            <a href="{{ route('user.cancelVerifyEmail') }}" class="btn-yellow text-sm">Hapus Permintaan</a>
                        </div>
                    </div>
                @else
                    <x-forms.profile-setting title="Ubah Email" route="{{ route('user.verifyEmail') }}">
                        <x-slot:submit>Ubah Email</x-slot:submit>
                        <label class="block mb-7">
                            <span for="" class="font-semibold mb-2 block">Email</span>
                            <input type="email" name="email" class="form-control w-full lg:w-7/12 @error('email') is-invalid @enderror" placeholder="email@domain.com" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                            <span class="block mt-2 font-extralight text-sm">Email akan berubah ketika Anda sudah menekan link verifikasi yang dikirimkan ke email baru Anda.</span>
                        </label>
                    </x-forms.profile-setting>
                @endif
                <x-forms.profile-setting title="Ubah Password" route="{{ route('user.setPassword') }}">
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Password Baru</span>
                        <div class="flex" x-data="{show:false}">
                            <input :type="(show?'text':'password')" name="password" class="form-control-1 rounded-l w-full lg:w-7/12 @error('password') is-invalid @enderror" placeholder="Ketikkan password baru">
                            <button @click="show = !show" type="button" class="border rounded-r px-3 border-slate-300 border-l-0 hover:bg-gray-200 duration-150 focus:ring focus:bg-gray-200 focus:ring-gray-400 outline-none"><i class="las text-lg" :class="(show?'la-eye-slash':'la-eye')"></i></button>
                        </div>
                        @error('password')
                            <span class="block invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                    <label class="block mb-7">
                        <span for="" class="font-semibold mb-2 block">Konfirmasi Password Baru</span>
                        <div class="flex" x-data="{show:false}">
                            <input :type="(show?'text':'password')" name="password_confirmation" class="form-control-1 rounded-l w-full lg:w-7/12" placeholder="Konfirmasi password">
                            <button @click="show = !show" type="button" class="border rounded-r px-3 border-slate-300 border-l-0 hover:bg-gray-200 duration-150 focus:ring focus:bg-gray-200 focus:ring-gray-400 outline-none"><i class="las text-lg" :class="(show?'la-eye-slash':'la-eye')"></i></button>
                        </div>
                    </label>
                </x-forms.profile-setting>
            </div>
        </div>
    </div>
</section>
@endsection
