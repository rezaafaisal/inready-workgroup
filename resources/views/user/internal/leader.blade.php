@extends('layouts.user')
@section('body')
    <section class="pt-20">
        <div class="wrapper py-20">
            <h1 class="section-title">Mantan Ketua</h1>
            <p class="mb-10 font-light text-justify leading-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, culpa cum. Esse maiores facilis cum deserunt eius quisquam aperiam vitae molestiae vel id, ab odit odio repudiandae ut officia fugit placeat omnis voluptas commodi soluta dolores natus tempora? Commodi provident maiores ea, alias sit vel hic, laboriosam quas veritatis a natus animi exercitationem ipsam ducimus earum odio voluptas cumque iste enim nisi quam. Totam corporis laborum atque dicta sit? Blanditiis accusantium veritatis vitae? Dolorum impedit, suscipit eos odio excepturi commodi itaque numquam molestiae minus, voluptatem, temporibus accusamus minima hic? Eius quas natus mollitia nemo ex quaerat omnis enim veniam saepe?
            </p>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 gap-y-10">
               @foreach ($data['leader'] as $leader)
                    <div class="overflow-hidden" data-aos="fade-up">
                        <img src="{{ asset('profiles/'.$leader->image) }}" alt="" class="rounded-xl h-80 lg:h-60 w-full object-cover">
                        <div class="py-3">
                            <span class="block text-lg font-semibold mb-2">Ketua Umum Angkatan {{ $leader->generation?->name ?? '-' }}</span>
                            <span class="block font-light">{{ $leader->user->name }}</span>
                            <div class="flex gap-3 mt-3 text-inr-white">
                                @if ($leader->facebook )
                                    <a href="{{ $leader->facebook }}" target="_blank" class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    
                                @endif
                                @if ($leader->instagram )
                                    <a href="{{ $leader->instagram }}" target="_blank" class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    
                                @endif
                                @if ($leader->linkedin)
                                    <a href="{{ $leader->linkedin }}" target="_blank" class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                @endif
                                @if ($leader->twitter)
                                    <a href="{{ $leader->twitter }}" target="_blank" class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
               @endforeach
            </div>
        </div>
    </section>
@endsection