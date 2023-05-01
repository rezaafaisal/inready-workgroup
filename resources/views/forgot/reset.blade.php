<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk | Inready Workgroup</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="h-screen bg-inr-black">
    <x-alert />
    <div class="flex h-screen items-center justify-center mx-5">
        <div class="py-20 px-10 md:px-20 w-full md:w-8/12 lg:w-6/12 rounded-xl bg-inr-white/10 shadow">
            <h2 class="text-center text-inr-yellow font-bold text-xl pb-5">Buat Password Baru</h2>
            <form action="{{ route('set_password', ['token' => $token]) }}" method="POST" class="text-inr-white">
                @csrf
                <label for="password" class="block mb-5">
                    <div class="relative flex items-center" x-data="{show:false}">
                        <input :type="show?'text':'password'" class="py-2 px-3 w-full focus:outline-none focus:ring focus:ring-inr-yellow duration-300 rounded bg-transparent outline outline-gray-500 @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password Baru">
                        <i  :class="!show?'fa-eye':'fa-eye-slash'" class="fas absolute right-3 w-5 hover:cursor-pointer z-10" @click="show=!show"></i>
                    </div>
                    @error('password')
                        <span class="text-xs text-rose-400">{{ $message }}</span>
                    @enderror
                </label>
                <label for="password_confirmation" class="block mb-5">
                    <div class="relative flex items-center" x-data="{show:false}">
                        <input :type="show?'text':'password'" class="py-2 px-3 w-full focus:outline-none focus:ring focus:ring-inr-yellow duration-300 rounded bg-transparent outline outline-gray-500 @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password">
                        <i  :class="!show?'fa-eye':'fa-eye-slash'" class="fas absolute right-3 w-5 hover:cursor-pointer z-10" @click="show=!show"></i>
                    </div>
                    @error('password_confirmation')
                        <span class="text-xs text-rose-400">{{ $message }}</span>
                    @enderror
                </label>
                <button class="rounded w-full mb-5 px-3 py-2 text-inr-black bg-inr-yellow hover:bg-inr-yellow-1 duration-150">Ubah Password</button>
                {{-- <span class="block text-center text-inr-white text-sm">Akun bermasalah? <a href="#" class="font-semibold text-inr-yellow">Hubungi admin</a></span> --}}
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://kit.fontawesome.com/e8b696d2f5.js" crossorigin="anonymous"></script>
</html>