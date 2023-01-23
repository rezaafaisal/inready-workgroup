<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>
<body class="">
    <div class="flex mt-10 justify-center">
        <div class="p-5 w-6/12 rounded-md bg-white shadow">
            <form action="{{ route('verify') }}" method="POST">
                @csrf
                <label for="email" class="block mb-3">
                    <span class="block text-sm mb-1 text-inr-yellow">Email</span>
                    <input type="text" class="py-2 px-3 w-full focus:outline-none focus:ring focus:ring-slate-200 duration-100 rounded bg-slate-100 @error('email') border-2 border-pink-500 @enderror" name="email" id="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-xs text-pink-500">{{ $message }}</span>
                    @enderror
                </label>
                <label for="password" class="block mb-3">
                    <span class="block text-sm mb-1 text-slate-500">Password</span>
                    <input type="password" class="py-2 px-3 w-full focus:outline-none focus:ring focus:ring-slate-200 duration-100 rounded bg-slate-100" name="password" id="password" placeholder="Masukkan Email Anda">
                </label>
                <div class="text-end">
                    <button class="rounded px-3 py-2 text-white bg-slate-500 hover:bg-slate-600 duration-150">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>