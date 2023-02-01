@extends('layouts.user')
@section('body')
    <section class="w-full relative h-[550px] overflow-hidden">
        <img src="{{ asset('images/ui/foto_bareng.png') }}" alt="" class="w-full h-full object-cover">
        <div class="absolute bg-gradient-to-t from-inr-yellow/50 top-0 left-0 right-0 bottom-0">
        </div>
    </section>
    <section class="py-20">
        <div class="wrapper">
            <h1 class="section-title">Inready Wokrgroup</h1>
            <div class="grid grid-cols-2 w-10/12 mx-auto mb-20 mt-20">
                <img src="{{ asset('images/ui/eren.jpeg') }}" alt="" class="w-full rounded-xl lg:h-[250px] object-cover">
                <div class="px-10">
                    <h2 class="font-semibold text-xl text-inr-black">Ketua Umum</h2>
                    <span class="block font-medium">Eren Jeager</span>
                    <div class="mt-5 text-sm font-light">
                        <span class="block">Visi:</span>
                        <ul class="list-disc ml-6">
                            <li>Satu</li>
                            <li>Satu</li>
                            <li>Satu</li>
                        </ul>
                        <span class="block mt-3">Misi :</span>
                        <ul class="list-disc ml-6">
                            <li>Dua</li>
                            <li>Dua</li>
                            <li>Dua</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 leading-8 text-justify">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, dolorem? Officiis et eligendi culpa perferendis placeat quas, quae corporis quibusdam nemo iusto similique explicabo! Nemo, magnam id adipisci exercitationem laudantium velit, optio quas aperiam ipsam neque illo omnis voluptates qui enim quis consequuntur numquam placeat vero. Ipsa repellendus dolorem nobis porro vero eum ducimus fugiat, repudiandae iusto dolores dignissimos sed eius ex consectetur quaerat voluptatem nemo reiciendis! Doloribus natus mollitia iure dolorem voluptatem. Non ad eius similique alias deleniti repellendus sequi ducimus nesciunt, ex architecto laborum laudantium laboriosam ratione consequatur pariatur iste magni recusandae dolorem atque accusantium porro! Rerum, quibusdam!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit cum adipisci, odio blanditiis, earum possimus nostrum asperiores exercitationem voluptatem aut distinctio animi officia et ea veniam laborum. Optio officia accusantium dolores, debitis voluptatem iusto expedita quam assumenda perspiciatis possimus modi earum fuga architecto, saepe aperiam provident numquam totam cupiditate maiores!</p>
            </div>
        </div>
    </section>
@endsection