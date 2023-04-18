@extends('layouts.user')
@section('body')
<section class="pt-20">
    <div class="wrapper py-20 text-inr-black">
        <h1 class="section-title">Keluarga Besar Inready Workgroup</h1>
        <p class="py-10 text-justify leading-8 mb-10">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit
            ipsam quaerat voluptatibus quod quisquam animi eaque, saepe nostrum reprehenderit inventore iure laborum
            consequuntur dolores veniam? Impedit, labore vel. Beatae dolores necessitatibus explicabo voluptatum veniam
            inventore similique aspernatur totam libero voluptatem vel natus et excepturi dicta, consequuntur, nesciunt
            harum velit voluptas eius quisquam sapiente placeat. Eius qui odio, excepturi consequatur natus inventore
            labore fugit nam maxime beatae quos! Ullam provident vero eveniet consectetur eaque? Ex sint nemo itaque
            cumque autem magni quos doloremque expedita non unde aliquam fuga quibusdam esse voluptatem perspiciatis,
            optio quaerat corporis, est nisi ad in. Odit, neque!</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach ($data['generations'] as $generation)
                <div class="group p-2 lg:p-0 rounded shadow w-full border h-40 flex flex-col items-center justify-between relative overflow-hidden">
                    <div class="flex justify-center items-center flex-col h-full">
                        <span class="block font-semibold text-xl">Angkatan {{ ($generation->name == 0) ? 'Pendiri' : $generation->name }}</span>
                        <span class="mt-2 font-light block">
                            @switch($generation->status)
                                @case('outgoing')
                                    Demisioner
                                    @break
                                @case('active')
                                    Pengurus Aktif
                                    @break
                                @case('member')
                                    Anggota
                                    @break
                                @default
                                    Unknown
                            @endswitch
                        </span>
                    </div>
                    <a href="" class="lg:hidden block py-2 w-full text-center rounded bg-inr-yellow text-sm font-light hover:bg-inr-yellow-1 duration-150">Lihat Anggota</a>
                    <div class="hidden absolute translate-y-10 group-hover:translate-y-0 bg-inr-yellow h-full w-full duration-300 p-3 lg:flex items-center justify-between flex-col  lg:invisible lg:opacity-0 group-hover:visible group-hover:opacity-100">
                        <div class="flex justify-center items-center h-full">
                            <span class="block text-center font-light text-sm">
                                Angkatan {{ ($generation->name == 0) ? 'Pendiri' : $generation->name }} diketuai oleh
                                <span class="font-bold block">
                                    {{
                                        \App\Models\Profile::where([
                                            'generation_id' => $generation->id,
                                            'is_lead' => true
                                        ])->first()?->user?->name ?? 'Belum Ditentukan'
                                    }} 
                                </span>
                            </span>
                        </div>
                        <a href="{{ route('show_generation', ['generation' => $generation->name]) }}" class="px-3 py-2 w-full bg-inr-black text-inr-yellow text-center rounded font-light">Lihat Anggota</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
