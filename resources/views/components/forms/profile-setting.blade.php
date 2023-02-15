<div class="w-9/12 rounded bg-white border p-5">
    <h3 class="text-xl font-light pb-5 border-b">{{ $title }}</h3>
    <form action="{{ $route }}" method="post" class="py-5">
        {{ $slot }}
        <button class="btn-yellow text-sm">Simpan Perubahan</button>
    </form>
</div>
