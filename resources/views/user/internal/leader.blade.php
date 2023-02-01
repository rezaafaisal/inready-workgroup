@extends('layouts.user')
@section('body')
    <section class="pt-20">
        <div class="wrapper py-20">
            <h1 class="section-title">Mantan Ketua</h1>
            <p class="mb-10 font-light text-justify leading-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, culpa cum. Esse maiores facilis cum deserunt eius quisquam aperiam vitae molestiae vel id, ab odit odio repudiandae ut officia fugit placeat omnis voluptas commodi soluta dolores natus tempora? Commodi provident maiores ea, alias sit vel hic, laboriosam quas veritatis a natus animi exercitationem ipsam ducimus earum odio voluptas cumque iste enim nisi quam. Totam corporis laborum atque dicta sit? Blanditiis accusantium veritatis vitae? Dolorum impedit, suscipit eos odio excepturi commodi itaque numquam molestiae minus, voluptatem, temporibus accusamus minima hic? Eius quas natus mollitia nemo ex quaerat omnis enim veniam saepe?
            </p>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                @for ($i = 0; $i <= 12; $i++)
                <div class="overflow-hidden">
                    <img src="{{ asset('images/ui/eren.jpeg') }}" alt="" class="rounded-xl h-80 lg:h-60 w-full object-cover">
                    <div class="py-3">
                        <span class="block text-lg font-semibold mb-2">Ketua Umum Angkatan {{ ($i==0)?'Pendiri':$i }}</span>
                        <span class="block font-light">Eren Jeager</span>
                        <div class="flex gap-3 mt-3 text-inr-white">
                            <a href="" class="flex justify-center items-center bg-gray-300 w-7 h-7 rounded-full">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="" class="flex justify-center items-center bg-gray-300 w-7 h-7 rounded-full">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>
@endsection