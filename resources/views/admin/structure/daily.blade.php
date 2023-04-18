@extends('layouts.admin')
@section('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
@section('body')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Badan Pengurus Harian Periode</h3>
                        <select name="" id="periods" class="form-control" style="width:130px">
                            @foreach($data['period'] as $item)
                                <option
                                    {{ $data['current'] == $item->year ? 'selected' : '' }}
                                    value="{{ $item->year }}">{{ $item->period }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-toolbar">
                        <button id="" data-toggle="modal" data-target="#create_division"
                            class="btn btn-primary font-weight-bolder">Tambah</button>
                    </div>
                </div>
                <div class="card-body">
                    @if($data['bph']?->count() == 0)
                        <div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                            <div class="alert-text">Belum ada data tersedia!</div>
                        </div>
                    @endif
                    @foreach($data['bph'] ?? [] as $i => $bph)
                        <div class="d-flex align-items-center mb-10">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-40 symbol-light-white mr-5">
                                <img src="{{ asset('profiles/'.$bph->user?->profile->image ?? 'profiles/user.png') }}"
                                    class="symbol-label" style="object-fit: cover" alt="">
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Text-->
                            <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                <span class="text-dark text-hover-primary mb-1 font-size-lg">
                                    <span>{{ $bph->user?->name ?? 'Belum ditentukan' }}</span>
                                    {{-- @if ($dpo->position == 'leader') --}}
                                    {{-- <span class="label label-inline label-light-info ml-4">Ketua</span> --}}
                                    {{-- @endif --}}
                                </span>
                                <span class="text-muted">{{ $bph->division }}</span>
                            </div>
                            <!--end::Text-->
                            <div class="d-flex" style="gap:5px">
                                <button data-toggle="modal" data-target="#set_division_{{ $i }}"
                                    class="btn btn-sm btn-outline-primary">Tentukan</button>
                                <button onclick="confirmDelete('{{ \Crypt::encryptString($bph->id) }}')" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </div>
                            {{-- set division modal --}}
                            <x-modal target="set_division_{{ $i }}" title="Tentukan Pengurus">
                                <form id="set_division_form_{{ $i }}" action="{{ route('admin.structure.bph.setDivision') }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="structure_id" value="{{ $bph->id }}">
                                    <div class="form-group">
                                        <label for="division" class="label-form">Nama Divisi</label>
                                        <input type="text" name="division" id="division" class="form-control"
                                            value="{{ $bph->division }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_{{ $i }}" class="form-label">{{ $bph->division }}</label>
                                        <select name="user" id="user_{{ $i }}" style="width: 100%;"
                                            class="form-control select2" autofocus>
                                        </select>
                                    </div>
                                </form>
                            </x-modal>
                            {{-- script to trigger --}}
                            @php
                                $bph_user[$i] = collect([
                                    'id' => \App\Models\Structure::where([
                                        'user_id' => $bph->user?->id,
                                        'type' => 'bph',
                                        'period_id' => $data['latest']->id
                                    ])->first()?->user?->id,
                                    'name' => \App\Models\Structure::where([
                                        'user_id' => $bph->user?->id,
                                        'type' => 'bph',
                                        'period_id' => $data['latest']->id
                                    ])->first()?->user?->name
                                ]);
                                // dd($bph_user[$i]);
                            @endphp
                            <script>
                                $("#user_{{ $i }}").append($("<option selected></option>").val(JSON.parse('{!! $bph_user[$i] !!}').id).text(JSON.parse('{!! $bph_user[$i] !!}').name)).trigger('change');
                                // submit button
                                $("#submit_modal_set_division_{{ $i }}").click(() => {
                                    $("#set_division_form_{{ $i }}").submit()
                                })
                            </script>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal create new division --}}
<x-modal target="create_division" title="Tambahkan Divisi BPH">
    <form id="create_division_form" action="{{ route('admin.structure.bph.createDivision') }}"
        method="POST">
        @csrf
        <input type="hidden" name="period" value="{{ $data['current'] }}">
        <div class="form-group">
            <label for="division" class="form-label">Nama Divisi</label>
            <input type="text" name="division" id="division"
                class="form-control @error('division') is-invalid @enderror" placeholder="Wakil Ketua 1">
            @error('division')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </form>
</x-modal>

{{-- form destroy --}}
<form action="{{ route('admin.structure.bph.destroyDivision') }}" method="post" id="destroy_form">
    @csrf
    @method('DELETE')
    <input type="hidden" name="destroy_id" id="destroy_id">
</form>

@endsection
@section('scripts')
<x-datatable-script />
<script>
    $('#table').DataTable()
</script>
@php($current = $data['current'])
<script>
    $(document).ready(function () {
        const route = "{{ route('admin.structure.bph.index') }}"
        $period = $('#periods')
        $period.change(() => {
        window.location.href = route + '/' + $period.val()
        })

        $('.select2').select2({
        placeholder: "Pilih pengurus",
        ajax: {
            url: "{{ route('admin.structure.bph.search', ['period' => $current]) }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
        });

        $('#submit_modal_create_division').click(()=>{
            $('#create_division_form').submit()
        })
    });

function confirmDelete(id){
    Swal.fire({
        icon:'warning',
        title:'Konfirmasi Hapus',
        text:'Tindakan ini tidak dapat dibatalkan, yakin hapus?',
        showCancelButton:true,
        cancelButtonText:'Batal',
        confirmButtonText:'Hapus',
        confirmButtonColor:'#F54E60',
        cancelButtonColor:'#3185D6',
    }).then((e)=>{
        if(e.isConfirmed){
            $('#destroy_id').val(id)
            $('#destroy_form').submit()
        }
    })
}
</script>
@endsection
