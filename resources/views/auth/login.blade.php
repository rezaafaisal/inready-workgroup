<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk | Inready Workgroup</title>
    @vite('resources/css/app.css')

</head>
<body class="h-screen bg-inr-black">
    <div class="flex h-screen items-center justify-center mx-5">
        <div class="p-20 w-full md:w-8/12 lg:w-6/12 rounded-xl bg-inr-white/10 shadow">
            <h2 class="text-center text-inr-yellow font-bold text-xl pb-5">MASUK</h2>
            <form action="{{ route('verify') }}" method="POST">
                @csrf
                <label for="email" class="block mb-5">
                    <input type="text" class="py-2 px-3 w-full focus:outline-none focus:ring focus:ring-slate-200 duration-300 rounded bg-transparent outline outline-gray-500 @error('email') border-2 border-pink-500 @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                        <span class="text-xs text-pink-500">{{ $message }}</span>
                    @enderror
                </label>
                <label for="password" class="block mb-5">
                    <input type="password" class="py-2 px-3 w-full focus:outline-none focus:ring focus:ring-slate-200 duration-300 rounded bg-transparent outline outline-gray-500" name="password" id="password" placeholder="Masukkan Email Anda">
                </label>
                <a href="#" class="block text-center text-inr-yellow text-sm mb-5">Lupa Password?</a>
                <button class="rounded w-full mb-5 px-3 py-2 text-inr-black bg-inr-yellow hover:bg-inr-yellow-1 duration-150">Masuk</button>
                <span class="block text-center text-inr-white text-sm">Belum punya akun? <a href="#" class="font-semibold text-inr-yellow">Daftar Sekarang</a></span>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>