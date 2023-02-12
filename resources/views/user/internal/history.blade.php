@extends('layouts.user')
@section('body')
    <section class="pt-20">
        <div class="wrapper py-20">
            <h1 class="section-title">Sejarah Inready Workgroup</h1>
            <div class="grid grid-cols-1 gap-5 text-justify font-extralight leading-8 text-inr-black">
                {!! $data->body ?? '' !!}
            </div>
        </div>
    </section>
    <section class="bg-inr-black text-inr-white">
        <div class="wrapper py-20">
            <h2 class="section-title">Logo Inready Workgroup</h2>
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div>
                    <span class="text-lg font-medium block mb-2">Arti/Makna Logo Inready Workgroup</span>
                    <ul class="list-disc ml-5 font-extralight text-sm leading-6">
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nemo quasi, aliquam optio facilis facere, culpa, veniam illum et tenetur voluptatibus.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nemo quasi, aliquam optio facilis facere, culpa, veniam illum et tenetur voluptatibus.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque nemo quasi, aliquam optio facilis facere, culpa, veniam illum et tenetur voluptatibus.</li>
                    </ul>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/ui/logo_yellow.png') }}" alt="" class="w-60">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="wrapper py-20">
            <h2 class="section-title">Ikrar Inready Workgroup</h2>
            <ul class="list-disc font-extralight leading-6 ml-5">
                <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti cum deserunt, quod in a iusto veritatis quaerat dignissimos ullam eligendi?</li>
                <li>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, similique.
                </li>
                <li>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto laborum quas iure. Fugit ad nostrum sit, neque labore odio quaerat doloribus exercitationem minima consequatur deserunt quasi repellat sequi quidem mollitia!
                </li>
            </ul>
        </div>
    </section>
@endsection