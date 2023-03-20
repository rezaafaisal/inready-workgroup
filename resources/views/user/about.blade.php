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
            {{-- <div class="grid grid-cols-2 w-10/12 mx-auto mb-20 mt-20">
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
            </div> --}}
            <div class="grid grid-cols-1 gap-5 leading-8 text-justify">
                <p>
                    Inready Workgroup adalah Study Club yang berfokus pada dunia IT khususnya di bidang web, mobile dan desain. Study Club ini sudah berdiri sejak tahun 2007 serta menghimpun mahasiwa jurusan Teknik Informatika dan Sistem Informasi UIN Alauddin Makassar. Bagi mahasiswa, study club menjadi salah satu alternatif untuk belajar. Sebab, dengan mengikuti study club, mereka mendapatkan ilmu tambahan selain dari dosen ketika belajar di kelas. 
                </p>
                <p>
                    Inready Workgroup ini juga merupakan study club yang berbentuk organisasi. Bergabung dengan organisasi dapat meningkatkan keterampilan kepemimpinan dan sosial, serta mempelajari keterampilan khusus yang sejalan dengan tujuan organisasi. Adapun tujuan dari organisasi ini adalah :
                    1. Mengembangkan wawasan dan kemampuan anggota INREADY WORKGROUP dalam bidang IT.
                    2. Menanamkan aspek pengembangan diri keorganisasian pada setiap anggota INREADY WORKGROUP.
                    3. Membangun jaringan kerjsama mutualisme semua anggota INREADY WORKGROUP ke arah profesional.
                </p>

            </div>
        </div>
    </section>
@endsection