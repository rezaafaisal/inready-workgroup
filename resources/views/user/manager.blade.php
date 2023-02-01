@extends('layouts.user')
@section('body')
<section class="pt-20">
    <div class="wrapper py-20">
        <h1 class="section-title text-center">Pengurus Periode 2019-2020</h1>
        <h2 class="font-medium text-inr-black text-2xl mb-10">Pengurus Harian</h2>
        <p class="text-justify leading-8 mb-10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis rerum
            perferendis, maxime obcaecati beatae nam id illum quia mollitia, laborum qui nostrum autem dicta doloremque
            in architecto dolores. Odit, praesentium distinctio nisi blanditiis neque eos voluptas, eius eum, ad at
            consequuntur delectus obcaecati voluptates. Vitae officia consectetur earum accusantium nam, deleniti nisi
            necessitatibus enim sed, modi ducimus quia dolore incidunt error adipisci voluptatem sint a fugit quo minima
            harum tempora quas repellendus temporibus. Corrupti recusandae magni quia, eveniet, temporibus explicabo
            itaque ullam eaque placeat nihil vero? Quaerat quam laboriosam debitis asperiores commodi natus possimus
            odit, enim, earum, quos aliquid dolorem.</p>
        <div class="mb-10 grid grid-cols-1 md:grid-cols-4 lg:grid-cols-3 gap-10">
            <div class="rounded md:col-span-2 lg:col-span-1 md:col-end-4 lg:col-end-3 pb-5 bg-white shadow flex flex-col justify-center items-center ">
                <h3 class="font-medium text-lg mb-5 w-full py-3 bg-gray-200 text-inr-black text-center">Ketua Umum
                </h3>
                <div class="rounded-full h-40 w-40 object-cover shadow overflow-hidden mb-5">
                    <img src="{{ asset('images/ui/eren.jpeg') }}" alt=""
                        class="hover:scale-110 duration-150">
                </div>
                <h4 class="font-medium">Reiner</h4>
                <div class="mt-5 flex gap-3">
                    <a href="" class="flex justify-center items-center rounded-md h-8 w-8 bg-gray-200">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="" class="flex justify-center items-center rounded-md h-8 w-8 bg-gray-200">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @for($i = 0; $i < 8; $i++)
                <div class="rounded bg-white shadow">
                    <h3 class="font-medium text-lg w-full py-3 bg-gray-200 text-inr-black text-center">Anggota</h3>
                    <div class="p-5 grid grid-cols-1 justify-items-center">
                        <div class="rounded-full h-40 w-40 object-cover shadow overflow-hidden mb-5">
                            <img src="{{ asset('images/ui/reiner.jpeg') }}" alt=""
                                class="hover:scale-110 duration-150">
                        </div>
                        <h4 class="font-medium">Reiner Braun</h4>
                        <div class="mt-5 flex gap-3">
                            <a href="" class="flex justify-center items-center rounded-md h-8 w-8 bg-gray-200">
                                <i class="fab fa-instagram text-lg"></i>
                            </a>
                            <a href="" class="flex justify-center items-center rounded-md h-8 w-8 bg-gray-200">
                                <i class="fab fa-facebook-f text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
@endsection
