<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div x-data={nav:false} class="container mt-10 overflow-hidden">
        <div class="flex justify-end">
            <button @click="nav=true" class="btn-yellow">Tombol</button>
        </div>
        <ul :class="nav?'translate-y-0':'-translate-y-52'" class="absolute duration-300 transform top-0 bg-slate-300 w-full">
            <li class="flex justify-end">
                <button @click="nav=false" class="btn-yellow">Tombol</button>
            </li>
            <li>Satu</li>
            <li>Satu</li>
            <li>Satu</li>
        </ul>
    </div>
</body>

</html>
