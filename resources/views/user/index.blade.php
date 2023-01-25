@extends('layouts.user')
@section('body')
    <section class="banner bg-inr-black w-full h-[calc(100vh-80px)] overflow-auto flex items-center">
        <div class="wrapper text-center md:text-left">
            <h1 class="text-inr-white font-bold text-3xl md:text-5xl mb-7">Dengan Hitam Emas</h1>
            <div class="md:grid md:grid-cols-2 gap-2 items-center">
                <div class="">
                    <h1 class="text-inr-yellow font-bold text-3xl md:text-5xl mb-16">Kita Berkarya</h1>
                    <p class="text-inr-white w-10/12 md:w-10/12 m-auto md:m-0 text-justify">Inready Workgroup adalah Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pharetra egestas sit feugiat at euismod tellus scelerisque enim lorem. Morbi faucibus ipsum, ut cursus viverra egestas.</p>
                    <button class="mt-10 btn-yellow">Lihat Kegiatan Kami</button>
                </div>
                <img src="{{ asset('images/ui/banner.png') }}" alt="" class="hidden md:block">
            </div>
        </div>
    </section>

@endsection