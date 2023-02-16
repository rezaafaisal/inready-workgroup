<div class="rounded-lg bg-white border p-5 text-inr-black">
    <h3 class="text-xl font-light pb-5 border-b">{{ $title }}</h3>
    <form action="{{ $route }}" method="post" class="py-5">
        {{ $slot }}
        <button class="btn-yellow text-sm">{{ $submit ?? 'Simpan Perubahan' }}</button>
    </form>
</div>
