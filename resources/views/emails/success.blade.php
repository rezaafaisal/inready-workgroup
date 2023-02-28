<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berhasil Verifikasi</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="w-full h-screen">
        <div class="rounded-xl w-12/12 md:w-10/12 lg:w-8/12 p-5 bg-sky-100 text-sky-800 mx-auto mt-10">
            <h3 class="text-xl pb-5 border-b border-sky-600">Berhasil Verifikasi</h3>
            <p class="pt-5 leading-8">
                Email <span class="font-semibold">{{ $email }}</span> dengan username <span class="font-semibold">{{ $username }}</span> telah berhasil terverifikasi.
                <span class="block">
                    Kembali ke <a href="{{ route('home') }}" class="font-semibold underline-offset-2 underline">Beranda</a>
                </span>
            </p>
        </div>
    </div>
</body>
</html>