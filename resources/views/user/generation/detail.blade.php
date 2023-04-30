@extends('layouts.user')
@section('body')
<section class="pt-20" x-data="{show:false}">
    <div class="wrapper py-20">
        <h1 class="section-title">Keluarga Besar Inready Workgroup</h1>
        <div class="flex justify-between items-start">
            <h2 class="text-xl text-inr-black font-light mb-20">Angkatan
                {{ ($data['generation'] == 0) ? 'Pendiri' : $data['generation'] }}
            </h2>
            <a href="{{ route('generation') }}"
                class="block py-1 px-4 bg-inr-yellow rounded hover:bg-inr-yellow-1 duration-150"><i
                    class="fas fa-arrow-left"></i></a>
        </div>
        <div class="flex justify-end mb-10">
            <form
                action="{{ route('show_generation', ['generation' => $data['generation']]) }}"
                method="get">
                <input
                    class="rounded px-4 py-2 lg:w-60 outline-none ring-2 ring-inr-yellow @error('keyword') is-invalid @enderror"
                    type="search" name="keyword" id="keyword" value="{{ old('keyword') }}">
                @error('keyword')
                    <span class="text-xs text-rose-500">
                        {{ $message }}
                    </span>
                @enderror
                <button class="px-4 py-2 rounded bg-inr-yellow border-2 border-inr-yellow">Cari</button>
            </form>
        </div>
        @if($data['members']->count() == 0)
            <span class="block bg-sky-200 text-sky-500 p-10 text-center rounded">
                Belum ada anggota, silahkan hubungi pengurus untuk penambahan data anggota baru
            </span>
        @endif
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach($data['members'] as $member)
                <div class="overflow-hidden" data-aos="fade-up">
                    @if(Auth::user())
                        @php
                            $data = array(
                                'name' => $member->user->name,
                                'nri' => $member->nri,
                                'birth' => $member->birthPlace?->name.', '.$member->birth_date ?? '-',
                                'job' => $member->job,
                                'gender' => $member->gender?->name ?? '-',
                                'whatsapp' => $member->whatsapp ?? 'Belum ditentukan',
                                'address' => ($member->current_place != null) ? $member->address.', '.$member->currentPlace->name : $member->address,
                                'generation' => $member->generation?->name ?? '-',
                            );

                            $data = json_encode($data);

                            // dd($member->gender)
                        @endphp
                        <img src="{{ asset('profiles/'.$member->image) }}" alt=""
                            class="rounded-xl h-80 lg:h-60 w-full object-cover cursor-pointer" @click="show = true;detail('{{ $data }}')">
                    @else
                        <img src="{{ asset('profiles/'.$member->image) }}" alt=""
                            class="rounded-xl h-80 lg:h-60 w-full object-cover">
                    @endif
                    <div class="py-3">
                        <span class="block font-semibold">{{ $member->user->name }}</span>
                        <span
                            class="block font-light mt-1">{{ $member->user?->structures->first()?->division ?? 'Anggota' }}</span>
                        <div class="flex gap-3 mt-3 text-inr-white">
                            @if($member->facebook )
                                <a href="{{ $member->facebook }}" target="_blank"
                                    class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                    <i class="fab fa-facebook-f"></i>
                                </a>

                            @endif
                            @if($member->instagram )
                                <a href="{{ $member->instagram }}" target="_blank"
                                    class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                    <i class="fab fa-instagram"></i>
                                </a>

                            @endif
                            @if($member->linkedin)
                                <a href="{{ $member->linkedin }}" target="_blank"
                                    class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            @endif
                            @if($member->twitter)
                                <a href="{{ $member->twitter }}" target="_blank"
                                    class="flex justify-center items-center bg-gray-400 w-7 h-7 rounded-full hover:bg-gray-500 duration-150">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- popup detail user --}}
    <div x-show="show"  class="z-10 w-screen overflow-hidden h-screen fixed top-0 left-0 right-0 bg-slate-500/50">
        <div class="z-20 fixed right-0 left-0 top-0 flex justify-center">
            <div @click.outside="show=false" class="mt-28 p-4 h-auto rounded-md bg-white shadow-md lg:w-6/12 md:w-9/12 w-10/12">
                <h3 class="text-xl mb-3 font-medium text-center pb-4 border-b border-gray-300">Data Pengguna</h3>
                <table class="table-auto w-full my-5">
                    <tr class="text-start">
                        <th class="text-start py-2">Nama Lengkap</th>
                        <td>:</td>
                        <td id="name"></td>
                    </tr>
                    <tr class="text-start">
                        <th class="text-start py-2">Jenis Kelamin</th>
                        <td>:</td>
                        <td id="gender"></td>
                    </tr>
                    <tr class="text-start">
                        <th class="text-start py-2">Angkatan Ke-</th>
                        <td>:</td>
                        <td id="generation"></td>
                    </tr>
                    <tr class="text-start">
                        <th class="text-start py-2">NRI</th>
                        <td>:</td>
                        <td id="nri"></td>
                    </tr>
                    <tr class="text-start">
                        <th class="text-start py-2">Tempat Tanggal Lahir</th>
                        <td>:</td>
                        <td id="birth"></td>
                    </tr>
                    <tr class="text-start">
                        <th class="text-start py-2">Alamat</th>
                        <td>:</td>
                        <td id="address"></td>
                    </tr>
                    <tr class="text-start">
                        <th class="text-start py-2">Pekerjaan</th>
                        <td>:</td>
                        <td id="job"></td>
                    </tr>
                    <tr class="text-start">
                        <th class="text-start py-2">Whatsapp</th>
                        <td>:</td>
                        <td id="whatsapp">
                        </td>
                    </tr>
                </table>
                <div class="pt-4 border-t border-gray-300 flex justify-end">
                    <button
                        class="text-sm bg-inr-yellow px-10 py-2 rounded-full hover:bg-inr-yellow-1 duration-150" @click="show=false">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function detail(data){
        const user = JSON.parse(data)
        $('#name').html(user.name)
        $('#nri').html(user.nri)
        $('#address').html(user.address)
        $('#job').html(user.job)
        $('#whatsapp').html(user.whatsapp)
        $('#birth').html(user.birth)
        $('#gender').html(user.gender)
        $('#generation').html(user.generation)
    }

</script>
@endsection
